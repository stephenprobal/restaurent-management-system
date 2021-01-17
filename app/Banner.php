<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{

    protected $fillable=['banner_name','banner_short_description','banner_long_description','banner_photo'];
}