@extends('admin.includes.layout', ['breadcrumb_title' => 'Import/Export Contract'])
@section('title', 'Import Export Contract')
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
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="col-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Bulk Upload Contract</h4>
                    <div class="col-2">
                    <a id="btn-btn" href="{{route('admin.excel-export.contract')}}" class="btn btn-primary">Export Contract</a>
                </div>
                    <div class="col-2">
                    <a id="btn-btn" href="{{route('admin.excel-export.grace-export')}}" class="btn btn-primary">Export Graces</a>
                </div>
                </div><!-- end card header -->
                <div class="col-6">
        <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.bulkUploadContract') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload File</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button id="btn-btn" class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <a href="{{ asset('assets/excel_format/newcontract_format.csv') }}"
                                        target="_blank">Example format</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
        </div>
            </div>
        </div>
    </div>
</div>
<!-- Grids in modals -->
@endsection


@section('script-area')

@endsection
