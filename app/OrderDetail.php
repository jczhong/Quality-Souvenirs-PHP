<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function souvenir() {
        return $this->belongsTo('App\Souvenir', 'SouvenirID');
    }

    public function order() {
        return $this->belongsTo('App\Order', 'OrderID');
    }
}
