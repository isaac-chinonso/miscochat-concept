<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Login Function
    public function signin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role_id' => '1', 'status' => '1'])) {

            return redirect()->intended(route('admindashboard'));
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role_id' => '2', 'status' => '1'])) {

            return redirect()->intended(route('userdashboard'));
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'role_id' => '3', 'status' => '1'])) {

            return redirect()->intended(route('subadmindashboard'));
        }
        \Session::flash('warning_message', 'These credentials do not match our records.');

        return redirect()->back();
    }

    //Save Users Function
    public function savelogin(Request $request)
    {
        // Validation
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        // Save Record into user DB
        $user = new User();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = 2;
        $user->refer_by_id = $request->input('referred_by_user');
        $user->activated = 0;
        $user->status = 1;
        if (User::where('email', '=', $user->email)->exists()) {
            return redirect()->back()->with('warning_message', 'User Already Exist');
        } else {
            $user->save();
        }

        // Find the referring user by username
        $referringUser = User::where('username', $request->referred_by_user)->firstOrFail();

        //Save Record into Referral DB
        $referral = new Referral();
        $referral->user_id = $user->id;
        $referral->referred_by_user = $referringUser->username;
        $referral->earnings = 2000.00;
        $referral->save();

        $bank = new Bank();
        $bank->user_id = $user->id;
        $bank->bank_name = '';
        $bank->account_num = '';
        $bank->account_name = '';
        $bank->save();


        //Save Record into Wallet DB
        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->balance = 0;
        $wallet->save();

        Auth::login($user);

        $user = Auth::user();

        \Session::flash('Success_message', 'You have successfully registered');

        return redirect()->intended(route('userdashboard'));
    }

    // Update profile function
    public function updateprofile(Request $request)
    {
        $user = Auth::user();
        $profile = User::find($user->id);
        // Validation
        $this->validate($request, array(
            'fname' => 'required',
            'lname' => 'required',
        ));

        $user = Auth::user();
        $profile = User::find($user->id);

        $profile->id = $user->id;

        $profile->fname = $request->input('fname');

        $profile->lname = $request->input('lname');

        $profile->gender = $request->input('gender');

        $profile->religion = $request->input('religion');

        $profile->phone = $request->input('phone');

        $profile->location = $request->input('location');

        $profile->dob = $request->input('dob');

        $profile->bio = $request->input('bio');

        $profile->save();

        \Session::flash('Success_message', '✔ profile Updated Succeffully');

        return back();
    }

    public function disableuser($id)
    {
        // Disable User Account
        User::where(['id' => $id])
            ->update(array('status' => 0));

        \Session::flash('Success_message', '✔ User Disabled Successfully');

        return back();
    }

    public function activateuser($id)
    {
        // Activate User Account
        User::where(['id' => $id])
            ->update(array('status' => 1));

        \Session::flash('Success_message', '✔ User Activated Successfully');

        return back();
    }


    // Logout Function
    public function logout()
    {
        Auth::logout();
        return redirect()->intended(route('login'));
    }
}
