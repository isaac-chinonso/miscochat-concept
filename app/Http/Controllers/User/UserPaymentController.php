<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Paystack;

class UserPaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['data']) {

            $amount = $paymentDetails['data']['amount'] / 100;
            // Save Record into Payment DB
            $user = Auth::user();
            $payment = $request->all();
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->reference = $paymentDetails['data']['reference'];
            $payment->customer_email = $paymentDetails['data']['customer']['email'];
            $payment->amount = $amount;
            $payment->channel = $paymentDetails['data']['channel'];
            $payment->gateway_response = $paymentDetails['data']['gateway_response'];
            $payment->ip_address = $paymentDetails['data']['ip_address'];
            $payment->status = $paymentDetails['data']['status'];
            $payment->save();
            
            $walletfund = Wallet::where('user_id', $user->id)->first();
            $walletfund->balance += $amount;
            $walletfund->save();

            Transaction::where(['user_id' => $user->id])
                ->update(array('status' => 1));

            \Session::flash('Success_message', '✔ Payment made successfully');

            return redirect()->route('userdashboard');
        }
    }
}
