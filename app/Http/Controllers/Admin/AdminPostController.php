<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Noticeboard;
use App\Models\Product;
use App\Models\ReferralWallet;
use App\Models\Topup;
use App\Models\Topup_Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Error\Notice;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Save Category
    public function savecategory(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required',
        ]);

        // Save Record into User DB
        $category = new Category();
        $category->name = $request->input('name');
        $category->status = 1;
        $category->save();

        \Session::flash('Success_message', 'Category Added Successfully');

        return back();
    }

    public function deletecategory($id)
    {
        // Delete Category
        $category = Category::where('id', $id)->first();
        $category->delete();

        \Session::flash('Success_message', '✔ You Have Successfully Deleted Category');

        return back();
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

    // Generate and Save Coupon Code
    public function savecode(Request $request)
    {
        $data = [];

        for ($i = 0; $i < 500; $i++) {
            $code = Str::random(6);
            $data[] = [
                'coupon_code' => $code,
                'status' => 0
            ];
        }

        DB::table('coupons')->insert($data);

        \Session::flash('Success_message', 'Coupon Code Generated Successfully');

        return back();
    }

    public function deletecoupon($id)
    {
        // Delete Coupon
        $coupon = Coupon::where('id', $id)->first();
        $coupon->delete();

        \Session::flash('Success_message', 'Coupon Code Deleted Successfully');

        return back();
    }


    // Save Mobile Topup Plan
    public function savetopupplan(Request $request)
    {
        // Validation
        $this->validate($request, [
            'network' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ]);

        // Save Record into Topup Plan DB
        $topupplan = new Topup_Plan();
        $topupplan->network = $request->input('network');
        $topupplan->price = $request->input('price');
        $topupplan->unit = $request->input('unit');
        $topupplan->status = 1;
        $topupplan->save();

        \Session::flash('Success_message', 'Mobile Topup Plan Added Successfully');

        return back();
    }

    public function deletetopupplan($id)
    {
        // Delete Mobile Topup Plan
        $topupplan = Topup_Plan::where('id', $id)->first();
        $topupplan->delete();

        \Session::flash('Success_message', '✔ Mobile Topup Plan Deleted Successfully');

        return back();
    }

    // Update Mobile Topup Plan function
    public function updatetopupplan(Request $request, $id)
    {
        $topupplan = Topup_Plan::find($id);
        // Validation
        $this->validate($request, array(
            'network' => 'required',
            'price' => 'required',
            'unit' => 'required',
        ));

        $topupplan = Topup_Plan::find($id);

        $topupplan->network = $request->input('network');
        $topupplan->price = $request->input('price');
        $topupplan->unit = $request->input('unit');

        $topupplan->save();

        \Session::flash('Success_message', '✔ Mobile Topup Plan Updated Succeffully');

        return back();
    }

    public function makesubadmin($id)
    {
        // Make User Sub Admin
        User::where(['id' => $id])
            ->update(array('role_id' => 3));

        \Session::flash('Success_message', '✔ You Have Successfully Made User a Sub Admin');

        return back();
    }

    public function approvetopup($id)
    {
        // Mark Topup as done
        Topup::where(['id' => $id])
            ->update(array('status' => 1));

        \Session::flash('Success_message', 'Topup Approved Successfully');

        return back();
    }

    public function approvewithdrawal($id)
    {
        // Mark Withdrawal as Paid
        Transaction::where(['id' => $id])
            ->update(array('status' => 1));

        \Session::flash('Success_message', 'Withdrawal Mark as Paid Successfully');

        return back();
    }

    public function declinewithdrawal($id)
    {
        // Decline Withdrawal
        Transaction::where(['id' => $id])
            ->update(array('status' => 2));

        \Session::flash('Success_message', 'Withdrawal Declined Successfully');

        return back();
    }

    public function revokesubadmin($id)
    {
        // Revoke User Sub Admin
        User::where(['id' => $id])
            ->update(array('role_id' => 2));

        \Session::flash('Success_message', '✔ You Have Successfully Revoke Sub Admin Right');

        return back();
    }

    public function savedeposit(Request $request)
    {
        // Validation
        $this->validate($request, [
            'amount' => 'required',
        ]);

        $user_id = $request->input('user_id');
        $amount = $request->input('amount');

        $walletfund = Wallet::where('user_id', $user_id)->first();
        $walletfund->balance += $amount;
        $walletfund->save();

        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->amount = $amount;
        $transaction->type = 'deposit';
        $transaction->status = 1;
        $transaction->save();

        \Session::flash('Success_message', '✔ Deposited successfully');

        return back();
    }

    //  Wallet Withdrawal Function
    public function savetaskwithdrawal(Request $request)
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

        $user_id = $request->input('user_id');
        $amount = $request->input('amount');

        $walletfund = Wallet::where('user_id', $user_id)->first();
        if ($walletfund->balance < $amount) {
            return redirect()->back()->with('warning_message', 'Insufficient balance!');
        } else {
            $walletfund->balance -= $amount;
            $walletfund->save();

            $transaction = new Transaction();
            $transaction->user_id = $user_id ;
            $transaction->amount = $amount;
            $transaction->type = 'withdrawal';
            $transaction->status = 0;
            $transaction->save();
        }

        \Session::flash('Success_message', 'Task Earning Withdrawal Placed Successfully');
        return back();
    }

    // Referral Earning Withdrawal Function
    public function savereferralwithdrawal(Request $request)
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

        $user_id = $request->input('user_id');
        $amount = $request->input('amount');

        $referralwalletfund = ReferralWallet::where('user_id', $user_id)->first();
        if ($referralwalletfund->balance < $amount) {
            return redirect()->back()->with('warning_message', 'Insufficient balance!');
        } else {
            $referralwalletfund->balance -= $amount;
            $referralwalletfund->save();

            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->amount = $amount;
            $transaction->type = 'referral earning';
            $transaction->status = 0;
            $transaction->save();
        }

        \Session::flash('Success_message', 'Referral Earning Withdrawal Placed Successfully');
        return back();
    }

    // Post Notice Board Content
    public function savenoticeboard(Request $request)
    {
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'notice_text' => 'required',
        ]);

        // Save Record into Noticeboard DB
        $notice = new Noticeboard();
        $notice->title = $request->input('title');
        $notice->notice_text = $request->input('notice_text');
        $notice->status = 1;
        $notice->save();

        \Session::flash('Success_message', 'Notice Added Successfully');

        return back();
    }

    // Update Notice Board function
    public function updatenoticeboard(Request $request, $id)
    {
        // Validation
        $this->validate($request, array(
            'title' => 'required',
            'notice_text' => 'required',
        ));

        $notice = Noticeboard::find($id);

        $notice->title = $request->input('title');

        $notice->notice_text = $request->input('notice_text');

        $notice->save();

        \Session::flash('Success_message', '✔ Announcement Updated Succeffully');

        return back();
    }

    public function deletenoticeboard($id)
    {
        // Delete Notice Board
        $notice = Noticeboard::where('id', $id)->first();
        $notice->delete();

        \Session::flash('Success_message', '✔ Announcement Deleted Successfully');

        return back();
    }
    
}
