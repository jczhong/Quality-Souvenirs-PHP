<?php

use App\Souvenir;
use Illuminate\Database\Seeder;

class SouvenirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $souvenir = new App\Souvenir(['Name' => 'Test Maori Gifts', 'Description' => 'This is a test product', 'Price' => 12.8, 'Popularity' => 1, 'CategoryID' => 1, 'SupplierID' => 1]);
        $souvenir->save();
        $souvenir = new App\Souvenir(['Name' => 'Test Jewellery', 'Description' => 'This is a test product', 'Price' => 31.8, 'Popularity' => 2, 'CategoryID' => 2, 'SupplierID' => 1]);
        $souvenir->save();
        $souvenir = new App\Souvenir(['Name' => 'Test Art', 'Description' => 'This is a test product', 'Price' => 49.9, 'Popularity' => 3, 'CategoryID' => 3, 'SupplierID' => 1]);
        $souvenir->save();
        $souvenir = new App\Souvenir(['Name' => 'Test Homeware', 'Description' => 'This is a test product', 'Price' => 27.5, 'Popularity' => 4, 'CategoryID' => 4, 'SupplierID' => 2]);
        $souvenir->save();
        $souvenir = new App\Souvenir(['Name' => 'Test Clothing', 'Description' => 'This is a test product', 'Price' => 13.8, 'Popularity' => 5, 'CategoryID' => 5, 'SupplierID' => 2]);
        $souvenir->save();
        $souvenir = new App\Souvenir(['Name' => 'Test Bags', 'Description' => 'This is a test product', 'Price' => 5.99, 'Popularity' => 6, 'CategoryID' => 6, 'SupplierID' => 2]);
        $souvenir->save();
    }
}
