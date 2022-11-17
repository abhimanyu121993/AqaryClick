@extends('admin.includes.layout', ['breadcrumb_title' => 'Generate Invoice'])
@section('title', 'Generate Invoice')
@section('main-content')

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
                                <div class="card-body border-bottom border-bottom-dashed p-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="profile-user mx-auto  mb-3">
                                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input" />
                                                    <label for="profile-img-file-input" class="d-block" tabindex="0">
                                                        <span class="overflow-hidden border border-dashed d-flex align-items-center justify-content-center rounded" style="height: 60px; width: 256px;">
                                                            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="60"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <div>
                                                        <label for="companyAddress">Address</label>
                                                    </div>
                                                    <div class="mb-2">
                                                        <textarea class="form-control" id="companyAddress" rows="3" placeholder="Company Address" required></textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter a address
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control" id="companyaddpostalcode" minlength="5" maxlength="6" placeholder="Enter Postal Code" required />
                                                        <div class="invalid-feedback">
                                                            The US zip code must contain 5 digits, Ex. 45678
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4 ms-auto">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" id="registrationNumber" maxlength="12" placeholder="Legal Registration No" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a registration no, Ex., 012345678912
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="email" class="form-control bg-light border-0" id="companyEmail" placeholder="Email Address" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a valid email, Ex., example@gamil.com
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" id="companyWebsite" placeholder="Website" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a website, Ex., www.example.com
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="text" class="form-control bg-light border-0" data-plugin="cleave-phone" id="compnayContactno" placeholder="Contact No" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a contact number
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                 
                                    <div class="card-body p-4">
                                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Full Payment</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Due Payment</label>
</div>
                                    <div class="row gy-4 mb-3 mt-2">                            
                            <div class="col-xxl-3 col-md-2">
                                <label class="form-label" for="flag">Invoice No</label>
                                <div class="input-group">
                                <input type="text" class="form-control" value="{{$INV}}" id="invoice_no" name="invoice_no"  readonly>
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
                                    <input type="file" class="form-control"  id="attachment_file" name="attachment[]" multiple>
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
                                 <p id="msg_due" class="text-danger"></p>   
                            </div>
                                </div>
                            <div class="col-xxl-3 col-md-4">
                                <label class="form-label" for="flag">Payment Status</label>
                                <select class="select2 form-select" id="payment_status" name='payment_status'>
                                <option selected hidden>--Select Status--</option>
                                <option value="Paid">Paid</option>
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
                                <option  selected hidden>--Select Method--</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                </select>
                            </div>
                            
                        </div>
                                            <!--end col-->
                                        <!--end row-->
                                    </div>
                                    
                                    <div class="card-body p-4 border-top border-top-dashed">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div>
                                                    <label for="billingName" class="text-muted text-uppercase fw-semibold">Tenant Address</label>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" id="tenantName" placeholder="Full Name" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a full name
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <textarea class="form-control bg-light border-0" id="tenantAddress" rows="3" placeholder="Tenant Address" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter a address
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control bg-light border-0" data-plugin="cleave-phone" id="TenantPhoneno" placeholder="(123)456-7890" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a phone number
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control bg-light border-0" id="billingTaxno" placeholder="Tax Number" required />
                                                    <div class="invalid-feedback">
                                                        Please enter a tax number
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            
                                            <!--end col-->
                                            <div class="col-sm-6 ms-auto">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div>
                                                            <label for="shippingName" class="text-muted text-uppercase fw-semibold">Lessor's Address</label>
                                                        </div>
                                                        <div class="mb-2">
                                                            <input type="text" class="form-control bg-light border-0" id="shippingName" placeholder="Full Name" required />
                                                            <div class="invalid-feedback">
                                                                Please enter a full name
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <textarea class="form-control bg-light border-0" id="shippingAddress" rows="3" placeholder="Address" required></textarea>
                                                            <div class="invalid-feedback">
                                                                Please enter a address
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <input type="text" class="form-control bg-light border-0" data-plugin="cleave-phone" id="shippingPhoneno" placeholder="(123)456-7890" required />
                                                            <div class="invalid-feedback">
                                                                Please enter a phone number
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <input type="text" class="form-control bg-light border-0" id="shippingTaxno" placeholder="Tax Number" required />
                                                            <div class="invalid-feedback">
                                                                Please enter a tax number
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    
                 <div class="card-body p-4">
                       <h4 class="card-title mb-0 flex-grow-1 mb-2">
                    {{ isset($contractedit) ? 'Update Cheque' : 'Cheque Management' }}</h4>
                                     
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-borderless table-nowrap mb-0">
                                                <thead class="align-middle">
                                                    <tr class="table-active">
                                                        <th scope="col"style="width: 50px;">Sn.</th>
                                                        <th scope="col" style="width: 150px;">
                                                            Deposit Date
                                                        </th>
                                                        <th scope="col"style="width: 180px;">
                                                           Cheque Amt
                                                        </th>
                                                        <th scope="col"style="width: 150px;">Cheque No</th>
                                                        <th scope="col" style="width: 150px;">Bank Name</th>
                                                        <th scope="col"  style="width: 50px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="newlink">
                                                    <tr id="1" class="product">
                                                        <th scope="row" class="product-id">1</th>
                                                        <td>
                                                            <div class="mb-1">
                                                                <input type="date" class="form-control" id="productName-1" placeholder="Product Name" required />
                                                                </div>
                                                            <textarea class="form-control" id="productDetails-1" rows="3" cols="50" placeholder="Product Details"></textarea>
                                                        <td>
                                                                <input type="text" class="form-control" id="product-qty-1"  placeholder="Enter Cheque Amount" >
                                                                <input type="file" class="form-control mt-1" id="product-qty-1">

                                                        </td>
                                                        <td class="text-end">
                                                            <div>
                                                                <input type="text" class="form-control product-line-price" id="productPrice-1" placeholder="Check No" />
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div>
                                                                <input type="text" class="form-control product-line-price" id="productPrice-1" placeholder="Bank Name" readonly />
                                                            </div>
                                                        </td>
                                                        <td class="product-removal">
                                                            <a href="javascript:void(0)" class="btn btn-danger">-</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr id="newForm" style="display: none;"><td class="d-none" colspan="5"><p>Add New Form</p></td></tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <a href="javascript:new_link()" id="add-item" class="btn btn-soft-secondary fw-medium"><i class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr class="border-top border-top-dashed mt-2">
                                                        <td colspan="3"></td>
                                                        <td colspan="2" class="p-0">
                                                        
                                                            <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                                <tbody>

                                                                    <tr>
                                                                        <th scope="row">Sub Total</th>
                                                                        <td style="width:150px;">
                                                                            <input type="text" class="form-control" id="cart-subtotal" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Estimated Tax (12.5%)</th>
                                                                        <td>
                                                                            <input type="text" class="form-control" id="cart-tax" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Discount <small class="text-muted">(VELZON15)</small></th>
                                                                        <td>
                                                                            <input type="text" class="form-control" id="cart-discount" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Shipping Charge</th>
                                                                        <td>
                                                                            <input type="text" class="form-control" id="cart-shipping" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="border-top border-top-dashed">
                                                                        <th scope="row">Total Amount</th>
                                                                        <td>
                                                                            <input type="text" class="form-control" id="cart-total" placeholder="$0.00" readonly />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--end table-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        
                                        <!--end row-->
                                        <div class="mt-4">
                                            <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">Remark</label>
                                            <textarea class="form-control" name="remark" > </textarea>
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
var addButton = $('.add_button'); //Add button selector
var wrapper = $('.field_table_wrapper'); //Input field wrapper
var fieldHTML = '<tr ><td><div class="col-sm-12">\
                <input type="date" class="form-control" name="deposite_date[]">\
                </div></td>\<td><div class="col-sm-12">\
                <input type="text" class="form-control" name="cheque_amt[]">\
                </div></td>\<td><div class="col-sm-12">\
                <input type="text" class="form-control" name="cheque_no[]">\
                </div></td>\<td><div class="col-sm-12">\
                <select class="form-control select2 form-select" name="bank_name[]">\
                <option value="" selected hidden>Select</option>\
                                        <option value="DOHA BANK">DOHA BANK</option>\
                                        <option value="COMMERCIAL BANK">COMMERCIAL BANK</option>\
                                        <option value="Under Process">Under Process</option>\</div></td>\
                <td><div class="col-sm-12">\
                <select class="form-control select2 form-select" name="cheque_status[]">\
                <option value="" selected hidden>Select</option>\
                                        <option value="Valid">Valid</option>\
                                        <option value="Expired">Expired</option>\
                                        <option value="Bounced">Bounced</option>\
                                        <option value="Postponed">Postponed</option>\
                                        <option value="Cleared">Cleared</option>\
                                        <option value="Security Cheque">Security Cheque</option>\</div></td>\
                                        <td><div class="col-sm-12">\
                <input type="file" class="form-control" name="attachment[]">\
                </div></td>\
                <td colspan="4"><div class="col-sm-12">\
                <textarea type="text" class="form-control" name="remark[]" rows="1" cols="10"></textarea>\
                </div></td>\
                <td><div class="col-sm-12">\
                <a href="javascript:void(0);" class="add_button btn btn-danger remove_button" title=" field">-</a>\
                </div></td>\
                </tr>';
//Once add button is clicked
$(addButton).click(function() {
    var a = ($('tr').length); 
    let sn = "";
for (let i = 1; i < a; i++) {
  sn += i;
}
$(wrapper).append(fieldHTML);
$(fieldHTML).closest("tr").prev().find("td:first").val(sn);
});

//Once remove button is clicked
$(wrapper).on('click', '.remove_button', function(e) {
    e.preventDefault();
    $(this).closest('tr').remove(); //Remove field html

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

                }
                else if (optionValue == 'Bank Transfer') {
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
                var name=$(this).text();
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
                var newurl = "{{ url('/admin/invoice-details') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        if (new Date(p.invoiceStart) < new Date(p.lastmonth)) {
    alert('hi');
}
$('#due_date').val(p.invoiceEnd);
$('#invoice_period_start').val(p.invoiceStart);
$('#invoice_period_end').val(p.invoiceEnd);
$('#overdue_period').val(p.res.overdue+'Days');
$('#msg').text(p.msg);
$('#rent_amt').text('Rent Amount'+p.rent_amt);
$('#due_amt').text('Due Amount'+p.due_amt);
$('#payable_amt').text('Total Payable Amount   '+p.payable);

$('#amt_paid').focusout(function(){
    var amt=$(this).val();
    if(amt<parseInt(p.due_amt)){
        $('#msg_due').text("Amount must be greater than due amount");
        $('#submit').attr("type","button");
    }
    else{
        $('#msg_due').text('');
        $('#submit').attr("type","submit");
    }
});


                    }
                });
            });
        }).change();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection