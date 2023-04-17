<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Save task allocated
    public function savetask(Request $request, $id)
    {
        Order::where(['id' => $id])
            ->update(array('status' => 1));

        \Session::flash('Success_message', '✔ Order Activated Succeffully');

        return back();
    }
}
