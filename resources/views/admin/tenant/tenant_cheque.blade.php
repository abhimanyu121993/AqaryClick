@extends('admin.includes.layout', ['breadcrumb_title' => 'Cheque Management'])
@section('title', 'Cheque')
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
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">{{isset($chequeEdit)?'Cheque Update':'Cheque Register'}}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{isset($chequeEdit)? route('admin.chequeUpdate',$chequeEdit->id):route('admin.chequeStore')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-xxl-6 col-md-6">
                                <label for="space" class="form-label">Tenant Name</label>
                                <select class="select2  form-select js-example-basic-single" id="tenant_name" name="tenant_name">
                                    <option value="" selected hidden>--Select Tenant Name--</option>
                                    @foreach ($tenantcode as $code)
                                    <option value="{{ $code->id }}" {{isset($chequeEdit)?($chequeEdit->tenant_id == $code->id ? 'selected':''):''}}>
                                        {{ $code->tenant_english_name ?? '' }} {{ $code->tenant_primary_mobile?? '' }}
                                         {{$code->cr_document ??''}} {{$code->qid_document ??''}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <label for="space" class="form-label">Unit No.</label>
                                <select class="select2 form-select js-example-disabled" id="unit_no" name='unit_no' required>
                                    <option value="{{isset($chequeEdit)? $chequeEdit->unit_no:old('unit_no')}}" selected hidden>{{isset($chequeEdit)? $chequeEdit->unit->unit_no:old('unit_no','--Select Unit No--')}}</option>
                                </select>
                            </div>

                            <div class="field_wrapper mt-2 row">
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Cheque No.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cheque_no" name="cheque_no[]" placeholder="Cheque number" value="{{$chequeEdit->cheque_no ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Cheque Amount.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Cheque number" value="{{$chequeEdit->amount ?? ''}}">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-md-4">
                                    <label for="name" class="form-label">Deposit Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="cheque_start_date" name="cheque_start_date[]" placeholder="Cheque start date" value="{{$chequeEdit->cheque_start_date ?? ''}}">
                                    </div>
                                </div>
                                {{-- <div class="col-xxl-2 col-md-4">
                                    <label for="name" class="form-label">To Rent Period Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="cheque_expaire_date" name="cheque_expaire_date[]" placeholder="Cheque expaire date" value="{{$chequeEdit->cheque_expaire_date ?? ''}}">
                                    </div>
                                </div> --}}
                                <div class="col-xxl-3 col-md-4">
                                    <label for="name" class="form-label">Cheque status</label>
                                    <select class="form-control select2 form-select" name="cheque_status[]" id="cheque_status">
                                        <option value="" selected hidden>Select Cheque</option>
                                        <option value="Valid" {{isset($chequeEdit)?($chequeEdit->cheque_status =='Valid' ? 'selected':''):''}}>Valid</option>
                                        <option value="Expired" {{isset($chequeEdit)?($chequeEdit->cheque_status =='Expired' ? 'selected':''):''}}>Expired</option>
                                        <option value="Bounced" {{isset($chequeEdit)?($chequeEdit->cheque_status =='Bounced' ? 'selected':''):''}}>Bounced</option>
                                        <option value="Postponed" {{isset($chequeEdit)?($chequeEdit->cheque_status =='Postponed' ? 'selected':''):''}}>Postponed</option>
                                        <option value="Cleared" {{isset($chequeEdit)?($chequeEdit->cheque_status =='Cleared' ? 'selected':''):''}}>Cleared</option>
                                        <option value="Security Cheque" {{isset($chequeEdit)?($chequeEdit->cheque_status =='Security Cheque' ? 'selected':''):''}}>Security Cheque</option>
                                    </select>
                                </div>
                                <div class="col-xxl-2 col-md-4">
                                    <label for="name" class="form-label">Remarks</label>
                                    <div class="input-group">
                                        <textarea  cols="40" rows="2" id="remark" name="remark[]">{{$chequeEdit->remark ?? ''}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="row {{ isset($chequeEdit)?'d-none':'' }}">
                                    <div class="col-sm-1 mt-3">
                                        <a href="javascript:void(0);" id="btn-btn" class="add_button addButton btn btn-success" title="Add field">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <button class="btn btn-primary" id="btn-btn" type="submit">{{isset($chequeEdit)?'Update':'Submit'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Files</h4>
            </div><!-- end card header -->
            <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <!-- <th scope="col">Tenant Name</th> -->
                            <th scope="col">Cheque No.</th>
                            <th scope="col">Deposit Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Cheque Status</th>
                            <th scope="col">Remark</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                          @php
                        $id=1;
                        @endphp
                        @foreach ($tenantcode as $cheque)
                      
                        @foreach ($cheque->cheques as $ch)
                        <tr>
                            <td>{{$id++}}</td>
                            <!-- <td>{{ $cheque->tenant_english_name ?? '' }}/{{ $cheque->unit->unit_no ?? '' }}</td> -->
                            <td>{{ $ch->cheque_no ?? '' }}</td>
                            <td>{{ \Carbon\Carbon::parse($ch->cheque_start_date ?? '' )->format('d/m/Y') }}</td>
                            <td>{{$ch->amount ?? ''}}</td>
                            <td>{{ $ch->cheque_status ?? '' }}</td>
                            <td>{{ $ch->remark ?? '' }}</td>
                            @can('Cheque')
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php
                                    $bid = Crypt::encrypt($ch->id);
                                    @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @can('Cheque_edit')
                                        <li><a class="dropdown-item" id="pop" href="{{route('admin.chequeEdit',$bid)}}">Edit</a></li>
                                        @endcan
                                        @can('Cheque_delete')
                                        <li><a class="dropdown-item" id="pop" href="{{route('admin.chequeDelete',$bid)}}">Delete</a></li>
                                        @endcan
                                    </ul>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script-area')
<script>
    var addButton1 = $('.addButton');
    var wrapper1 = $('.field_wrapper');
    var fieldHTML1 = '<div class="field_wrapper mt-2 row">\
                                    <div class="col-xxl-3 col-md-4">\
                                        <label>Cheque No.</label>\
                                        <div class="input-group">\
                                            <input type="text" class="form-control" id="cheque_no" name="cheque_no[]" placeholder="Cheque number">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-4">\
                                        <label>Cheque Amount.</label>\
                                        <div class="input-group">\
                                            <input type="text" class="form-control" id="amount" name="amount[]" placeholder="Cheque number" value="">\
                                        </div>\
                                   </div>\
                                    <div class="col-xxl-2 col-md-4">\
                                        <label>Deposit Date</label>\
                                        <div class="input-group">\
                                            <input type="date" class="form-control" id="cheque_start_date" name="cheque_start_date[]" placeholder="Cheque start date">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-4 mt-2">\
                                        <label>Cheque status</label>\
                                        <select class="form-control select2 form-select" name="cheque_status[]" id="cheque_status">\
                                            <option value="" selected hidden>Select Cheque</option>\
                                            <option value="Valid">Valid</option>\
                                            <option value="Expired">Expired</option>\
                                            <option value="Bounced">Bounced</option>\
                                            <option value="Postponed">Postponed</option>\
                                            <option value="Cleared">Cleared</option>\
                                            <option value="Security Cheque">Security Cheque</option>\
                                        </select>\
                                    </div>\
                                    <div class="col-xxl-2 col-md-4 mt-2">\
                                        <label>Remarks</label>\
                                        <div class="input-group">\
                                            <textarea  cols="40" rows="2" id="remark" name="remark[]" placeholder="Remark"></textarea>\
                                        </div>\
                                    </div>\
                                    <br>\
                                    <div class="col-xxl-2 col-md-2" style="margin-top:32px;">\
                                        <label></label>\
                                       <div class="input-group">\
                                          <a href="javascript:new_link()" id="btn-btn" class="btn btn-success fw-medium removeButton">-</a>\
                                        </div>\
                                    </div>\
                                </div>\
                        </div>';

    //Once add button is clicked
    $(addButton1).click(function() {
        $(wrapper1).append(fieldHTML1); //Add field html

    });


    //Once remove button is clicked
    $(wrapper1).on('click', '.removeButton', function(e) {
        e.preventDefault();
        $(this).closest('.field_wrapper').remove(); //Remove field html

    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('change',"#tenant_name", function() {
            $(this).find("option:selected").each(function() {

                var optionValue = $(this).attr("value");
                console.log(optionValue);
                var newurl = "{{ url('/admin/fetch-units-details') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    beforeSend: function() {
                        $('#unit_no').html('<option selected hidden>Fetching.......</option>');
                    },
                    success: function(p) {
                        console.log(p);
                        $("#unit_no").html(p.html);

                    }
                });
            });
        }).change();
    });
</script>

@endsection