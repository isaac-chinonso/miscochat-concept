<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class UserPaymentController extends Controller
{

    public function callback(Request $request)
    {
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $paymentDetails = Flutterwave::verifyTransaction($transactionID);

            if ($paymentDetails['data']) {

                $amount = $paymentDetails['data']['amount'];
                // Save Record into Payment DB
                $user = Auth::user();
                $payment = $request->all();
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->reference = $paymentDetails['data']['flw_ref'];
                $payment->customer_email = $paymentDetails['data']['customer']['email'];
                $payment->amount = $amount;
                $payment->channel = $paymentDetails['data']['payment_type'];
                $payment->gateway_response = $paymentDetails['data']['processor_response'];
                $payment->ip_address = $paymentDetails['data']['ip'];
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
}
