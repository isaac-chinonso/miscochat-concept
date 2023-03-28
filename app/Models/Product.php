<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id','category_id','name','image','slug','brand', 'price', 'description','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
