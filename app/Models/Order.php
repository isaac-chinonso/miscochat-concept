<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function task()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function submittedtask()
    {
        return $this->hasMany('App\Models\SubmittedTask');
    }
}
