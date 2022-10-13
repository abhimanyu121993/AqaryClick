@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Unit'])
@section('title', 'Register Unit')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($buildingedit)? 'Update Unit' : 'Unit Register' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($buildingedit) ? route('admin.unit.update', $buildingedit->id) : route('admin.unit.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($buildingedit))
                            @method('patch')
                        @endif
                            @csrf
                            @if ($errors->any())
                         <div class="alert alert-danger alert-dismissible">{{ $errors }}</div>
                    @endif
                            <div class="row gy-4 mb-3">
                            <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Building Name</label>

                    <select class="select2 form-select" id="flag" name='building_name' @if (isset($buildingedit)) disabled @endif required>
                        @if (isset($buildingedit))
                        <option value="{{$buildingedit->name }}" selected>{{ $buildingedit->building_name}}</option>
                        @endif
                        @foreach($units as $unit)
                        <option value="{{ $unit->name}}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-3 col-md-6">
                                    <label for="lessor_name" class="form-label">Unit No </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lessor_name" name="unit_no" value="{{isset($buildingedit)? $buildingedit->unit_no: '' }}" placeholder="Enter Unit No">
                                    </div>
                                </div>
                               
                                </div>
                            <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                    <label for="unit_code" class="form-label">Unit code </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_code" name="unit_code" value="{{isset($buildingedit)? $buildingedit->unit_no: '' }}" placeholder="Enter Unit No">
                                    </div>
                                </div>
                            <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Unit Type</label>

                    <select class="select2 form-select" id="flag" name='unit_type' @if (isset($buildingedit)) disabled @endif required>
                        @if (isset($buildingedit))
                        <option value="{{$buildingedit->name }}" selected>{{ $buildingedit->unit_type}}</option>
                        @endif
                        @foreach($units2 as $unit)
                        <option value="{{ $unit->name}}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Unit Status</label>

                    <select class="select2 form-select" id="flag" name='unit_status' @if (isset($buildingedit)) disabled @endif required>
                        @if (isset($buildingedit))
                        <option value="{{$buildingedit->name }}" selected>{{ $buildingedit->unit_status}}</option>
                        @endif
                        @foreach($units3 as $unit)
                        <option value="{{ $unit->name}}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Unit Floor</label>

                    <select class="select2 form-select" id="flag" name='unit_floor' @if (isset($buildingedit)) disabled @endif required>
                        @if (isset($buildingedit))
                        <option value="{{$buildingedit->id }}" selected>{{ $buildingedit->unit_floor}}</option>
                        @endif
                        @foreach($units4 as $unit)
                        <option value="{{ $unit->name}}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                      
                                <div class="col-xxl-3 col-md-6">
                                    <label for="building_location" class="form-label">Unit Size<sup class="text-danger"> *(in square meter)</sup></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_size" name="unit_size" value="{{isset($buildingedit)? $buildingedit->unit_size: '' }}" placeholder="Enter Unit Size">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Unit Feature</label>

                    <select class="select2 form-select" id="flag" name='unit_feature' @if (isset($buildingedit)) disabled @endif required>
                        @if (isset($buildingedit))
                        <option value="{{$buildingedit->id }}" selected>{{ $buildingedit->unit_feature}}</option>
                        @endif
                        @foreach($units5 as $unit)
                        <option value="{{ $unit->id}}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                            </div>
                            
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="contract_no" class="form-label">Electric No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="electric" name="electric_no" value="{{isset($buildingedit)? $buildingedit->electric_no: '' }}" placeholder="Enter electric Number">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="pincode" class="form-label">Water</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="water" name="water_no" value="{{isset($buildingedit)? $buildingedit->water_no: '' }}" placeholder="Enter water no">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="country" class="form-label">Intial Rent</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="intial_rent" name="intial_rent" value="{{isset($buildingedit)? $buildingedit->intial_rent: '' }}" placeholder="Enter Intial Rent">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="state" class="form-label">Actual Rent</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="actual_rent" name="actual_rent" value="{{isset($buildingedit)? $buildingedit->actual_rent: '' }}" placeholder="Enter Actual Rent">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="desc" class="form-label">Unit Discription</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="desc" name="unit_desc" value="{{isset($buildingedit)? $buildingedit->unit_desc: '' }}" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="lessor_name" class="form-label">Unit Ref</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_ref" name="unit_ref" value="{{isset($buildingedit)? $buildingedit->unit_ref: '' }}" placeholder="Enter Unit ref">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="revenue" class="form-label">Revenue</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="revenue" name="revenue" value="{{isset($buildingedit)? $buildingedit->revenue: '' }}" placeholder="Enter revenue">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="building_pic" class="form-label">Attachment</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="file" name="file">
                                    </div>
                                </div>
                            </div>
                             <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark">
                                    {{isset($buildingedit)? $buildingedit->revenue: '' }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <button class="btn btn-primary" type="submit">{{isset($buildingedit) ? 'Update' : 'Submit'}}</button>
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
