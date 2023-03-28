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
        $walletfund = Wallet::find($user->id);
        $amount = $request->input('amount');
        if ($walletfund->balance < $amount) {
            return redirect()->route('userfundwallet')->with('warning_message', 'Insufficient balance!');
        } else {
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
            $advertorder->caption = $request->input('caption');
            $advertorder->image = $filename;
            $advertorder->status = 0;
            $advertorder->save();
        }

        \Session::flash('Success_message', 'Advert Task Submitted Successfully');

        return redirect()->route('userorderfee');
    }

    public function deleteorder($id)
    {
        // Delete Order
        $advertorder = Order::where('id', $id)->first();
        $file_path = public_path() . '/advert/' . $advertorder->image;
        unlink($file_path);
        $advertorder->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted advert');

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

    public function accepttask(Request $request)
    {
        $user = Auth::user();
        Task::where(['user_id' => $user->id])->where(['status' => 1])
            ->update(array('accept_status' => 1));

        \Session::flash('Success_message', 'Task Accepted Successfully');

        return redirect()->route('userdashboard');
    }

    public function submittask(Request $request, $id)
    {
        $user = Auth::user();

        $task = Task::where('id', $id)->where('user_id', $user->id)->first();

        $taskamount = $task->order->package - 50;

        $image = $request['image'];
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destination = public_path('proof/');
        $image->move($destination, $filename);

        $submittedtask = new SubmittedTask();
        $submittedtask->user_id = $user->id;
        $submittedtask->order_id = $request->input('order_id');
        $submittedtask->image = $filename;
        $submittedtask->status = 0;
        $submittedtask->save();

        $transaction = new Transaction();
        $transaction->user_id = auth()->id();
        $transaction->amount = $taskamount;
        $transaction->type = 'Task Earning';
        $transaction->status = 0;
        $transaction->save();

        Task::where(['user_id' => $user->id])->where(['id' => $id])
            ->update(array('accept_status' => 2));

        \Session::flash('Success_message', 'Proof Submitted Successfully');

        return redirect()->route('userearn');
    }


    public function submitprofile()
    {
        $users = User::all();
        foreach ($users as $user) {

            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->balance = 0;
            $wallet->save();    

        }

        \Session::flash('Success_message', 'Profile Submitted Successfully');

        return redirect()->route('userearn');
    }
}
