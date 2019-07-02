<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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

        $products = $products->paginate(12);

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
        $products = Product::all();

        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create', ['categories' => Category::all(), 'suppliers' => Supplier::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'bail|required|string|max:100',
            'price' => 'bail|required|numeric',
            'popularity' => 'required|numeric',
            'image' => 'required',
            'category' => 'bail|required|numeric',
            'supplier' => 'bail|required|numeric',
        ]);

        $product = new Product();

        $path = Storage::disk('public')->put('images/products', $request->file('image'));

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->popularity = $request->input('popularity');
        $product->path_of_image = $path;
        $product->category_id = $request->input('category');
        $product->supplier_id = $request->input('supplier');
        $product->save();

        return redirect('/product/manage');
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);

        return view('product.detail', ['product' => $product]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);

        return view('product.edit', ['product' => $product, 'categories' => Category::all(), 'suppliers' => Supplier::all()]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'bail|required|string|max:100',
            'price' => 'bail|required|numeric',
            'popularity' => 'required|numeric',
            'image' => 'required',
            'category' => 'bail|required|numeric',
            'supplier' => 'bail|required|numeric',
        ]);

        $product = Product::find($id);

        if (!empty($product->path_of_image)) {
            Storage::disk('public')->delete($product->path_of_image);
        }
        $path = Storage::disk('public')->put('images/products', $request->file('image'));

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->popularity = $request->input('popularity');
        $product->path_of_image = $path;
        $product->category_id = $request->input('category');
        $product->supplier_id = $request->input('supplier');
        $product->save();

        return redirect('/product/manage');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);

        if (!empty($product->path_of_image)) {
            Storage::disk('public')->delete($product->path_of_image);
        }
        $product->delete();

        return redirect('/product/manage');
    }
}
