@extends('layouts.app')
    @section('title', 'Inventories')                
        @section('content')
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @if(session('success'))
                    <div class="alert alert-success d-flex justify-content-between align-items-center">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
                            </div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Category" data-kt-ecommerce-product-filter="status">
                                    <option></option>
                                    <option value="all">All</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Both">Both</option>
                                </select>
                            </div>
                            @foreach(Auth::user()->getRoleNames() as $role)
                                @if($role == 'cabincrew')
                                <a href="{{ route('requestproduct') }}" class="btn btn-primary">Request Item</a>
                                @elseif($role == 'admin')
                                <a href="{{ route('products.create') }}" class="btn btn-primary">Add Item</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <a href="{{ route('export.products.excel') }}" class="btn btn-secondary">Export to Excel</a>
                            <a href="{{ route('export.products.pdf') }}" class="btn btn-secondary">Export to PDF</a>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                    </th>
                                    <th class="min-w-100px">Item</th>
                                    <th class="text-end pe-3 min-w-100px">ID Item</th>
                                    <th class="text-end pe-3 min-w-100px">Category</th>
                                    <th class="text-end pe-3 min-w-100px">Size</th>
                                    <th class="text-end pe-3 min-w-100px">Qty</th>
                                    @if(auth()->check() && (auth()->user()->hasRole('admin')))
                                    <th class="text-end pe-3 min-w-100px">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url({{ asset('images/' . $product->image) }});"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{ $product->product_name }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">{{ $product->id}}</td>
                                    <td class="text-end">{{ $product->category }}</td>
                                    <td class="text-end">{{ $product->size }}</td>
                                    <td class="text-end pe-0">
                                        @if ($product->quantity == 0)
                                            <span class="badge badge-light-danger">Out of Stock</span>
                                        @elseif ($product->quantity <= 6)
                                            <span class="badge badge-light-warning">Low Stock</span>
                                        @else
                                            <span class="badge badge-light-primary">In Stock</span>
                                        @endif
                                        <span class="fw-bold ms-3">{{ $product->quantity }}</span>
                                    </td>
                                    @if(auth()->check() && (auth()->user()->hasRole('admin')))
                                    <td class="text-end">
                                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                        <a class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3">
                                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#kt_modal_1">Delete</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="kt_modal_1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Hapus Item</h3>
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                    </div>
                                                    <div class="modal-header">
                                                        <p>Apakah anda yakin untuk menghapus item ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection