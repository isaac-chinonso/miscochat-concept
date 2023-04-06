<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profile;
use App\Models\SubmittedTask;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Save product
    public function saveproduct(Request $request)
    {
        // Validation
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'location' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ]);

        $image = $request['image'];
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destination = public_path('product/');
        $image->move($destination, $filename);

        $slug = Str::slug($request->name);
        $pslug = Product::where('slug', $slug)->first();
        //check if slug exists
        if ($pslug) {
            $slug = $slug . '-copy';
        }

        $user = Auth::user();
        // Save Record into Product DB
        $product = new Product();
        $product->user_id = $user->id;
        $product->slug = $slug;
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->brand = $request->input('brand');
        $product->location = $request->input('location');
        $product->price = $request->input('price');
        $product->phone = $request->input('phone');
        $product->description = $request->input('description');
        $product->image = $filename;
        $product->status = 1;
        $product->save();

        \Session::flash('Success_message', 'Product Added Successfully to Miscochat Market');

        return redirect()->route('userproductlist');
    }

    public function deleteproduct($id)
    {
        // Delete product
        $product = Product::where('id', $id)->first();
        $file_path = public_path() . '/product/' . $product->image;
        unlink($file_path);
        $product->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted product from Miscochat Marketplace');

        return back();
    }

    // Save Advert Task
    public function saveadverttask(Request $request)
    {
        // Validation
        $this->validate($request, [
            'platform' => 'required',
            'quantity' => 'required',
            'package' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'location' => 'required',
            'amount' => 'required',
            'caption' => 'required',
        ]);

        $image = $request['image'];
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destination = public_path('advert/');
        $image->move($destination, $filename);

        $user = Auth::user();
        $walletfund = Wallet::where('user_id', $user->id)->first();
        $amount = $request->input('amount');
        if ($walletfund->balance < $amount) {
            return redirect()->route('userfundwallet')->with('warning_message', 'Insufficient balance! kindly Fund Wallet to Continue');
        } else {

            $walletfund->balance -= $amount;
            $walletfund->save();

            // Save Record into Order DB
            $advertorder = new Order();
            $advertorder->user_id = $user->id;
            $advertorder->platform = $request->input('platform');
            $advertorder->quantity = $request->input('quantity');
            $advertorder->package = $request->input('package');
            $advertorder->gender = $request->input('gender');
            $advertorder->religion = $request->input('religion');
            $advertorder->location = $request->input('location');
            $advertorder->amount = $amount;
            $advertorder->userearn = $advertorder->package / 2;
            $advertorder->caption = $request->input('caption');
            $advertorder->image = $filename;
            $advertorder->type = 'advert';
            $advertorder->status = 0;
            $advertorder->save();

            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->amount = $amount;
            $transaction->type = 'advert task';
            $transaction->status = 1;
            $transaction->save();
        }

        \Session::flash('Success_message', 'Advert Task Submitted Successfully');

        return redirect()->route('userorderadvert');
    }

    // Save Advert Task
    public function saveadvertengagement(Request $request)
    {
        // Validation
        $this->validate($request, [
            'platform' => 'required',
            'quantity' => 'required',
            'package' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'location' => 'required',
            'amount' => 'required',
            'caption' => 'required',
        ]);

        $user = Auth::user();
        $walletfund = Wallet::where('user_id', $user->id)->first();
        $amount = $request->input('amount');
        if ($walletfund->balance < $amount) {
            return redirect()->route('userfundwallet')->with('warning_message', 'Insufficient balance! kindly Fund Wallet to Continue');
        } else {

            $walletfund->balance -= $amount;
            $walletfund->save();

            // Save Record into Order DB
            $advertorder = new Order();
            $advertorder->user_id = $user->id;
            $advertorder->platform = $request->input('platform');
            $advertorder->quantity = $request->input('quantity');
            $advertorder->package = $request->input('package');
            $advertorder->gender = $request->input('gender');
            $advertorder->religion = $request->input('religion');
            $advertorder->location = $request->input('location');
            $advertorder->amount = $amount;
            $advertorder->userearn = $advertorder->package / 2;
            $advertorder->caption = $request->input('caption');
            $advertorder->image = $request->input('image');
            $advertorder->type = 'engagement';
            $advertorder->status = 0;
            $advertorder->save();

            $transaction = new Transaction();
            $transaction->user_id = auth()->id();
            $transaction->amount = $amount;
            $transaction->type = 'engagement task';
            $transaction->status = 1;
            $transaction->save();
        }

        \Session::flash('Success_message', 'Advert Engagement Submitted Successfully');

        return redirect()->route('userorderengagement');
    }

    public function deleteadvertorder($id)
    {
        // Delete Advert Order
        $advertorder = Order::where('id', $id)->first();
        $file_path = public_path() . '/advert/' . $advertorder->image;
        unlink($file_path);
        $advertorder->delete();

        \Session::flash('Success_message', 'Advert Task Deleted Successfully');

        return back();
    }

    public function deleteengagementorder($id)
    {
        // Delete Engagement Order
        $advertorder = Order::where('id', $id)->first();
        $advertorder->delete();

        \Session::flash('Success_message', 'Engagement Task Deleted Successfully');

        return back();
    }

    public function activateuser(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();

        if ($coupon && $coupon->status == 0) {

            $coupon->status = 1;
            $coupon->save();

            $user = Auth::user();
            User::where(['id' => $user->id])
                ->update(array('activated' => 1));
        } else {

            return redirect()->back()->with('warning_message', 'Coupon is invalid or already used');
        }
        \Session::flash('Success_message', 'Membership Activated Successfully');

        return redirect()->route('userdashboard');
    }

    // Save Bank
    public function savebank(Request $request)
    {
        // Validation
        $this->validate($request, [
            'account_name' => 'required',
            'account_num' => 'required',
            'bank_name' => 'required',
        ]);

        $user = Auth::user();
        // Save Record into Bank DB
        $bank = new Bank();
        $bank->user_id = $user->id;
        $bank->account_name = $request->input('account_name');
        $bank->account_num = $request->input('account_num');
        $bank->bank_name = $request->input('bank_name');
        $bank->save();

        \Session::flash('Success_message', 'Bank Account Details Updated Successfully');

        return back();
    }

    public function accepttask(Request $request, $id)
    {
        $user = Auth::user();

        $task = new Task();
        $task->order_id = $request->input('order_id');
        $task->buyer_id = $request->input('buyer_id');
        $task->user_id = $user->id;
        $task->accept_status = 0;
        if (Task::where('user_id', '=', $user->id)->where('order_id', '=', $id)->exists()) {
            return back()->with('warning_message', 'Task Already Accepted, Check Accepted Task Page for details');
        } else {
            $task->save();

            \Session::flash('Success_message', 'Task Accepted Successfully');

            return redirect()->route('useracceptedtask');
        }
    }

    public function submittask(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = Auth::user();

        $task = Task::where('id', $id)->where('user_id', $user->id)->first();

        $submittedtask = new SubmittedTask();
        $submittedtask->user_id = $user->id;
        $submittedtask->order_id = $request->input('order_id');

        if ($request->hasFile('image')) {
            $image = $request['image'];
            $filename = $image->getClientOriginalName();
            $destination = public_path('proof/');
            $image->move($destination, $filename);
            $submittedtask->image = $filename;
        }

        if ($request->hasFile('image1')) {
            $image1 = $request['image1'];
            $filename = $image1->getClientOriginalName();
            $destination = public_path('proof/');
            $image1->move($destination, $filename);
            $submittedtask->image1 = $filename;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request['image2'];
            $filename = $image2->getClientOriginalName();
            $destination = 'file';
            $image2->move($destination, $filename);
            $submittedtask->image2 = $filename;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request['image3'];
            $filename = $image3->getClientOriginalName();
            $destination = 'file';
            $image3->move($destination, $filename);
            $submittedtask->image3 = $filename;
        }

        $submittedtask->status = 0;
        $submittedtask->save();

        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->amount = $task->order->userearn;
        $transaction->type = 'Task Earning';
        $transaction->status = 0;
        $transaction->save();

        Task::where(['user_id' => $user->id])->where(['id' => $id])
            ->update(array('accept_status' => 1));

        \Session::flash('Success_message', 'Proof Submitted Successfully');

        return redirect()->route('useracceptedtask');
    }

    public function approvetasksubmission($id)
    {

        $order = Task::where('id', $id)->first();

        Task::where(['id' => $id])
            ->update(array('accept_status' => 2));

        SubmittedTask::where(['user_id' => $order->user_id])
            ->where(['order_id' => $order->order_id])
            ->update(array('status' => 1));

        $transaction = new Transaction();
        $transaction->user_id = $order->user_id;
        $transaction->amount = $order->order->userearn;
        $transaction->type = 'task earning';
        $transaction->status = 1;
        $transaction->save();

        $walletfund = Wallet::where('user_id', $order->user_id)->first();
        $walletfund->balance += $order->order->userearn;
        $walletfund->save();
        \Session::flash('Success_message', 'Task Submission Approved Successfully');

        return back();
    }



    public function submitprofile()
    {
        $users = User::all();
        foreach ($users as $user) {

            $wallet = new Bank();
            $wallet->user_id = $user->id;
            $wallet->bank_name = '';
            $wallet->account_num = '';
            $wallet->account_name = '';
            $wallet->save();
        }

        \Session::flash('Success_message', 'Profile Submitted Successfully');

        return redirect()->route('userearn');
    }
}
