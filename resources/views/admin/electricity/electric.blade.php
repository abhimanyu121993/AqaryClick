@extends('admin.includes.layout', ['breadcrumb_title' => 'Electricity'])
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
@section('title', 'Electricity')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">
                        {{ isset($electricity) ? 'Update Electricity Bill' : 'Electricity Bill ' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form
                            action="{{ isset($electricity) ? route('admin.electricity.update', $electricity->id) : route('admin.electricity.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @if (isset($electricity))
                                @method('patch')
                            @endif
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-4">
                                    <label class="form-label" for="flag">Building Name</label>

                                    <select class="form-select js-example-basic-single" id="building_name"
                                        name='building_name'>
                                        @if (isset($electricity))
                                            <option value="{{ $electricity->id }}" selected>
                                                {{ $electricity->building_name }}</option>
                                        @else
                                            <option value="">--Select Builidng Name--</option>
                                            @foreach ($build as $building)
                                                <option value="{{ $building->id }}">{{ $building->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label class="form-label" for="flag">Unit No</label>
                                    <select class="select2 form-select" id="{{ !isset($electricity) ? 'unit_no' : '' }}"
                                        name='unit_no'>
                                        @if (isset($electricity))
                                            <option value="{{ $electricity->unit_no }}" selected>{{ $electricity->unit_no }}
                                            </option>
                                        @else
                                            <option value="">--Select Unit No--</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-xxl-3 col-md-4">
                                    <label class="form-label" for="flag">Unit Type</label>
                                    <select class="select2 form-select" id="{{ !isset($electricity) ? 'unit_type' : '' }}"
                                        name='unit_type'>
                                        @if (isset($electricity))
                                            <option value="{{ $electricity->unit_type }}" selected>
                                                {{ $electricity->unit_type }}</option>
                                        @else
                                            <option value="">--Select Unit Type--</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Electricity Account Under</label>
                                    <select class="select2 form-select" id="electric_under" name='electric_under'>
                                        @if (isset($electricity))
                                            <option value="{{ $electricity->electric_under }}" selected>
                                                {{ $electricity->electric_under }}</option>
                                        @else
                                            <option value="">--Select Electricity Under--</option>
                                            <option value="tenant">Tenant</option>
                                            <option value="lessor">Lessor</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label class="form-label" for="flag">Name</label>
                                    <select class="select2 name form-select" id="{{ !isset($electricity) ? 'name' : '' }}"
                                        name='name'>
                                        @if (isset($electricity))
                                            <option value="{{ $electricity->name }}" selected>{{ $electricity->name }}
                                            </option>
                                        @else
                                            <option value="">--Select Name--</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-4" id="qid">
                                    <label for="name" class="form-label">QID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="qid_no" name="qid_no"
                                            value="{{ isset($electricity) ? $electricity->qid_no : '' }}"
                                            placeholder="Enter QID No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Register Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="reg_mobile" name="reg_mobile"
                                            value="{{ isset($electricity) ? $electricity->reg_mobile : '' }}"
                                            placeholder="Enter Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Electric No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="electric_no" name="electric_no"
                                            value="{{ isset($electricity) ? $electricity->electric_no : '' }}"
                                            placeholder="Enter Electric No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Water No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="water_no" name="water_no"
                                            value="{{ isset($electricity) ? $electricity->water_no : '' }}"
                                            placeholder="Enter Water No">
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Last Paid Invoice date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_payment" name="last_payment"
                                            value="No Records" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Bill Amount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="bill_amt" name="bill_amt"
                                            value="{{ isset($electricity) ? $electricity->bill_amt : '' }}"
                                            placeholder="Enter Ammount">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Paid By</label>
                                    <select class="select2 form-select" id="paid_by" name='paid_by'>
                                        @if (isset($electricity))
                                            <option value="{{ $electricity->paid_by }}" selected>
                                                {{ $electricity->paid_by }}</option>
                                        @else
                                            <option value="">--Select--</option>
                                            <option value="tenant">Tenant</option>
                                            <option value="lessor">Lessor</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark">
                                {{ isset($electricity) ? $electricity->remark : '' }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="building_file" class="form-label">Attachment</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="attachment" name="attachment[]"
                                            multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mt-2">
                                <div class="col-xxl-3 col-md-6">
                                    <div class="input-group">
                                        <button class="btn btn-primary" id="btn-btn"
                                            type="submit">{{ isset($electricity) ? 'Update' : 'Submit' }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                    var newurl = "{{ url('/admin/fetchunit') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            $("#unit_no").html(p.html);
                            $("#unit_type").html(p.html1);
                            if (p.result == null) {
                                $("#last_payment").val("No Records");

                            } else {
                                $("#last_payment").val(p.result);

                            }



                        }
                    });
                });
            }).change();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#electric_under").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'tenant') {
                        var newurl = "{{ url('/admin/fetch-tenant-name') }}";
                        $.ajax({
                            url: newurl,
                            method: 'get',
                            success: function(p) {
                                $("#name").html(p);
                            }
                        });
                    } else if (optionValue == 'lessor') {
                        var newurl = "{{ url('/admin/fetchContract') }}";
                        $.ajax({
                            url: newurl,
                            method: 'get',
                            success: function(p) {
                                $("#name").html(p);
                            }
                        });
                    } else {

                    }
                });
            }).change();
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#name").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-qid') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            $("#qid_no").val(p.qid_document);    
                        }
                    });
                });
            }).change();
        });
    </script>
@endsection
