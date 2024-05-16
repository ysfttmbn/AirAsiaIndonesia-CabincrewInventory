@extends('layouts.app')
    @section('title', 'View Profile')                
        @section('content')
		@php
            use Carbon\Carbon;
        @endphp
		<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
			<div class="d-flex flex-column flex-column-fluid">
				<div id="kt_app_content" class="app-content flex-column-fluid">
					<div id="kt_app_content_container" class="app-container container-fluid">
									<div class="card mb-5 mb-xl-10">
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
										</div>
                                        <div id="kt_account_settings_profile_details" class="collapse show">
                                            <div class="mt-6 space-y-6">
                                                <div class="card-body border-top p-9">
                                                    <div class="row mb-6">
                                                        <label class="col-lg-4 col-form-label fw-semibold fs-6"></label>
                                                        <div class="col-lg-8">
                                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/media/svg/avatars/blank.svg') }}')"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="row mb-6">
                                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('Name') }}</label>
                                                        <div class="col-lg-8 fv-row">
                                                            <p class="form-control form-control-lg form-control-solid">{{ $user->name }}</p>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="row mb-6">
                                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('Email') }}</label>
                                                        <div class="col-lg-8 fv-row">
                                                            <p class="form-control form-control-lg form-control-solid">{{ $user->email }}</p>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="row mb-6">
                                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('Gender') }}</label>
                                                        <div class="col-lg-8 fv-row">
                                                            <p class="form-control form-control-lg form-control-solid">{{ $user->gender === 'male' ? 'Male' : 'Female' }}</p>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="row mb-6">
                                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('Phone Number') }}</label>
                                                        <div class="col-lg-8 fv-row">
                                                            <p class="form-control form-control-lg form-control-solid">{{ $user->phone_number }}</p>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="row mb-6">
                                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">{{ __('HUB') }}</label>
                                                        <div class="col-lg-8 fv-row">
                                                            <p class="form-control form-control-lg form-control-solid">{{ $user->hub }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>		

                                    <div class="card mb-5 mb-xl-10">
									<div class="card">
										<div class="card-header card-header-stretch border-bottom border-gray-200">
											<div class="card-title">
												<h3 class="fw-bold m-0">Request History</h3>
											</div>
											<div class="card-toolbar m-0">
												<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
													<li class="nav-item" role="presentation">
														<a id="kt_billing_6months_tab" class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Month</a>
													</li>
													<li class="nav-item" role="presentation">
														<a id="kt_billing_1year_tab" class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
													</li>
													<li class="nav-item" role="presentation">
														<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold" data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="tab-content">
											<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
												<div class="table-responsive">
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
															<tr>
																<td class="min-w-150px">Date</td>
																<td class="min-w-250px">ID Request</td>
																<td class="min-w-150px">Status</td>
																<td></td>
															</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
															@foreach ($requests as $request)
															<tr>
																<td>{{ $request->created_at->format('M d, Y') }}</td>
																<td>
																	<a href="#">{{ $request->id }}</a>
																</td>
																<td>{{ $request->status }}</td>
																<td class="text-right">
																	<a data-bs-toggle="modal" data-bs-target="#kt_modal_select_users_{{ $request->id }}" class="btn btn-sm btn-light btn-active-light-primary">View</a>
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
																								<a href="{{ route('user.profile', ['userId' => $request->user->id]) }}" class="text-gray-900 fw-bold text-hover-primary fs-5 me-4">{{ $request->user->name }}</a>
																									@if($request->status == 'Completed')
																									<span class="badge badge-light-success d-flex align-items-center fs-8 fw-semibold">
																										<i class="badge py-3 px-4 fs-7 badge-light-success"></i>{{ $request->status }}</span>
																									@elseif($request->status == 'Rejected')
																									<span class="badge badge-light-danger d-flex align-items-center fs-8 fw-semibold">
																										<i class="badge py-3 px-4 fs-7 badge-light-danger"></i>{{ $request->status }}</span>
																									@elseif($request->status == 'Processed')
																									<span class="badge badge-light-primary d-flex align-items-center fs-8 fw-semibold">
																										<i class="badge py-3 px-4 fs-7 badge-light-primary"></i>{{ $request->status }}</span>
																									@else
																									<span class="badge badge-light-warning d-flex align-items-center fs-8 fw-semibold">
																										<i class="badge py-3 px-4 fs-7 badge-light-warning"></i>{{ $request->status }}</span>
																									@endif
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
																							<a class="symbol symbol-50px">
																								<span class="symbol-label" style="background-image:url({{ asset('images/' . $request->product->image) }});"></span>
																							</a>
																							<!--end::Thumbnail-->
																							<div class="ms-5">
																								<!--begin::Title-->
																								<a class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $request->product->product_name }}</a>
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
																							<div class="d-flex flex-column mw-200px" >
																								<div class="d-flex align-items-center mb-2">
																									<span class="text-muted fs-8">Date Request</span>
																								</div>
																								<div class="d-flex align-items-center mb-2">
																									<span class="text-gray-900 fw-bold fs-5">{{ Carbon::createFromFormat('Y-m-d H:i:s', $request->created_at)->format('d/m/Y') }}</span>
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
							</div>
						</div>
					</div>
        @endsection