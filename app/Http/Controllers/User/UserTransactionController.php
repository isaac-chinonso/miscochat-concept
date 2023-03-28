<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Topup;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Paystack;

class UserTransactionController extends Controller
{
    public function deposit(Request $request)
    {
        $user = Auth::user();
        $amount = $request->input('amount');

        $data = array(
            "amount" =>  $amount * 100,
            "reference" => 'wallet_funding_' . time(),
            'email' => auth()->user()->email,
            'username' => Auth::user()->username,
            'phone' => Auth::user()->profile->first()->phone,
        );

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $amount;
        $transaction->type = 'deposit';
        $transaction->status = 0;
        $transaction->save();

        return Paystack::getAuthorizationUrl($data)->redirectNow();
        
    }

    public function withdraw(Request $request)
    {

        $user = Auth::user();
        $walletfund = Wallet::find($user->id);
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

    public function topup(Request $request)
    {
        $user = Auth::user();
        $walletfund = Wallet::find($user->id);
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
}
