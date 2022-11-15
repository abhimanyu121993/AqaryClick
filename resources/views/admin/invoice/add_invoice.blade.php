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
                                    <option value="all">All Buildings</option>
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



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">
                    {{ isset($contractedit) ? 'Update Cheque' : 'Cheque Management' }}</h4>
            </div><!-- end card header -->
            <div class="card-body table-responsive">
                <div class="live-preview">
                <form action="{{route('admin.cheque.store')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="card-body field_wrapper -responsive">
                            <table class="table table-nowrap container table-responsive ">
                              
                                <thead>
                                    <tr>
                                        <th scope="col">Deposite Date</th>
                                        <th scope="col">Cheque Amount</th>
                                        <th scope="col">Cheque No</th>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Cheque Status</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Remark</th>
                                        <th colspan="4" scope="col">
                                            <div class="col-sm-1">
                                                <br />
                                                <a href="javascript:void(0);" class="add_button btn btn-success"
                                                    title="Add field">+</a>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="field_table_wrapper">
                                <input type="hidden" class="form-control" id="tid" value="" name="tenant_name" hidden>

                                </tbody>
                            </table>
                        </div>
                   
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Invoice Management</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{route('admin.invoice.store')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" class="form-control" id="tenant_id" value="" name="tenant_id" hidden>
                        <input type="hidden" class="form-control" id="cid" value="" name="contract_id" hidden>
                        <p id="due_amt"></p>
                        <p id="rent_amt"></p>
                        <p id="payable_amt"></p>
                        <div class="row gy-4 mb-3">                            
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
                                <label class="form-label" for="flag">Invoice Amount</label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="amt_paid" name="amt_paid" placeholder="Enter Amount">
                                 <p id="msg_due" class="text-danger"></p>   
                            </div>
                                </div>
                            <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Payment Method</label>
                                <select class="select2 form-select" id="payment_method" name='payment_method'>
                                <option  selected hidden>--Select Method--</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="cheque">
                                <label class="form-label" for="flag">Cheque No</label>
                                <div class="input-group">
                                <input type="text" class="form-control"  name="cheque_no" placeholder="Enter Cheque No">
                                </div>
                                </div><div class="col-xxl-3 col-md-3" id="Bank">
                                <label class="form-label" for="flag">Bank Name</label>
                                <div class="input-group">
                                <input type="text" class="form-control"  name="bank_name" placeholder="Enter Bank Name">
                                </div>
                                </div><div class="col-xxl-3 col-md-3" id="account">
                                <label class="form-label" for="flag">Account No</label>
                                <div class="input-group">
                                <input type="text" class="form-control"  name="account_no" placeholder="Enter Account No">
                                </div>
                                </div>
                            <div class="col-xxl-3 col-md-3">
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
                            <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Overdue Period</label>
                                <div class="input-group">
                                <input type="text" class="form-control" id="overdue_period" name="overdue_period" placeholder="Overdue Period" readonly>
                                </div>
                                </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="attachment_file" class="form-label">Attachment File</label>
                                <div class="input-group">
                                    <input type="file" class="form-control"  id="attachment_file" name="attachment[]" multiple>
                                </div>
                        </div>
                            </div>
                            <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="remark" >
                                
                                    </textarea>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <button class="btn btn-primary" id="submit" type="submit">Submit</button>
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