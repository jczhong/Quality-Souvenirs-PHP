<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'address',
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
