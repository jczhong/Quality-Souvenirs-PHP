<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'image' => 'required',
        ]);

        $category = new Category();

        $path = Storage::disk('public')->put('images/categories', $request->file('image'));

        $category->name = $request->input('name');
        $category->path_of_image = $path;
        $category->save();

        return redirect('/category');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'image' => 'required',
        ]);

        $category = Category::find($id);

        if (!empty($category->path_of_image)) {
            Storage::disk('public')->delete($category->path_of_image);
        }
        $path = Storage::disk('public')->put('images/categories', $request->file('image'));

        $category->name = $request->input('name');
        $category->path_of_image = $path;
        $category->save();

        return redirect('/category');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $category = Category::find($id);

        if (!empty($category->path_of_image)) {
            Storage::disk('public')->delete($category->path_of_image);
        }
        $category->delete();

        return redirect('/category');
    }
}
