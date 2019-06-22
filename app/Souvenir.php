<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Souvenir extends Model
{
    protected $fillable = [
        'Name', 'Description', 'Price', 'Popularity', 'PathOfImage', 'CategoryID', 'SupplierID',
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'CategoryID');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier', 'SupplierID');
    }

    public function order_details() {
        return $this->hasMany('App\OrderDetail', 'SouvenirID');
    }

    public function cart_items() {
        return $this->hasMany('App\CartItem', 'SouvenirID');
    }
}
