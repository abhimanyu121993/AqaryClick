<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="80"></span>
            </span>
        </a>

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <!-- Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}"  role="button" aria-expanded="false" >
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <!-- User Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.user.index') }}"  role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">User</span>
                    </a>
                </li>

                <!-- Role/Permission Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="lock" class="icon-dual"></i> <span data-key="t-dashboards">Roles/Permission</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.role.index')}}" class="nav-link" data-key="t-analytics"> Role </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.permission.index')}}" class="nav-link" data-key="t-analytics">Permission</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.rolePermission')}}" class="nav-link" data-key="t-analytics">Role has permission</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Building Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards5" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Building Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.building.index')}}" class="nav-link" data-key="t-analytics"> Register </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.building.create')}}" class="nav-link" data-key="t-analytics"> All Buildings </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.buildingtype.index')}}" class="nav-link" data-key="t-analytics"> Building Type </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Unit Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards6" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="box" class="icon-dual"></i> <span data-key="t-dashboards">Unit Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards6">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.unit.index')}}" class="nav-link" data-key="t-analytics"> Register </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-analytics"> All Units </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit-type.index')}}" class="nav-link" data-key="t-analytics"> Unit Type </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit-feature.index')}}" class="nav-link" data-key="t-analytics"> Unit Feature </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Tenant Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards7" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="briefcase" class="icon-dual"></i> <span data-key="t-dashboards">Tenant Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards7">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-analytics"> Register </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-analytics"> All Tenants </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Owner Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="user" class="icon-dual"></i> <span data-key="t-dashboards">Owner Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.building.index')}}" class="nav-link" data-key="t-analytics"> Register </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.owner.create')}}" class="nav-link" data-key="t-analytics"> All Owners </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Broker Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Broker Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-analytics"> Role </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Customer Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards4" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Customer Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-analytics"> Role </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Contract Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards8" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i data-feather="file" class="icon-dual"></i> <span data-key="t-dashboards">Contract Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards8">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-analytics"> Role </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
