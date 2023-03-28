<?php

namespace App\Http\Controllers\Subadmin;

use App\Http\Controllers\Controller;
use App\Models\Topup;
use App\Models\User;
use Illuminate\Http\Request;

class SubadminPageController extends Controller
{
    public function dashboard()
    {
        $data['users'] = User::where('role_id', 2)->count();
        return view('subadmin.dashboard', $data);
    }

    public function member()
    {
        $data['users'] = User::where('role_id', 2)->get();
        return view('subadmin.member', $data);
    }

    public function pendingtopup()
    {
        $data['pendingtopup'] = Topup::where('status', 0)->get();
        return view('subadmin.pendingtopup', $data);
    }

    public function activetopup()
    {
        $data['activetopup'] = Topup::where('status', 1)->get();
        return view('subadmin.activetopup', $data);
    }
}
