@extends('admin.includes.layout', ['breadcrumb_title' => isset($editTenant)? 'Update Tenant':'Register Tenant'])
@section('title', isset($editTenant)? 'Update Tenant':'Register Tenant')
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
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1"> Tenant Detail</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <form action="{{ isset($editTenant)? route('admin.tenant.update',$editTenant->id):route('admin.tenant.store') }}" method="POST" enctype="multipart/form-data">
                    {{-- @if (isset($customer))
                        @method('patch')
                    @endif --}}
                    @csrf
                    @if (isset($editTenant))
                    @method('PATCH')
                    @endif
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
                        <div class="col-xxl-3 col-md-3">
                            <label for="space" class="form-label">Tenant Type</label>
                            <select class="form-control" id="tenant_type" name="tenant_type">
                                <option value="{{isset($editTenant)? $editTenant->tenant_type:''}}" selected hidden>
                                    {{isset($editTenant)? ($editTenant->tenant_type =='TC'?'Company':''):'--Select Tenant Type--'}}
                                    {{isset($editTenant)? ($editTenant->tenant_type =='TP'?'Personal':''):''}}
                                    {{isset($editTenant)? ($editTenant->tenant_type =='TG'?'Government':''):''}}
                                </option>
                                <option value="TP">Personal</option>
                                <option value="TC">Company</option>
                                <option value="TG">Government</option>

                            </select>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="name" class="form-label">File No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="{{isset($editTenant)? '':'file_no'}}" name="file_no" value="{{$editTenant->file_no ?? ''}}" placeholder="Enter File No">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="name" class="form-label">Tenant Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tenant_code" name="tenant_code" placeholder="Enter Tenant Code" value="{{$editTenant->tenant_code ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Tenant Name <sup class="text-danger">(English)</sup> </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_english_name" placeholder="Enter Tenant Name (English)" value="{{$editTenant->tenant_english_name ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Tenant Name <sup class="text-danger">(Arabic)</sup></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_arabic_name" placeholder="Enter Tenant Name (Arabic)" value="{{$editTenant->tenant_arabic_name ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="space" class="form-label">Document Type</label>
                            <select class="form-control" id="tenant_document_type" name="tenant_document">
                                <option value="{{isset($editTenant)? $editTenant->tenant_document:''}}" selected hidden>{{isset($editTenant)? $editTenant->tenant_document:'--Select Document Type--'}}</option>
                                <option value="QID" id="QID">QID</option>
                                <option value="CR & Est_Card" id="CR_Est_Card">CR & Est Card</option>
                                <option value="Passport" id="PASSPORT">Passport</option>
                                <option value="Govt_Housing_No" id="Government_Housing_Number">Government Housing No</option>
                            </select>
                        </div>

                        <div class="col-xxl-3 col-md-3 mb-2" id="qid">
                            <label for="country" class="form-label">QID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="qid_document" placeholder="QID Document Number" value="{{$editTenant->qid_document ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                            <label for="state" class="form-label">CR No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cr_document" placeholder="Commercial Reference No" value="{{$editTenant->cr_document ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3 mb-2" id="passport">
                            <label for="country" class="form-label">Passport</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="passport" placeholder="Passport Document" value="{{$editTenant->passport ?? ''}}">
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-3 mb-2" id="established_card_no">
                            <label for="country" class="form-label">Establishment Card No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="established_card_no" placeholder="Establishment Card No." value="{{$editTenant->established_card_no ?? ''}}">
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-3 mb-2" id="government_housing_number">
                            <label for="country" class="form-label">Government Housing No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="government_housing_no" placeholder="Government Housing Number" value="{{$editTenant->government_housing_no ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Primary Mobile No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_primary_mobile" placeholder="Tenant Priamry Mobile No" value="{{$editTenant->tenant_primary_mobile ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Secondary Mobile No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_secondary_mobile" placeholder="Tenant Secondary Mobile No" value="{{$editTenant->tenant_secondary_mobile ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="incharge_name" class="form-label">Email </label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$editTenant->email ?? ''}}">
                            </div>
                        </div>

                        <div class=" col-xxl-3 col-md-3">
                            <label for="incharge_name" class="form-label">Alternative Email </label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="alternate_email" placeholder="Enter Alternate Email" value="{{$editTenant->alternate_email ?? ''}}">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="incharge_name" class="form-label">Authorized Person </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="authorized_person" placeholder="Authorized Person" value="{{$editTenant->authorized_person ?? ''}}">
                            </div>
                        </div><div class=" col-xxl-3 col-md-3">
                            <label for="incharge_name" class="form-label">Authorized Person QID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="authorized_person_qid" placeholder="Authorized Person QID" value="{{$editTenant->authorized_person_qid ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3" id="cname">
                            <label for="country" class="form-label">Post Office Box</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="post_office" placeholder="Post Office" value="{{$editTenant->post_office ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3 mb-2">
                            <label for="space" class="form-label">Tenant Nationality</label>
                            <select class="form-select js-example-basic-single" id="customer" name="tenant_nationality">
                                <option value=" {{isset($editTenant)? $editTenant->tenant_nationality:''}} " selected hidden>
                                    @if (isset($editTenant))
                                    @if ($editTenant->tenant_nationality =='')
                                    {{$editTenant->tenant_nationality ?? ''}}
                                    @else
                                    {{$editTenant->tenantNationality->name ?? ''}}
                                    @endif
                                    @else
                                    --Select Tenant Nationality--
                                    @endif
                                </option>
                                @foreach ($nation as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xxl-3 col-md-12">
                            <label for="remark" class="form-label">Address</label>
                            <textarea class="form-control" name="unit_address">
                            {{$editTenant->unit_address ?? ''}}
                            </textarea>
                        </div>

                        <div class="col-xxl-3 col-md-3 mb-2">
                            <label class="form-label" for="flag">Building Name</label>

                            <select class="form-select js-example-basic-single" id="building_name" name='building_name'>
                                <option value="{{isset($editTenant)? $editTenant->building_name:''}}" selected hidden>

                                    @if (isset($editTenant))
                                    @if ($editTenant->building_name =='')
                                    {{$editTenant->building_name ?? ''}}
                                    @else
                                    {{$editTenant->buildingDetails->name ?? ''}}
                                    @endif
                                    @else
                                    --Select Builidng Name--
                                    @endif
                                </option>
                                @foreach ($building as $build)
                                <option value="{{ $build->id }}">{{ $build->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3 mb-2">
                            <label class="form-label" for="flag">Unit No</label>
                            <select class="select2 form-select" id="unit_no" name='unit_no' required>
                                <option value="{{isset($editTenant)? $editTenant->unit_no:''}}" selected hidden>{{isset($editTenant)? $editTenant->unit_no:'--Select Unit No--'}}</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="space" class="form-label">Unit Type</label>
                            <div class="input-group">
                                <select class="form-select js-example-basic-single" id="unit_type" name="unit_type">
                                    <option value="{{isset($editTenant)? $editTenant->unit_type:''}}">

                                        @if (isset($editTenant))
                                        @if ($editTenant->unit_type =='')
                                        {{$editTenant->unit_type ?? ''}}
                                        @else
                                        {{$editTenant->unittypeinfo->name ?? ''}}
                                        @endif
                                        @else
                                        --Select Unit--
                                        @endif
                                    </option>
                                    @foreach ($unitType as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-xxl-3 col-md-3">
                            <label for="country" class="form-label">Total unit</label>
                            <div class="input-group">
                                <input type="text" class="form-control"  id="total_unit" name="total_unit"
                                    placeholder=" Total Unit " readonly>
                            </div>
                        </div> -->
                        <div class="col-xxl-3 col-md-3">
                            <label for="space" class="form-label">Status</label>
                            <select class="form-control" id="process" name="status">
                                <option value="{{isset($editTenant)? $editTenant->status:''}}" selected hidden>{{isset($editTenant)? $editTenant->status:'--Select Status--'}}</option>
                                <option value="New Tenant">New Tenant</option>
                                <option value="Old Tenant">Old Tenant</option>
                                <option value="Related Party">Related Party</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="space" class="form-label">Rental Period</label>
                            <select class="form-control" id="rental_period" name="rental_period">
                                <option value="{{isset($editTenant)? $editTenant->rental_period:''}}" selected hidden>{{isset($editTenant)? $editTenant->rental_period:'--Select Type--'}}</option>
                                <option value="Days">Days</option>
                                <option value="Months">Months</option>
                                <option value="Years">Years</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3" id="rental_time">
                            <label for="country" class="form-label" id="change_rental_time">Days</label>
                            <div class="input-group">
                                <input type="text" id="change_placeholder" class="form-control" name="rental_time" placeholder=" Enter No of Days " value="{{$editTenant->rental_time ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="space" class="form-label">Payment Method</label>
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="{{isset($editTenant)? $editTenant->payment_method:''}}" selected hidden> {{isset($editTenant)? $editTenant->payment_method:'--Select Payment Method--'}}</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheques">Cheques</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3" id="account_no">
                            <label for="country" class="form-label">Account Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="account_no" placeholder=" Account Number " value="{{$editTenant->account_no ?? ''}}">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3" id="has_cheque">
                            <label for="country" class="form-label">Receipt Of Cheques</label><br>
                            <div class="form-check-inline ">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="yes" name="payment_receipt" {{isset($editTenant)? ($editTenant->payment_receipt == 'yes'? 'checked':''):''}} />Yes
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="no" name="payment_receipt" {{isset($editTenant)? ($editTenant->payment_receipt == 'no'? 'checked':''):''}} />No
                                </label>
                            </div>

                            <!-- test -->
                        </div>
                        <div id="sponser" class="row">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Sponsor</h4>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="city" class="form-label">Sponsor Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sponsor_name" placeholder="sponsor Name" value="{{$editTenant->sponsor_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="city" class="form-label">Sponsor OID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sponsor_oid" placeholder="sponsor OID" value="{{$editTenant->sponsor_oid ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="city" class="form-label">Sponsor Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sponsor_email" placeholder="Sponsor Email" value="{{$editTenant->sponsor_email ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="city" class="form-label">Sponsor Phone</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="sponsor_phone" placeholder="sponsor Phone" value="{{$editTenant->sponsor_phone ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-3">
                                <label for="space" class="form-label">Sponsor Nationality</label>
                                <select class="form-select js-example-basic-single" id="sponser_nationality" name="sponsor_nationality">
                                    <option value="{{isset($editTenant)? $editTenant->sponsor_nationality:''}}" selected hidden>{{isset($editTenant)? ($editTenant->sponsor_nationality == ''? $editTenant->sponsor_nationality:$editTenant->nationality->name):'---Select Sponsor Nationality---'}}</option>
                                    @foreach ($nation as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="attachment_remark">{{$editTenant->attachment_remark ?? ''}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-3">
                            <button class="btn btn-primary" id="btn-btn" type="submit">{{isset($editTenant)? 'Update':'Save'}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script-area')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#qid').hide();
        $('#cr').hide();
        $('#passport').hide();
        $('#established_card_no').hide();
        $('#government_housing_number').hide();
        $('#CR_Est_Card').hide();
        $("#tenant_document_type").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'QID') {
                    $('#qid').show();
                    $('#cr').hide();
                    $('#passport').hide();
                    $('#established_card_no').hide();
                    $('#government_housing_number').hide();
                    $('#CR_Est_Card').hide();
                } else if (optionValue == 'CR & Est_Card') {
                    $('#cr').show();
                    $('#qid').hide();
                    $('#passport').hide();
                    $('#established_card_no').show();
                    $('#government_housing_number').hide();

                } else if (optionValue == 'Passport') {
                    $('#passport').show();
                    $('#qid').hide();
                    $('#cr').hide();
                    $('#established_card_no').hide();
                    $('#government_housing_number').hide();
                 } else if (optionValue == 'Govt_Housing_No') {
                    $('#passport').hide();
                    $('#qid').hide();
                    $('#cr').hide();
                    $('#established_card_no').hide();
                    $('#government_housing_number').show();
                }
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $('#QID').hide();
        $('#PASSPORT').hide();
        $('#CR_Est_Card').hide();
        $('#Established_Card_No').hide();
        $('#Government_Housing_Number').hide();
        $("#tenant_type").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'TP') {
                    $('#QID').show();
                    $('#PASSPORT').show();
                    $('#CR_Est_Card').hide();
                    $('#Established_Card_No').hide();
                    $('#Government_Housing_Number').hide();
                } else if (optionValue == 'TC') {
                    $('#QID').hide();
                    $('#PASSPORT').hide();
                    $('#CR_Est_Card').show();
                    $('#Established_Card_No').show();
                    $('#Government_Housing_Number').hide();
                } else if (optionValue == 'TG') {
                    $('#QID').hide();
                    $('#PASSPORT').hide();
                    $('#CR_Est_Card').hide();
                    $('#Established_Card_No').hide();
                    $('#Government_Housing_Number').show();
                }
                else if (optionValue == 'TG') {
                    $('#QID').hide();
                    $('#PASSPORT').hide();
                    $('#CR_Est_Card').hide();
                    $('#Established_Card_No').hide();
                    $('#Government_Housing_Number').show();
                }

            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#sponser').hide();
        $("#tenant_type").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'TC') {
                    $('#sponser').show();

                } else if (optionValue == 'TP') {
                    $('#sponser').hide();
                }
                var newurl = "{{ url('/admin/fetch-tenant-file-no') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $('#file_no').val(p);
                    }
                });
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $('#account_no').hide();
        $('#has_cheque').hide();
        $("#payment_method").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'Cash') {
                    $('#has_cheque').hide();
                    $('#account_no').hide();

                } else if (optionValue == 'Cheques') {
                    $('#has_cheque').show();
                    $('#account_no').hide();

                } else if (optionValue == 'Transfer Bank') {
                    $('#has_cheque').hide();
                    $('#account_no').show();

                }
            });
        }).change();
    });
</script>
{{-- <script>
        $(document).ready(function() {
            $("#building_name").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetch-building-details') }}/" + optionValue;
$.ajax({
url: newurl,
method: 'get',
beforeSend:function(){
$('#unit_no').html('<option selected hidden>Fetching.......</option>');
},
success: function(p) {
console.log(p);
$('#unit_no').html(p.html);
// $('#total_unit').val(p.total_unit);
}
});
});
}).change();
});
</script> --}}
<script>
    $(document).ready(function() {
        $('#rental_time').hide();
        $("#rental_period").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'Days') {
                    $('#rental_time').show();
                    $('#change_rental_time').text("Days");
                    $('#change_placeholder').attr('placeholder', 'Enter No Of Days');
                } else if (optionValue == 'Months') {
                    $('#rental_time').show();
                    $('#change_rental_time').text("Months");
                    $('#change_placeholder').attr('placeholder', 'Enter No Of Months');

                } else if (optionValue == 'Years') {
                    $('#rental_time').show();
                    $('#change_rental_time').text("Years");
                    $('#change_placeholder').attr('placeholder', 'Enter No Of Years');

                }
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#building_name").change(function() {
            $(this).find("option:selected").each(function() {

                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetchunit') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    beforeSend: function() {
                        $('#unit_no').html('<option selected hidden>Fetching.......</option>');
                    },
                    success: function(p) {
                        $("#unit_no").html(p.html);

                    }
                });
            });
        }).change();
    });
</script>
@endsection
