<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_details() {
        return $this->hasMany('App\OrderDetail');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
