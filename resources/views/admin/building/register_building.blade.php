@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Building'])
@section('title', 'Register Building')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($buildingedit)? 'Update Building' : 'Register Building' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($buildingedit) ? route('admin.register_building.update', $buildingedit->id) : route('admin.register_building.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($buildingedit))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Building Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="building_code" name="building_code" value="{{isset($buildingedit)? $buildingedit->building_code: '' }}" placeholder="Building Code">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Construction Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="building_cdate" name="cdate" value="{{isset($buildingedit)? $buildingedit->cdate: '' }}" placeholder="12-12-2022">
                                    </div>
                                </div><div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Building Recieve  Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="building_rdate" name="rdate" value="{{isset($buildingedit)? $buildingedit->cdate: '' }}" placeholder="12-12-2022">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Building Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="building_name" value="{{isset($buildingedit)? $buildingedit->building_name: '' }}" placeholder="Building Name">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                    <label for="owner_name" class="form-label">Owner Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{isset($buildingedit)? $buildingedit->owner_name: '' }}" placeholder="Owner Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="lessor_name" class="form-label">Lessor's Name</label>
                                    <div class="input-group">
                                        <input type="name" class="form-control" id="lessor_name" name="lessor_name" value="{{isset($buildingedit)? $buildingedit->lessor_name: '' }}" placeholder="Lessor's Name">
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="space" class="form-label">Building Size <sup class="text-danger">(In Sq.Meter)</sup></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="space" name="space" value="{{isset($buildingedit)? $buildingedit->space: '' }}" placeholder="Building Area (Sq.Meter)">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="building_location" class="form-label">Building Location Link</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="building_location" name="building_location" value="{{isset($buildingedit)? $buildingedit->building_location: '' }}" placeholder="Google Map Link">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="space" class="form-label">Building Type</label>
                                    <select class="form-control" id="building_type" name="building_type">
                                        <option value="">--Select Builidng Type--</option>
                                        @foreach ($building_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-xxl-3 col-md-6">
                                    <label for="space" class="form-label">Building Status</label>
                                    <select class="form-control" id="building_type" name="status">
                                        <option value="">--Select Builiding Status--</option>
                                        <option value="">Old</option>
                                        <option value="">New</option>

                                       
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="space" class="form-label">Status</label>
                                    <select class="form-control" id="building_type" name="building_type">
                                        <option value="">--Select Status--</option>
                                        @foreach ($building_statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="contract_no" class="form-label">Contract No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="contract_no" name="contract_no" value="{{isset($buildingedit)? $buildingedit->contract_no: '' }}" placeholder="contract Number">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="pincode" name="pincode" value="{{isset($buildingedit)? $buildingedit->pincode: '' }}" placeholder="Pincode">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="country" name="country" value="{{isset($buildingedit)? $buildingedit->country: '' }}" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="state" name="state" value="{{isset($buildingedit)? $buildingedit->state: '' }}" placeholder="State">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="city" name="city" value="{{isset($buildingedit)? $buildingedit->city: '' }}" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="area" class="form-label">Area</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="area" name="area" value="{{isset($buildingedit)? $buildingedit->area: '' }}" placeholder="Area">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="building_pic" class="form-label">Building Photo</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="building_pic" name="building_pic">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="building_file" class="form-label">Building File</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="building_file" name="building_file" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                            <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Building in-charge</h4>
                </div></div>
                
                <div class="row gy-4 mb-3">
                <div class="col-xxl-3 col-md-6">
                                    <label for="incharge_name" class="form-label">Person In-Charge</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="incharge_name" name="incharge_name" value="{{isset($buildingedit)? $buildingedit->incharge_name: '' }}" placeholder="Person In-Charge">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="country" class="form-label">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="country" name="person_name" value="{{isset($buildingedit)? $buildingedit->person_name: '' }}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="state" class="form-label">Mobile No.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mobile" name="person_mobile" value="{{isset($buildingedit)? $buildingedit->person_mobile: '' }}" placeholder="Enter mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark">

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
