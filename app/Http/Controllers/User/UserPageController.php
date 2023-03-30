<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Referral;
use App\Models\Task;
use App\Models\Topup;
use App\Models\Topup_Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['taskearning'] = Transaction::where('user_id', $user->id)->where('type', '=', 'Task Earning')->sum('amount');
        $data['totalspent'] = Transaction::where('user_id', $user->id)->where('type', '=', 'topup')->sum('amount');
        $data['referralearning'] = Referral::where('referred_by_user', $user->id)->sum('earnings');
        $data['referrals'] = Referral::where('referred_by_user', $user->id)->count();
        $data['product'] = Product::where('status', 1)->get();
        $data['tasks'] = Task::where('user_id', $user->id)->get();
        return view('user.dashboard', $data);
    }

    public function earn()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['tasks'] = Task::where('user_id', $user->id)->get();
        return view('user.earn', $data);
    }

    public function orderfee()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['payment'] = Transaction::where('user_id', $user->id)->where('status', 0)->get();
        return view('user.orderfee', $data);
    }

    public function activateaccount()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        return view('user.activate', $data);
    }

    public function fundwallet()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['transaction'] = Transaction::where('user_id', $user->id)->where('type', '=', 'deposit')->get();
        return view('user.fundwallet', $data);
    }

    public function placewithdrawal()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['transaction'] = Transaction::where('user_id', $user->id)->where('type', '=', 'withdrawal')->get();
        return view('user.withdrawal', $data);
    }

    public function topuprequest()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['topup'] = Topup::where('user_id', $user->id)->get();
        $data['topupplan'] = Topup_Plan::where('status', 1)->get();
        return view('user.topup', $data);
    }

    public function transaction()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['transaction'] = Transaction::where('user_id', $user->id)->get();
        return view('user.transaction', $data);
    }

    public function market()
    {
        $data['product'] = Product::where('status', 1)->inRandomOrder()->simplePaginate(15);
        return view('user.market', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        $data['users'] = User::where('id', $user->id)->first();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        return view('user.profile', $data);
    }

    public function bank()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        return view('user.bankdetails', $data);
    }

    public function advertise()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        return view('user.advertise', $data);
    }

    public function sell()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        return view('user.sell', $data);
    }

    public function postsell()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['categories'] = Category::where('status', 1)->get();
        return view('user.postsell', $data);
    }

    public function productlist()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['product'] = Product::where('user_id', $user->id)->get();
        return view('user.productlist', $data);
    }

    public function productdetails($slug)
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['productdetails'] = Product::where('slug', '=', $slug)->first();
        return view('user.productdetails', $data);
    }

    public function socialbuy()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        return view('user.advert_task', $data);
    }

    public function orderlist()
    {
        $user = Auth::user();
        $data['walletbalance'] = Wallet::where('user_id', $user->id)->sum('balance');
        $data['order'] = Order::where('user_id', $user->id)->get();
        return view('user.orderlist', $data);
    }

    public function performtask($id)
    {
        $user = Auth::user();
        $data['tasksperform'] = Task::where('user_id', $user->id)->where('id', $id)->first();
        return view('user.task', $data);
    }
}
