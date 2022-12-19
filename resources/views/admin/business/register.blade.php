@extends('admin.includes.layout', ['breadcrumb_title' => 'Business Details'])
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
@section('title', 'Business Details')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">
                        {{ isset($business) ? 'Update Business Details' : 'Business Details' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('admin.business.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- @if (isset($customer))
                            @method('patch')
                        @endif --}}
                        @csrf


                        <div class="row gy-4 mb-3" id="cmpname">

                            <div class="col-md-3">
                                <label for="space" class="form-label">Customer Type</label>
                                <select class="form-control" name="customer_type">
                                    @if (isset($business))
                                        <option value="{{ $business->customer_type }}" selected>
                                            {{ $business->customer_type }}</option>
                                    @else
                                        <option value="" selected hidden>--Select Customer--</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Company">Company</option>
                                    @endif
                                </select>

                            </div>
                            <div class="col-md-3">
                                <label for="space" class="form-label">Business Type</label>
                                <select class="form-control" id="customer" name="business_type">
                                    @if (isset($business))
                                        <option value="{{ $business->business_type }}" selected>
                                            {{ $business->business_type }}</option>
                                    @else
                                        <option value="" selected hidden>-----Select Business-----</option>
                                        <option value="Product">Product</option>
                                        <option value="Service">Service</option>
                                        <option value="Product-service">Both</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-md-3" id="cname">
                                <label for="country" class="form-label">Business Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ isset($business) ? $business->business_name : '' }}" name="business_name"
                                        placeholder="Enter Business Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="city" class="form-label">CR Reg. No.</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cr_reg_no"
                                        value="{{ isset($business) ? $business->cr_no : '' }}"
                                        placeholder="Enter CR Reg. Number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="remark" class="form-label">Address</label>
                                <textarea class="form-control" name="address">{{ isset($business) ? $business->address : '' }}
                                    </textarea>
                            </div>
                            <div class=" col-md-3">
                                <label for="incharge_name" class="form-label"> Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control"
                                        value="{{ isset($business) ? $business->email : '' }}" name="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <label for="incharge_name" class="form-label">Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ isset($business) ? $business->phone : '' }}" name="phone"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <label for="incharge_name" class="form-label">Post Box </label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ isset($business) ? $business->post_box : '' }}" name="post_box"
                                        placeholder="Enter Post Box No">
                                </div>
                            </div>
                            <div class="col-md-3" id="authp">
                                <label for="country" class="form-label">Authorized Person</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ isset($business) ? $business->authorized_person : '' }}"
                                        name="authorized_person" placeholder="Enter Authorized Person Name">
                                </div>
                            </div>
                            <div class="col-md-3" id="cmplog">
                                <label for="state" class="form-label">Image Logo</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="company_logo"
                                        placeholder="Company Logo">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="space" class="form-label">Company Activity</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ isset($business) ? $business->company_activity : '' }}"
                                        name="company_activity" placeholder="Enter Activity">
                                </div>
                            </div>
                            <div class="card" id="header1">
                                <div class="card-header align-items-center d-flex" id="card-header">
                                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Document Detail</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="card-body field_wrapper4">
                                    <div class="row clone4">
                                        <div class="col-sm-3">
                                            <label for="" class="form-label">Document Name</label>
                                            <input type="text" class="form-control" name="document_name[]"
                                                placeholder="Enter Document Name" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="form-label">Document File</label>
                                            <input type="file" class="form-control" name="docfile[]" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="form-label">Document Expiry</label>
                                            <input type="date" class="form-control" name="document_exp_date[]">
                                        </div>

                                        <div class="col-sm-1">
                                            <br />
                                            <a href="javascript:void(0);" class="add_button4 btn btn-success"
                                                title="Add field">+</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card" id="header1">
                            <div class="card-header align-items-center d-flex" id="card-header">
                                <h4 class="card-title mb-0 flex-grow-1" id="h1"> Bank Detail</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body field_wrapper5">
                                <div class="row clone5">
                                    <div class="col-md-3 mb-2">
                                        <label for="country" class="form-label">Bank Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="bank_name[]"
                                                placeholder="Enter Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="state" class="form-label">Account Number</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="account_number[]"
                                                placeholder="Enter Account No">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="state" class="form-label">IBAN No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="iban_no[]"
                                                placeholder="Enter IBAN No">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="space" class="form-label">Bank Code</label>
                                        <select class="form-control bank_code" id="bank_code" name="bankcode">
                                            <option value="">-----Select Code-----</option>
                                            <option value="ifsc">Ifsc Code</option>
                                            <option value="swift">Swift Code</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2 swift" id="swift" style="display: none">
                                        <label for="country" class="form-label">Swift Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="swift[]"
                                                placeholder="Enter Swift Code">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2 ifsc" id="ifsc" style="display:none">
                                        <label for="country" class="form-label">IFSC Code</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="ifsc[]"
                                                placeholder="Enter Ifsc Code">
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <br />
                                        <a href="javascript:void(0);" class="add_button5 btn btn-success"
                                            title="Add field">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <button class="btn btn-primary" id="btn-btn"
                                    type="submit">{{ isset($business) ? 'Update' : 'Save' }}</button>
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
        // product detail
        var addButton4 = $('.add_button4'); //Add button selector
        var wrapper4 = $('.field_wrapper4'); //Input field wrapper
        var fieldHTML4 = '<div class="row"><div class="col-sm-3">\
                        <label for="" class="form-label">Document Name</label>\
                        <input type="text" class="form-control"  name="document_name[]" required>\
                    </div>\
                    <div class="col-sm-4">\
                        <label for="" class="form-label">Document File</label>\
                        <input type="file" class="form-control" name="docfile[]" required>\
                    </div>\
                    <div class="col-sm-4">\
                        <label for="" class="form-label">Document Expiry</label>\
                        <input type="date" class="form-control" name="document_exp_date[]">\
                    </div>\
                    <div class="col-sm-1">\
                        <br/>\
                        <a href="javascript:void(0);" class="add_button btn btn-danger remove_button4" title=" field">-</a>\
                    </div></div>';

        //Once add button is clicked
        $(addButton4).click(function() {

            $(wrapper4).append(fieldHTML4); //Add field html

        });

        //Once remove button is clicked
        $(wrapper4).on('click', '.remove_button4', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove(); //Remove field html

        });
    </script>
    <script>
        // product detail
        var addButton5 = $('.add_button5'); //Add button selector
        var wrapper5 = $('.field_wrapper5'); //Input field wrapper
        var fieldHTML5 = '<div class="row"><div class="col-md-3 mb-2">\
                                <label for="country" class="form-label">Bank Name</label>\
                                <div class="input-group">\
                                    <input type="text" class="form-control" name="bank_name[]" placeholder="Enter Bank Name">\
                                </div>\
                            </div>\
                            <div class="col-md-3 mb-2">\
                                <label for="state" class="form-label">Account Number</label>\
                                <div class="input-group">\
                                    <input type="text" class="form-control" name="account_number[]" placeholder="Enter Account No">\
                                </div>\
                            </div>\
                            <div class="col-md-3 mb-2">\
                                <label for="state" class="form-label">IBAN No</label>\
                                <div class="input-group">\
                                    <input type="text" class="form-control" name="iban_no[]"placeholder="Enter IBAN No">\
                                </div>\
                            </div>\
                            <div class="col-md-3">\
                                <label for="space" class="form-label">Bank Code</label>\
                                <select class="form-control bank_code" id="bank_code" name="bankcode">\
                                    <option value="">-----Select Code-----</option>\
                                    <option value="ifsc">Ifsc Code</option>\
                                    <option value="swift">Swift Code</option>\
                                </select>\
                            </div>\
                            <div class="col-md-3 mb-2 swift" id="swift" style="display:none">\
                                <label for="country" class="form-label">Swift Code</label>\
                                <div class="input-group">\
                                    <input type="text" class="form-control" name="swift[]" placeholder="Enter Swift Code">\
                                </div>\
                            </div>\
                            <div class="col-md-3 mb-2 ifsc" id="ifsc" style="display:none">\
                                <label for="country" class="form-label">IFSC Code</label>\
                                <div class="input-group">\
                                    <input type="text" class="form-control" name="ifsc[]" placeholder="Enter Ifsc Code">\
                                </div>\
                            </div>\
                    <div class="col-sm-1">\
                        <br/>\
                        <a href="javascript:void(0);" class="add_button btn btn-danger remove_button5" title=" field">-</a>\
                    </div></div>';

        //Once add button is clicked
        $(addButton5).click(function() {

            $(wrapper5).append(fieldHTML5); //Add field html

        });

        //Once remove button is clicked
        $(wrapper5).on('click', '.remove_button5', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove(); //Remove field html

        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('change', '.bank_code', function() {
                $(this).closest('.row').find('.swift').hide();
                $(this).closest('.row').find('.ifsc').hide();
                var v = $(this).val();
                if (v == 'swift') {

                    $(this).closest('.row').find('.swift').show();
                } else {

                    $(this).closest('.row').find('.ifsc').show();
                }
            });
        });
    </script>
@endsection
