@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Contract'])
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
@section('title', 'Manage Contract')

@section('main-content')
<div class="card" id="header1">
    <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Grace </h4>
    </div>
    <div class="card-body  table-responsive">
        <table class="display table table-bordered dt-responsive dataTable dtr-inline  table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
            <thead >
                <tr>
                    <th scope="col">Sr.</th>
                    <th scope="col">Grace Start Date</th>
                    <th scope="col">Grace End Date</th>
                    <th scope="col">Grace Period Month</th>
                    <th scope="col">Grace Period Day</th>
                </tr>
            </thead>
            <tbody id="grace_loop">
                @if(isset($graceDetails))
                @foreach ($graceDetails as $grace )
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{Carbon\Carbon::parse($grace->grace_start_date)->format('d M Y') ?? ''}}</td>
                    <td>{{Carbon\Carbon::parse($grace->grace_end_date)->format('d M Y') ??''}}</td>
                    <td>{{$grace->grace_period_month??''}} Months</td>
                    <td>{{$grace->grace_period_day??''}} Days</td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No Records!</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script-area')
@endsection