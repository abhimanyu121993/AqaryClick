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
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">{{ $errors }}</div>
                        @endif
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Building Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_code" name="building_code" value="{{isset($buildingedit)? $buildingedit->building_code: '' }}" placeholder="Building Code">
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
                                <label for="space" class="form-label">Building Type</label>
                                <select class="form-control" id="building_type" name="building_type">
                                    <option value="">--Select Builidng Type--</option>
                                    @foreach ($building_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
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
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Construction Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="building_cdate" name="cdate" value="{{isset($buildingedit)? $buildingedit->cdate: '' }}" placeholder="12-12-2022">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="building_location" class="form-label">Building Age</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_age" name="building_age" value="{{isset($buildingedit)? $buildingedit->building_age: '' }}" placeholder="Building Age">
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                <label for="space" class="form-label">Ownership Type</label>
                                <select class="form-control select2 form-select" id="flag" name="ownership_type" required>
                                <option value="" selected>--Select Ownership--</option>   
                                <option value="title_deed">Title Deed</option>
                                    <option value="contract">Contract</option>

                                </select>
                            </div>

                            <div class="col-xxl-3 col-md-6" id="title">
                                <label for="owner_name" class="form-label">Ownership No</label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="ownership_no" name="ownership_no" value="{{isset($buildingedit)? $buildingedit->ownership_no: '' }}" placeholder="Enter Title Deed No">
                                </div>
                                                            
                            </div>
                            <div class="col-xxl-3 col-md-6" id="contract">
                                <label for="owner_name" class="form-label">Ownership No</label>
                                <div class="input-group" id="contract">
                                    <input type="text" class="form-control" id="contract_no" name="contract_no" value="{{isset($buildingedit)? $buildingedit->contract_no: '' }}" placeholder="Enter contract Number">
                                </div>
                            </div>

                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6" id="contract_exp">
                                <label for="owner_name" class="form-label">Contract Expiry Date</label>
                                <div class="input-group" id="contract">
                                    <input type="date" class="form-control" name="contract_exp" value="{{isset($buildingedit)? $buildingedit->contract_exp: '' }}">
                                </div>

                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="pincode" class="form-label">Pin No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{isset($buildingedit)? $buildingedit->pincode: '' }}" placeholder="Pincode">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="space" class="form-label">Building Size <sup class="text-danger">(In Sq.Meter)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="space" name="space" value="{{isset($buildingedit)? $buildingedit->space: '' }}" placeholder="Building Size (Sq.Meter)">
                                </div>
                            </div>
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
                            <div class="col-xxl-3 col-md-6">
                                <label for="space" class="form-label">Building Type</label>
                                <select class="form-control" id="building_type" name="building_type">
                                    <option value="">--Select Builidng Type--</option>
                                    @foreach ($building_types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Building Address</h4>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="flag">Country</label>

                                <select class="select2 form-select" id="flag" name='country' @if (isset($buildingedit)) disabled @endif required>
                                    @if (isset($buildingedit))
                                    <option value="{{ $countryDetail[0]->name }}" selected>{{ $countryDetail[0]->name}}</option>
                                    @endif
                                    <option value="">--Select Country--</option>
                                    @foreach($countryDetail as $cd)
                                    <option value="{{ $cd->name}}">{{ $cd->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="state" class="form-label">State</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="state" name="state" value="{{isset($buildingedit)? $buildingedit->state: '' }}" placeholder="State">
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="flag">City</label>

                                <select class="select2 form-select" id="city" name='city' @if (isset($buildingedit)) disabled @endif required>
                                    @if (isset($buildingedit))
                                    <option value="{{ $cityDetail[0]->name }}" selected>{{ $cityDetail[0]->name}}</option>
                                    @endif
                                    <option value="">--Select City--</option>
                                    @foreach($cityDetail as $cd)
                                    <option value="{{ $cd->id}}">{{ $cd->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="flag">Zone</label>

                                <select class="select2 form-select" id="zone" name='area' @if (isset($buildingedit)) disabled @endif required>
                                    @if (isset($buildingedit))
                                    <option value="{{ $zoneDetail[0]->name }}" selected>{{ $zoneDetail[0]->name}}</option>
                                    @endif
                                    <option value="">--Select Zone--</option>

                                </select>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                <label for="city" class="form-label">Building No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_no" name="building_no" value="{{isset($buildingedit)? $buildingedit->building_no: '' }}" placeholder="Enter Building No">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="area" class="form-label">Zone No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="zone_no" name="zone_no" value="{{isset($buildingedit)? $buildingedit->zone_no: '' }}" placeholder="Enter Zone No">
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                <label for="city" class="form-label">Street No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="street_no" name="street_no" value="{{isset($buildingedit)? $buildingedit->street_no: '' }}" placeholder="Enter Street No">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="building_location" class="form-label">Building Location Link</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_location" name="building_location" value="{{isset($buildingedit)? $buildingedit->building_location: '' }}" placeholder="Google Map Link">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Upload attachment</h4>
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
                                <h4 class="card-title mb-0 flex-grow-1">Building Appraisal</h4>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                <label for="incharge_name" class="form-label">Land Size <sup class="text-danger">(in square foot)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="land_size" name="land_size_foot" value="{{isset($buildingedit)? $buildingedit->land_size_foot: '' }}" placeholder="Enter Land Size(Sq.Foot)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="country" class="form-label">Price per square foot</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="country" name="price_foot" value="{{isset($buildingedit)? $buildingedit->price_foot: '' }}" placeholder="Enter Price per square foot">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="state" class="form-label">Total Land Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="total_land" name="total_land" value="{{isset($buildingedit)? $buildingedit->total_land: '' }}" placeholder="Enter Total Land">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Land Size <sup class="text-danger">(in square meter)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="landsize_meter" name="landsize_meter" value="{{isset($buildingedit)? $buildingedit->landsize_meter: '' }}" placeholder="Land Size(Sq.Meter)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="incharge_name" class="form-label">Cost Building <sup class="text-danger">(per square meter)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cost_building" name="cost_building" value="{{isset($buildingedit)? $buildingedit->cost_building: '' }}" placeholder="Enter Building Cost(Sq.Meter)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="country" class="form-label">Total Building Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_value" name="building_value" value="{{isset($buildingedit)? $buildingedit->building_value: '' }}" placeholder="Enter Building Value">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="state" class="form-label">Monthly Income</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="{{isset($buildingedit)? $buildingedit->monthly_income: '' }}" placeholder="Enter Monthly Income">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Annual Income</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="annual_income" name="annual_income" value="{{isset($buildingedit)? $buildingedit->annual_income: '' }}" placeholder="Enter Annual Income">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="state" class="form-label">Payback Period</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="payback" name="payback" value="{{isset($buildingedit)? $buildingedit->payback: '' }}" placeholder="Enter Payback ">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Total Property Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="property_vlaue" name="property_vlaue" value="{{isset($buildingedit)? $buildingedit->property_vlaue: '' }}" placeholder="Enter Total Property Value">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Person in-charge</h4>
                            </div>
                        </div>

                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-6">
                                <label for="incharge_name" class="form-label">Person In-Charge</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="incharge_name" name="incharge_name" value="{{isset($buildingedit)? $buildingedit->incharge_name: '' }}" placeholder="Person In-Charge">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="country" class="form-label">Job</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="country" name="person_job" value="{{isset($buildingedit)? $buildingedit->person_job: '' }}" placeholder="Enter job">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="state" class="form-label">Mobile No.</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile" name="person_mobile" value="{{isset($buildingedit)? $buildingedit->person_mobile: '' }}" placeholder="Enter mobile">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Building Recieve Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="building_rdate" name="rdate" value="{{isset($buildingedit)? $buildingedit->cdate: '' }}" placeholder="12-12-2022">
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
<script>
    $(document).ready(function() {
        $("#flag").change(function() {
            $('#title_deed').hide();
            $('#contract').hide();
            $('#title').hide();
            $('#contract_exp').hide();

            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'title_deed') {
                    $('#contract').hide();
                    $('#title').show();
                    $('#contract_exp').hide();



                } else if (optionValue == 'contract') {
                    $('#contract').show();
                    $('#title').hide();
                    $('#contract_exp').show();

                }
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $("#city").change(function() {

            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetchzone') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#zone").html(p);
                    }
                });
            });
        }).change();
    });
</script>

@endsection