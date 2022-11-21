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

            <!-- <div class="col-3">
                                    <div class="card card-overlay">
                                        <img class="card-img img-fluid" src="https://media.istockphoto.com/photos/blue-light-defocused-blurred-motion-abstract-background-picture-id1212284111?b=1&k=20&m=1212284111&s=612x612&w=0&h=tsrwXk0mEU7MtZKtp91y4iNQTWAojTNSnWX5apZ39kg=" alt="Card image">
                                        <div class="card-img-overlay p-0 d-flex flex-column">
                                            <div class="card-header bg-transparent">
                                                <h2 class="card-title text-white mb-0">Active Customers</h2>
                                            </div>
                                            <div class="card-body">
                                            <h4 class="fs-4 flex-grow-1 mb-0 text-white"><span class="counter-value" data-target="{{ App\Models\User::count() }}">{{ App\Models\User::count() }}</span></h4>
                                             <a href="{{ route('admin.customer.create') }}" class="link-light">View More <i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> -->


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
                           
                           @php $res=App\Models\Invoice::where('payment_status','Paid')->pluck('contract_id') @endphp
                            <div class="col-6 col-sm-4">
                            <a href="{{ route('admin.Overdue') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{  App\Models\Contract::where('overdue','>=',90)->whereNotIn('id',$res)->count() }}">{{ App\Models\Contract::where('overdue','>=',90)->whereNotIn('id',$res)->count() }}</span></h5>
                                    <p class="text-muted mb-0">OverDue</p>
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
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Unit::where('unit_status','Vacant')->count() }}">{{ App\Models\Unit::where('unit_status','vacant')->count() }}</span></h5>
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
                        <h4 class="card-title mb-0 flex-grow-1">Tenant Overview</h4>
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
                            <a href="{{ route('admin.tenant.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Tenant::count() }}">{{ App\Models\Tenant::count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Tenants</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.contract.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('lessor',null)->count() }}">{{ App\Models\Contract::where('lessor_sign',null)->count() }}</span></h5>
                                    <p class="text-muted mb-0">Tenant Not Signature</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.contract.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('contract_status','renewed')->count() }}">{{ App\Models\Contract::where('contract_status','renewed')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Tenant Renew Contract</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.contract.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('contract_status','not renewed')->count() }}">{{ App\Models\Contract::where('contract_status','not renewed')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Tenant Not Renew Contract</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                            <a href="{{ route('admin.legal.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{  App\Models\Legal::count() }}">{{  App\Models\Legal::count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Legal</p>
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
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('attestation_status','Not Yet')->count() }}">{{ App\Models\Contract::where('attestation_status','Not Yet')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Contract Not Attestation Yet</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('attestation_status','under process')->count() }}">{{ App\Models\Contract::where('attestation_status','under process')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Contract Under Process</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('contract_status','renewed')->count() }}">{{ App\Models\Contract::where('contract_status','renewed')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Renewed Contract</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('contract_status','not renewed')->count() }}">{{ App\Models\Contract::where('contract_status','not renewed')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Contract Not Renewed </p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::whereNotNull('approved_by')->count() }}">{{ App\Models\Contract::whereNotNull('approved_by')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Contract Approved by Lessor </p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Contract::where('contract_type','Internal')->count() }}">{{ App\Models\Contract::where('contract_status','not renewed')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Internal Contact</p>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
              
                        </div>
                       
                    </div>
            </div><!-- end col -->
            <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Electricity Overview</h4>
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
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Electricity::where('electric_under','tenant')->count() }}">{{ App\Models\Electricity::where('electric_under','tenant')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Electricity Accoount Under Tenant Name</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.unit.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Electricity::where('electric_under','lessor')->count() }}">{{ App\Models\Electricity::where('electric_under','lessor')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Electricity Accoount Under Lessor Name</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-6">
                        <a href="{{ route('admin.unit.create') }}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Unit::where('unit_status','Vacant')->count() }}">{{ App\Models\Unit::where('unit_status','vacant')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Electricity Bill Not Paid</p>
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
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Invoice Overview</h4>
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
                                    <a href="{{route('admin.invoice.create')}}">  <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Invoice::whereNotNull('due_amt')->orWhere('due_amt','>',0)->count() }}">{{ App\Models\Invoice::whereNotNull('due_amt')->orWhere('due_amt','>',0)->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Invoice Due</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.invoice.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Invoice::where('payment_status','Paid')->count() }}">{{ App\Models\Invoice::where('payment_status','Paid')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Paid Invoice</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Invoice::whereNotNull('overdue_period')->count() }}">{{ App\Models\Contract::where('attestation_status','Not Yet')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Overdue Invoice</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Cheque::count() }}">{{ App\Models\Contract::count() }}</span></h5>
                                    <p class="text-muted mb-0"> Record Cheque</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Cheque::where('cheque_status','Bounced')->count() }}">{{ App\Models\Cheque::where('cheque_status','Bounced')->count() }}</span></h5>
                                    <p class="text-muted mb-0"> Bounced Cheques</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Cheque::where('cheque_status','Postponed')->count() }}">{{ App\Models\Cheque::where('cheque_status','Postponed')->count() }}</span></h5>
                                    <p class="text-muted mb-0"> Postponed Cheques </p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Cheque::where('cheque_status','Expired')->count() }}">{{ App\Models\Cheque::where('cheque_status','Expired')->count() }}</span></h5>
                                    <p class="text-muted mb-0"> Expired Cheques</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Cheque::where('cheque_status','Cleared')->count() }}">{{ App\Models\Cheque::where('cheque_status','Cleared')->count() }}</span></h5>
                                    <p class="text-muted mb-0"> Cleared Cheques</p>
                                </div></a>
                            </div>
                            <div class="col-6 col-sm-4">
                            <a href="{{route('admin.contract.create')}}"> <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1"><span class="counter-value" data-target="{{ App\Models\Cheque::where('cheque_status','Deposited')->count() }}">{{ App\Models\Cheque::where('cheque_status','Deposited')->count() }}</span></h5>
                                    <p class="text-muted mb-0">Total Deposited Cheques</p>
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-xl-7">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Cheque Status</h4>
                                    <div class="flex-shrink-0">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="cheque_status">
                                            <option value=" " selected>Sort By</option>
                                            <option value="all">All</option>
                                            <option value="valid">Valid Cheque</option>
                                            <option value="bounced">Bounced Cheque</option>
                                            <option value="expired">Expired Cheque</option>
                                            <option value="postponed">Postponed cheque</option>
                                            <option value="cleared">Cleared Cheque</option>
                                            <option value="security">Security Cheque</option>
                                        </select>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                            <thead class="table-light">
                                                <tr class="text-muted">
                                                    <th scope="col">Tenant Name</th>
                                                    <th scope="col" style="width: 20%;">Cheque No</th>
                                                    <th scope="col">Cheque Amt</th>
                                                    <th scope="col" style="width: 16%;">Status</th>
                                                    <th scope="col" style="width: 12%;">Deposited Date</th>
                                                    <th scope="col" style="width: 12%;">Delay Time</th>

                                                </tr>
                                            </thead>

                                            <tbody id="valid_cheque">
                                            @foreach($cheque as $ch)
                                                <tr>
                                                    <td>{{$ch->TenantName->tenant_english_name??''}}</td>
                                                    <td>{{$ch->cheque_no??''}}</td>
                                                    <td>{{ $ch->cheque_amt??''}} </td>
                                                    <td><span class="badge badge-soft-success p-2">{{$ch->cheque_status}}</span></td>
                                                    <td>
                                                        <div class="text-nowrap">{{$ch->created_at}}</div>
                                                    </td>
                                                    <td>2</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody id="postponed_cheque">
                                                @foreach($postponed_cheque as $pc)
                                                <tr >
                                                    <td>{{$pc->TenantName->tenant_english_name??''}}</td>
                                                    <td>{{$pc->cheque_no??''}}</td>
                                                    <td>{{ $pc->cheque_amt??''}} </td>
                                                    <td><span class="badge badge-soft-danger p-2">{{$pc->cheque_status}}</span></td>
                                                    <td>
                                                        <div class="text-nowrap">{{$pc->created_at??''}}</div>
                                                    </td>
                                                    <td>2</td>
                                                </tr>
                                                @endforeach</tbody>
                                                <tbody id="bounced_cheque">
                                                @foreach($bounce_cheque as $bc)
                                                <tr>
                                                    <td>{{$bc->TenantName->tenant_english_name??''}}</td>
                                                    <td>{{$bc->cheque_no??''}}</td>
                                                    <td>{{ $bc->cheque_amt ??''}} </td>
                                                    <td><span class="badge badge-soft-success p-2">{{$bc->cheque_status}}</span></td>
                                                    <td>
                                                        <div class="text-nowrap">{{$bc->created_at}}</div>
                                                    </td>
                                                    <td>2</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                <tbody id="expired_cheque">
                                                @foreach($expired_cheque as $ec)
                                                <tr>
                                                    <td>{{$ec->TenantName->tenant_english_name??''}}</td>
                                                    <td>{{$ec->cheque_no}}</td>
                                                    <td>{{ $ec->cheque_amt }} </td>
                                                    <td><span class="badge badge-soft-success p-2">{{$ec->cheque_status}}</span></td>
                                                    <td>
                                                        <div class="text-nowrap">{{$ec->created_at}}</div>
                                                    </td>
                                                    <td>2</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                <tbody id="cleared_cheque">
                                                @foreach($cleared_cheque as $cc)
                                                <tr >
                                                    <td>{{$cc->TenantName->tenant_english_name??''}}</td>
                                                    <td>{{$cc->cheque_no??''}}</td>
                                                    <td>{{ $cc->cheque_amt ??''}} </td>
                                                    <td><span class="badge badge-soft-success p-2">{{$cc->cheque_status??''}}</span></td>
                                                    <td>
                                                        <div class="text-nowrap">{{$cc->created_at??''}}</div>
                                                    </td>
                                                    <td>2</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
<tbody>                                               @foreach($security_cheque as $sc)
                                                <tr id="security_cheque">
                                                    <td>{{$sc->TenantName->tenant_english_name??''}}</td>
                                                    <td>{{$sc->cheque_no??''}}</td>
                                                    <td>{{ $sc->cheque_amt??'' }} </td>
                                                    <td><span class="badge badge-soft-success p-2">{{$sc->cheque_status??''}}</span></td>
                                                    <td>
                                                        <div class="text-nowrap">{{$sc->created_at??''}}</div>
                                                    </td>
                                                    <td>2</td>
                                                </tr>
                                                @endforeach
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                <!-- <div class="row mt-2">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Payment Details</h4>
                                </div><!-- end card header -->

                                <!-- <div class="card-body">
                                    <div id="simple_pie_chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div> -->
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                       
                    </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div><!-- end col -->

</div><!-- end row -->

<script>
    $(document).ready(function() {
        $("#cheque_status").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'all') {
            $('#valid_cheque').show();
            $('#bounced_cheque').show();
            $('#expired_cheque').show();
            $('#cleared_cheque').show();
            $('#security_cheque').show();
            $('#postponed_cheque').show();

                }
               else if (optionValue == 'valid') {
            $('#valid_cheque').show();
            $('#bounced_cheque').hide();
            $('#expired_cheque').hide();
            $('#cleared_cheque').hide();
            $('#security_cheque').hide();
            $('#postponed_cheque').hide();

                }
                else if (optionValue == 'postponed') {
            $('#valid_cheque').hide();
            $('#postponed_cheque').show();
            $('#bounced_cheque').hide();
            $('#expired_cheque').hide();
            $('#cleared_cheque').hide();
            $('#security_cheque').hide();
                }
            else if (optionValue == 'bounced') {
                $('#valid_cheque').hide();
            $('#postponed_cheque').hide();
            $('#bounced_cheque').show();
            $('#expired_cheque').hide();
            $('#cleared_cheque').hide();
            $('#security_cheque').hide();
            $('#postponed_cheque').hide();

                }
            
            else if (optionValue == 'expired') {
            $('#valid_cheque').hide();
            $('#bounced_cheque').hide();
            $('#expired_cheque').show();
            $('#cleared_cheque').hide();
            $('#security_cheque').hide();
            $('#postponed_cheque').hide();

                }
                else if (optionValue == 'cleared') {
            $('#valid_cheque').hide();
            $('#bounced_cheque').hide();
            $('#expired_cheque').hide();
            $('#cleared_cheque').show();
            $('#security_cheque').hide();
            $('#postponed_cheque').hide();

                }
                else if (optionValue == 'security') {
            $('#valid_cheque').hide();
            $('#bounced_cheque').hide();
            $('#expired_cheque').show();
            $('#cleared_cheque').hide();
            $('#security_cheque').hide();
            $('#postponed_cheque').hide();

                }
            });
        }).change();
    });
</script>
@endsection
