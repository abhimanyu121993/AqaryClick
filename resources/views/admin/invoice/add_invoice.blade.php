@extends('admin.includes.layout', ['breadcrumb_title' => 'Generate Invoice'])
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
@section('title', 'Generate Invoice')
@section('main-content')
@php
$currencyhtml = '<option value="">--Select Currency--</option>';
foreach ($currency as $c) {
$currencyhtml .= '<option value="' . $c->code . '">' . $c->code ?? '' . '</option>';
}
@endphp
@php
$bankhtml = '<option value="">--Select Bank</option>';
foreach ($bank as $b) {
$bankhtml .= '<option value="' . $b->id . '">' . $b->name ?? '' . '</option>';
}
@endphp
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="pop">Tenant Details</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Building Name</label>
                            <select class="select2 form-select js-example-basic-single" id="building_name" name='building_name'>
                                <option value="" selected hidden disabled>--Select Building--</option>
                                <option value="all">All</option>
                                @foreach ($building as $build)
                                <option value="{{ $build->id }}">{{ $build->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Tenant Name</label>
                            <select class="select2 form-select js-example-basic-single" id="tenant_name" name='tenant_name'>
                                <option value="" selected hidden disabled>--Select Tenant--</option>
                                <!-- @foreach ($tenantDetails as $td)
                                 <option value="{{ $td->id }}">{{ $td->tenant_english_name }}</option>
                                 @endforeach -->
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Tenant Contract</label>
                            <select class="select2 form-select js-example-basic-single" id="tenant_contract" name='tenant_contract'>
                                <option value="" selected hidden disabled>--Select Contract--</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Invoice Management</h4>
            </div>
            <form class="needs-validation" novalidate id="invoice_form" action="{{ route('admin.invoice.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-4">

                    <input type="hidden" class="form-control tenant_id" id="tenant_id" value="" name="tenant_name" hidden>
                    <input type="hidden" class="form-control cid" id="cid" value="" name="contract" hidden>
                    <div class="msg">
                        <p id="msg" class="text-danger"></p>
                        <p id="due_amt"></p>
                        <p id="rent_amt"></p>
                        <p id="tax_amount"></p>
                        <p id="payable_amt"></p>
                    </div>
                    <input type="radio" class="btn-check" name="options-outlined" id="full-payment-details" autocomplete="off" checked>
                    <label class="btn btn-outline-success" id="btn-btn" for="full-payment-details">Full Payment</label>

                    <input type="radio" class="btn-check" name="options-outlined" id="due-payment-details" autocomplete="off">
                    <label class="btn btn-outline-danger" id="btn-btn" for="due-payment-details">Due Payment</label>
                    <div class="row gy-4 mb-3 mt-5 ">
                        <div class="col-lg-3">
                            <label class="form-label" for="flag">Due Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="due_date" name="due_date" placeholder="Due Date" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Invoice Period</label>
                            <div class="row input-group m-0">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="invoice_period_start" name="invoice_period_start" readonly placeholder="Start Date">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="invoice_period_end" name="invoice_period_end" readonly placeholder="End Date">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3">
                            <label class="form-label" for="flag">Overdue Period</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="overdue_period" name="overdue_period" placeholder="Overdue Period" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="card" id="header1">
                        <div class="card-header align-items-center d-flex" id="card-header">
                            <h4 class="card-title mb-0 flex-grow-1" id="h1">Tenant Account Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Account No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="account_no" name="tenant_account" placeholder="Enter Account No">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="name" class="form-label">Bank Name</label>
                            <select class="form-control select2 form-select" name="tenant_bank">
                                <option value="" selected hidden>--Select Bank--</option>
                                @foreach ($bank as $b)
                                <option value="{{ $b->name }}">{{ $b->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Sender Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="sender_name" name="tenant_sender" placeholder="Enter Sender Name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="attachment_file" class="form-label">Attachment File</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="attachment_file" name="tenant_attachment[]" multiple>
                            </div>
                        </div>
                        <!-- <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Tax No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tax_no" name="tax_no" placeholder="Enter Tax Name">
                                </div>
                            </div> -->
                    </div>
                    <div class="card mt-5" id="header1">
                        <div class="card-header align-items-center d-flex" id="card-header">
                            <h4 class="card-title mb-0 flex-grow-1" id="h1">Benifitary Account Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Account No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="benifitary_account_no" name="benifitary_account" placeholder="Enter Account No">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-4">
                            <label for="name" class="form-label">Bank Name</label>
                            <select class="form-control select2 form-select" name="benifitary_bank">
                                <option value="" selected hidden>--Select Bank--</option>
                                @foreach ($bank as $b)
                                <option value="{{ $b->name }}">{{ $b->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Benifitary Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="benifitary_name" name="benifitary_name" placeholder="Enter Benifitary Name">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5" id="header1">
                        <div class="card-header align-items-center d-flex" id="card-header">
                            <h4 class="card-title mb-0 flex-grow-1" id="h1">Payment Details</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xxl-3 col-md-3">
                            <label for="name" class="form-label">Currency</label>
                            <select class="form-control select2 form-select .currency" name="currency_type" id="currency">
                                <option value="" selected hidden>--Select Currency--</option>
                                @foreach ($currency as $c)
                                <option value="{{ $c->code }}">{{ $c->code ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Invoice Amount</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="amt_paid" name="amt_paid" placeholder="Enter Amount">
                                <br>
                                <p id="msg_due" class="text-danger"></p>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="istax" name="istax" hidden>

                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Include Tax</label>
                            <select class="select2 form-select" id="include_tax" name='include_tax'>
                                <option selected hidden>--Select Tax--</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Payment Status</label>
                            <select class="select2 form-select" id="payment_status" name='payment_status'>
                                <option selected hidden>--Select Status--</option>
                                <option value="Paid">Paid</option>
                                <option value="Particle Paid">Particle Paid</option>
                                <option value="Not Paid">Not Paid</option>
                                <option value="Under Deposit">Under Deposit</option>
                                <option value="Deposited">Deposited</option>
                                <option value="Redeposited">Redeposited</option>
                                <option value="Cheque Without Balance Report">Cheque Without Balance Report</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Payment Method</label>
                            <select class="select2 form-select" id="payment_method" name='payment_method'>
                                <option selected hidden>--Select Method--</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                            </select>
                        </div>

                    </div>

<!---start cheque working--->
<div class="row mt-2" id="">
    <div class="col-lg-12" id="cheque_management">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">
                    {{ isset($contractedit) ? 'Update Cheque' : 'Cheque Management' }}
                </h4>
            </div><!-- end card header -->

            <div class="field_wrapper mt-2" id="header1">
                <div class="card-header align-items-center d-flex">
                    <div class="row">
                        <div class="col-xxl-12 col-md-12 mt-2">
                            <div class="input-group row">
                                <div class="col-xxl-4 col-md-4">
                                    <input type="date" class="form-control" id="productName-1" name="deposite_date[]" placeholder="Product Name" required />
                                </div>
                                <div class="col-xxl-4 col-md-4">
                                    <textarea class="form-control mt-1" id="productDetails-1" name="cheque_remark[]" rows="1" cols="50" placeholder="Enter Remark"></textarea>
                                </div>
                                <div class="col-xxl-4 col-md-4">
                                    <input type="file" class="form-control mt-1" name="file[]" id="product-qty-1" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-md-12 mt-2">
                            <div class="input-group row">
                                <div class="col-xxl-4 col-md-4">
                                    <select class="form-control select2 form-select currency " name="currency[]" id="currency">
                                        {!! $currencyhtml !!}
                                    </select>
                                </div>
                                <div class="col-xxl-4 col-md-4">
                                    <input type="text" class="form-control cheque_amt" name="cheque_amt[]" id="product-qty-1" placeholder="Enter Cheque Amount">
                                </div>
                                <div class="col-xxl-4 col-md-4">
                                    <input type="text" class="form-control sar_amt" name="sar_amt[]" id="product-qty-1" placeholder="Amount in QAR" readonly />
                                </div>                               
                            </div>
                        </div>

                        <div class="col-xxl-12 col-md-12 mt-2">
                            <div class="input-group row">
                                <div class="col-md-4">
                                    <select class="form-control select2 form-select" name="cheque_status[]" id="currency">
                                        <option value="" selected hidden>Select Cheque
                                        </option>
                                        <option value="Valid">Valid</option>
                                        <option value="Expired">Expired</option>
                                        <option value="Bounced">Bounced</option>
                                        <option value="Postponed">Postponed</option>
                                        <option value="Cleared">Cleared</option>
                                        <option value="Security Cheque">Security Cheque
                                        </option>
                                    </select>
                                </div>  
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="productPrice-1" name="cheque_no[]" placeholder="Cheque No" />
                                </div>                            
                                <div class="col-md-4">
                                    <select class="form-control select2 form-select " name="cheque_bank_name[]" id="bank">
                                        {!! $bankhtml !!}

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-2 mt-2">
                            <div class="input-group">
                                <a href="javascript:new_link()" id="btn-btn" class="btn btn-success fw-medium addButton"><i class="ri-add-fill me-1 align-bottom"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---end cheque working-->

<div class="card-body p-4">
    <!--end row-->
    <div class="mt-4">
        <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">Remark</label>
        <textarea class="form-control" name="remark"> </textarea>
    </div>
    <div class="hstack gap-2 justify-content-start d-print-none mt-4">
        <button type="submit" id="btn-btn" class="btn btn-primary"><i class="ri-rotete-line align-bottom me-1"></i>Submit</button>
    </div>
</div>
</form>
</div>
</div>

<!--end col-->
</div>
<!--end row-->

</div>
@endsection


@section('script-area')

<script>
     var addButton1= $('.addButton');
     var wrapper1 = $('.field_wrapper');   
     var fieldHTML1=' <div class="card field_wrapper mt-3" id="header1">\
                <div class="card-header align-items-center d-flex">\
                    <div class="row">\
                        <div class="col-xxl-12 col-md-12 mt-2">\
                            <div class="input-group row">\
                                <div class="col-xxl-3 col-md-4">\
                                    <input type="date" class="form-control" id="productName-1" name="deposite_date[]" placeholder="Product Name" required />\
                                </div>\
                                <div class="col-xxl-3 col-md-4">\
                                    <textarea class="form-control mt-1" id="productDetails-1" name="cheque_remark[]" rows="1" cols="50" placeholder="Enter Remark"></textarea>\
                                </div>\
                                <div class="col-xxl-3 col-md-4">\
                                    <input type="file" class="form-control mt-1" name="file[]" id="product-qty-1" multiple>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="col-xxl-12 col-md-12 mt-2">\
                            <div class="input-group row">\
                                <div class="col-xxl-3 col-md-4">\
                                    <select class="form-control select2 form-select currency " name="currency[]" id="currency">\
                                        {!! $currencyhtml !!}\
                                    </select>\
                                </div>\
                                <div class="col-xxl-3 col-md-4">\
                                    <input type="text" class="form-control cheque_amt" name="cheque_amt[]" id="product-qty-1" placeholder="Enter Cheque Amount">\
                                </div>\
                                <div class="col-xxl-3 col-md-4">\
                                    <input type="text" class="form-control sar_amt" name="sar_amt[]" id="product-qty-1" placeholder="Amount in QAR" readonly />\
                                </div>\
                            </div>\
                        </div>\
                        <div class="col-xxl-12 col-md-12 mt-2">\
                            <div class="input-group row">\
                                <div class="col-xxl-3 col-md-4">\
                                    <select class="form-control select2 form-select" name="cheque_status[]" id="currency">\
                                        <option value="" selected hidden>Select Cheque\
                                        </option>\
                                        <option value="Valid">Valid</option>\
                                        <option value="Expired">Expired</option>\
                                        <option value="Bounced">Bounced</option>\
                                        <option value="Postponed">Postponed</option>\
                                        <option value="Cleared">Cleared</option>\
                                        <option value="Security Cheque">Security Cheque\
                                        </option>\
                                    </select>\
                                </div>\
                                <div class="col-xxl-3 col-md-4">\
                                    <input type="text" class="form-control" id="productPrice-1" name="cheque_no[]" placeholder="Cheque No" />\
                                </div>\
                                <div class="col-xxl-3 col-md-4">\
                                    <select class="form-control select2 form-select " name="cheque_bank_name[]" id="bank">\
                                        {!! $bankhtml !!}\
                                    </select>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="col-xxl-12 col-md-2 mt-2">\
                            <div class="input-group">\
                                <a href="javascript:new_link()" id="btn-btn" class="btn btn-success fw-medium removeButton">-</a>\
                            </div>\
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
        $('#cheque').hide();
        $('#Bank').hide();
        $('#account').hide();
        $("#payment_method").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'Cash') {
                    $('#cheque').hide();
                    $('#Bank').hide();
                    $('#account').hide();
                } else if (optionValue == 'Cheque') {
                    $('#cheque').show();
                    $('#Bank').show();
                    $('#account').hide();

                } else if (optionValue == 'Bank Transfer') {
                    $('#cheque').hide();
                    $('#Bank').show();
                    $('#account').show();

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
                var newurl = "{{ url('/admin/fetch-building-tenant') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#tenant_name").html(p);
                    }
                });
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $("#tenant_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var name = $(this).text();
                $('#tenantName').val(name);
                $('.tenant_id').val(optionValue);
                var newurl = "{{ url('/admin/fetch-contract-details') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#tenant_contract").html(p);
                    }
                });
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#tenant_contract").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                $('.cid').val(optionValue);
                $('#due-payment-details').val(optionValue);
                $('#full-payment-details').val(optionValue);

                var newurl = "{{ url('/admin/invoice-details') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $('#due_date').val(p.invoiceEnd);
                        $('#invoice_period_start').val(p.invoiceStart);
                        $('#invoice_period_end').val(p.invoiceEnd);
                        $('#overdue_period').val(p.overdue + 'Days');
                        $('#msg').text(p.msg);
                        $('#rent_amt').text('Rent Amount: ' + p.rent_amt);
                        $('#due_amt').text('Due Amount: ' + p.due_amt);
                        // var a=((p.rent_amt*p.per)%100)
                        // $('#tax_amount').text('Tax Amount: ' + a);

                        $('#payable_amt').text('Total Payable Amount   ' + p
                            .payable);
                    }
                });
            });
        }).change();
    });
</script>
<script>
    var currencyhtml = '{!! $currencyhtml !!}';
    var bankhtml = '{!! $bankhtml !!}';

    var count = 1;
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(document).on('keyup', ".cheque_amt", function() {
            var cheque_amt = $(this).val();
            var currency_code = $(this).closest('div').parent('div').children('div').children('.currency').val();
            var sar = $(this).closest('div').parent('div').children('div').children('.sar_amt');
            var newurl = "{{ url('/admin/convert-currency') }}";
            $.ajax({
                url: newurl,
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'currency_code': currency_code,
                    'cheque_amt': cheque_amt
                },
                success: function(p) {

                    sar.val(p);

                }
            });
        });

        $(document).on('change', ".currency", function() {
            var currency_code = $(this).val();
            var cheque_amt = $(this).closest('div').parent('div').children('div').children('.cheque_amt').val();
            if (cheque_amt == null | cheque_amt > 0) {
                var sar = $(this).closest('div').parent('div').children('div').children('.sar_amt');
                var newurl = "{{ url('/admin/convert-currency') }}";
                $.ajax({
                    url: newurl,
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'currency_code': currency_code,
                        'cheque_amt': cheque_amt
                    },
                    success: function(p) {

                        sar.val(p);

                    }
                });
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $("#due-payment-details").on('click', function() {
            var contract_id = $(this).attr("value");
            var newurl = "{{ url('/admin/fetch-due-payment') }}/" + contract_id;
            $.ajax({
                url: newurl,
                method: 'get',
                success: function(p) {
                    if (p.res == null) {
                        $('#msg').text('You Have No Any Due Payment,Proceed with Full PayMent');
                    } else {
                        $('#due_date').val(p.res.invoice_period_end);
                        $('#invoice_period_start').val(p.res.invoice_period_start);
                        $('#invoice_period_end').val(p.res.invoice_period_end);
                        $('#overdue_period').val(p.overdue + 'Days');
                        $('#due_amt').text('Due Amount: ' + p.res.due_amt);
                        $('#rent_amt').text('');
                        // $('#tax_amount').text('Tax Amount: ' + p.per);
                        $('#payable_amt').text('Total Payable Amount   ' + p.res.due_amt);
                    }

                }
            });
        });
        $("#full-payment-details").on('click', function() {

            var contract_id = $(this).attr("value");

            var newurl = "{{ url('/admin/invoice-details') }}/" + contract_id;
            $.ajax({
                url: newurl,
                method: 'get',
                success: function(p) {
                    $('#due_date').val(p.invoiceEnd);
                    $('#invoice_period_start').val(p.invoiceStart);
                    $('#invoice_period_end').val(p.invoiceEnd);
                    $('#overdue_period').val(p.overdue + 'Days');
                    $('#msg').text(p.msg);
                    $('#rent_amt').text('Rent Amount: ' + p.rent_amt);
                    // $('#tax_amount').text('Tax Amount: ' + p.per);
                    $('#due_amt').text('Due Amount: ' + p.due_amt);
                    $('#payable_amt').text('Total Payable Amount   ' + p.payable);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#cheque_management').hide();
        $("#payment_method").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'Cheque') {
                    $('#cheque_management').show();
                } else {
                    $('#cheque_management').hide();

                }
            });
        }).change();
    });
</script>
<script>
    $(document).ready(function() {
        $("#include_tax").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'Yes') {
                    $('#istax').val(1);
                } else {
                    $('#istax').val(0);

                }
            });
        }).change();
    });
</script>
@endsection