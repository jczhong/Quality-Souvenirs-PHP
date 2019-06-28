<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'popularity', 'path_of_image', 'category_id', 'supplier_id',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }

    public function order_details() {
        return $this->hasMany('App\OrderDetail');
    }

    public function cart_items() {
        return $this->hasMany('App\CartItem');
    }
}
