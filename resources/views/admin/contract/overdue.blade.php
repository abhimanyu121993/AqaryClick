@extends('admin.includes.layout', ['breadcrumb_title' => 'OverDue Details'])
<style>
    #card-header{
       background:#c8f4f6;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
   }
   #pop{
       color: black !important;
   }
   #header1
   {
       background: #ecf0f3;
       border: none !important;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
       box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
   }
   #h1
   {
       color: black;
   }
   #example
   {
       font-size: 14px;
   }
   thead
    {
        background:#c9e6e7 !important;
    }
   input ,select,textarea ,#building_type{
       border-radius: 10px !important;
       border: none !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
   }
   .dataTables_info,.dataTables_paginate {
       font-weight: bolder;
   }
   #btn-btn
   {
       background:#ffffff;
       color: black;
       border: none;
       border-radius: 10px !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
   #btn-btn:hover
   { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('title', 'OverDue Details')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">OverDue Details </h4>
                </div><!-- end card header -->
                <div class="card-body  table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
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
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
