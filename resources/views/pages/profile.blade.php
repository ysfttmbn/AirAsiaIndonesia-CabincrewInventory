@extends('layouts.app')
    @section('title', 'Profile')                
        @section('content')
        <!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid">
									<!--begin::Navbar-->
									<div class="card mb-5 mb-xl-10">
										<div class="card-body pt-9 pb-0">
											<!--begin::Details-->
											<div class="d-flex flex-wrap flex-sm-nowrap">
												<!--begin: Pic-->
												<div class="me-7 mb-4">
													<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
														@if ($user->profile_picture)
															<img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
														@else
															<img src="{{ asset('assets/media/svg/avatars/blank.svg') }}" alt="Default Profile Picture">
														@endif
														<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
													</div>
												</div>
												<!--end::Pic-->
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Title-->
													<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
														<!--begin::User-->
														<div class="d-flex flex-column">
															<!--begin::Name-->
															<div class="d-flex align-items-center mb-2">
																<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ Auth::user()->name }}</a>
															</div>
															<!--end::Name-->
															<!--begin::Info-->
															<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
																@foreach(Auth::user()->getRoleNames() as $role)
																<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
																<i class="ki-outline ki-profile-circle fs-4 me-1"></i>{{ $role }}</a>
																@endforeach
																<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
																<i class="ki-outline ki-geolocation fs-4 me-1">{{ Auth::user()->hub }}</i></a>
																<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
																<i class="ki-outline ki-sms fs-4"></i>{{ Auth::user()->email }}</a>
															</div>
															<!--end::Info-->
														</div>
														<!--end::User-->
													</div>
													<!--end::Title-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Details-->
										</div>
									</div>
									<!--end::Navbar-->
									<!--begin::Basic info-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
											@csrf
											@method('patch')
											<div class="card-body border-top p-9">
												{{-- <div class="row mb-6">
													<x-input-label for="profile_picture" :value="__('Profile Picture')" class="col-lg-4 col-form-label fw-semibold fs-6"/>
													<div class="col-lg-8 fv-row">
														<input id="profile_picture" name="profile_picture" type="file" class="form-control form-control-lg form-control-solid" :value="old('profile_picture', $user->profile_picture)" required autofocus autocomplete="profile_picture" />
													</div>
												</div> --}}
												<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8">
															<!--begin::Image input-->
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/media/svg/avatars/blank.svg') }}')"></div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="ki-outline ki-pencil fs-7"></i>
																	<!--begin::Inputs-->
																	<input id="profile_picture" name="profile_picture" type="file" :value="old('profile_picture', $user->profile_picture)" required autofocus autocomplete="profile_picture" />
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="ki-outline ki-cross fs-2"></i>
																</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="ki-outline ki-cross fs-2"></i>
																</span>
																<!--end::Remove-->
															</div>
															<!--end::Image input-->
															<!--begin::Hint-->
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
															<!--end::Hint-->
														</div>
														<!--end::Col-->
												</div>

												<div class="row mb-6">
													<x-input-label for="name" :value="__('Name')" class="col-lg-4 col-form-label fw-semibold fs-6"/>
													<div class="col-lg-8 fv-row">
														<x-text-input id="name" name="name" type="text" class="form-control form-control-lg form-control-solid" :value="old('name', $user->name)" required autofocus autocomplete="name" />
													</div>
													<x-input-error class="mt-2" :messages="$errors->get('name')" />
												</div>
										
												<div class="row mb-6">
													<x-input-label for="email" :value="__('Email')" class="col-lg-4 col-form-label fw-semibold fs-6" />
													<div class="col-lg-8 fv-row">
														<x-text-input id="email" name="email" type="email" class="form-control form-control-lg form-control-solid" :value="old('email', $user->email)" required autocomplete="username" />
													</div>
													<x-input-error class="mt-2" :messages="$errors->get('email')" />
												</div>
										
												<div class="row mb-6">
													<x-input-label for="gender" :value="__('Gender')" class="col-lg-4 col-form-label fw-semibold fs-6"/>
													<div class="col-lg-8 fv-row">
														<select id="gender" name="gender" class="form-select form-select-solid form-select-lg fw-semibold" required autocomplete="gender">
															<option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Male</option>
															<option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Female</option>
														</select>
													</div>
													<x-input-error class="mt-2" :messages="$errors->get('gender')" />
												</div>
										
												<div class="row mb-6">
													<x-input-label for="phone_number" :value="__('Phone Number')" class="col-lg-4 col-form-label fw-semibold fs-6"/>
													<div class="col-lg-8 fv-row">
														<x-text-input id="phone_number" name="phone_number" type="phone_number" class="form-control form-control-lg form-control-solid" :value="old('phone_number', $user->phone_number)" required autocomplete="username" />
													</div>
													<x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
												</div>
										
												<div class="row mb-6">
													<x-input-label for="hub" :value="__('HUB')" class="col-lg-4 col-form-label fw-semibold fs-6"/>
													<div class="col-lg-8 fv-row">
														<select id="hub" name="hub" class="form-select form-select-solid form-select-lg fw-semibold" required autocomplete="hub">
															<option value="CGK" {{ old('hub', $user->hub) === 'CGK' ? 'selected' : '' }}>CGK</option>
															<option value="DPS" {{ old('hub', $user->hub) === 'DPS' ? 'selected' : '' }}>DPS</option>
															<option value="SUB" {{ old('hub', $user->hub) === 'SUB' ? 'selected' : '' }}>SUB</option>
															<option value="KNO" {{ old('hub', $user->hub) === 'KNO' ? 'selected' : '' }}>KNO</option>
														</select>
													</div>
													<x-input-error class="mt-2" :messages="$errors->get('hub')" />
												</div>
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
												</div>
											</div>
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Basic info-->
									<!--begin::Billing History-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header card-header-stretch border-bottom border-gray-200">
											<!--begin::Title-->
											<div class="card-title">
												<h3 class="fw-bold m-0">Request History</h3>
											</div>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar m-0">
												<!--begin::Tab nav-->
												<ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_6months_tab" class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Month</a>
													</li>
													<!--end::Tab nav item-->
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_1year_tab" class="nav-link fs-5 fw-semibold me-3" data-bs-toggle="tab" role="tab" href="#kt_billing_year">Year</a>
													</li>
													<!--end::Tab nav item-->
													<!--begin::Tab nav item-->
													<li class="nav-item" role="presentation">
														<a id="kt_billing_alltime_tab" class="nav-link fs-5 fw-semibold" data-bs-toggle="tab" role="tab" href="#kt_billing_all">All Time</a>
													</li>
													<!--end::Tab nav item-->
												</ul>
												<!--end::Tab nav-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Tab Content-->
										<div class="tab-content">
											<!--begin::Tab panel-->
											<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
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
															<!--begin::Table row-->
															<tr>
																<td>Nov 01, 2020</td>
																<td>
																	<a href="#">Invoice for Ocrober 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="requestdetails" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Oct 08, 2020</td>
																<td>
																	<a href="#">Invoice for September 2024</a>
																</td>
																<td>$98.03</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Aug 24, 2020</td>
																<td>Paypal</td>
																<td>$35.07</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Aug 01, 2020</td>
																<td>
																	<a href="#">Invoice for July 2024</a>
																</td>
																<td>$142.80</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jul 01, 2020</td>
																<td>
																	<a href="#">Invoice for June 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jun 17, 2020</td>
																<td>Paypal</td>
																<td>$523.09</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jun 01, 2020</td>
																<td>
																	<a href="#">Invoice for May 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--end::Tab panel-->
											<!--begin::Tab panel-->
											<div id="kt_billing_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_year">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
															<tr>
																<td class="min-w-150px">Date</td>
																<td class="min-w-250px">Description</td>
																<td class="min-w-150px">Amount</td>
																<td class="min-w-150px">Invoice</td>
																<td></td>
															</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
															<!--begin::Table row-->
															<tr>
																<td>Dec 01, 2021</td>
																<td>
																	<a href="#">Billing for Ocrober 2024</a>
																</td>
																<td>$250.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Oct 08, 2021</td>
																<td>
																	<a href="#">Statements for September 2024</a>
																</td>
																<td>$98.03</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Aug 24, 2021</td>
																<td>Paypal</td>
																<td>$35.07</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Aug 01, 2021</td>
																<td>
																	<a href="#">Invoice for July 2024</a>
																</td>
																<td>$142.80</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jul 01, 2021</td>
																<td>
																	<a href="#">Statements for June 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jun 17, 2021</td>
																<td>Paypal</td>
																<td>$23.09</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--end::Tab panel-->
											<!--begin::Tab panel-->
											<div id="kt_billing_all" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_billing_all">
												<!--begin::Table container-->
												<div class="table-responsive">
													<!--begin::Table-->
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
															<tr>
																<td class="min-w-150px">Date</td>
																<td class="min-w-250px">Description</td>
																<td class="min-w-150px">Amount</td>
																<td class="min-w-150px">Invoice</td>
																<td></td>
															</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
															<!--begin::Table row-->
															<tr>
																<td>Nov 01, 2021</td>
																<td>
																	<a href="#">Billing for Ocrober 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Aug 10, 2021</td>
																<td>Paypal</td>
																<td>$35.07</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Aug 01, 2021</td>
																<td>
																	<a href="#">Invoice for July 2024</a>
																</td>
																<td>$142.80</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jul 20, 2021</td>
																<td>
																	<a href="#">Statements for June 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jun 17, 2021</td>
																<td>Paypal</td>
																<td>$23.09</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
															<!--begin::Table row-->
															<tr>
																<td>Jun 01, 2021</td>
																<td>
																	<a href="#">Invoice for May 2024</a>
																</td>
																<td>$123.79</td>
																<td class="text-right">
																	<a href="#" class="btn btn-sm btn-light btn-active-light-primary">View</a>
																</td>
															</tr>
															<!--end::Table row-->
														</tbody>
													</table>
													<!--end::Table-->
												</div>
												<!--end::Table container-->
											</div>
											<!--end::Tab panel-->
										</div>
										<!--end::Tab Content-->
									</div>
									<!--end::Billing Address-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
					</div>
					<!--end:::Main-->
        @endsection