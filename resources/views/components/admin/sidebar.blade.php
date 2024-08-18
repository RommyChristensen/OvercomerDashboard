@section('sidebar')

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" aria-label="navbar-side-menu">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Hello, Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" aria-label="sidebar-menu-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $nav_active == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.view_user') }}" class="nav-link {{ $nav_active == 'master-user' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Master Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.view_roles') }}" class="nav-link {{ $nav_active == 'view-roles' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shapes"></i>
                        <p>
                            Master Roles
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.view_menus') }}" class="nav-link {{ $nav_active == 'view-menus' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Master Privileges
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.view_ministry') }}" class="nav-link {{ $nav_active == 'view-ministry' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-place-of-worship"></i>
                        <p>
                            Master Ministries
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.view_connect_groups') }}" class="nav-link {{ $nav_active == 'view-connect-groups' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Master CG
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{ ($nav_active == 'view-members' || $nav_active == 'add-member') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Master Members
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.view_members') }}" class="nav-link {{ $nav_active == 'view-members' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Members</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.view.add_member') }}" class="nav-link {{ $nav_active == 'add-member' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Member</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link bg-danger">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@show
