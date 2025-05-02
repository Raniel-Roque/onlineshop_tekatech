<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand" href="{{ url('redirect') }}"><img src="img/logo.png" alt="logo" style="width: 120px; height: auto;" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
        <div class="profile-desc">
            <div class="profile-pic">
            <div class="count-indicator">
                <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
                <span class="count bg-success"></span>
            </div>
                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">{{ ucfirst(Auth::user()->firstname) }} {{ ucfirst(Auth::user()->middlename) }} {{ ucfirst(Auth::user()->lastname) }}</h5>
                </div>
            </div>
        </div>

        <hr class="text-white">

        </li>
        <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items {{ Request::is('redirect') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('redirect')}}">
            <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>

        <!-- Products -->
        <li class="nav-item menu-items {{ Request::is('view_product') || Request::is('manage_product') || Request::is('update_product*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="{{ Request::is('view_product') || Request::is('manage_product') || Request::is('update_product*') ? 'true' : 'false' }}" aria-controls="ui-basic">
                <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('view_product') || Request::is('manage_product') || Request::is('update_product*') ? 'show' : '' }}" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ Request::is('view_product') ? 'active' : '' }}" href="{{url('/view_product')}}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('manage_product') ? 'active' : '' }}" href="{{url('/manage_product')}}">Manage Product</a></li>
                </ul>
            </div>
        </li>

        <!-- Category -->
        <li class="nav-item menu-items {{ Request::is('view_category') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('view_category')}}">
                <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
                </span>
                <span class="menu-title">Category</span>
            </a>
        </li>
    </ul>
</nav>