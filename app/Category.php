<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'Name', 'PathOfImage',
    ];

    public function souvenirs() {
        return $this->hasMany('App\Souvenir', 'CategoryID');
    }
}
