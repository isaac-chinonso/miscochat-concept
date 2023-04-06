<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Referral;
use App\Models\SubmittedTask;
use App\Models\Subscription;
use App\Models\Task;
use App\Models\Topup;
use App\Models\Topup_Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['taskearning'] = Transaction::where('user_id', $user->id)->where('type', '=', 'task earning')->sum('amount');
        $data['totalspent'] = Transaction::where('user_id', $user->id)->where(function ($query) {$query->where('type', '=', 'topup')->orWhere('type', '=', 'advert task')->orWhere('type', '=', 'engagement task')->orWhere('type', '=', 'advert subscription');})->sum('amount');
        $data['referralearning'] = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['referrals'] = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->count();
        $data['product'] = Product::where('status', 1)->get();
        $data['tasks'] = Order::where('status', 1)->simplePaginate(6);
        $data['adverttaskscount'] = Task::all();
        return view('user.dashboard', $data);
    }

    public function generaltask()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['tasks'] = Task::where('user_id', $user->id)->get();
        return view('user.general_task', $data);
    }

    public function earn()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['engagementtasks'] = Order::where('status', 1)->where('type', '=', '$submitedtasks')->get();
        $data['adverttasks'] = Order::where('status', 1)->where('type', '=', 'advert')->get();
        $data['adverttaskscount'] = Task::all();
        return view('user.earn', $data);
    }

    public function adverttaskprogress($id)
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['tasksprogress'] = Task::where('order_id', $id)->orderBy('accept_status','DESC')->get();
        return view('user.advert_progress', $data);
    }

    public function adverttaskproof($id)
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['submitedtasks'] = SubmittedTask::where('user_id', $id)->first();
        return view('user.adver_proof', $data);
    }

    public function orderfee()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['payment'] = Transaction::where('user_id', $user->id)->where('status', 0)->get();
        return view('user.orderfee', $data);
    }

    public function activateaccount()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        return view('user.activate', $data);
    }

    public function fundwallet()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['transaction'] = Transaction::where('user_id', $user->id)->where('type', '=', 'deposit')->get();
        return view('user.fundwallet', $data);
    }

    public function placewithdrawal()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['transaction'] = Transaction::where('user_id', $user->id)->where('type', '=', 'withdrawal')->get();
        return view('user.withdrawal', $data);
    }

    public function topuprequest()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['topup'] = Topup::where('user_id', $user->id)->get();
        $data['topupplan'] = Topup_Plan::where('status', 1)->get();
        return view('user.topup', $data);
    }

    public function transaction()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
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
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        return view('user.profile', $data);
    }

    public function bank()
    {
        $user = Auth::user();
        $data['bankdetails'] = Bank::where('user_id', $user->id)->first();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        return view('user.bankdetails', $data);
    }

    public function advertise()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        return view('user.advertise', $data);
    }

    public function sell()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['subscription'] = Subscription::where('user_id', $user->id)->first();
        return view('user.sell', $data);
    }

    public function postsell()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['categories'] = Category::where('status', 1)->get();
        return view('user.postsell', $data);
    }

    public function productlist()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['product'] = Product::where('user_id', $user->id)->get();
        return view('user.productlist', $data);
    }

    public function productdetails($slug)
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['productdetails'] = Product::where('slug', '=', $slug)->first();
        return view('user.productdetails', $data);
    }

    public function socialbuy()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        return view('user.advert_task', $data);
    }

    public function socialengage()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        return view('user.advert_engagement', $data);
    }

    public function advertorderlist()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['order'] = Order::where('user_id', $user->id)->where('type', '=', 'advert')->get();
        return view('user.orderlist', $data);
    }

    public function engagementorderlist()
    {
        $user = Auth::user();
        $walletBalance = Wallet::where('user_id', $user->id)->sum('balance');
        $referralearn = DB::table('referrals')->join('users', 'referrals.user_id', '=', 'users.id')->where('referrals.referred_by_user', $user->username)->where('users.activated', '=', 1)->sum('referrals.earnings');
        $data['walletbalance'] = $walletBalance + $referralearn;
        $data['order'] = Order::where('user_id', $user->id)->where('type', '=', 'engagement')->get();
        return view('user.order_engagement', $data);
    }

    public function performtask($id)
    {
        $user = Auth::user();
        $data['tasksperform'] = Task::where('user_id', $user->id)->where('id', $id)->first();
        return view('user.task', $data);
    }
}
