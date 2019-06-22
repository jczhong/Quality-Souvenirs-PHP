<?php

use App\Supplier;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new App\Supplier(['Name' => 'Countdown Ltd', 'WorkPhoneNumber' => '1234567', 'Email' => 'business@countdown.com', 'Address' => '179 Carrington Road']);
        $supplier->save();
        $supplier = new App\Supplier(['Name' => 'New World Ltd', 'WorkPhoneNumber' => '1234567', 'Email' => 'business@newworld.com', 'Address' => '179 Carrington Road']);
        $supplier->save();
    }
}
