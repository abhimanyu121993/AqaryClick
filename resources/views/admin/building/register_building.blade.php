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
                        <div class="alert alert-danger alert-dismissible">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Building Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_code" name="building_code" value="{{isset($buildingedit)? $buildingedit->building_code: '' }}" placeholder="Building Code">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Building Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="building_name" value="{{isset($buildingedit)? $buildingedit->name: '' }}" placeholder="Building Name">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Building Type</label>
                                <select class="form-control" id="building_type" name="building_type">
                                @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->building_type }}" selected>{{ $buildingedit->building_type}}</option>
                                    @else
                                    <option value="">--Select Builidng Type--</option>
                                    @foreach ($building_types as $type)
                                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Status</label>
                                <select class="form-control" id="building_status" name="status" >
                                @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->status }}" selected>{{ $buildingedit->status}}</option>
                                    @else
                                    <option value="" selected>--Select Status--</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    @endif
                                </select>
                            </div>

                        </div>
                        <div class="row gy-4 mb-3">
                           
                           
                          
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Ownership Type</label>
                                <select class="form-control select2 form-select" id="flag" name="ownership_type">
                                @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->ownership_type }}" selected>{{ $buildingedit->ownership_type}}</option>
                                    @else
                                <option value="" selected>--Select Ownership--</option>   
                                <option value="title_deed">Title Deed</option>
                                    <option value="Usufruct contract">Usufruct Contract</option>
                                    @endif
                                </select>

                            </div>

                            <div class="col-xxl-3 col-md-3" id="title">
                                <label for="owner_name" class="form-label">Ownership No</label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="ownership_no" name="ownership_no" value="{{isset($buildingedit)? $buildingedit->ownership_no: '' }}" placeholder="Enter Title Deed No">
                                </div>
                                                            
                            </div>
                            <div class="col-xxl-3 col-md-3" id="contract">
                                <label for="owner_name" class="form-label">Ownership No</label>
                                <div class="input-group" id="contract">
                                    <input type="text" class="form-control" id="contract_no" name="contract_no" value="{{isset($buildingedit)? $buildingedit->contract_no: '' }}" placeholder="Enter contract Number">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="contract_exp" >
                                <label for="owner_name" class="form-label" >Usufruct Contract Expiry Date</label>
                                <div class="input-group" id="contract">
                                    <input type="date" class="form-control" name="contract_exp" value="{{isset($buildingedit)? $buildingedit->contract_exp: '' }}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="pincode" class="form-label">Pin No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{isset($buildingedit)? $buildingedit->pincode: '' }}" placeholder="Pincode">
                                </div>
                            </div>

                            <div class="col-xxl-3 col-md-12">
                                <label for="building_desc" class="form-label">Building Description</label>
                                <textarea class="form-control" name="building_desc">
                                {{isset($buildingedit)? $buildingedit->building_desc: '' }}
                                    </textarea>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Owner Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{isset($buildingedit)? $buildingedit->owner_name: '' }}" placeholder="Owner Name">
                                </div>
                            </div>
                                                    
                            <div class="col-xxl-3 col-md-3">
                                <label for="lessor_name" class="form-label">Lessor's Name</label>
                                <div class="input-group">
                                    <input type="name" class="form-control" id="lessor_name" name="lessor_name" value="{{isset($buildingedit)? $buildingedit->lessor_name: '' }}" placeholder="Lessor's Name">
                                </div>
                            </div>
                            
                        </div>
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Building Address</h4>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Country</label>

                                <select class="select2 form-select" id="{{isset($buildingedit)? '': 'country' }}" name='country'>

                                    @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->country }}" selected hidden>{{ $buildingedit->nationality->name}}</option>
                                    
                                    @else
                                    <option value="">--Select Country--</option>
                                    @foreach($countryDetail as $cd)
                                    <option value="{{ $cd->id}}">{{ $cd->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">City</label>

                                <select class="select2 form-select" id="{{isset($buildingedit)? '': 'city' }}" name='city'>
                                    @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->city }}" selected hidden>{{ $buildingedit->cityDetails->name}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4 mb-1">
                                <label class="form-label" for="flag">Zone Name</label>

                                <select class="select2 form-select" id="{{isset($buildingedit)? '': 'zone' }}" name='zone_name'>
                                    @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->area }}" selected hidden>{{ $buildingedit->area}}</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                          
                           
                            <div class="col-xxl-3 col-md-4">
                                <label for="city" class="form-label">Building No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_no" name="building_no" value="{{isset($buildingedit)? $buildingedit->building_no: '' }}" placeholder="Enter Building No">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="city" class="form-label">Street No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="street_no" name="street_no" value="{{isset($buildingedit)? $buildingedit->street_no: '' }}" placeholder="Enter Street No">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="area" class="form-label">Zone No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="zone_no" name="zone_no" value="{{isset($buildingedit)? $buildingedit->zone_no: '' }}" placeholder="Enter Zone No">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row gy-4 mb-3">
                           
                            
                            <div class="col-xxl-3 col-md-12">
                                <label for="building_location" class="form-label">Building Location Link</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_location" name="building_location" value="{{isset($buildingedit)? $buildingedit->location: '' }}" placeholder="Google Map Link">
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Building Appraisal</h4>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                        <div class="col-xxl-3 col-md-4">
                                <label for="name" class="form-label">Construction Date</label>
                                <div class="input-group">
                                    <input id="dateInput" type="date" class="form-control" id="building_cdate" name="construction_date" value="{{isset($buildingedit)? $buildingedit->construction_date: '' }}" placeholder="12-12-2022">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="building_location" class="form-label">Building Age</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_age" name="building_age" value="{{isset($buildingedit)? $buildingedit->building_age: '' }}" placeholder="Building Age" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="space" class="form-label">Building Status</label>
                                <select class="form-control" id="building_status" name="building_status">
                                @if (isset($buildingedit))
                                    <option value="{{ $buildingedit->building_status }}" selected>{{ $buildingedit->building_status }}</option>
                                    @else
                                    <option value="">--Select Status--</option>
                                    <option value="NEW">New</option>
                                    <option value="OLD">Old</option>
                                    <option value="RENOVATED">Renovated</option>
                                    <option value="DEMOLISHED">Demolished</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="space" class="form-label">Built Up Area <sup class="text-danger">(In Sq.Meter)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="space" name="built_up_area" value="{{isset($buildingedit)? $buildingedit->space: '' }}" placeholder="Built Up Area (Sq.Meter)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="incharge_name" class="form-label">Cost Building <sup class="text-danger">(per square meter)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="cost_building" name="cost_building" value="{{isset($buildingedit)? $buildingedit->cost_building: '' }}" placeholder="Enter Building Cost(Sq.Meter)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="country" class="form-label">Total Building Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_value" name="building_value" value="{{isset($buildingedit)? $buildingedit->building_value: '' }}" placeholder="Enter Building Value" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Land Area <sup class="text-danger">(in square meter)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="landsize_meter" name="landsize_meter" value="{{isset($buildingedit)? $buildingedit->landsize_meter: '' }}" placeholder="Land Size(Sq.Meter)">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="incharge_name" class="form-label">Land Area <sup class="text-danger">(in square foot)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="land_size" name="land_size_foot" value="{{isset($buildingedit)? $buildingedit->land_size_foot: '' }}" placeholder="Enter Land Size(Sq.Foot)" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="country" class="form-label">Price per square foot</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="price_foot" name="price_foot" value="{{isset($buildingedit)? $buildingedit->price_foot: '' }}" placeholder="Enter Price per square foot">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="state" class="form-label">Total Land Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="total_land" name="total_land" value="{{isset($buildingedit)? $buildingedit->total_land: '' }}" placeholder="Enter Total Land" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="state" class="form-label">Monthly Income</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="{{isset($buildingedit)? $buildingedit->monthly_income: '' }}" placeholder="Enter Monthly Income">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Annual Income</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="annual_income" name="annual_income" value="{{isset($buildingedit)? $buildingedit->annual_income: '' }}" placeholder="Enter Annual Income" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="state" class="form-label">Payback Period</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="payback" name="payback" value="{{isset($buildingedit)? $buildingedit->payback: '' }}" placeholder="Enter Payback " readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Total Net Property</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="property_vlaue" name="property_vlaue" value="{{isset($buildingedit)? $buildingedit->property_vlaue: '' }}" placeholder="Enter Total Property Value" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Appraise Property Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="appraise_date" name="appraise_date" value="{{isset($buildingedit)? $buildingedit->appraise_date: '' }}" placeholder="12-12-2022">
                                </div>
                            </div>
                                                   
                                                      
                        </div>
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Person in-charge</h4>
                            </div>
                        </div>

                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-3">
                                <label for="incharge_name" class="form-label">Person In-Charge</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="incharge_name" name="incharge_name" value="{{isset($buildingedit)? $buildingedit->person_incharge: '' }}" placeholder="Person In-Charge">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="country" class="form-label">Job</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="country" name="person_job" value="{{isset($buildingedit)? $buildingedit->person_job: '' }}" placeholder="Enter job">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="state" class="form-label">Mobile No.</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="mobile" name="person_mobile" value="{{isset($buildingedit)? $buildingedit->person_mobile: '' }}" placeholder="Enter mobile">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Building Recieve Date</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="building_rdate" name="building_receive_date" value="{{isset($buildingedit)? $buildingedit->building_receive_date: '' }}" placeholder="12-12-2022">
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
                                    <input type="file" class="form-control"  id="building_file" name="building_file[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="remark">
                                {{isset($buildingedit)? $buildingedit->remark: '' }}
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
            $('#title').show();
            $('#contract_exp').hide();

            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'title_deed') {
                    $('#contract').hide();
                    $('#title').show();
                    $('#contract_exp').hide();



                } else if (optionValue == 'Usufruct contract') {
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
        $("#country").change(function() {
            $("#city").val('');
        $("#zone").innerHTML = '';
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetchCountry') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#city").html(p);
                        $("#zone").val('');

                    }
                });
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
<script>
$('#dateInput').change(function(){
    var date = new Date($(this).val());
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();
   
let currentDate = new Date();
let cDay = currentDate.getDate()
let cMonth = currentDate.getMonth() + 1
let cYear = currentDate.getFullYear()
var a =cDay-day;
var b=cMonth-month;
var c= cYear-year;
if(year <= cYear){
    $('#building_age').val(c+ " Years-"+b+ " Months-"+a +" Days" );

}
else{
    $('#building_age').val("Buidings is Under constractions");

}
});
</script>
<!-- monthly income to annunal  -->
<script>
    $(document).ready(function() {
      
    });
</script>
<!-- monthly income to annunal  -->
<script>
    $(document).ready(function() {
        $("#monthly_income").focusout(function(){
       var a=$(this).val();
       $('#annual_income').val(a*12);
      var b= $('#annual_income').val();
      var c= $('#property_vlaue').val();
      
      $('#payback').val((c/b).toFixed(1)+"Years");

       });
    });
</script>

<!-- Land meter to square foot  -->
<script>
    $(document).ready(function() {
       
    });
</script>
<!-- Net Property Value  -->
<script>
    $(document).ready(function() {
       $("#space").focusout(function(){
        var a= $(this).val();
        $("#cost_building").change(function(){
        var b= $(this).val();
        $('#building_value').val(parseInt(a)*parseInt(b));
        var sum=parseInt(a)*parseInt(b);
        $("#landsize_meter").focusout(function(){
       var e=$(this).val();
       $('#land_size').val(e*10764);
       $("#price_foot").focusout(function(){
       var f=$(this).val();         
      $('#total_land').val((e*10764)*f);
        $('#property_vlaue').val(((e*10764)*f)+ sum);
       });
       });
       
        });
        });
        
    });
</script>

@endsection