<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function souvenir() {
        return $this->belongsTo('App\Souvenir', 'SouvenirID');
    }

    public function shopping_cart() {
        return $this->belongsTo('App\ShoppingCart', 'ShoppingCartID');
    }
}
