<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new App\Category(['Name' => 'Maori Gifts', 'PathOfImage' => 'storage/images/categories/MaoriGifts.svg']);
        $category->save();
        $category = new App\Category(['Name' => 'Jewellery', 'PathOfImage' => 'storage/images/categories/Jewellery.svg']);
        $category->save();
        $category = new App\Category(['Name' => 'Art', 'PathOfImage' => 'storage/images/categories/artwork.svg']);
        $category->save();
        $category = new App\Category(['Name' => 'Homeware', 'PathOfImage' => 'storage/images/categories/Homeware.svg']);
        $category->save();
        $category = new App\Category(['Name' => 'Clothing', 'PathOfImage' => 'storage/images/categories/Clothing.svg']);
        $category->save();
        $category = new App\Category(['Name' => 'Bags', 'PathOfImage' => 'storage/images/categories/Bags.svg']);
        $category->save();
    }
}
