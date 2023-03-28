<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Task;
use App\Models\Topup;
use App\Models\Topup_Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $data['walletbalance'] = Wallet::sum('balance');
        $data['products'] = Product::where('status', 1)->count();
        $data['orders'] = Order::count();
        $data['users'] = User::where('role_id', 2)->count();
        $data['pendingtransactions'] = Transaction::where('status', 0)->count();
        return view('admin.dashboard', $data);
    }

    public function member()
    {
        $data['users'] = User::where('role_id', 2)->get();
        return view('admin.member', $data);
    }

    public function subadmins()
    {
        $data['users'] = User::where('role_id', 3)->get();
        return view('admin.subadmin', $data);
    }

    public function product()
    {
        $data['products'] = Product::where('status', 1)->get();
        return view('admin.product', $data);
    }

    public function addproduct()
    {
        $data['categories'] = Category::where('status', 1)->get();
        return view('admin.add_product', $data);
    }

    public function category()
    {
        $data['categories'] = Category::where('status', 1)->get();
        return view('admin.category', $data);
    }

    public function order()
    {
        $data['orders'] = Order::all();
        return view('admin.orders', $data);
    }

    public function task()
    {
        $data['orders'] = Order::where('status', 1)->get();
        return view('admin.task', $data);
    }

    public function allocatedtask($id)
    {
        $data['tasks'] = Task::where('order_id', $id)->get();
        return view('admin.allocated_user', $data);
    }

    public function coupon()
    {
        $data['coupon'] = Coupon::all();
        return view('admin.coupond_code', $data);
    }

    public function pendingtopup()
    {
        $data['pendingtopup'] = Topup::where('status', 0)->get();
        return view('admin.pendingtopup', $data);
    }

    public function activetopup()
    {
        $data['activetopup'] = Topup::where('status', 1)->get();
        return view('admin.activetopup', $data);
    }

    public function topupplan()
    {
        $data['topupplan'] = Topup_Plan::where('status', 1)->get();
        return view('admin.topup_plan', $data);
    }

    public function pendingdeposit()
    {
        $data['pendingdeposit'] = Transaction::where('status', 0)->where('type', '=', 'deposit')->get();
        return view('admin.pendingdeposit', $data);
    }

    public function activedeposit()
    {
        $data['activedeposit'] = Transaction::where('status', 1)->where('type', '=', 'deposit')->get();
        return view('admin.activedeposit', $data);
    }

    public function pendingwithdrawal()
    {
        $data['pendingwithdrawal'] = Transaction::where('status', 0)->where('type', '=', 'withdrawal')->get();
        return view('admin.pendingwithdrawal', $data);
    }

    public function activewithdrawal()
    {
        $data['activewithdrawal'] = Transaction::where('status', 1)->where('type', '=', 'withdrawal')->get();
        return view('admin.activewithdrawal', $data);
    }
}
