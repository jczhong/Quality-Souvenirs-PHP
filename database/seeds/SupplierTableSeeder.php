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
        $supplier = new App\Supplier(['name' => 'Countdown Ltd', 'phone' => '1234567', 'email' => 'business@countdown.com', 'address' => '179 Carrington Road']);
        $supplier->save();
        $supplier = new App\Supplier(['name' => 'New World Ltd', 'phone' => '1234567', 'email' => 'business@newworld.com', 'address' => '179 Carrington Road']);
        $supplier->save();
    }
}
