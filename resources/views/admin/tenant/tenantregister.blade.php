@extends('admin.includes.layout', ['breadcrumb_title' => isset($editTenant)? 'Update Tenant':'Register Tenant'])
@section('title',  isset($editTenant)? 'Update Tenant':'Register Tenant')
@section('main-content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Tenant</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.bulkUploadTenant') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload File</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <a href="{{ asset('assets/excel_format/newtenant_format.csv') }}"
                                        target="_blank">Example format</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"> Tenant Detail</h4>
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
                                        {{isset($editTenant)? ($editTenant->tenant_type =='TC'?'Company':''):'-----Select Tenant Type-----'}}
                                        {{isset($editTenant)? ($editTenant->tenant_type =='TP'?'Personal':''):'-----Select Tenant Type-----'}}
                                        {{isset($editTenant)? ($editTenant->tenant_type =='TG'?'Government':''):'-----Select Tenant Type-----'}}
                                    </option>
                                    <option value="TP">Personal</option>
                                    <option value="TC">Company</option>
                                    <option value="TG">Government</option>

                                </select>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="name" class="form-label">File No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="{{isset($editTenant)? '':'file_no'}}" name="file_no" value="{{$editTenant->file_no ?? ''}}"
                                        placeholder="Enter File No">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tenant_code" name="tenant_code" placeholder="Enter Tenant Code" value="{{$editTenant->tenant_code ?? ''}}">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name <sup
                                        class="text-danger">(English)</sup> </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_english_name"
                                        placeholder="Enter Tenant Name (English)" value="{{$editTenant->tenant_english_name ?? ''}}">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name <sup
                                        class="text-danger">(Arabic)</sup></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_arabic_name"
                                        placeholder="Enter Tenant Name (Arabic)" value="{{$editTenant->tenant_arabic_name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Document Type</label>
                                <select class="form-control" id="tenant_document_type" name="tenant_document">
                                    <option value="{{isset($editTenant)? $editTenant->tenant_document:''}}" selected hidden>{{isset($editTenant)? $editTenant->tenant_document:'-----Select Document Type-----'}}</option>
                                    <option value="QID">QID</option>
                                    <option value="CR">CR</option>
                                    <option value="Passport">Passport</option>
                                </select>
                            </div>

                            <div class="col-xxl-3 col-md-3 mb-2" id="qid">
                                <label for="country" class="form-label">QID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="qid_document"
                                        placeholder="QID Document Number" value="{{$editTenant->qid_document ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                                <label for="state" class="form-label">CR</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cr_document"
                                        placeholder="CR Document" value="{{$editTenant->cr_document ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="passport">
                                <label for="country" class="form-label">Passport</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="passport"
                                        placeholder="Passport Document" value="{{$editTenant->passport ?? ''}}">
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
                                <input type="email" class="form-control" name="alternate_email"
                                    placeholder="Enter Alternate Email" value="{{$editTenant->alternate_email ?? ''}}">
                            </div>
                        </div>
                            <div class="col-xxl-3 col-md-3" id="cname">
                                <label for="country" class="form-label">Post Office Box</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="post_office"
                                        placeholder="Post Office" value="{{$editTenant->post_office ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2">
                                <label for="space" class="form-label">Tenant Nationality</label>
                                <select class="form-select js-example-basic-single" id="customer"
                                    name="tenant_nationality">
                                    <option value=" {{isset($editTenant)? $editTenant->tenant_nationality:''}} " selected hidden > {{isset($editTenant)? $editTenant->tenantNationality->name:'---Select Tenant Nationality---'}}</option>
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

                                    <select class="form-select js-example-basic-single" id="building_name"
                                        name='building_name'>
                                            <option value="{{isset($editTenant)? $editTenant->building_name:''}}" selected hidden >{{isset($editTenant)? $editTenant->buildingDetails->name:'--Select Builidng Name--'}}</option>
                                            @foreach ($building as $build)
                                                <option value="{{ $build->id }}">{{ $build->name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2">
                                <label class="form-label" for="flag">Unit No</label>
                                    <select class="select2 form-select" id="unit_no"
                                        name='unit_no'>
                                            <option value="{{isset($editTenant)? $editTenant->unit_no:''}}" selected hidden>{{isset($editTenant)? $editTenant->unit_no:'--Select Unit No--'}}</option>
                                    </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Unit Type</label>
                                <div class="input-group">
                                    <select class="form-select js-example-basic-single" id="unit_type" name="unit_type">
                                        <option value="{{isset($editTenant)? $editTenant->unit_type:''}}">{{isset($editTenant)? $editTenant->unittypeinfo->name:'--Select Unit--'}}</option>
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
                                    <option value="{{isset($editTenant)? $editTenant->status:''}}" selected hidden>{{isset($editTenant)? $editTenant->status:'-----Select Status-----'}}</option>
                                    <option value="New Tenant">New Tenant</option>
                                    <option value="Old Tenant">Old Tenant</option>
                                    <option value="Related Party">Related Party</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Rental Period</label>
                                <select class="form-control" id="rental_period" name="rental_period">
                                    <option value="{{isset($editTenant)? $editTenant->rental_period:''}}" selected hidden>{{isset($editTenant)? $editTenant->rental_period:'-----Select Type-----'}}</option>
                                    <option value="Days">Days</option>
                                    <option value="Months">Months</option>
                                    <option value="Years">Years</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="rental_time">
                                <label for="country" class="form-label" id="change_rental_time">Days</label>
                                <div class="input-group">
                                    <input type="text" id="change_placeholder" class="form-control"
                                        name="rental_time" placeholder=" Enter No of Days " value="{{$editTenant->rental_time ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Payment Method</label>
                                <select class="form-control" id="payment_method" name="payment_method">
                                    <option value="{{isset($editTenant)? $editTenant->payment_method:''}}" selected hidden> {{isset($editTenant)? $editTenant->payment_method:'-----Select Payment Method-----'}}</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheques">Cheques</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="account_no">
                                <label for="country" class="form-label">Account Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="account_no"
                                        placeholder=" Account Number " value="{{$editTenant->account_no ?? ''}}">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="has_cheque">
                                <label for="country" class="form-label">Receipt Of Cheques</label><br>
                                <div class="form-check-inline ">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="yes"
                                            name="payment_receipt" {{isset($editTenant)? ($editTenant->payment_receipt == 'yes'? 'checked':''):''}}/>Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="no"
                                            name="payment_receipt" {{isset($editTenant)? ($editTenant->payment_receipt == 'no'? 'checked':''):''}} />No
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
                                        <input type="text" class="form-control" name="sponsor_name"
                                            placeholder="sponsor Name" value="{{$editTenant->sponsor_name ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="city" class="form-label">Sponsor OID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="sponsor_oid"
                                            placeholder="sponsor OID" value="{{$editTenant->sponsor_oid ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="city" class="form-label">Sponsor Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="sponsor_email"
                                            placeholder="Sponsor Email" value="{{$editTenant->sponsor_email ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="city" class="form-label">Sponsor Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="sponsor_phone"
                                            placeholder="sponsor Phone" value="{{$editTenant->sponsor_phone ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3 mb-3">
                                    <label for="space" class="form-label">Sponsor Nationality</label>
                                    <select class="form-select js-example-basic-single" id="sponser_nationality"
                                        name="sponsor_nationality">
                                        <option value="{{isset($editTenant)? $editTenant->sponsor_nationality:''}}" selected hidden>{{isset($editTenant)? $editTenant->nationality->name:'---Select Sponsor Nationality---'}}</option>
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
                                <button class="btn btn-primary" type="submit">{{isset($editTenant)? 'Update':'Save'}}</button>
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
            $("#tenant_document_type").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue == 'QID') {
                        $('#qid').show();
                        $('#cr').hide();
                        $('#passport').hide();

                    } else if (optionValue == 'CR') {
                        $('#cr').show();
                        $('#qid').hide();
                        $('#passport').hide();

                    } else if (optionValue == 'Passport') {
                        $('#passport').show();
                        $('#qid').hide();
                        $('#cr').hide();

                    }
                });
            }).change();
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
                    beforeSend:function(){
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
