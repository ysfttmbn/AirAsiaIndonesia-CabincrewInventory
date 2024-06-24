<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Request as ProductRequest;
use Illuminate\Http\Request as HttpRequest;
use App\Exports\RequestsExport;
use App\Exports\RequestsPdfExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Exports\ProductsPdfExport;
use Barryvdh\DomPDF\Facade as PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    // Validate the request
    $validated = $request->validated();
    
    // Buat instance produk baru
    $product = new Product();
    
    // Set nilai-nilai dari data yang divalidasi
    $product->id = $this->generateProductId();
    $product->product_name = $validated['product_name'];
    $product->size = $validated['size'];
    $product->quantity = $validated['quantity'];
    $product->category = $validated['category'];

    // Upload gambar jika ada
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    // Simpan produk ke database
    $product->save();

    // Redirect ke halaman index produk dengan pesan sukses
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
        $product->product_name = $validated['product_name'];
        $product->size = $validated['size'];
        $product->quantity = $validated['quantity'];
        $product->category = $validated['category'];

        // Handle image update if required
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
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

    /**
     * Handle request for inventory.
     */
    public function requestInventory(HttpRequest $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        $newRequest = new ProductRequest();
        $newRequest->user_id = auth()->id();
        $newRequest->product_id = $product->id;
        $newRequest->quantity = $request->quantity;
        $newRequest->description = $request->description;
        $newRequest->status = 'Need Confirm';
        $newRequest->save();

        return redirect()->back()->with('success', 'Request for inventory submitted successfully.');
    }

    public function buyItem(HttpRequest $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
        'description' => 'required|string',
    ]);

    $product = Product::findOrFail($request->product_id);

    $newRequest = new ProductRequest();
    $newRequest->user_id = auth()->id();
    $newRequest->product_id = $product->id;
    $newRequest->quantity = $request->quantity;
    $newRequest->description = $request->description;
    $newRequest->status = 'Need Confirm'; // Atur status sesuai dengan kebutuhan pembelian
    $newRequest->save();

    return redirect()->back()->with('success', 'Buy for inventory submitted successfully.');
}


    /**
     * Update the status of a request.
     */
    private function generateWhatsAppLink($phoneNumber, $message)
    {
        $encodedMessage = urlencode($message);
        return "https://wa.me/$phoneNumber?text=$encodedMessage";
    }

    public function updateRequestStatus(HttpRequest $request, $requestId, $status)
{
    $requestModel = ProductRequest::findOrFail($requestId);

    if (!in_array($status, ['Processed', 'Completed', 'Rejected'])) {
        return redirect()->back()->with('error', 'Invalid status update.');
    }

    if ($status == 'Completed') {
        $product = Product::findOrFail($requestModel->product_id);
        if ($product->quantity < $requestModel->quantity) {
            return redirect()->back()->with('error', 'Not enough product quantity.');
        }

        $product->quantity -= $requestModel->quantity;
        $product->save();
    }

    $requestModel->status = $status;
    $requestModel->save();

    $user = $requestModel->user;
    $message = "Your request for product {$requestModel->product->product_name} has been {$status}.";    

    // Logika untuk pesan berdasarkan description dan status
    if ($status == 'Rejected') {
        $message .= "\n\nPlease Contact Admin for Details.";
    } elseif ($requestModel->description == 'Paid') {
        $message .= "\n\nThe price you have to pay is : Rp.\nPlease pay to the following account number :";
    }

    // Buat tautan WhatsApp jika statusnya Processed atau Rejected
    if (in_array($status, ['Processed', 'Rejected'])) {
        $whatsappLink = $this->generateWhatsAppLink($user->phone_number, $message);
        return redirect()->back()->with('success', 'Request status updated successfully.')->with('whatsappLink', $whatsappLink);
    }

    return redirect()->back()->with('success', 'Request status updated successfully.');
}

    public function exportExcel()
    {
        return Excel::download(new RequestsExport, 'requests.xlsx');
    }

    public function exportPdf()
    {
        $requestsPdfExport = new RequestsPdfExport();
        return $requestsPdfExport->download();
    }

    // Export Excel
public function exportProductsExcel()
{
    return Excel::download(new ProductsExport, 'products.xlsx');
}

// Export PDF
public function exportProductsPdf()
{
    $productsPdfExport = new ProductsPdfExport();
    return $productsPdfExport->download();
}
}
