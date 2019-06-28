<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function shopping_cart() {
        return $this->belongsTo('App\ShoppingCart');
    }
}
