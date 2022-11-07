@extends('admin.includes.layout', ['breadcrumb_title' => 'Dashboard'])
@section('title', 'Dashboard')

@section('main-content')


<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i data-feather="users" class="text-primary"></i>
                                </span>
                            </div>
                            <a href="{{ route('admin.customer.create') }}">  <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Customer</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ App\Models\User::count() }}">{{ App\Models\User::count() }}</span></h4>
                                    {{-- <span class="badge badge-soft-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02 %</span> --}}
                                </div>
                                {{-- <p class="text-muted text-truncate mb-0">Projects this month</p> --}}
                            </div></a>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                    <i data-feather="users" class="text-warning"></i>
                                </span>
                            </div>
                            <a href="{{ route('admin.customer.create') }}"><div class="flex-grow-1 ms-3">
                                <p class="text-uppercase fw-medium text-muted mb-3">Registered Customers</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ App\Models\User::count() }}">{{ App\Models\User::count() }}</span></h4>
                                    {{-- <span class="badge badge-soft-success fs-12"><i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58 %</span> --}}
                                </div>
                                {{-- <p class="text-muted mb-0">Leads this month</p> --}}
                            </div></a>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                    <i data-feather="home" class="text-info"></i>
                                </span>
                            </div>
                            <a href="{{route('admin.building.create')}}"><div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Total Buildings</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="{{ App\Models\Building::count() }}">{{ App\Models\Building::count() }}</span></h4>
                                    {{-- <span class="badge badge-soft-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35 %</span> --}}
                                </div>
                                {{-- <p class="text-muted text-truncate mb-0">Work this month</p> --}}
                            </div></a>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div><!-- end col -->

        </div><!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Projects Overview</h4>
                        {{-- <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div> --}}
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                        <div class="col-6 col-sm-4">
                        <a href="{{ route('admin.building.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Building::count() }}">{{ App\Models\Building::count() }}</span></h5>
                                    <p class="text-muted mb-0">Number of Builidngs</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{ route('admin.electricity.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Electricity::count() }}">{{ App\Models\Electricity::count() }}</span></h5>
                                    <p class="text-muted mb-0">Electricity Bill Generated</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{ route('admin.tenant.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Tenant::count() }}">{{ App\Models\Tenant::count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Tenants</p>
                                </div></a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="projects-overview-chart" data-colors='["--vz-primary", "--vz-warning", "--vz-success"]' dir="ltr" class="apex-charts"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Unit Overview</h4>
                        {{-- <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div> --}}
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.unit.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Unit::count() }}">{{ App\Models\Unit::count() }}</span></h5>
                                    <p class="text-muted mb-0">Total unit</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.unit.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Unit::where('unit_status','Vacant')->count() }}">{{ App\Models\Unit::where('unit_status','Vacant')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Vacant unit</p>
                                </div></a>
                            </div>
                           
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="projects-overview-chart" data-colors='["--vz-primary", "--vz-warning", "--vz-success"]' dir="ltr" class="apex-charts"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Contract Overview</h4>
                        {{-- <div>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary btn-sm">
                                1Y
                            </button>
                        </div> --}}
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-4">
                                    <a href="{{route('admin.contract.create')}}">  <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::count() }}">{{ App\Models\Contract::count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Contract</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('attestation_status','Done')->count() }}">{{ App\Models\Contract::where('attestation_status','Done')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Attestation Contract</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('contract_status','renewed')->count() }}">{{ App\Models\Contract::where('contract_status','renewed')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Renewed Contract</p>
                                </div></a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="projects-overview-chart" data-colors='["--vz-primary", "--vz-warning", "--vz-success"]' dir="ltr" class="apex-charts"></div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div><!-- end col -->

    {{-- <div class="col-xxl-4">
        <div class="card">
            <div class="card-header border-0">
                <h4 class="card-title mb-0">Upcoming Schedules</h4>
            </div><!-- end cardheader -->
            <div class="card-body pt-0">
                <div class="upcoming-scheduled">
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true">
                </div>

                <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Events:</h6>
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            09
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Development planning</h6>
                        <p class="text-muted mb-0">iTest Factory </p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">9:20 <span class="text-uppercase">am</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            12
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Design new UI and check sales</h6>
                        <p class="text-muted mb-0">Meta4Systems</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">11:30 <span class="text-uppercase">am</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            25
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">Weekly catch-up </h6>
                        <p class="text-muted mb-0">Nesta Technologies</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">02:00 <span class="text-uppercase">pm</span></p>
                    </div>
                </div><!-- end -->
                <div class="mini-stats-wid d-flex align-items-center mt-3">
                    <div class="flex-shrink-0 avatar-sm">
                        <span class="mini-stat-icon avatar-title rounded-circle text-success bg-soft-success fs-4">
                            27
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">James Bangs (Client) Meeting</h6>
                        <p class="text-muted mb-0">Nesta Technologies</p>
                    </div>
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">03:45 <span class="text-uppercase">pm</span></p>
                    </div>
                </div><!-- end -->

                <div class="mt-3 text-center">
                    <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Events</a>
                </div>

            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col --> --}}
</div><!-- end row -->


@endsection
