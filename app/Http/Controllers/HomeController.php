<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as ProductRequest;

class HomeController extends Controller
{
    public function index()
    {
    $products = Product::orderBy('updated_at', 'desc')->get();
    $requests = Request::orderBy('created_at', 'desc')->get();
    return view('pages.home', compact('products', 'requests'));
    }
}
