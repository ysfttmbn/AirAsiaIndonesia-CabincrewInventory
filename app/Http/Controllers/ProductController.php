<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $products = Product::orderBy('updated_at', 'desc')->get();
        return view('pages.inventory', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();
        $productId = Str::random(6);

    
    $product = new Product();
    $product->id = $this->generateProductId();
    $product->product_name = $request->product_name;
    $product->size = $request->size;
    $product->quantity = $request->quantity;
    $product->category = $request->category;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    private function generateProductId()
    {
        $randomLetters = Str::random(4); // Generate 4 random capital letters
        $randomNumbers = rand(10, 99); // Generate 2 random numbers between 10 and 99
        $productId = strtoupper($randomLetters) . $randomNumbers; // Combine letters and numbers
        return $productId;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
    return view('pages.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
    $validated = $request->validated();
    
    $product->product_name = $request->product_name;
    $product->size = $request->size;
    $product->quantity = $request->quantity;
    $product->category = $request->category;

    // Handle image update if required
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function requestInventory(HttpRequest $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $newRequest = new Request();
        $newRequest->user_id = auth()->id();
        $newRequest->product_id = $product->id;
        $newRequest->quantity = $request->quantity;
        $newRequest->status = 'Need Confirm';
        $newRequest->save();

        return redirect()->back()->with('success', 'Request for inventory submitted successfully.');
    }
}
