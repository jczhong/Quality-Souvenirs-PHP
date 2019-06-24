<?php

namespace App\Http\Controllers;

use App\Category;
use App\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request) {
        $souvenirs = DB::table("souvenirs")
            ->select(DB::raw('*'));

        $id = Input::get('id');
        if ($id != null) {
            $souvenirs = $souvenirs->where('CategoryID', '=', $id);
        }

        $byId = Input::get('byId');
        if ($byId == null) {
            $byId = false;
        }

        $sort = Input::get('sort');
        if ($sort == null) {
            $sort = 'popularity';
        }

        $minprice = Input::get('minprice');
        $maxprice = Input::get('maxprice');
        if ($minprice != null && $maxprice != null) {
            $souvenirs = $souvenirs->where('Price', '>=', $minprice);
            $souvenirs = $souvenirs->where('Price', '<=', $maxprice);
        }

        $search = Input::get('search');
        if ($search != null) {
            $souvenirs = $souvenirs->where('name','LIKE','%'.$search.'%');
        }

        switch ($sort) {
            case 'popularity_desc':
                $souvenirs = $souvenirs->orderByDesc('Popularity');
                break;
            case 'popularity':
                $souvenirs = $souvenirs->orderBy('Popularity');
                break;
            case 'price':
                $souvenirs = $souvenirs->orderByDesc('Price');
                break;
            case 'price_desc':
                $souvenirs = $souvenirs->orderBy('Price');
                break;
        }

        $souvenirs = $souvenirs->get();

        return view('product', ['categories' => Category::all(),
            'souvenirs' => $souvenirs, 'id' => $id, 'byId' => $byId,
            'sort' => $sort, 'search' => $search,
            'minprice' => $minprice, 'maxprice' => $maxprice]);
    }
}
