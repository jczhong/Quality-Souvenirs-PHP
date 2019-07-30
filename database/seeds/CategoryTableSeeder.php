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
        $category = new App\Category(['name' => 'Maori Gifts', 'path_of_image' => 'images/categories/MaoriGifts.svg']);
        $category->save();
        $category = new App\Category(['name' => 'Jewellery', 'path_of_image' => 'images/categories/Jewellery.svg']);
        $category->save();
        $category = new App\Category(['name' => 'Art', 'path_of_image' => 'images/categories/artwork.svg']);
        $category->save();
        $category = new App\Category(['name' => 'Homeware', 'path_of_image' => 'images/categories/Homeware.svg']);
        $category->save();
        $category = new App\Category(['name' => 'Clothing', 'path_of_image' => 'images/categories/Clothing.svg']);
        $category->save();
        $category = new App\Category(['name' => 'Bags', 'path_of_image' => 'images/categories/Bags.svg']);
        $category->save();
    }
}
