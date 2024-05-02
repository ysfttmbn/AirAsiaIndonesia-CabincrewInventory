@extends('layouts.app')
    @section('title', 'Dashboard')                
        @section('content')
            <div id="kt_app_content" class="app-content">
                <div id="kt_app_content_container" class="app-container container-fluid">
                        <div class="row gy-5 g-xl-10">
                            <div class="col-xl-4">
                                <div class="card card-flush h-xl-100">
                                    <div class="card-header pt-7">
                                        <h3 class="card-title align-items-start flex-column">
                                            @foreach(Auth::user()->getRoleNames() as $role)
                                                @if($role == 'cabincrew')
                                                    <span class="card-label fw-bold text-gray-900">Request History</span>
                                                @elseif($role == 'admin' || $role == 'management')
                                                    <span class="card-label fw-bold text-gray-900">Request Process</span>
                                                @endif
                                            @endforeach

                                        </h3>
                                        <div class="card-toolbar">
                                            <a href="#card-flush" class="btn btn-sm btn-light">Details</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
                                            @foreach ($requests as $request)
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="{{ asset('images/' . $request->product->image) }}" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">{{ $request->product->product_name }}</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">{{ $request->user->name }}</a></span>
                                                    <span class="badge badge-light-success">{{ $request->status }}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card card-flush h-xl-100">
                                    <div class="card-header pt-7">
                                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                            <input type="text" data-kt-ecommerce-edit-order-filter="search" class="form-control form-control-solid w-200 w-lg-200 ps-12" placeholder="Search Items" />
                                        </div>
                                        <div class="card-toolbar">
                                            <div class="d-flex flex-stack flex-wrap gap-4">
                                                @foreach(Auth::user()->getRoleNames() as $role)
                                                        @if($role == 'cabincrew')
                                                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_bidding">Request Item</a>
                                                        @elseif($role == 'admin' || $role == 'management')
                                                        <a href="{{ route('products.create') }}" class="btn btn-primary er fs-6 px-8 py-4">Add Item</a>
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                            @foreach(Auth::user()->getRoleNames() as $role)
                                            @if($role == 'cabincrew')
                                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
                                            @elseif($role == 'admin' || $role == 'management')
                                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
                                            @endif
                                            <thead>
                                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-100px">Items</th>
                                                    <th class="min-w-100px text-end pe-0">ID Product</th>
                                                    <th class="min-w-100px text-end pe-0">Category</th>
                                                    <th class="min-w-100px text-end pe-2">Size</th>
                                                    <th class="min-w-100px text-end pe-3">Status</th>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <th class="min-w-100px text-end pe-0">QTY</th>
                                                    @endif
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="fw-semibold text-gray-600">
                                                @foreach($products as $product)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="symbol symbol-50px">
                                                                <span class="symbol-label" style="background-image:url({{ asset('images/' . $product->image) }});"></span>
                                                            </a>
                                                            <div class="ms-5">
                                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{ $product->product_name }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">{{ $product->id}}</td>
                                                    <td class="text-end">{{ $product->category }}</td>
                                                    <td class="text-end">{{ $product->size }}</td>
                                                    <td class="text-end">
                                                        
                                                        @if ($product->quantity == 0)
                                                            <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                                        @elseif ($product->quantity <= 6)
                                                            <span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
                                                        @else
                                                            <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                                        @endif
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end pe-5">{{ $product->quantity }}</td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        <div class="card card-flush" id="card-flush">
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <div class="card-title">
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                                        <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Request" />
                                    </div>
                                </div>
                                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                    <div class="input-group w-250px">
                                        <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                                        <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </button>
                                    </div>
                                    <div class="w-100 mw-150px">
                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                            <option></option>
                                            <option value="all">All</option>
                                            <option value="NeedConfirm">Need Confirm</option>
                                            <option value="Processed">Processed</option>                                        
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3"></div>
                                            </th>
                                            <th class="min-w-100px">Request ID</th>
                                            <th class="min-w-175px">Cabin Crew</th>
                                            <th class="text-end min-w-80px">Status</th>
                                            <th class="text-end min-w-100px">Date request</th>
                                            <th class="text-end min-w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($requests as $request)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid"></div>
                                            </td>
                                            <td data-kt-ecommerce-order-filter="order_id">
                                                <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">{{ $request->id }}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="apps/user-management/users/view.html">
                                                            <div class="symbol-label">
                                                                <img src="{{ asset('storage/' . $request->user->profile_picture) }}" alt="User Profile" class="w-100" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="ms-5">
                                                        <a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $request->user->name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0" data-order="Completed">
                                                <div class="badge badge-light-success">{{ $request->status }}</div>
                                            </td>
                                            <td class="text-end" data-order="2024-01-11">
                                                <span class="fw-bold">{{ $request->created_at }}</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Actions <i class="ki-outline ki-down fs-5 ms-1"></i>
                                                </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_select_users_{{ $request->id }}" class="menu-link px-3">View</a>
                                                    </div>
                                                    @foreach(Auth::user()->getRoleNames() as $role)
                                                    @if($role == 'cabincrew')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Accepted</a>
                                                    </div>
                                                    @elseif($role == 'admin' || $role == 'management')
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Confirm</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Reject</a>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="kt_modal_select_users_{{ $request->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog mw-700px">
                                                <div class="modal-content">
                                                    <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                            <i class="ki-outline ki-cross fs-1"></i>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                                                        <div class="text-center mb-13">
                                                            <h1 class="d-flex justify-content-center align-items-center mb-3">Order Details</h1>
                                                        </div>
                                                        <div class="mh-475px scroll-y me-n7 pe-7">
                                                            <div class="border border-hover-primary p-7 rounded mb-7" style="overflow-y: auto; max-height: 330px;">
                                                                <div class="d-flex flex-stack pb-3">
                                                                    <div class="d-flex">
                                                                        <div class="symbol symbol-circle symbol-45px">
                                                                            <img src="{{ asset('storage/' . $request->user->profile_picture) }}" alt="User Profile" />
                                                                        </div>
                                                                        <div class="ms-5">
                                                                            <div class="d-flex align-items-center">
                                                                                <a href="pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-5 me-4">{{ $request->user->name }}</a>
                                                                                <span class="badge badge-light-success d-flex align-items-center fs-8 fw-semibold">
                                                                                    <i class="badge py-3 px-4 fs-7 badge-light-primary"></i>{{ $request->status }}</span>
                                                                            </div>
                                                                            @foreach($request->user->getRoleNames() as $role)
                                                                            <span class="text-muted fw-semibold mb-3">{{ $role }}</span>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div clas="d-flex">
                                                                        <div class="text-end pb-3">
                                                                            <span class="text-muted fs-7">ID REQUEST</span>
                                                                            <span class="text-gray-900 fw-bold fs-5">{{ $request->id }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="p-0">
                                                                    <div class="d-flex flex-column">
                                                                        <div class="d-flex align-items-center border border-dashed p-3 rounded bg-white">
                                                                            <!--begin::Thumbnail-->
                                                                            <a href="apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                                                <span class="symbol-label" style="background-image:url({{ asset('images/' . $request->product->image) }});"></span>
                                                                            </a>
                                                                            <!--end::Thumbnail-->
                                                                            <div class="ms-5">
                                                                                <!--begin::Title-->
                                                                                <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $request->product->product_name }}</a>
                                                                                <!--end::Title-->
                                                                                <!--begin::SKU-->
                                                                                <div class="text-muted fs-7">{{ $request->product->id }}</div>
                                                                                <!--end::SKU-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <div class="separator separator-dashed border-muted my-5"></div>
                                                                        <div class="d-flex flex-stack">
                                                                            <div class="d-flex flex-column mw-200px">
                                                                                <div class="d-flex align-items-center mb-2">
                                                                                    <span class="text-muted fs-8">Date Request</span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center mb-2">
                                                                                    <span class="text-gray-900 fw-bold fs-5">{{ $request->created_at }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex flex-column mw-200px">
                                                                                <div class="d-flex align-items-center mb-2">
                                                                                    <span class="text-muted fs-8">Quantity</span>
                                                                                </div>
                                                                                <div class="d-flex align-items-center mb-2">
                                                                                    <span class="text-gray-900 fw-bold fs-5">{{ $request->quantity}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                        @endforeach
                                    </tbody>
                                </table>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="kt_modal_bidding" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content rounded">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
                                <i class="ki-outline ki-cross fs-1"></i>
                            </div>
                        </div>
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <form id="kt_modal_bidding_form" class="form" action="{{ route('products.requestInventory') }}" method="POST">
                                @csrf
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">Place your Request</h1>
                                    <div class="text-muted fw-semibold fs-5">If you need more info, please conctact
                                    <a href="#" class="fw-bold link-primary">Administrator</a>.</div>
                                </div>
                                <div class="fv-row mb-8">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Requested items</span>
                                    </label>
                                    <div class="" data-kt-modal-bidding-type="dollar">
                                        <select name="product_id" aria-label="Select a Currency" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg">
                                            @foreach($products as $product)
                                            <option value="{{ $product->id}}" selected="selected">
                                            <b>{{ $product->id}}</b>&nbsp;-&nbsp;{{ $product->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Quantity</span>
                                        </span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" placeholder="Enter Quantity" name="quantity" />
                                </div>
                                <div class="text-center">
                                    <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="modal fade" id="kt_modal_select_users" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog mw-700px">
                    <div class="modal-content">
                        <div class="modal-header pb-0 border-0 d-flex justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="ki-outline ki-cross fs-1"></i>
                            </div>
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                            <div class="text-center mb-13">
                                <h1 class="d-flex justify-content-center align-items-center mb-3">Order Details</h1>
                            </div>
                            <div class="mh-475px scroll-y me-n7 pe-7">
                                <div class="border border-hover-primary p-7 rounded mb-7" style="overflow-y: auto; max-height: 330px;">
                                    <div class="d-flex flex-stack pb-3">
                                        <div class="d-flex">
                                            <div class="symbol symbol-circle symbol-45px">
                                                <img src="{{ asset('storage/' . $request->user->profile_picture) }}" alt="" />
                                            </div>
                                            <div class="ms-5">
                                                <div class="d-flex align-items-center">
                                                    <a href="pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-5 me-4">{{ $request->user->name }}</a>
                                                    <span class="badge badge-light-success d-flex align-items-center fs-8 fw-semibold">
                                                        <i class="badge py-3 px-4 fs-7 badge-light-primary"></i>{{ $request->status }}</span>
                                                </div>
                                                @foreach($request->user->getRoleNames() as $role)
                                                <span class="text-muted fw-semibold mb-3">{{ $role }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div clas="d-flex">
                                            <div class="text-end pb-3">
                                                <span class="text-muted fs-7">ID REQUEST</span>
                                                <span class="text-gray-900 fw-bold fs-5">{{ $request->id }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-0">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex align-items-center border border-dashed p-3 rounded bg-white">
                                                <!--begin::Thumbnail-->
                                                <a href="apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                    <span class="symbol-label" style="background-image:url({{ asset('images/' . $request->product->image) }});"></span>
                                                </a>
                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $request->product->product_name }}</a>
                                                    <!--end::Title-->
                                                    <!--begin::SKU-->
                                                    <div class="text-muted fs-7">{{ $request->product->id }}</div>
                                                    <!--end::SKU-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="separator separator-dashed border-muted my-5"></div>
                                            <div class="d-flex flex-stack">
                                                <div class="d-flex flex-column mw-200px">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="text-muted fs-8">Date Request</span>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="text-gray-900 fw-bold fs-5">{{ $request->created_at }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @endsection