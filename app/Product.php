<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
   
    // protected $guarded=[];
    protected $fillable=['product_name','product_price','product_long_description','product_short_description','product_quantity','product_alert_quantity','product_thumbnail_photo','product_multiple_photo[]'];

    function onetoonerelationwithcategorytable()
    {
      return $this->hasOne('App\Category','id','category_id')->withTrashed();
    }
    function onetomanyrelationwithproductimagetable()
    {
      return $this->hasMany('App\Product_image','product_id','id');
    }

}