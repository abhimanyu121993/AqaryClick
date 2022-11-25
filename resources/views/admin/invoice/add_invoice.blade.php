@extends('admin.includes.layout', ['breadcrumb_title' => 'Generate Invoice'])
@section('title', 'Generate Invoice')
@section('main-content')
                                        @php
                                            $currencyhtml='<option value="">--Select Cuurency</option>';
                                            foreach($currency as $c){
                                                $currencyhtml .='<option value="'.$c->code.'">'.$c->code??''.'</option>';
                                            }
                                        @endphp
                                        @php
                                            $bankhtml='<option value="">--Select Bank</option>';
                                            foreach($bank as $b){
                                                $bankhtml .='<option value="'.$b->id.'">'.$b->name??''.'</option>';
                                            }
                                        @endphp

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Tenant Details</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <p id="msg" class="text-danger"></p>
                    <div class="row">
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Building Name</label>
                            <select class="select2 form-select js-example-basic-single" id="building_name" name='building_name'>
                                <option value="" selected hidden disabled>--Select Building--</option>
                                <option value="all">All</option>
                                @foreach($building as $build)
                                <option value="{{ $build->id}}">{{ $build->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Tenant Name</label>
                            <select class="select2 form-select js-example-basic-single" id="tenant_name" name='tenant_name'>
                                <option value="" selected hidden disabled>--Select Tenant--</option>
                                <!-- @foreach($tenantDetails as $td)
                                    <option value="{{ $td->id}}">{{ $td->tenant_english_name }}</option>
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
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Invoice Management</h4>
            </div>
            <form class="needs-validation" novalidate id="invoice_form" action="{{route('admin.invoice.store')}}" method="POST" enctype="multipart/form-data">
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
                

                <div class="card-body p-4">

                <input type="hidden" class="form-control" id="tenant_id" value="" name="tenant_id" hidden>
                        <input type="hidden" class="form-control" id="cid" value="" name="contract_id" hidden>
                       <div class="msg"><p id="due_amt"></p>
                        <p id="rent_amt"></p>
                        <p id="payable_amt"></p></div>
                <input type="radio" class="btn-check" name="options-outlined" id="full-payment-details" autocomplete="off" checked>
<label class="btn btn-outline-success" for="full-payment-details">Full Payment</label>

<input type="radio" class="btn-check" name="options-outlined" id="due-payment-details" autocomplete="off">
<label class="btn btn-outline-danger" for="due-payment-details">Due Payment</label>
                    <div class="row gy-4 mb-3 mt-5">
                        <div class="col-xxl-3 col-md-2">
                            <label class="form-label" for="flag">Invoice No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{$INV}}" id="invoice_no" name="invoice_no" readonly>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Due Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="due_date" name="due_date" placeholder="Due Date" readonly>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-4">
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


                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Overdue Period</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="overdue_period" name="overdue_period" placeholder="Overdue Period" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Tenant Account Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Account No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="account_no" name="account_no" placeholder="Enter Account No">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Bank Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tenant_bank_name" name="tenant_bank_name" placeholder="Enter Bank Name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label class="form-label" for="flag">Sender Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="attachment_file" class="form-label">Attachment File</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="attachment_file" name="attachment[]" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Benifitary Account Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Account No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="benifitary_account_no" name="benifitary_account_no" placeholder="Enter Account No">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Bank Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="benifitary_bank_name" name="benifitary_bank_name" placeholder="Enter Bank Name">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Benifitary Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="benifitary_name" name="benifitary_name" placeholder="Enter Benifitary Name">
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Payment Details</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Invoice Amount</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="amt_paid" name="amt_paid" placeholder="Enter Amount">
                                <br><p id="msg_due" class="text-danger"></p>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-4">
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
                        <div class="col-xxl-3 col-md-4">
                            <label class="form-label" for="flag">Payment Method</label>
                            <select class="select2 form-select" id="payment_method" name='payment_method'>
                                <option selected hidden>--Select Method--</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                            </select>
                        </div>

                    </div>
                    <!--end col-->
                    <!--end row-->
                </div>
                <div class="card-body p-4">
                    <h4 class="card-title mb-0 flex-grow-1 mb-2">
                        {{ isset($contractedit) ? 'Update Cheque' : 'Cheque Management' }}
                    </h4>

                    <div class="table-responsive">
                        <table class="invoice-table table table-borderless table-nowrap mb-0">
                            <thead class="align-middle">
                                <tr class="table-active">
                                    <th scope="col" style="width: 50px;">Sn.</th>
                                    <th scope="col" style="width: 150px;">
                                        Deposit Date
                                    </th>
                                    <th scope="col" style="width: 180px;">
                                        Currency
                                    </th>
                                    <th scope="col" style="width: 180px;">
                                        Cheque Amt
                                    </th>
                                    <th scope="col" style="width: 180px;">
                                        Cheque Amt in SAR
                                    </th>
                                    <th scope="col" style="width: 180px;">
                                        Status
                                    </th>
                                    <th scope="col" style="width: 150px;">Cheque No</th>
                                    <th scope="col" style="width: 150px;">Bank Name</th>
                                    <th scope="col" style="width: 50px;"></th>
                                </tr>
                            </thead>
                            <tbody id="newlink">
                                <tr id="1" class="product parent_cheque">
                                    <th scope="row" class="product-id">1</th>
                                    <td>
                                        <div class="mb-1">
                                            <input type="date" class="form-control" id="productName-1" placeholder="Product Name" required />
                                        </div>
                                        <textarea class="form-control" id="productDetails-1" rows="3" cols="50" placeholder="Product Details"></textarea>
                                    </td>
                                    <td class="text-end">
                                        <div class="mb-1">
                                         
                                            <select class="form-control select2 form-select currency " name="currency" id="currency">
                                                {!! $currencyhtml !!}

                                            </select>
                                            <input type="file" class="form-control mt-1" id="product-qty-1">
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control cheque_amt" id="product-qty-1" placeholder="Enter Cheque Amount">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control sar_amt" name="sar_amt[]" id="product-qty-1" placeholder="Amount in SAR" readonly/>
                                    </td>
                                    <td class="text-end">
                                        <div> <select class="form-control select2 form-select" name="cheque_status[]" id="currency">
                                                <option value="" selected hidden>Select Cheque</option>
                                                <option value="Valid">Valid</option>
                                                <option value="Expired">Expired</option>
                                                <option value="Bounced">Bounced</option>
                                                <option value="Postponed">Postponed</option>
                                                <option value="Cleared">Cleared</option>
                                                <option value="Security Cheque">Security Cheque</option>
                                            </select>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <input type="text" class="form-control" id="productPrice-1" placeholder="Cheque No" />
                                        </div>
                                    </td>
                                    <td class="text-end">
                                    <select class="form-control select2 form-select currency " name="bank_name[]" id="bank">
                                                {!! $bankhtml !!}

                                            </select>
                                    </td>
                                    <td class="product-removal">
                                        <a href="javascript:void(0)" class="btn btn-danger">-</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr id="newForm" style="display: none;">
                                    <td class="d-none" colspan="5">
                                        <p>Add New Form</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <a href="javascript:new_link()" id="add-item" class="btn btn-soft-secondary fw-medium"><i class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                    </td>
                                </tr>
                        </table>
                        <!--end table-->
                    </div>

                    <!--end row-->
                    <div class="mt-4">
                        <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">Remark</label>
                        <textarea class="form-control" name="remark"> </textarea>
                    </div>
                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                        <button type="submit" class="btn btn-success"><i class="ri-rotete-line align-bottom me-1"></i>Submit</button>
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download Invoice</a>
                        <a href="javascript:void(0);" class="btn btn-danger"><i class="ri-send-plane-fill align-bottom me-1"></i> Send Invoice</a>
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
                $('#tenant_id').val(optionValue);
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
                $('#cid').val(optionValue);
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
                        $('#payable_amt').text('Total Payable Amount   ' + p.payable);
                    }
                });
            });
        }).change();
    });
</script>
<script>
var   currencyhtml='{!!   $currencyhtml !!}';
var   bankhtml='{!!   $bankhtml !!}';

var count = 1;

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
       var a= $('.cheque_amt').parent().closest('.sar_amt').val(10);
       console.log(a);

                $(".cheque_amt").keyup(function(){
                    var cheque_amt= $(this).val();
                    var currency_code = $(".currency").val();

                    var newurl = "{{ url('/admin/convert-currency') }}";
                $.ajax({
                    url: newurl,
                    type: "POST",
                    data : { '_token':"{{ csrf_token()}}",
                    'currency_code' : currency_code, 
                    'cheque_amt' : cheque_amt
                       },
                    success: function(p) {
                       console.log(p);
                       $('.sar_amt').val(p);

                    }
                });
                });
              
            });   
</script>
<script>
    $(document).ready(function () {
        $('#add-item').on('click',function () { 
            $(this).parent() 
    var newurl = "{{ url('/admin/fetch-currency') }}";
    $.ajax({
        url: newurl,
        method: 'get',
        success: function (p) {
            console.log(p);
            $('.currency').html(p);

        }
    });
});
});


function new_link() {
    count++;
    var e = document.createElement("tr");
    e.id = count, e.className = "product";
    var t = '<tr><th scope="row" class="product-id">' + count + '</th><td class="text-start"><div class="mb-2"><input type="date" class="form-control" id="deposite_date-"' + count + '" name="deposite_date[]"/>\
    </div><textarea class="form-control" id="cheque_remark-"'+ count + '" rows="3" cols="50" placeholder="Product Details" name="cheque_remark[]"></textarea>\
    </div></td><td class="text-end"><div>  <select class="form-control select2 form-select .currency" name="currency[]" id="currency">'+currencyhtml+'</select>\
    \<input type="file" class="form-control mt-1" id="file-"'+ count + '" name="file[]">\
    </div></td><td class="text-end"><div><input type="text" class="form-control product-line-price cheque_amt" id="cheque_amt"" placeholder="Enter cheque Amount" name="cheque_no[]"  />\
    </div></td><td class="text-end"><div><input type="text" class="form-control product-line-price sar_amt" id="sar_amt"" placeholder="Amount in SAR" name="cheque_no[]"  readonly/>\
    </div></td><td class="text-end"><div>  <select class="form-control select2 form-select" name="cheque_status" id="currency"><option value="" selected hidden>Select Currency</option> <option value="Valid">Valid</option>\
    <option value="Expired">Expired</option>\
    <option value="Bounced">Bounced</option>\
    <option value="Postponed">Postponed</option>\
    <option value="Cleared">Cleared</option>\
    <option value="Security Cheque">Security Cheque</option>/</select>\
    </td><td class="text-end"><div><input type="text" class="form-control product-line-price" id="cheque_no-"'+ count + '" placeholder="Cheque No" name="cheque_no[]"  />\
    </div></td><td class="text-end"><div> <select class="form-control select2 form-select .bank" name="bank_name[]" id="bank">'+bankhtml+'</select>\
    </div></td><td class="product-removal"><a class="btn btn-danger">-</a></td></tr>';
    e.innerHTML = document.getElementById("newForm").innerHTML + t, document.getElementById("newlink").appendChild(e);
    e = document.querySelectorAll("[data-trigger]");
    Array.from(e).forEach(function (e) {
        new Choices(e, {
            placeholderValue: "This is a placeholder set in the config",
            searchPlaceholderValue: "This is a search placeholder"
        })
    }), isData(), remove(), amountKeyup(), resetRow()
}
</script>
<script>
    $(document).ready(function() {
        $("#due-payment-details").on('click',function() {
                var contract_id = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-due-payment') }}/" + contract_id;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        console.log(p);
                        $('#due_date').val(p.res.invoice_period_end);
                        $('#invoice_period_start').val(p.res.invoice_period_start);
                        $('#invoice_period_end').val(p.res.invoice_period_end);
                        $('#overdue_period').val(p.overdue + 'Days');
                        $('#due_amt').text('Due Amount: ' + p.res.due_amt);
                        $('#rent_amt').text('');

                        $('#payable_amt').text('Total Payable Amount   ' + p.res.due_amt);
                    }
                });
        });
        $("#full-payment-details").on('click',function() {

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
                        $('#due_amt').text('Due Amount: ' + p.due_amt);
                        $('#payable_amt').text('Total Payable Amount   ' + p.payable);
                    }
                });
        });
    });
</script>
@endsection