<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = Product::orderBy('updated_at', 'desc')->get();
        return view('pages.home', compact('products'));
    }
}
