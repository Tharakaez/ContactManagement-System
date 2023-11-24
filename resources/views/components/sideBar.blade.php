<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            {{-- Brand Logo --}}
            @include('components.brandLogo')
            <div class="cursor-pointer close-btn d-xl-none d-block sidebartoggler" id="sidebarCollapse">
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
                    <a class="sidebar-link" href="{{ route('home') }}" :active="request() - > routeIs('home')"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Contact Management</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('contact') }}"
                        :active="request() - > routeIs('contact')" aria-expanded="false">
                        <span>
                            <i class="ti ti-list-details"></i>
                        </span>
                        <span class="hide-menu">Contacts</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#"
                        :active="request() - > routeIs('contact.favorite')" aria-expanded="false">
                        <span>
                            <i class="ti ti-heart"></i>
                        </span>
                        <span class="hide-menu">Favourite</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#"
                        :active="request() - > routeIs('contact.category')" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Categories</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
