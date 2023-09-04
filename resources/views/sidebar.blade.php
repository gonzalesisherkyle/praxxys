<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
        <div class="info">
            <a class="d-block">Admin</a>
        </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->is('api/products', 'api/create') ? 'active' : ''}}">
                    <i class="fa-solid fa-bag-shopping nav-icon"></i>
                    <p>
                        Products
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('product') }}" class="nav-link {{ request()->is('api/products') ? 'active' : ''}}">
                        <i class="fa-solid fa-list nav-icon"></i>
                        <p>List</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('create') }}" class="nav-link  {{ request()->is('api/create') ? 'active' : ''}}">
                        <i class="fa-solid fa-circle-plus nav-icon"></i>
                        <p>Create</p>
                    </a>
                    </li>
                </ul>
            </li>
<!--             <li class="nav-item">
                <a href="{{ route('video') }}" class="nav-link {{ request()->is('api/video') ? 'active' : ''}}">
                    <i class="fa-solid fa-video nav-icon"></i>
                    <p>
                        Videos
                    </p>
                </a>
            </li> -->
        </ul>
        </nav>
    </div>
</aside>
