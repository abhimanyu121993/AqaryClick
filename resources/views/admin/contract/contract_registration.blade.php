@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract'])
@section('title', 'Contract')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">
                        {{ isset($contractedit) ? 'Update Contract' : 'Contract Register' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form
                            action="{{ isset($contractedit) ? route('admin.contract.update', $contractedit->id) : route('admin.contract.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @if (isset($contractedit))
                                @method('patch')
                            @endif
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
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-3">
                                    <label class="form-label" for="flag">Tenant Name</label>

                                    <select class="select2 form-select js-example-basic-single" id="tenant_name" name='tenant_name'
                                        >
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->tenant_type }}" selected>
                                                {{ $contractedit->tenant_type }}</option>
                                                @else
                                        <option value="" selected hidden>-----Select Type-----</option>
                                        @foreach ($tenant as $tent)
                                            <option value="{{ $tent->id }}">{{ $tent->tenant_english_name }}</option>
                                        @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Document Type</label>
                                <select class="form-control" id="tenant_document_type" name="document_type">
                                @if (isset($contractedit))
                                            <option value="{{ $contractedit->document_type }}" selected>
                                                {{ $contractedit->document_type }}</option>
                                        @else
                                    <option value="" selected hidden>-----Select Type-----</option>
                                    <option value="QID">QID</option>
                                    <option value="CR">CR</option>
                                    <option value="Passport">Passport</option>
                                    @endif
                                </select>
                            </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Tenant Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tenant_mobile" name="tenant_mobile"
                                            value="{{ isset($contractedit) ? $contractedit->tenant_mobile : '' }}"
                                            placeholder="Enter tenant mobile ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Contract Status</label>
                                    <select class="form-control select2 form-select" name="contract_status">
                                    @if (isset($contractedit))
                                            <option value="{{ $contractedit->contract_status }}" selected>
                                                {{ $contractedit->contract_status }}</option>
                                        @else
                                        <option value="" selected hidden>-----Select Status-----</option>
                                        <option value="new">New</option>
                                        <option value="renewed">Renewed</option>
                                        <option value="auto renewed">Auto Renewed</option>
                                        <option value="long term">Long Term</option>
                                        <option value="releted parties">Releted Parties</option>

                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Sponsor Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_name" name="sponsor_name"
                                            value="{{ isset($contractedit) ? $contractedit->sponsor_name : '' }}"
                                            placeholder="Enter sponsor name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Sponsor Id</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_id" name="sponsor_id"
                                            value="{{ isset($contractedit) ? $contractedit->sponsor_id : '' }}"
                                            placeholder="Enter sponsor Id">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Sponsor Nationality</label>
                                    <select class="form-select js-example-basic-single" name='sponsor_nationality'
                                        >
                                        @if (isset($contractedit))
                                            <option value="{{ $contractedit->sponsor_nationality }}" selected>
                                                {{ $contractedit->sponsor_nationality }}</option>
                                       @else
                                        <option value="" id="sponsor_nationality" selected hidden>----Select Nationality----</option>
                                        @foreach ($tenant_nation as $tent)
                                            <option value="{{ $tent }}">{{ $tent }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Sponsor Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_mobile" name="sponsor_mobile"
                                            value="{{ isset($contractedit) ? $contractedit->sponsor_mobile : '' }}"
                                            placeholder="Enter sponsor mobile ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lessor's/Company Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="lessor"
                                            value="{{ isset($contractedit) ? $contractedit->lessor : '' }}"
                                            placeholder="Enter Lessor name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Authorized Person</label>
                                    <select class="form-control select2 form-select" name="authorized_person">
                                    @if (isset($contractedit))
                                            <option value="{{ $contractedit->authorized_person }}" selected>
                                                {{ $contractedit->contract_status }}</option>
                                        @else
                                        <option value="" selected hidden>-----Select Status-----</option>
                                        <option value="Company Owner">Company Owner</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Employees">Employees</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Others">Others</option>

                                        @endif
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="lessor_sign" class="form-label">Authorized Person Sign</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="lessor_sign" name="lessor_sign">
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Release Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="release_date"
                                            value="{{ isset($contractedit) ? $contractedit->release_date : '' }}"
                                            placeholder="Enter Release Date ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease Start Date </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="lease_start_date"
                                            name="lease_start_date"
                                            value="{{ isset($contractedit) ? $contractedit->lease_start_date : '' }}"
                                            placeholder="Enter Lease Start Date ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease End Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="lease_end_date" name="lease_end_date"
                                            value="{{ isset($contractedit) ? $contractedit->lease_end_date : '' }}"
                                            placeholder="Enter Lease End Date">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease Period Month</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lease_period_month"
                                            name="lease_period_day"
                                            value="{{ isset($contractedit) ? $contractedit->lease_period_month : '' }}"
                                            placeholder="Enter Lease Period Month" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Lease Period Day</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lease_period_day"
                                            name="lease_period_day"
                                            value="{{ isset($contractedit) ? $contractedit->lease_period_day : '' }}"
                                            placeholder="Enter Lease Period Day" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Grace Period</label>
                               
                                <select class="select2 form-select" id="grace" name='grace'>  
                                @if (isset($contractedit))
                                    <option id="selectedOption" value="{{ $contractedit}}">{{ $contractedit->is_grace}}</option>
                         @else
                                    <option value="" selected hidden>--Select grace--</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    @endif

                                </select>
                            </div>
                                <div class="col-xxl-3 col-md-3" id="grace_start_date">
                                    <label for="name" class="form-label">Grace Start Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="grace_start"
                                            name="grace_start_date"
                                            value="{{ isset($contractedit) ? $contractedit->grace_start_date : '' }}"
                                           placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3" id="grace_end_date">
                                    <label for="name" class="form-label">Grace End Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="grace_end" name="grace_end_date"
                                            value="{{ isset($contractedit) ? $contractedit->grace_end_date : '' }}"
                                            placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3" id="grace_period_month">
                                    <label for="name" class="form-label">Grace Period Month</label>
                                    <div class="input-group">
                                            <input type="text" class="form-control" id="grace_month" name="grace_period_month" value="{{ isset($contractedit) ? $contractedit->grace_period_month : '' }}" placeholder="Grace Period Month" readonly>
                                        </div>
                                    
                                </div>
                                <div class="col-xxl-3 col-md-3" id="grace_period_day">
                                    <label for="name" class="form-label">Grace Period Day</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="grace_day"
                                            name="grace_period_day"
                                            value="{{ isset($contractedit) ? $contractedit->grace_period_day : '' }}"
                                            placeholder="Enter Grace Period Day" readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Approved By</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="approved_by"
                                            value="{{ isset($contractedit) ? $contractedit->approved_by : '' }}"
                                            placeholder="Enter Approved By ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Attestation No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="attestation_no"
                                            value="{{ isset($contractedit) ? $contractedit->attestation_no : '' }}"
                                            placeholder="Enter Attestation No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Attestation Expiry</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name"
                                            name="attestation_expiry"
                                            value="{{ isset($contractedit) ? $contractedit->attestation_expiry : '' }}"
                                            placeholder="Enter Attestation Expiry">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Rent Amount</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="rent_amount" name="rent_amount"
                                            value="{{ isset($contractedit) ? $contractedit->rent_amount : '' }}"
                                            placeholder="Enter Rent Amount">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                <label for="building_pic" class="form-label">Tenant Sign</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="tenant_sign" name="tenant_sign">
                                </div>
                            </div>

                            </div>
                            <div class="row gy-4 mt-2">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark">
                                    {{ isset($contractedit) ? $contractedit->remark : '' }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row gy-4 mt-2">
                                <div class="col-xxl-3 col-md-3">
                                    <div class="input-group">
                                        <button class="btn btn-primary"
                                            type="submit">{{ isset($contractedit) ? 'Update' : 'Submit' }}</button>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                        </form>
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
                        {{ isset($contractedit) ? 'Update Invoice' : 'Invoice Management' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                    <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id='pid' name='pid' value="">
            <div class="card-body field_wrapper">

            <table class="table table-nowrap container">
                        <thead>
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Total Amount Paid</th>
                                <th scope="col">Last Payment Date</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Cheque No/Transfer Bank Account No</th>
                                <th scope="col">Cheque Status</th>
                                <th scope="col">Comment</th>
                                <th scope="col"><div class="col-sm-1">
                        <br />
                        <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field">+</a>
                    </div></th>
                            </tr>
                        </thead>
                        <tbody class="field_table_wrapper">
                        </tbody>
                    </table>  
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
    </div>
@endsection


@section('script-area')
    <script>
        $(document).ready(function() {
            $("#tenant_name").change(function() {

                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    var newurl = "{{ url('/admin/fetchtenant') }}/" + optionValue;
                    $.ajax({
                        url: newurl,
                        method: 'get',
                        success: function(p) {
                            $('#sponsor_name').val(p.sponsor_name);
                            $('#sponsor_id').val(p.sponsor_oid);
                            $('#sponsor_mobile').val(p.sponsor_phone);
                            $('#sponsor_nationality').val(p.customer_nationality);

                        }
                    });
                });
            }).change();
        });
    </script>

<script>
    $(document).ready(function() {
        $('#grace_start_date').hide();
            $('#grace_end_date').hide();
            $('#grace_period_month').hide();
            $('#grace_period_day').hide();
       var selectValue= $("#selectedOption").text();
if(selectValue=="Yes"){
    $('#grace_start_date').show();
            $('#grace_end_date').show();
            $('#grace_period_month').show();
            $('#grace_period_day').show();
}
     
        $("#grace").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'Yes') {
                    $('#grace_start_date').show();
                    $('#grace_end_date').show();
                    $('#grace_period_month').show();
                    $('#grace_period_day').show();
                } else if (optionValue == 'No') {
                    $('#grace_start_date').hide();
                    $('#grace_end_date').hide();
                    $('#grace_period_month').hide();
                    $('#grace_period_day').hide();

                }
            });
        }).change();
    });
</script>
<script>
  
$('#lease_start_date').change(function(){
    var date = new Date($(this).val());
  var dayTo = date.getDate();
  var monthTo = date.getMonth() + 1;
  var yearTo = date.getFullYear();
  $('#lease_end_date').change(function(){
    var dateF = new Date($(this).val());
  var dayFrom = dateF.getDate();
  var monthFrom = dateF.getMonth() + 1;
  var yearFrom = dateF.getFullYear();
  start_date = new Date(yearTo, monthTo, dayTo);
end_date = new Date(new Date(yearFrom, monthFrom, dayFrom));
total_months = (end_date.getFullYear() - start_date.getFullYear())*12 + (end_date.getMonth() - start_date.getMonth())
$('#lease_period_month').val(total_months);

var d1 = new Date(date);   
var d2 = new Date(dateF);   
var diff = d2.getTime() - d1.getTime();   
var daydiff = diff / (1000 * 60 * 60 * 24);   
$('#lease_period_day').val(daydiff);

});
});

</script>
<script>
  
$('#grace_start').change(function(){
   var a= $(this).val();
    var date =new Date($(this).val());
  var dayTo = date.getDate();
  var monthTo = date.getMonth() + 1;
  var yearTo = date.getFullYear();
  $('#grace_end').change(function(){
    var dateF = new Date($(this).val());
  var dayFrom = dateF.getDate();
  var monthFrom = dateF.getMonth() + 1;
  var yearFrom = dateF.getFullYear();
  start_date = new Date(yearTo, monthTo, dayTo);
end_date = new Date(new Date(yearFrom, monthFrom, dayFrom));
total_months = (end_date.getFullYear() - start_date.getFullYear())*12 + (end_date.getMonth() - start_date.getMonth())
$('#grace_month').val(total_months);

var d1 = new Date(date);   
var d2 = new Date(dateF);   
var diff = d2.getTime() - d1.getTime();   
var daydiff = diff / (1000 * 60 * 60 * 24);   
$('#grace_day').val(daydiff);

});
});

</script>
<script>
    $(document).ready(function() {
        $("#tenant_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-tenant-details') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#tenant_mobile").html(p);

                    }
                });
            });
        }).change();
    });
</script>
<script>
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_table_wrapper'); //Input field wrapper
        var fieldHTML = '<tr><td><div class="col-sm-12">\
                </div></td>\ <td><div class="col-sm-12">\
                <input type="text" class="form-control" name="total_amount_paid[]">\
                </div></td>\<td><div class="col-sm-12">\
                <input type="text" class="form-control" name="last_payment_date[]">\
                </div></td>\ <td><div class="col-sm-12">\
                <input type="text" class="form-control" name="total_amount_paid[]">\
                </div></td>\
                <td><div class="col-sm-12">\
                <input type="text" class="form-control" name="cheque_or_bank_no[]">\
                </div></td>\<td><div class="col-sm-12">\
                <input type="text" class="form-control" name="cheque_status[]">\
                </div></td>\
                <td><div class="col-sm-12">\
                <textarea type="text" class="form-control" name="cheque_status[]" rows="1" cols="10"></textarea>\
                </div></td>\
                <td><div class="col-sm-12">\
                <a href="javascript:void(0);" class="add_button btn btn-danger remove_button" title=" field">-</a>\
                </div></td>\
                </tr>';
        //Once add button is clicked
        $(addButton).click(function() {

            $(wrapper).append(fieldHTML); //Add field html

        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove(); //Remove field html

        });

</script>
@endsection
