<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'path_of_image',
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
