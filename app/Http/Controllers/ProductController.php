<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function __construct()
    {
    }

    public function list(Request $request) {
        $products = DB::table("products")
            ->select(DB::raw('*'));

        $id = Input::get('id');
        if ($id != null) {
            $products = $products->where('category_id', '=', $id);
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
            $products = $products->where('price', '>=', $minprice);
            $products = $products->where('price', '<=', $maxprice);
        }

        $search = Input::get('search');
        if ($search != null) {
            $products = $products->where('name','LIKE','%'.$search.'%');
        }

        switch ($sort) {
            case 'popularity_desc':
                $products = $products->orderByDesc('popularity');
                break;
            case 'popularity':
                $products = $products->orderBy('popularity');
                break;
            case 'price':
                $products = $products->orderByDesc('price');
                break;
            case 'price_desc':
                $products = $products->orderBy('price');
                break;
        }

        $products = $products->get();

        return view('product', ['categories' => Category::all(),
            'products' => $products, 'id' => $id, 'byId' => $byId,
            'sort' => $sort, 'search' => $search,
            'minprice' => $minprice, 'maxprice' => $maxprice]);
    }

    public function listDetail($id) {
        if ($id != null) {
            $product = Product::find($id);
            return view('product_detail', ['product' => $product]);
        }

        return response('', 404);
    }

    public function index()
    {
        $user = Auth::user();
        $products = Product::all();

        return view('product.index', ['isAdmin' => $user->isAdmin, 'products' => $products]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $products)
    {
        //
    }

    public function edit(Product $products)
    {
        //
    }

    public function update(Request $request, Product $products)
    {
        //
    }

    public function destroy(Product $products)
    {
        //
    }
}
