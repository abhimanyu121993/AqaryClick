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
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Cheque File</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{route('admin.chequeStore')}}" method="POST" enctype="multipart/form-data">
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
                            <div class="col-xxl-12 col-md-12">
                                <label for="space" class="form-label">Tenant Name</label>
                                <select class="select2  form-select js-example-basic-single" id="tenant_name" name="tenant_name">
                                    <option value="" selected hidden>--Select Tenant Name--</option>
                                    @foreach ($tenantcode as $code)
                                    <option value="{{ $code->id }}">
                                        {{ $code->tenant_english_name ?? '' }}/{{ $code->unit_no ?? '' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field_wrapper mt-2 row">
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Cheque No.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cheque_no" name="cheque_no[]" placeholder="Cheque number">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-md-3">
                                    <label for="name" class="form-label">Cheque Start Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="cheque_start_date" name="cheque_start_date[]" placeholder="Cheque start date">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-md-3">
                                    <label for="name" class="form-label">Cheque Expaire Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="cheque_expaire_date" name="cheque_expaire_date[]" placeholder="Cheque expaire date">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Cheque Status</label>
                                    <select class="form-control select2 form-select" name="cheque_status[]" id="cheque_status">
                                        <option value="" selected hidden>Select Cheque</option>
                                        <option value="Valid">Valid</option>
                                        <option value="Expired">Expired</option>
                                        <option value="Bounced">Bounced</option>
                                        <option value="Postponed">Postponed</option>
                                        <option value="Cleared">Cleared</option>
                                        <option value="Security Cheque">Security Cheque</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1 mt-3">
                                        <a href="javascript:void(0);" id="btn-btn" class="add_button addButton btn btn-success" title="Add field">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <button class="btn btn-primary" id="btn-btn" type="submit">Submit</button>
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
                    <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline"
                        style="width: 100%;" aria-describedby="ajax-datatables_info" >
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Tenant Name</th>
                                <th scope="col">Cheque No.</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Expaire Date</th>
                                <th scope="col">Cheque Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenantcode as $cheque)
                                @foreach ($cheque->cheques as $ch)
                                   <tr>
                                    <td>{{ $cheque->tenant_name ?? '' }}</td>
                                    <td>{{ $cheque->cheque_no ?? '' }}</td>
                                    <td>{{ $cheque->cheque_start_date ?? '' }}</td>
                                    <td>{{ $cheque->cheque_expaire_date ?? '' }}</td>
                                    <td>{{ $cheque->cheque_status ?? '' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($ch->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <!-- <li><a class="dropdown-item" href="{{ route('admin.tenant-files.edit', $bid) }}">Edit</a></li> -->
                                                <li><a class="dropdown-item" id="pop" href="#"
                                                        onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                                </li>

                                                <form id="delete-form-{{ $bid }}"
                                                    action="#" method="post"
                                                    style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
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
                                    <div class="col-xxl-3 col-md-3">\
                                        <div class="input-group">\
                                            <input type="text" class="form-control" id="cheque_no" name="cheque_no[]" placeholder="Cheque number">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-2 col-md-3">\
                                        <div class="input-group">\
                                            <input type="date" class="form-control" id="cheque_start_date" name="cheque_start_date[]" placeholder="Cheque start date">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-2 col-md-3">\
                                        <div class="input-group">\
                                            <input type="date" class="form-control" id="cheque_expaire_date" name="cheque_expaire_date[]" placeholder="Cheque expaire date">\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-3 col-md-3">\
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
                                    <div class="col-xxl-12 col-md-2 mt-2">\
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

@endsection