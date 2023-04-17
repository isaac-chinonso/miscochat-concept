<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReferralWallet;
use App\Models\Subscription;
use App\Models\Topup;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

use Paystack;

class UserTransactionController extends Controller
{
    public function initialize(Request $request)
    {
        // Validation
        $this->validate($request, [
            'amount' => 'required',
        ]);

        $user = Auth::user();
        $amount = $request->input('amount');

        $data = array(
            "amount" =>  $amount,
            "email" => auth()->user()->email,
            "tx_ref" => 'wallet_funding_' . time(),
            "currency" => "NGN",
            "payment_options" => "card",
            "redirect_url" => route('payment.callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone_number,
                "name" => request()->name
            ],
        );

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $amount;
        $transaction->type = 'deposit';
        $transaction->status = 0;
        $transaction->save();


        $payment = Flutterwave::initializePayment($data); 

        return redirect($payment['data']['link']);
    }

    //  Wallet Withdrawal Function
    public function withdraw(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:4000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $walletfund = Wallet::where('user_id', $user->id)->first();
        $amount = $request->input('amount');
        if ($walletfund->balance < $amount) {
            return redirect()->back()->with('warning_message', 'Insufficient balance!');
        } else {
            $walletfund->balance -= $amount;
            $walletfund->save();

            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->amount = $amount;
            $transaction->type = 'withdrawal';
            $transaction->status = 0;
            $transaction->save();
        }

        \Session::flash('Success_message', 'Withdrawal Placed Successfully');
        return back();
    }

    // Referral Earning Withdrawal Function
    public function referralwithdraw(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:4000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $referralwalletfund = ReferralWallet::where('user_id', $user->id)->first();
        $amount = $request->input('amount');
        if ($referralwalletfund->balance < $amount) {
            return redirect()->back()->with('warning_message', 'Insufficient balance!');
        } else {
            $referralwalletfund->balance -= $amount;
            $referralwalletfund->save();

            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->amount = $amount;
            $transaction->type = 'referral earning';
            $transaction->status = 0;
            $transaction->save();
        }

        \Session::flash('Success_message', 'Withdrawal Placed Successfully');
        return back();
    }

    public function topup(Request $request)
    {
         // Validation
         $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'network' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $user = Auth::user();
        $walletfund = Wallet::where('user_id', $user->id)->first();
        $amount = $request->input('amount');
        if ($walletfund->balance < $amount) {
            return redirect()->back()->with('warning_message', 'Insufficient balance!');
        } else {
            $walletfund->balance -= $amount;
            $walletfund->save();

            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->amount = $amount;
            $transaction->type = 'topup';
            $transaction->status = 0;
            $transaction->save();

            $topup = new Topup();
            $topup->user_id = auth()->id();
            $topup->amount = $amount;
            $topup->type = $request->input('type');
            $topup->network = $request->input('network');
            $topup->phone = $request->input('phone');
            $topup->status = 0;
            $topup->save();
        }

        \Session::flash('Success_message', 'Topup Request Placed Successfully');
        return back();
    }

    public function deletetransaction($id)
    {
        // Delete Transaction History
        $transaction = Transaction::where('id', $id)->first();
        $transaction->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted Transaction History');

        return back();
    }

    public function advertsubscription(Request $request)
    {
        // Validation
        $this->validate($request, [
            'amount' => 'required',
        ]);

        $user = Auth::user();
        $walletfund = Wallet::where('user_id', $user->id)->first();
        $amount = $request->input('amount');

        if ($walletfund->balance < $amount) {
            return redirect()->back()->with('warning_message', 'Insufficient balance!');
        } else {

            // Create a new subscription for the user
            $subscription = new Subscription();
            $subscription->user_id = $user->id;
            $subscription->amount = $amount;
            $subscription->starts_at = now();
            $subscription->ends_at = now()->addMonth();
            $subscription->save();

            // Deduct the subscription amount from the user's wallet balance
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $amount;
            $transaction->type = 'advert subscription';
            $transaction->status = 1;
            $transaction->save();

            $walletfund->balance -= $amount;
            $walletfund->save();

            return redirect()->back()->with('Success_message', 'You have successfully Subscribed!');
        }
    }
}
