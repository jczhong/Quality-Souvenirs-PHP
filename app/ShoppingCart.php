<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function cart_items() {
        return $this->hasMany('App\CartItem', 'ShoppingCartID');
    }
}
