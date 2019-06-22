<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'Name', 'WorkPhoneNumber', 'Email', 'Address',
    ];

    public function souvenirs() {
        return $this->hasMany('App\Souvenir', 'SupplierID');
    }
}
