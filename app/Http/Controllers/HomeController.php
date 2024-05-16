<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Request as HomeRequest;

class HomeController extends Controller
{
    public function index()
    {
    $products = Product::orderBy('updated_at', 'desc')->get();
    $requests = HomeRequest::orderBy('created_at', 'desc')->get();
    return view('pages.home', compact('products', 'requests'));
    }
}
