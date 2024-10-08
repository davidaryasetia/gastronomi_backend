
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-bentween mt-3">
            <a href="<?php echo e(route('home')); ?>" class="text-nowrap logo-img me-2">
                <img src="<?php echo e(asset('assets/images/asset_gastronomi/ic_icon.png')); ?>" width="86" style="" alt="" />
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
                    <a class="sidebar-link <?php echo e(Request::is('/home*') ? 'active' : ''); ?>" href="/home" aria-expanded="false">
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
                    <a class="sidebar-link <?php echo e(Request::is('food*') ? 'active' : ''); ?>" href="/food" aria-expanded="false">
                        <span>
                            <i class="ti ti-soup"></i>
                        </span>
                        <span class="hide-menu">List Food</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo e(Request::is('restaurant*') ? 'active' : ''); ?>" href="/restaurant" aria-expanded="false">
                        <span>
                            <i class="ti ti-tools-kitchen-2"></i>
                        </span>
                        <span class="hide-menu">List Restaurant</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo e(Request::is('culture*') ? 'active' : ''); ?>" href="/culture" aria-expanded="false">
                        <span>
                            <i class="ti ti-steam"></i>
                        </span>
                        <span class="hide-menu">List Culture</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo e(Request::is('village*') ? 'active' : ''); ?>" href="/village" aria-expanded="false">
                        <span>
                            <i class="ti ti-home"></i>
                        </span>
                        <span class="hide-menu">List Village</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUTH</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link <?php echo e(Request::is('daftar-user*') ? 'active' : ''); ?>" href="/daftar-user"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-users-group"></i>
                        </span>
                        <span class="hide-menu">User Admin</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span>
                            <i class="ti ti-logout "></i>
                        </span>
                        <span class="hide-menu">Logout</span>
                    </a>

                    <form id="logout-form" action="/" method="" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<?php /**PATH D:\Gapulo_Project_Web\gastronomi_backend\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>