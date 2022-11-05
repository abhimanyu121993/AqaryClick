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
                    <a class="nav-link menu-link" href="#sidebarDashboards1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards1">
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
                    <a class="nav-link menu-link" href="#sidebarDashboards2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards2">
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Building Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.building.index')}}" class="nav-link" data-key="t-analytics">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.building.create')}}" class="nav-link" data-key="t-analytics"> All Buildings </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Unit Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards3">
                        <i data-feather="box" class="icon-dual"></i> <span data-key="t-dashboards">Unit Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.unit.index')}}" class="nav-link" data-key="t-analytics">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit.create')}}" class="nav-link" data-key="t-analytics"> All Units </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Tenant Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards4" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards4">
                        <i data-feather="briefcase" class="icon-dual"></i> <span data-key="t-dashboards">Tenant Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.tenant.index') }}" class="nav-link" data-key="t-analytics">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.tenant.create') }}" class="nav-link" data-key="t-analytics"> All Tenants </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Owner Management Menu -->
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards5" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards5">
                        <i data-feather="user" class="icon-dual"></i> <span data-key="t-dashboards">Owner Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.building.index')}}" class="nav-link" data-key="t-analytics">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.owner.create')}}" class="nav-link" data-key="t-analytics"> All Owners </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <!-- Broker Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards6" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards6">
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Broker Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards6">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="{{route('admin.broker.index')}}" class="nav-link" data-key="t-analytics"> Registration </a>
                            </li><li class="nav-item">
                                <a href="{{route('admin.broker.create')}}" class="nav-link" data-key="t-analytics"> All Broker </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Customer Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards7" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards7">
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Customer Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards7">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.customer.index') }}" class="nav-link" data-key="t-analytics">Registration </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{ route('admin.customer.create') }}" class="nav-link" data-key="t-analytics">All Customer</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Contract Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards8" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards8">
                        <i data-feather="file" class="icon-dual"></i> <span data-key="t-dashboards">Contract Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards8">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.contract.index')}}" class="nav-link" data-key="t-analytics">Registration</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.contract.create')}}" class="nav-link" data-key="t-analytics">All Contract</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Legal Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards11" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards11">
                        <i data-feather="file" class="icon-dual"></i> <span data-key="t-dashboards">Legal Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards11">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.legal.index')}}" class="nav-link" data-key="t-analytics">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.legal.create')}}" class="nav-link" data-key="t-analytics">All Legal</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Electricity Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards9" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards9">
                        <i data-feather="file" class="icon-dual"></i> <span data-key="t-dashboards">Electricity Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards9">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.electricity.index')}}" class="nav-link" data-key="t-analytics">Generate Bill</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.electricity.create')}}" class="nav-link" data-key="t-analytics">All Electricity Bills</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Invoice Management Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards15" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards9">
                        <i data-feather="file" class="icon-dual"></i> <span data-key="t-dashboards">Financial Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards15">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.invoice.index')}}" class="nav-link" data-key="t-analytics">Generate Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.invoice.create')}}" class="nav-link" data-key="t-analytics">All Invoice</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Settings Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards10" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards10">
                        <i data-feather="settings" class="icon-dual"></i> <span data-key="t-dashboards">Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards10">
                        <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                                <a href="{{route('admin.staff.index')}}" class="nav-link" data-key="t-analytics"> Staff </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.city.index')}}" class="nav-link" data-key="t-analytics"> City </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.area.index')}}" class="nav-link" data-key="t-analytics"> Area </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.nationality.index')}}" class="nav-link" data-key="t-analytics"> Nationality </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit-type.index')}}" class="nav-link" data-key="t-analytics"> Unit Type </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit-status.index')}}" class="nav-link" data-key="t-analytics"> Unit Status </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit-floor.index')}}" class="nav-link" data-key="t-analytics"> Unit Floor </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.unit-feature.index')}}" class="nav-link" data-key="t-analytics"> Unit Feature </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.buildingtype.index')}}" class="nav-link" data-key="t-analytics"> Building Type </a>
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
