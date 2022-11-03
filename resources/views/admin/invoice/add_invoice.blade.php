@extends('admin.includes.layout', ['breadcrumb_title' => 'Generate Invoice'])
@section('title', 'Generate Invoice')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">
                    {{ isset($contractedit) ? 'Update Invoice' : 'Invoice Management' }}</h4>
            </div><!-- end card header -->
            <div class="card-body table-responsive">
                <div class="live-preview">
                        <div class="card-body field_wrapper -responsive">
                            <table class="table table-nowrap container table-responsive ">
                            <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id='pid' name='pid' value="" hidden>
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.No.</th>
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
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body table-responsive">
                <div class="live-preview">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id='pid' name='pid' value="">
                        <div class="card-body field_wrapper table-responsive">

                            <table class="table table-nowrap container table-responsive ">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">Invoice Details</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Invoice Period</th>
                                        <th scope="col">Amount Paid</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Overdue Period</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Remark</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" name="invoice_details[]" readonly placeholder="Invoice No"></td>
                                        <td><input type="text" class="form-control" name="due_date[]" readonly placeholder=" 01-02-2022"></td>
                                        <td><input type="text" class="form-control" name="invoice_period[]"></td>
                                        <td><input type="text" class="form-control" name="amount_paid[]"></td>
                                        <td><div class="col-sm-12">
                <select class="form-control select2 form-select" name="payment_method[]">
                <option value="" selected hidden>Select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                         </div>
                                        </td>
                                        <td><div class="col-sm-12">
                <select class="form-control select2 form-select" name="payment_status[]">
                <option value="" selected hidden>Select</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Not Paid">Not Paid</option>
                                        <option value="Under Deposite">Under Deposite</option>
                                        <option value="Deposited">Deposited</option>
                                        <option value="Redeposite">Redeposite</option>
                                        <option value="Cheque Without Balance Report">Cheque wWthout Balance Report</option>
                                         </div></td>
                                        <td><input type="text" class="form-control" name="overdue_period[]"></td>
                                        <td> <input type="file" class="form-control" name="file[]"></td>
                                        <td><div class="col-sm-12">
                <textarea type="text" class="form-control" name="remark[]" rows="1" cols="10"></textarea>
                </div></td>

                                </tbody>
                            </table>
                        </div>
                </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Grids in modals -->
@endsection


@section('script-area')
<script>
var addButton = $('.add_button'); //Add button selector
var wrapper = $('.field_table_wrapper'); //Input field wrapper
var fieldHTML = '<tr ><td id="sn"></td>\ <td><div class="col-sm-12">\
                <input type="date" class="form-control" name="deposite_date[]">\
                </div></td>\<td><div class="col-sm-12">\
                <input type="text" class="form-control" name="last_payment_date[]">\
                </div></td>\<td><div class="col-sm-12">\
                <input type="text" class="form-control" name="cheque_no[]">\
                </div></td>\<td><div class="col-sm-12">\
                <select class="form-control select2 form-select" name="bank_name[]">\
                <option value="" selected hidden>Select</option>\
                                        <option value="DOHA BANK">DOHA BANK</option>\
                                        <option value="COMMERCIAL BANK">COMMERCIAL BANK</option>\
                                        <option value="Under Process">Under Process</option>\</div></td>\
                <td><div class="col-sm-12">\
                <select class="form-control select2 form-select" name="check_status[]">\
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
@endsection