@extends('layouts.app')
    @section('title', 'Profile')                
        @section('content')
		<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
			<div class="d-flex flex-column flex-column-fluid">
				<div id="kt_app_content" class="app-content flex-column-fluid">
					<div id="kt_app_content_container" class="app-container container-fluid">
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
													<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
												</div>
												<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
													@foreach($user->getRoleNames() as $role)
														<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
															<i class="ki-outline ki-profile-circle fs-4 me-1"></i>{{ $role }}
														</a>
													@endforeach
													<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
														<i class="ki-outline ki-geolocation fs-4 me-1"></i>{{ $user->hub }}
													</a>
													<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
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
										</div>
									</div>
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
									</div>
								</div>
							</div>
						</div>
					</div>
        @endsection