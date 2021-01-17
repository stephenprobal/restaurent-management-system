<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    function onetomanyrelationwithproducttable()
    {
      return $this->hasMany('App\Product','category_id','id');
    }
}
