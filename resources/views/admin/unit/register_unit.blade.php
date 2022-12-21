@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Unit'])
<style>
    #card-header {
        background: #c8f4f6;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    #pop {
        color: black !important;
    }

    #header1 {
        background: #ecf0f3;
        border: none !important;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
    }

    #h1 {
        color: black;
    }

    #example {
        font-size: 14px;
    }

    thead {
        background: #c9e6e7 !important;
    }

    input,
    select,
    textarea,
    #building_type {
        border-radius: 10px !important;
        border: none !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
    }

    .dataTables_info,
    .dataTables_paginate {
        font-weight: bolder;
    }

    #btn-btn {
        background: #ffffff;
        color: black;
        border: none;
        border-radius: 10px !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;
    }

    #btn-btn:hover {
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;
    }
</style>
@section('title', 'Register Unit')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">
                        {{ isset($buildingedit) ? 'Update Unit' : 'Unit Register' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form
                            action="{{ isset($buildingedit) ? route('admin.unit.update', $buildingedit->id) : route('admin.unit.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @if (isset($buildingedit))
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
                            <div class="row gy-4 mb-3">
                                {{-- <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Building Name</label>

                                    <select class="select2  form-select js-example-basic-single" name='building_name'>
                                        @if (isset($buildingedit))
                                            <option value="{{ $buildingedit->id }}" disabled>
                                                {{ $buildingedit->building_name }}</option>
                                                @else
                                            <option value="" selected hidden>--Select Building--</option>
                                        @endif
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Building Name</label>
                                    <select class="form-control select2 form-select" id="building_name"
                                        name="building_name">
                                        @if (isset($buildingedit))
                                            <option value="{{ $buildingedit->id }}" selected>
                                                {{ $buildingedit->buildingDetails->name }}</option>
                                        @else
                                            <option value="" selected hidden>--Select Building--</option>
                                        @endif
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="unit_code" class="form-label">Unit code </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_code" name="unit_code"
                                            value="{{ isset($buildingedit) ? $buildingedit->unit_no : '' }}"
                                            placeholder="Enter Unit Code">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="lessor_name" class="form-label">Unit No </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lessor_name" name="unit_no"
                                            value="{{ isset($buildingedit) ? $buildingedit->unit_no : '' }}"
                                            placeholder="Enter Unit No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Unit Type</label>
                                    <select class="form-control select2 form-select" id="building_name"
                                        name="unit_type">
                                        @if (isset($buildingedit))
                                            <option value="{{ $buildingedit->id }}" selected>
                                                {{$buildingedit->unitTypeDetails->name}}</option>
                                        @else
                                            <option value="" selected hidden>--Select Building--</option>
                                        @endif
                                        @foreach ($units2 as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                       

                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Unit Status</label>
                                    <select class="form-control select2 form-select" 
                                        name="unit_status">
                                        @if (isset($buildingedit))
                                            <option value="{{ $buildingedit->name??'' }}"> {{$buildingedit->unitFeature->name??''}} </option>
                                        @else
                                            <option value="" selected hidden>--Select Unit Status--</option>
                                         @endif
                                        @foreach ($units3 as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Unit Floor</label>

                                    <select class="select2 select2  form-select js-example-basic-single" name='unit_floor'>                                        @if (isset($buildingedit))
                                            <option value="{{ $buildingedit->id }}">
                                                {{ $buildingedit->unit_floor }}</option>
                                        @else
                                        <option value="" selected hidden>---Select Type---</option>
                                        @endif
                                        @foreach ($units4 as $unit)
                                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="building_location" class="form-label">Area/m²</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_size" name="unit_size"
                                            value="{{ isset($buildingedit) ? $buildingedit->unit_size : '' }}"
                                            placeholder="Enter Area/m²">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Unit Feature</label>

                                    <select class="select2  form-select js-example-basic-single" name='unit_feature'>
                                        @if (isset($buildingedit))
                                            <option value="{{ $buildingedit->id }}">
                                                {{ $buildingedit->unitFeature->name??'' }}</option>
                                        @else
                                        <option value="" selected hidden>---Select Type---</option>
                                        @endif
                                        @foreach ($units5 as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-3">
                                    <label for="contract_no" class="form-label">Electric No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="electric" name="electric_no"
                                            value="{{ isset($buildingedit) ? $buildingedit->electric_no : '' }}"
                                            placeholder="Enter electric Number">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="pincode" class="form-label">Water</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="water" name="water_no"
                                            value="{{ isset($buildingedit) ? $buildingedit->water_no : '' }}"
                                            placeholder="Enter water no">
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="country" class="form-label">Intial Rent</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="intial_rent" name="intial_rent"
                                            value="{{ isset($buildingedit) ? $buildingedit->intial_rent : '' }}"
                                            placeholder="Enter Intial Rent">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="state" class="form-label">Actual Rent</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="actual_rent" name="actual_rent"
                                            value="{{ isset($buildingedit) ? $buildingedit->actual_rent : '' }}"
                                            placeholder="Enter Actual Rent">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="remark" class="form-label">Unit Discription</label>
                                    <textarea class="form-control" id="desc" name="unit_desc">
                                    {{ isset($buildingedit) ? $buildingedit->unit_desc : '' }}
                                    </textarea>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="lessor_name" class="form-label">Unit Ref</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_ref" name="unit_ref"
                                            value="{{ isset($buildingedit) ? $buildingedit->unit_ref : '' }}"
                                            placeholder="Enter Unit ref">
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-4">
                                    <label for="revenue" class="form-label">Revenue Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="revenue" name="revenue"
                                            value="{{ isset($buildingedit) ? $buildingedit->revenue : '' }}"
                                            placeholder="Enter revenue">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="building_pic" class="form-label">Attachment</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="file" name="attachment"
                                            multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark">
                                    {{ isset($buildingedit) ? $buildingedit->revenue : '' }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <button class="btn btn-primary" id="btn-btn"
                                        type="submit">{{ isset($buildingedit) ? 'Update' : 'Submit' }}</button>
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
@endsection
