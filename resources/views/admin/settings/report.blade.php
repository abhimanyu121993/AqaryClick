@extends('admin.includes.layout', ['breadcrumb_title' => 'Report'])
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
@section('title', 'Report')
@section('main-content')

<div class="row statement mb-3">
    <div class="col-sm-12">
        <a class="btn btn-primary" id="btn-btn" href="{{route('admin.excel-export.tenant-statement')}}">Export All Tenant Statement</a>
        <a class="btn btn-primary" id="btn-btn" href="{{route('admin.excel-export.tenant-units')}}">Export All Unit Statement</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Tenant Report</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="" method="POST">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Building Name</label>
                                <select class="select2 form-select js-example-basic-single" id="building_name" name='building_name'>
                                    <option value="" selected hidden disabled>--Select Building--</option>
                                    <option value="all">All</option>
                                    @foreach($building as $build)
                                    <option value="{{ $build->id}}">{{ $build->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Unit Type</label>
                                <select class="select2 form-select js-example-basic-single" id="unit_type" name='unit_type'>
                                    <option value="">--Select Unit</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Tenant Name</label>
                                <select class="select2 form-select js-example-basic-single" id="tenant_name" name='tenant_name'>
                                    <option value="" selected hidden disabled>--Select Tenant--</option>
                                </select>
                            </div>
                            <div class="col-xxl-4 col-md-3">
                                <label for="name" class="form-label">Filter</label>
                                <select class="select2 form-select js-example-basic-single" id="filter" name="filter">
                                    <option value="" selected hidden>--Select Status--</option>
                                    <option value="All">All</option>
                                    <option value="File">File</option>
                                    <!-- <option value="Document">Document</option> -->
                                    <option value="Contract Reciept">Contract Reciept</option>
                                    <option value="Invoice">Invoice</option>
                                    <!-- <option value="Receipt Vouchure">Receipt Vouchure</option> -->
                                </select>
                            </div>
                            <!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container tenant_all_data">

</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Tenant Status</h4>
                <div class="flex-shrink-0">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="tenant_status">
                        <option value="" selected disabled>Sort By</option>
                        <option value="ALL">All</option>
                        <option value="TP">Personal</option>
                        <option value="TC">Company</option>
                        <option value="TG">Government</option>
                    </select>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead >
                            <tr >
                                <th scope="col" style="width: 20%;">Files No</th>
                                <th scope="col">Tenant Code</th>
                                <th scope="col">Tenant Name</th>
                                <th scope="col">Tenant Type</th>
                                <th scope="col">Tenant Document</th>
                                <th scope="col"> Document No</th>
                                <!-- <th scope="col" style="width: 12%;">Delay Time</th> -->
                            </tr>
                        </thead>
                        <tbody id="PERSONAL">
                            @foreach ($tenantStatus as $status)
                            @if ($status->tenant_type == 'TP')
                            <tr>
                                <td>{{$status->file_no??''}} </td>
                                <td>{{$status->tenant_code ?? ''}}</td>
                                <td>{{$status->tenant_english_name??''}}</td>
                                <td>{{$status->tenant_type == 'TP'? 'Personal':''}}</td>
                                <td>{{$status->tenant_document??''}}</td>
                                <td>
                                    @if ($status->qid_document !='')
                                    {{$status->qid_document??''}}
                                    @else
                                    {{$status->passport??''}}
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tbody id="COMPANY">
                            @foreach ($tenantStatus as $status)
                            @if ($status->tenant_type == 'TC')
                            <tr>
                                <td>{{$status->file_no??''}} </td>
                                <td>{{$status->tenant_code ?? ''}}</td>
                                <td>{{$status->tenant_english_name??''}}</td>
                                <td>{{$status->tenant_type == 'TC'? 'Company':''}}</td>
                                <td>
                                    @if ($status->tenant_document =='Est_Card_No')
                                    {{$status->tenant_document =='Est_Card_No'?'Estblish Card':''}}
                                    @else
                                    {{$status->tenant_document ?? ''}}
                                    @endif
                                </td>
                                <td>
                                    @if ($status->cr_document !='')
                                    {{$status->cr_document??''}}
                                    @else
                                    {{$status->established_card_no??''}}
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tbody id="GOVERNMENT">
                            @foreach ($tenantStatus as $status)
                            @if ($status->tenant_type == 'TG')
                            <tr>
                                <td>{{$status->file_no??''}} </td>
                                <td>{{$status->tenant_code ?? ''}}</td>
                                <td>{{$status->tenant_english_name??''}}</td>
                                <td>{{$status->tenant_type == 'TG'? 'Government':''}}</td>
                                <td>{{$status->tenant_document =='Govt_Housing_No' ?'Government Housing':''}}</td>
                                <td>{{$status->government_housing_no??''}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        <tbody>

                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
            </div><!-- end card body -->
        </div>
    </div>
</div>

<!-- Grids in modals -->
@endsection





@section('script-area')
<script>
    $(document).ready(function() {
        $("#building_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-building-tenant-unit') }}/" + optionValue;
                var newurl2 = "{{url('/admin/fetch-unit-by-building')}}/" + optionValue;

                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#tenant_name").html(p);
                    }
                });
                $.ajax({
                    url: newurl2,
                    method: 'get',
                    success: function(a) {
                        $('#unit_type').html(a);
                    }
                });
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('change', '#filter', function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'All') {
                    $('.document_file').show()
                    $('.contract_file').show();
                    $('.invoice_file').show();
                } else if (optionValue == 'File') {
                    $('.document_file').show()
                    $('.contract_file').hide();
                    $('.invoice_file').hide();
                } else if (optionValue == 'Invoice') {
                    $('.invoice_file').show();
                    $('.contract_file').hide();
                    $('.document_file').hide();
                } else if (optionValue == 'Contract Reciept') {
                    $('.contract_file').show();
                    $('.invoice_file').hide();
                    $('.document_file').hide();
                }
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#tenant_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/master-report') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $('.tenant_all_data').html(p);
                    }
                });
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $('#GOVERNMENT').show();
        $('#COMPANY').show();
        $('#PERSONAL').show();
        $("#tenant_status").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'ALL') {
                    $('#GOVERNMENT').show();
                    $('#COMPANY').show();
                    $('#PERSONAL').show();
                } else if (optionValue == 'TP') {
                    $('#PERSONAL').show();
                    $('#GOVERNMENT').hide();
                    $('#COMPANY').hide();
                } else if (optionValue == 'TC') {
                    $('#COMPANY').show();
                    $('#GOVERNMENT').hide();
                    $('#PERSONAL').hide();
                } else if (optionValue == 'TG') {
                    $('#GOVERNMENT').show();
                    $('#COMPANY').hide();
                    $('#PERSONAL').hide();

                }
            });
        }).change();
    });
</script>
@endsection