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
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="assets/media/stock/ecommerce/210.png" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Jason Bourne</a></span>
                                                    <span class="badge badge-light-success">Delivered</span>
                                                </div>
                                            </div>
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="assets/media/stock/ecommerce/209.png" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Marie Durant</a></span>
                                                    <span class="badge badge-light-primary">Shipping</span>
                                                </div>
                                            </div>
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="assets/media/stock/ecommerce/214.png" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Dan Wilson</a></span>
                                                    <span class="badge badge-light-danger">Confirmed</span>
                                                </div>
                                            </div>
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="assets/media/stock/ecommerce/211.png" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Lebron Wayde</a></span>
                                                    <span class="badge badge-light-success">Delivered</span>
                                                </div>
                                            </div>
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="assets/media/stock/ecommerce/215.png" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Ana Simmons</a></span>
                                                    <span class="badge badge-light-primary">Shipping</span>
                                                </div>
                                            </div>
                                            <div class="border border-dashed border-gray-300 rounded px-7 py-3">
                                                <div class="d-flex flex-stack mb-3">
                                                    <div class="me-3">
                                                        <img src="assets/media/stock/ecommerce/192.png" class="w-50px ms-n1 me-1" alt="" />
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-stack">
                                                    <span class="text-gray-500 fw-bold">To: 
                                                    <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">Kevin Leonard</a></span>
                                                    <span class="badge badge-light-danger">Confirmed</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card card-flush h-xl-100">
                                    <div class="card-header pt-7">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-900">Inventory Items</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <div class="d-flex flex-stack flex-wrap gap-4">
                                                @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-muted fs-7 me-2">Category</div>
                                                    <select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
                                                        <option></option>
                                                        <option value="Show All" selected="selected">Show All</option>
                                                        <option value="male">Male</option>
                                                        <option value="famale">Famale</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center fw-bold">
                                                    <div class="text-muted fs-7 me-2">Status</div>
                                                    <select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-5="filter_status">
                                                        <option></option>
                                                        <option value="Show All" selected="selected">Show All</option>
                                                        <option value="In Stock">In Stock</option>
                                                        <option value="Out of Stock">Out of Stock</option>
                                                        <option value="Low Stock">Low Stock</option>
                                                    </select>
                                                </div>
                                                @endif
                                                @foreach(Auth::user()->getRoleNames() as $role)
                                                        @if($role == 'cabincrew')
                                                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_bidding">Request Items</a>
                                                        @elseif($role == 'admin' || $role == 'management')
                                                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_bidding">Add Itemsy</a>
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @foreach(Auth::user()->getRoleNames() as $role)
                                            @if($role == 'cabincrew')
                                            <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
                                            @elseif($role == 'admin' || $role == 'management')
                                            <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_6_table">
                                            @endif
                                        @endforeach
                                            <thead>
                                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                    <th class="min-w-100px">Item</th>
                                                    <th class="text-end pe-3 min-w-100px">ID Product</th>
                                                    <th class="text-end pe-3 min-w-100px">Category</th>
                                                    <th class="text-end pe-3 min-w-100px">Size</th>
                                                    <th class="text-end pe-3 min-w-100px">Status</th>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <th class="text-end pe-3 min-w-100px">QTY</th>
                                                    @endif
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="fw-bold text-gray-600">
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">Macbook Air M1</a>
                                                    </td>
                                                    <td class="text-end">#XGY-356</td>
                                                    <td class="text-end">02 Apr, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="58">
                                                        <span class="text-gray-900 fw-bold">58 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">Surface Laptop 4</a>
                                                    </td>
                                                    <td class="text-end">#YHD-047</td>
                                                    <td class="text-end">01 Apr, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="0">
                                                        <span class="text-gray-900 fw-bold">0 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">Logitech MX 250</a>
                                                    </td>
                                                    <td class="text-end">#SRR-678</td>
                                                    <td class="text-end">24 Mar, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="290">
                                                        <span class="text-gray-900 fw-bold">290 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">AudioEngine HD3</a>
                                                    </td>
                                                    <td class="text-end">#PXF-578</td>
                                                    <td class="text-end">24 Mar, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="46">
                                                        <span class="text-gray-900 fw-bold">46 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">HP Hyper LTR</a>
                                                    </td>
                                                    <td class="text-end">#PXF-778</td>
                                                    <td class="text-end">16 Jan, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="78">
                                                        <span class="text-gray-900 fw-bold">78 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">Dell 32 UltraSharp</a>
                                                    </td>
                                                    <td class="text-end">#XGY-356</td>
                                                    <td class="text-end">22 Dec, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="8">
                                                        <span class="text-gray-900 fw-bold">8 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-900 text-hover-primary">Google Pixel 6 Pro</a>
                                                    </td>
                                                    <td class="text-end">#XVR-425</td>
                                                    <td class="text-end">27 Dec, 2024</td>
                                                    <td class="text-end">XL</td>
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                                    </td>
                                                    @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
                                                    <td class="text-end" data-order="124">
                                                        <span class="text-gray-900 fw-bold">124 PCS</span>
                                                    </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
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
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    
                                                </div>
                                            </th>
                                            <th class="min-w-100px">Request ID</th>
                                            <th class="min-w-175px">Cabin Crew</th>
                                            <th class="text-end min-w-80px">Status</th>
                                            <th class="text-end min-w-100px">Date request</th>
                                            <th class="text-end min-w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    
                                                
                                            </td>
                                            <td data-kt-ecommerce-order-filter="order_id">
                                                <a href="apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">13852</a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="apps/user-management/users/view.html">
                                                            <div class="symbol-label">
                                                                <img src="assets/media/avatars/300-25.jpg" alt="Brian Cox" class="w-100" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="ms-5">
                                                        <a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Brian Cox</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0" data-order="Completed">
                                                <div class="badge badge-light-success">Completed</div>
                                            </td>
                                            <td class="text-end" data-order="2024-01-11">
                                                <span class="fw-bold">11/01/2024</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_select_users" class="menu-link px-3">View</a>
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
                            <form id="kt_modal_bidding_form" class="form" action="#">
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
                                        <select name="currency_dollar" aria-label="Select a Currency" data-placeholder="Select a currency.." class="form-select form-select-solid form-select-lg">
                                            <option data-kt-bidding-modal-option-icon="flags/united-states.svg" value="USD" selected="selected">
                                            <b>USD</b>&nbsp;-&nbsp;USA dollar</option>
                                            <option data-kt-bidding-modal-option-icon="flags/united-kingdom.svg" value="GBP">
                                            <b>GBP</b>&nbsp;-&nbsp;British pound</option>
                                            <option data-kt-bidding-modal-option-icon="flags/australia.svg" value="AUD">
                                            <b>AUD</b>&nbsp;-&nbsp;Australian dollar</option>
                                            <option data-kt-bidding-modal-option-icon="flags/japan.svg" value="JPY">
                                            <b>JPY</b>&nbsp;-&nbsp;Japanese yen</option>
                                            <option data-kt-bidding-modal-option-icon="flags/sweden.svg" value="SEK">
                                            <b>SEK</b>&nbsp;-&nbsp;Swedish krona</option>
                                            <option data-kt-bidding-modal-option-icon="flags/canada.svg" value="CAD">
                                            <b>CAD</b>&nbsp;-&nbsp;Canadian dollar</option>
                                            <option data-kt-bidding-modal-option-icon="flags/switzerland.svg" value="CHF">
                                            <b>CHF</b>&nbsp;-&nbsp;Swiss franc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span class="required">Quantity</span>
                                        </span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Quantity" name="bid_amount" />
                                </div>
                                <div class="fv-row mb-8">
									<div class="mb-3">
										<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
											<span class="required">Size</span>
										</label>
									</div>
									<div class="fv-row">
										<div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
											<label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
											<input class="btn-check" type="radio" name="method" value="1" />
											29</label>
											<label class="btn btn-outline btn-active-success btn-color-muted active" data-kt-button="true">
											<input class="btn-check" type="radio" name="method" checked="checked" value="2" />
											30</label>
											<label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
											<input class="btn-check" type="radio" name="method" value="3" />
											31</label>
											<label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
											<input class="btn-check" type="radio" name="method" value="4" />
											32</label>
                                            <label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="4" />
                                            33</label>
                                            <label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="4" />
                                            34</label>
                                            <label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="4" />
                                            35</label>
                                            <label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="4" />
                                            36</label>
                                            <label class="btn btn-outline btn-active-success btn-color-muted" data-kt-button="true">
                                            <input class="btn-check" type="radio" name="method" value="4" />
                                            37</label>

										</div>
									</div>
								</div>
                                <div class="text-center">
                                    <button type="reset" class="btn btn-light me-3" data-kt-modal-action-type="cancel">Cancel</button>
                                    <button type="submit" class="btn btn-primary" data-kt-modal-action-type="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait... 
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

		<div class="modal fade" id="kt_modal_select_users" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog mw-700px">
				<div class="modal-content">
					<div class="modal-header pb-0 border-0 d-flex justify-content-end">
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="ki-outline ki-cross fs-1"></i>
						</div>
					</div>
					<div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
						<div class="text-center mb-13">
							<h1 class="d-flex justify-content-center align-items-center mb-3">Order Details
						</div>
						<div class="mh-475px scroll-y me-n7 pe-7">
							<div class="border border-hover-primary p-7 rounded mb-7" style="overflow-y: auto; max-height: 330px;">
								<div class="d-flex flex-stack pb-3">
									<div class="d-flex">
										<div class="symbol symbol-circle symbol-45px">
											<img src="assets/media/avatars/300-20.jpg" alt="" />
										</div>
										<div class="ms-5">
											<div class="d-flex align-items-center">
												<a href="pages/user-profile/overview.html" class="text-gray-900 fw-bold text-hover-primary fs-5 me-4">Emma Smith</a>
												<span class="badge badge-light-success d-flex align-items-center fs-8 fw-semibold">
												<i class="badge py-3 px-4 fs-7 badge-light-primary"></i>Processed</span>
											</div>
											<span class="text-muted fw-semibold mb-3">Cabin Crew</span>
										</div>
									</div>
									<div clas="d-flex">
										<div class="text-end pb-3">
                                            <span class="text-muted fs-7">ID REQ</span>
											<span class="text-gray-900 fw-bold fs-5">13777</span>
										</div>
									</div>
								</div>
								<div class="p-0">
									<div class="d-flex flex-column">
                                        <div class="d-flex align-items-center border border-dashed p-3 rounded bg-white">
                                            <!--begin::Thumbnail-->
                                            <a href="apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/25.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Product 25</a>
                                                <!--end::Title-->
                                                <!--begin::SKU-->
                                                <div class="text-muted fs-7">SKU: 04242006</div>
                                                <!--end::SKU-->
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center border border-dashed rounded p-3 bg-white">
                                            <!--begin::Thumbnail-->
                                            <a href="apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/98.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Product 98</a>
                                                <!--end::Title-->
                                                <!--begin::Price-->
                                                <!--begin::SKU-->
                                                <div class="text-muted fs-7">SKU: 02535007</div>
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
                                                    <span class="text-gray-900 fw-bold fs-5">13/01/2024</span>
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
            @endsection