{{-- Sidebar Start --}}
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-bentween mt-3">
            <a href="./index.html" class="text-nowrap logo-img me-2">
                <img src="{{asset('assets/images/asset_gastronomi/ic_icon.png')}}" width="86" style="" alt="" />
            </a>
            <div>
                <span class="" style="font-weight: 600; font-size: 20px; color: black; font-family: Georgia">Gastronomi</span>
            </div>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('/') ? 'active' : '' }}" href="/" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Sections</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('food*') ? 'active' : '' }}" href="/food" aria-expanded="false">
                        <span>
                            <i class="ti ti-soup"></i>
                        </span>
                        <span class="hide-menu">List Food</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('restaurant*') ? 'active' : '' }}" href="/restaurant" aria-expanded="false">
                        <span>
                            <i class="ti ti-tools-kitchen-2"></i>
                        </span>
                        <span class="hide-menu">List Restaurant</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('culture*') ? 'active' : '' }}" href="/culture" aria-expanded="false">
                        <span>
                            <i class="ti ti-steam"></i>
                        </span>
                        <span class="hide-menu">List Culture</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('village*') ? 'active' : '' }}" href="/village" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">List Village</span>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
{{-- Sidebar End --}}
