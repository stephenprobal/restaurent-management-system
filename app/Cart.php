<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    protected $fillable=['generated_cart_id','product_id','product_quantity'];
    function product(){
    return $this->belongsTo('App\Product');
    }
}
