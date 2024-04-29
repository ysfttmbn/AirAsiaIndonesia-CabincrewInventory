<!--begin::Header-->
<div id="kt_app_header" class="app-header d-flex">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-center justify-content-between" id="kt_app_header_container">
        <!--begin::Logo-->
        <div class="app-header-logo d-flex flex-center">
            <!--begin::Logo image-->
            <a href="{{ route('dashboard') }}">
                <img alt="Logo" src="assets/media/logos/aalogo.png" class="mh-50px" />
            </a>
            <!--end::Logo image-->
            <!--begin::Sidebar toggle-->
            <button class="btn btn-icon btn-sm btn-active-color-primary d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-outline ki-abstract-14 fs-1"></i>
            </button>
            <!--end::Sidebar toggle-->
        </div>
        <!--end::Logo-->
        <div class="d-flex flex-lg-grow-1 flex-stack" id="kt_app_header_wrapper">
            <div class="app-header-wrapper d-flex align-items-center justify-content-around justify-content-lg-between flex-wrap gap-6 gap-lg-0 mb-6 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}">
                <!--begin::Page title-->
                <div class="d-flex flex-column justify-content-center">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 fw-bold fs-6 mb-2">Air Asia Indonesia - Cabin Crew Inventory</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-base">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">@yield('title')</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <div class="d-none d-md-block h-40px border-start border-gray-200 mx-10"></div>
            </div>
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0 gap-2 gap-lg-4">
                <!--begin::User menu-->
                <div class="app-navbar-item" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    @if (auth()->check())
                        <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            @if (auth()->user()->profile_picture)
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
                            @else
                                <img src="{{ asset('assets/media/svg/avatars/blank.svg') }}" alt="Default Profile Picture">
                            @endif
                        </div>
                    @endif

                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                @if (auth()->check())
                                    <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                        @if (auth()->user()->profile_picture)
                                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture">
                                        @else
                                            <img src="{{ asset('assets/media/svg/avatars/blank.svg') }}" alt="Default Profile Picture">
                                        @endif
                                    </div>
                                @endif

                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}
                                    @foreach(Auth::user()->getRoleNames() as $role)
                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ $role }}</span></div>
                                    @endforeach
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="profile" class="menu-link px-5">My Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link px-5">Sign Out</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
            </div>
            <!--end::Navbar-->
        </div>
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->