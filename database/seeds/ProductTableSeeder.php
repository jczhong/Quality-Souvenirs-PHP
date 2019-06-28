<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new App\Product(['name' => 'Test Maori Gifts', 'description' => 'This is a test product', 'price' => 12.8, 'popularity' => 1, 'category_id' => 1, 'supplier_id' => 1]);
        $product->save();
        $product = new App\Product(['name' => 'Test Jewellery', 'description' => 'This is a test product', 'price' => 31.8, 'popularity' => 2, 'category_id' => 2, 'supplier_id' => 1]);
        $product->save();
        $product = new App\Product(['name' => 'Test Art', 'description' => 'This is a test product', 'price' => 49.9, 'popularity' => 3, 'category_id' => 3, 'supplier_id' => 1]);
        $product->save();
        $product = new App\Product(['name' => 'Test Homeware', 'description' => 'This is a test product', 'price' => 27.5, 'popularity' => 4, 'category_id' => 4, 'supplier_id' => 2]);
        $product->save();
        $product = new App\Product(['name' => 'Test Clothing', 'description' => 'This is a test product', 'price' => 13.8, 'popularity' => 5, 'category_id' => 5, 'supplier_id' => 2]);
        $product->save();
        $product = new App\Product(['name' => 'Test Bags', 'description' => 'This is a test product', 'price' => 5.99, 'popularity' => 6, 'category_id' => 6, 'supplier_id' => 2]);
        $product->save();
        $product = new App\Product(['name' => 'Test Maori Gifts2', 'description' => 'This is a test product', 'price' => 17.8, 'popularity' => 7, 'category_id' => 1, 'supplier_id' => 1]);
        $product->save();
        $product = new App\Product(['name' => 'Test Jewellery2', 'description' => 'This is a test product', 'price' => 66.8, 'popularity' => 8, 'category_id' => 2, 'supplier_id' => 1]);
        $product->save();
        $product = new App\Product(['name' => 'Test Art2', 'description' => 'This is a test product', 'price' => 80.9, 'popularity' => 3, 'category_id' => 3, 'supplier_id' => 1]);
        $product->save();
        $product = new App\Product(['name' => 'Test Homeware2', 'description' => 'This is a test product', 'price' => 34.5, 'popularity' => 9, 'category_id' => 4, 'supplier_id' => 2]);
        $product->save();
        $product = new App\Product(['name' => 'Test Clothing2', 'description' => 'This is a test product', 'price' => 17.8, 'popularity' => 10, 'category_id' => 5, 'supplier_id' => 2]);
        $product->save();
        $product = new App\Product(['name' => 'Test Bags2', 'description' => 'This is a test product', 'price' => 9.99, 'popularity' => 12, 'category_id' => 6, 'supplier_id' => 2]);
        $product->save();
    }
}
