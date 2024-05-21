
<div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div id="kt_aside_menu_wrapper" class="app-sidebar-menu flex-grow-1 hover-scroll-y scroll-lg-ps my-5 pt-8" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
        <div id="kt_aside_menu" class="menu menu-rounded menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6" data-kt-menu="true">
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
                <a class="menu-link" href="{{ route('dashboard') }}" >
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-home-2 fs-1"></i>
                    </span>
                </span>
                </a>
            </div>
            @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('management')))
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2" id="inventory-menu-item">
                <a class="menu-link" href="{{ route('products.index') }}">
                <span class="menu-link menu-center">
                    <span class="menu-icon me-0">
                        <i class="ki-outline ki-package fs-1"></i>
                    </span>
                </span>
                </a>
            </div>
            @endif
        </div>
    </div>
    <div class="d-flex flex-column flex-center pb-4 pb-lg-8" id="kt_app_sidebar_footer">
        <a href="#" class="btn btn-icon btn-active-color-primary" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <i class="ki-outline ki-night-day theme-light-show fs-2x"></i>
            <i class="ki-outline ki-moon theme-dark-show fs-2x"></i>
        </a>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
            <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                    <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-outline ki-night-day fs-2"></i>
                    </span>
                    <span class="menu-title">Light</span>
                </a>
            </div>
            <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                    <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-outline ki-moon fs-2"></i>
                    </span>
                    <span class="menu-title">Dark</span>
                </a>
            </div>
        </div>
    </div>
</div