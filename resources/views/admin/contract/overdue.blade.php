@extends('admin.includes.layout', ['breadcrumb_title' => 'OverDue Details'])
@section('title', 'OverDue Details')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">OverDue Details </h4>
                </div><!-- end card header -->
                <div class="card-body  table-responsive">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Tenant Name</th>
                                <th scope="col">Tenant Mobile</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Contract Code</th>
                                <th scope="col">Rent Amount</th>
                                <th scope="col">Lease Start</th>
                                <th scope="col">Lease End</th>
                                <th scope="col">Overdue</th>
                               

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenant as $td)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $td->tenantDetails->tenant_english_name??''   }}</td>
                                    <td>{{ $td->tenant_mobile??''}}</td>
                                    <td>{{ $td->tenantDetails->buildingDetails->name??''}}</td>
                                    <td>{{ $td->contract_code??''}}</td>
                                    <td>{{ $td->rent_amount??''}}</td>
                                    <td>{{ $td->lease_start_date??''}}</td>
                                    <td>{{ $td->lease_end_date??''}}</td>
                                    <td>{{ $td->overdue??''}} Days</td>
                                    





                              
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
