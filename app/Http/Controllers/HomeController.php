<?php

namespace App\Http\Controllers;

use App\Category;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('index', ['categories' => Category::all()]);
    }
}
