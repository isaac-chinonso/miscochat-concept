<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $data['highest'] = DB::table('referrals')
                ->select('referred_by_user', DB::raw('SUM(earnings) as total_earnings'))
                ->groupBy('referred_by_user')
                ->orderByDesc('total_earnings')
                ->take(10)
                ->get();
        return view('frontend.index', $data);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function marketplace()
    {
        $data['products'] = Product::where('status', 1)->inRandomOrder()->simplePaginate(15);
        return view('frontend.marketplace', $data);
    }

    public function productdetails($slug)
    {
        $data['productdetails'] = Product::where('slug', '=', $slug)->first();
        $data['similarprod'] = Product::where('status', 1)->where('category_id', $data['productdetails']->category_id)->where('id', '!=', $data['productdetails']->id)->inRandomOrder()->limit(4)->get();
        return view('frontend.productdetails', $data);
    }

    public function support()
    {
        return view('frontend.support');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function resetpassword()
    {
        return view('frontend.reset_password');
    }
}
