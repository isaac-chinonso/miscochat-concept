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
        // Validation
        $this->validate($request, [
            'order_id' => 'required|unique:tasks|max:10',
        ]);

        $order = Order::where('id', $id)->first();
        $tasksToAssign = $order->quantity;

        if ($tasksToAssign > 0) {
            $userstask = User::where('activated', 1)->where('role_id', 2)->inRandomOrder()->take($tasksToAssign)->get();
           
            foreach ($userstask as $user) {
                $task = new Task();
                $task->order_id = $request->input('order_id');
                $task->buyer_id = $request->input('buyer_id');
                $task->user_id = $user->id;
                $task->status = 1;
                $task->accept_status = 0;
                $task->save();
            }
        }

        Order::where(['id' => $task->order_id])
            ->update(array('status' => 1));

        \Session::flash('Success_message', '✔ Task allocated to Users Succeffully');

        return back();
    }
}
