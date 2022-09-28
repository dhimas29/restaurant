<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('/redirects') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ Request::is('category*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/category') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-dns"></i>
                </span>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ Request::is('admin/user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/user') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-group"></i>
                </span>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ Request::is('foodMenu*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/foodMenu') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-food"></i>
                </span>
                <span class="menu-title">Food Menu</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ Request::is('chefMenu*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/chefMenu') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-chef-hat"></i>
                </span>
                <span class="menu-title">Chefs</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-icon">
                    <i class="mdi mdi-book-multiple"></i>
                </span>
                <span class="menu-title">Reservation</span>
            </a>
        </li>
    </ul>
</nav>
