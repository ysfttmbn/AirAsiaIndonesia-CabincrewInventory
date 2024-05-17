        @extends('layouts.app')
        @section('title', 'Add Product')
        @section('content')
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" data-kt-redirect="products">
                            @csrf
                            @method('PUT')
                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Image</h2>
                                        </div>
                                    </div>
                                    <div class="card-body text-center pt-0">
                                        <style>
                                            .image-input-placeholder {
                                                background-image: url('{{ $product->image ? asset('images/' . $product->image) : asset('assets/media/svg/files/blank-image.svg') }}');
                                            }
                                            [data-bs-theme="dark"] .image-input-placeholder {
                                                background-image: url('{{ $product->image ? asset('images/' . $product->image) : asset('assets/media/svg/files/blank-image-dark.svg') }}');
                                            }
                                        </style>
                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-150px h-150px"></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Edit Image">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                        <div class="d-flex flex-column gap-7 gap-lg-10">
                                            <div class="card card-flush py-4">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h2>Product Details</h2>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="mb-10 fv-row">
                                                        <label class="required form-label">Product Name</label>
                                                        <input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="{{ $product->product_name }}" required/>
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <label class="required form-label">Size</label>
                                                        <input type="text" name="size" class="form-control mb-2" placeholder="Size" value="{{ $product->size }}" required/>
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <label class="required form-label">Quantity</label>
                                                        <input type="text" name="quantity" class="form-control mb-2" placeholder="Quantity" value="{{ $product->quantity }}" required/>
                                                    </div>
                                                    <div class="w-100 w-md-200px">
                                                        <label class="required form-label">Category</label>
                                                        <select class="form-select" name="category" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option" required>
                                                            <option value="Male" {{ $product->category === 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ $product->category === 'Female' ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('products.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                                    <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                                        <span class="indicator-label">Update Product</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        