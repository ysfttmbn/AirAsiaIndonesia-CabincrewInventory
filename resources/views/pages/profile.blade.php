@extends('layouts.app')
    @section('title', 'Profile')                
        @section('content')
		@php
            use Carbon\Carbon;
        @endphp
		<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
			<div class="d-flex flex-column flex-column-fluid">
				<div id="kt_app_content" class="app-content flex-column-fluid">
					<div id="kt_app_content_container" class="app-container container-fluid">
							@if(session('status'))
                                <div class="alert alert-success d-flex justify-content-between align-items-center">
                                    <span>{{ session('status') }}</span>
                                </div>
                            @endif
							<div class="card mb-5 mb-xl-10">
							<div class="card-body pt-9 pb-0">
								<div class="d-flex flex-wrap flex-sm-nowrap">
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
									<div class="flex-grow-1">
										<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
											<div class="d-flex flex-column">
												<div class="d-flex align-items-center mb-2">
													<a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
												</div>
												<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
													@foreach($user->getRoleNames() as $role)
														<a class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
															<i class="ki-outline ki-profile-circle fs-4 me-1"></i>{{ $role }}
														</a>
													@endforeach
													<a class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
														<i class="ki-outline ki-geolocation fs-4 me-1"></i>{{ $user->hub }}
													</a>
													<a class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
														<i class="ki-outline ki-sms fs-4"></i>{{ $user->email }}
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
									<div class="card mb-5 mb-xl-10">
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
										</div>
										<div id="kt_account_settings_profile_details" class="collapse show">
											<form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
											@csrf
											@method('patch')
											<div class="card-body border-top p-9">
												<div class="row mb-6">
														<label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
														<div class="col-lg-8">
															<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																<div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('assets/media/svg/avatars/blank.svg') }}')"></div>
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																	<i class="ki-outline ki-pencil fs-7"></i>
																	<input id="profile_picture" name="profile_picture" type="file" :value="old('profile_picture', $user->profile_picture)" required autofocus autocomplete="profile_picture" />
																</label>
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																	<i class="ki-outline ki-cross fs-2"></i>
																</span>
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
																	<i class="ki-outline ki-cross fs-2"></i>
																</span>
															</div>
															<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
														</div>
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
													<x-input-label for="phone_number" :value="__('Phone Number')" class="col-lg-4 col-form-label fw-semibold fs-6" />
													<div class="col-lg-8 fv-row">
														<x-text-input 
															id="phone_number" 
															name="phone_number" 
															type="text" 
															class="form-control form-control-lg form-control-solid" 
															:value="old('phone_number', $user->phone_number ?? '+62')" 
															required 
															autocomplete="username" 
														/>
													</div>
													<x-input-error class="mt-2" :messages="$errors->get('phone_number')" autocomplete="off"/>
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
										</div>
									</div>

									<div class="card mb-5 mb-xl-10">
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Personal Details Size</h3>
											</div>	
											<div class="card-title m-0">
												<p style="color: red; font-size: 0.875rem; margin-top: 0.5rem;">Can only be filled in once, please be careful in filling it in.</p>
											</div>																			
										</div>
										<div id="kt_account_settings_profile_details" class="collapse show">
											<form method="POST" action="{{ route('profile.update.size') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
												@csrf
												@method('patch')
												<div class="card-body border-top p-9">
													@if(Auth::user()->gender === 'female')
														<!-- Female Cabin Shoes -->
														<div class="row mb-6">
															<label for="female_cabin_shoes" class="col-lg-4 col-form-label fw-semibold fs-6">Female Cabin Shoes</label>
															<div class="col-lg-8 fv-row">
																<select id="female_cabin_shoes" name="female_cabin_shoes" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="female_cabin_shoes" 
																		{{ optional($user->personalDetailsSize)->female_cabin_shoes ? 'disabled' : '' }}>
																	@foreach(range(35, 43) as $size)
																		<option value="{{ $size }}" {{ old('female_cabin_shoes', optional($user->personalDetailsSize)->female_cabin_shoes ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if(optional($user->personalDetailsSize)->female_cabin_shoes)
																	<input type="hidden" name="female_cabin_shoes" value="{{ optional($user->personalDetailsSize)->female_cabin_shoes }}">
																@endif
															</div>
														</div>
														<!-- Female Ground Shoes -->
														<div class="row mb-6">
															<label for="female_ground_shoes" class="col-lg-4 col-form-label fw-semibold fs-6">Female Ground Shoes</label>
															<div class="col-lg-8 fv-row">
																<select id="female_ground_shoes" name="female_ground_shoes" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="female_ground_shoes" 
																		{{ optional($user->personalDetailsSize)->female_ground_shoes ? 'disabled' : '' }}>
																	@foreach(range(35, 43) as $size)
																		<option value="{{ $size }}" {{ old('female_ground_shoes', optional($user->personalDetailsSize)->female_ground_shoes ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if(optional($user->personalDetailsSize)->female_ground_shoes)
																	<input type="hidden" name="female_ground_shoes" value="{{ optional($user->personalDetailsSize)->female_ground_shoes }}">
																@endif
															</div>
														</div>
														<!-- Female Red Skirt -->
														<div class="row mb-6">
															<label for="female_red_skirt" class="col-lg-4 col-form-label fw-semibold fs-6">Female Red Skirt</label>
															<div class="col-lg-8 fv-row">
																<select id="female_red_skirt" name="female_red_skirt" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="female_red_skirt" 
																		{{ optional($user->personalDetailsSize)->female_red_skirt ? 'disabled' : '' }}>
																	@foreach(['XS', 'S', 'S+', 'M', 'M+', 'L', 'L+', 'XL'] as $size)
																		<option value="{{ $size }}" {{ old('female_red_skirt', optional($user->personalDetailsSize)->female_red_skirt ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if(optional($user->personalDetailsSize)->female_red_skirt)
																	<input type="hidden" name="female_red_skirt" value="{{ optional($user->personalDetailsSize)->female_red_skirt }}">
																@endif
															</div>
														</div>
														<!-- Female Red Blazer -->
														<div class="row mb-6">
															<label for="female_red_blazer" class="col-lg-4 col-form-label fw-semibold fs-6">Female Red Blazer</label>
															<div class="col-lg-8 fv-row">
																<select id="female_red_blazer" name="female_red_blazer" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="female_red_blazer" 
																		{{ optional($user->personalDetailsSize)->female_red_blazer ? 'disabled' : '' }}>
																	@foreach(['XS', 'S', 'M', 'L', 'XL'] as $size)
																		<option value="{{ $size }}" {{ old('female_red_blazer', optional($user->personalDetailsSize)->female_red_blazer ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if(optional($user->personalDetailsSize)->female_red_blazer)
																	<input type="hidden" name="female_red_blazer" value="{{ optional($user->personalDetailsSize)->female_red_blazer }}">
																@endif
															</div>
														</div>
														<!-- Compression Top -->
														<div class="row mb-6">
															<label for="compression_top" class="col-lg-4 col-form-label fw-semibold fs-6">Compression Top</label>
															<div class="col-lg-8 fv-row">
																<select id="compression_top" name="compression_top" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="compression_top" 
																		{{ optional($user->personalDetailsSize)->compression_top ? 'disabled' : '' }}>
																	@foreach(['XS', 'S', 'M', 'L'] as $size)
																		<option value="{{ $size }}" {{ old('compression_top', optional($user->personalDetailsSize)->compression_top ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if(optional($user->personalDetailsSize)->compression_top)
																	<input type="hidden" name="compression_top" value="{{ optional($user->personalDetailsSize)->compression_top }}">
																@endif
															</div>
														</div>
													@endif
													@if(Auth::user()->gender === 'male')
														<!-- Male Black Pants -->
														<div class="row mb-6">
															<label for="male_black_pants" class="col-lg-4 col-form-label fw-semibold fs-6">Male Black Pants</label>
															<div class="col-lg-8 fv-row">
																<select id="male_black_pants" name="male_black_pants" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="male_black_pants" 
																		{{ $user->personalDetailsSize && $user->personalDetailsSize->male_black_pants ? 'disabled' : '' }}>
																	@foreach(range(29, 37) as $size)
																		<option value="{{ $size }}" {{ old('male_black_pants', optional($user->personalDetailsSize)->male_black_pants ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if($user->personalDetailsSize && $user->personalDetailsSize->male_black_pants)
																	<input type="hidden" name="male_black_pants" value="{{ $user->personalDetailsSize->male_black_pants }}">
																@endif
															</div>
														</div>
														<!-- Male Shoes -->
														<div class="row mb-6">
															<label for="male_shoes" class="col-lg-4 col-form-label fw-semibold fs-6">Male Shoes</label>
															<div class="col-lg-8 fv-row">
																<select id="male_shoes" name="male_shoes" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="male_shoes" 
																		{{ $user->personalDetailsSize && $user->personalDetailsSize->male_shoes ? 'disabled' : '' }}>
																	@foreach(range(39, 47) as $size)
																		<option value="{{ $size }}" {{ old('male_shoes', optional($user->personalDetailsSize)->male_shoes ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if($user->personalDetailsSize && $user->personalDetailsSize->male_shoes)
																	<input type="hidden" name="male_shoes" value="{{ $user->personalDetailsSize->male_shoes }}">
																@endif
															</div>
														</div>
														<!-- Male Black Blazer -->
														<div class="row mb-6">
															<label for="male_black_blazer" class="col-lg-4 col-form-label fw-semibold fs-6">Male Black Blazer</label>
															<div class="col-lg-8 fv-row">
																<select id="male_black_blazer" name="male_black_blazer" class="form-select form-select-solid form-select-lg fw-semibold" 
																		required autocomplete="male_black_blazer" 
																		{{ $user->personalDetailsSize && $user->personalDetailsSize->male_black_blazer ? 'disabled' : '' }}>
																	@foreach(range(29, 37) as $size)
																		<option value="{{ $size }}" {{ old('male_black_blazer', optional($user->personalDetailsSize)->male_black_blazer ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
																	@endforeach
																</select>
																@if($user->personalDetailsSize && $user->personalDetailsSize->male_black_blazer)
																	<input type="hidden" name="male_black_blazer" value="{{ $user->personalDetailsSize->male_black_blazer }}">
																@endif
															</div>
														</div>
													@endif

													<div class="card-footer d-flex justify-content-end py-6 px-9">
														<button type="submit" class="btn btn-primary">Save</button>
													</div>
												</div>
											</form>
											
											
											
											
										</div>
									</div>
									
									

									<div class="card mb-5 mb-xl-10">
										<div class="card-header card-header-stretch border-bottom border-gray-200">
											<div class="card-title">
												<h3 class="fw-bold m-0">Request History</h3>
											</div>
										</div>
										<div class="tab-content">
											<div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
												<div class="table-responsive">
													<table class="table table-row-bordered align-middle gy-4 gs-9">
														<thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
															<tr>
																<td class="min-w-150px">Date</td>
																<td class="min-w-250px">Description</td>
																<td class="min-w-150px">Status</td>
																<td></td>
															</tr>
														</thead>
														<tbody class="fw-semibold text-gray-600">
															@foreach ($requests as $request)
															<tr>
																<td>{{ $request->created_at->format('M d, Y') }}</td>
																<td>
																	<a>{{ $request->description }}</a>
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
																							<span class="text-gray-900 fw-bold fs-5">{{ $request->description }}</span>
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