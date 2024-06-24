<?php

namespace App\Exports;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;

class ProductsPdfExport
{
    public function view(): View
    {
        $products = Product::all();
        return view('exports.products', compact('products'));
    }

    public function download()
    {
        $pdf = Pdf::loadView('exports.products', ['products' => Product::all()]);
        return $pdf->download('products.pdf');
    }
}


