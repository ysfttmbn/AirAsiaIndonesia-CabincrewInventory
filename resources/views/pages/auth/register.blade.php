
<!DOCTYPE html>
<html lang="en">
	<head>
<base href="../../../" />
		<title>Register</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/aalogo.png') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<style>body { background-image: url('assets/media/auth/bg10.jpeg'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg10-dark.jpeg'); }</style>
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-lg-row-fluid">
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/logos/aalogo.png') }}" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/logos/aalogo.png') }}" alt="" />
						<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">World’s Best Low-Cost Airline</h1>
						<div class="text-gray-600 fs-base text-center fw-semibold">It all starts here. 
						<a href="#" class="opacity-75-hover text-primary me-1">23 years ago,</a> a dream took flight - shaping and forever changing the travel industry in Asia 
						<br />The idea was simple: Make flying affordable for everyone. 
						<a href="#" class="opacity-75-hover text-primary me-1">We started an airline in 2001</a>Today 
						<br />we’ve evolved to become something much bigger. We’re now a world-class brand, 
						<br />a leading Asean airline, a digital travel and lifestyle platform; and we’re not stopping. </div>
					</div>
				</div>
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
						<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
							<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
								<form class="form w-100" method="POST" action="{{ route('register') }}">
									{{ csrf_field() }}
									<div class="text-center mb-11">
										<h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
									</div>
									<div class="row g-3 mb-9">
										<div class="col-md-12">
											<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
											<img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />Sign in with Google</a>
										</div>
									</div>
									<div class="separator separator-content my-14">
										<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
									</div>
									<div class="fv-row mb-8">
										<input type="text" placeholder="Name" name="name" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-8">
										<input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="fv-row mb-8" data-kt-password-meter="true">
										<div class="mb-1">
											<div class="position-relative mb-3">
												<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" />
												<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
													<i class="ki-outline ki-eye-slash fs-2"></i>
													<i class="ki-outline ki-eye fs-2 d-none"></i>
												</span>
											</div>
											<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
												<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
											</div>
										</div>
										<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
									</div>
									<div class="fv-row mb-8">
										<input placeholder="Repeat Password" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" />
									</div>
									<div class="d-grid mb-10">
										<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
											<span class="indicator-label">Sign up</span>
											<span class="indicator-progress">Please wait... 
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
									</div>
									<div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
									<a href="{{ route('login') }}" class="link-primary fw-semibold">Sign in</a></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/authentication/sign-up/general.js') }}"></script>
	</body>
</html>