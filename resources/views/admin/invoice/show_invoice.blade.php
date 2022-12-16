@extends('admin.includes.layout', ['breadcrumb_title' => 'Invoice Management'])
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
@section('title', 'Invoice Management')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Invoice</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                    <table class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive"
                        style="width: 100%;">
                        <thead >
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Tenant</th>
                                <th scope="col">Contract</th>
                                <th scope="col">Invoice Start Date</th>
                                <th scope="col">Invoice End Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Paid Amt</th>
                                <th scope="col">Due Amt</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Receipt</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Send</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice as $inv)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $inv->invoice_no ?? '' }}</td>
                                    <td>{{ $inv->TenantName->tenant_english_name ?? '' }}</td>
                                    <td>{{ $inv->Contract->contract_code ?? '' }}</td>
                                    <td>{{ $inv->invoice_period_start ?? '' }}</td>
                                    <td>{{ $inv->invoice_period_end ?? '' }}</td>
                                    <td>{{ $inv->due_date ?? '' }}</td>
                                    <td>{{ $inv->amt_paid ?? '' }}</td>
                                    <td>{{ $inv->due_amt ?? '' }}</td>
                                    <td>{{ $inv->payment_method ?? '' }}</td>
                                    <td><a class="dropdown-item"
                                            href="{{ route('admin.receiptVouchure', $inv->invoice_no) }}">view</a></td>
                                    <td><a class="dropdown-item"
                                            href="{{ url('admin/invoice-print', $inv->invoice_no) }}">view</a></td>
                                    <td>
                                        <a href="{{  url('admin/invoice-print', $inv->invoice_no) }}"><i data-feather="send" class="paper-plane"></i></a>
                                       </td>
                                </tr>
                            @endforeach

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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
