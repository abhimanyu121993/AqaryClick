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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="col-lg-12" >
            <div class="modal-content" id="card-header">
                <div class="modal-header" >
                    <h5 class="modal-title" id="header1" id="exampleModalLabel">Business Details</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                    <form action="{{ url('admin/business-data/buisness') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-sm">
                            <label for="space" class="form-label">Customer Type</label>
                            <select class="form-control" name="customer_type">
                                <option value="" selected hidden>--Select Customer--</option>
                                <option value="Individual">Individual</option>
                                <option value="Company">Company</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="space" class="form-label">Business Type</label>
                            <select class="form-control" id="customer" name="business_type">
                                <option value="" selected hidden>-----Select Business-----</option>
                                <option value="Product">Product</option>
                                <option value="Service">Service</option>
                                <option value="Product-service">Both</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="message-text" class="col-form-label">Business Name</label>
                            <input type="text" class="form-control" name="business_name"
                                placeholder="Enter Business Name">
                        </div>
                        <div class="col-sm">
                            <label for="remark" class="form-label">Address</label>
                            <textarea class="form-control" cols="30" rows="1" name="address">
                            </textarea>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm">
                                <label for="incharge_name" class="form-label"> Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col-sm">
                                <label for="incharge_name" class="form-label">Phone number </label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label for="incharge_name" class="form-label">Post Box </label>
                                <input type="text" class="form-control" name="post_box" placeholder="Enter Post Box No">
                            </div>
                            <div class="col-sm">
                                <label for="country" class="form-label">Authorized Person</label>
                                <input type="text" class="form-control" name="authorized_person"
                                    placeholder="Enter Authorized Person Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label for="message-text" class="col-form-label">Image Logo</label>
                                <input type="file" class="form-control" name="company_logo" placeholder="Company Logo">
                            </div>
                            <div class="col-sm">
                                <label for="space" class="form-label">Company Activity</label>
                                <input type="text" class="form-control" name="company_activity"
                                    placeholder="Enter Activity">
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" id="btn-btn" class="btn btn-primary" data-toggle="modal" data-target="#secModal"
                                data-backdrop="static" data-keyboard="false">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="col-lg-12">
            <div class="modal-content" id="card-header">
                <div class="modal-header">
                    <h5 class="modal-title" id="header1" id="exampleModalLabel">Document Details</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                    <form action="{{ route('admin.storeModalBusinessDocumentData') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="{{ Auth::user()->customerDetail->step }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                            <label for="recipient-name" class="col-form-label">Document Name</label>
                            <input type="text" class="form-control" name="document_name[]"
                                placeholder="Enter Document Name" required>
                        </div>
                        <div class="col-sm">
                            <label for="message-text" class="col-form-label">Document File</label>
                            <input type="file" class="form-control" name="docfile[]" required>
                        </div>
                    </div>
                       <div class="row">
                        <div class="col-sm">
                            <label for="" class="form-label">Document Expiry</label>
                            <input type="date" class="form-control" name="document_exp_date[]">
                        </div>
                       </div>
                       <div class="modal-footer">
                        <button type="submit" id="btn-btn" class="btn btn-primary" data-toggle="modal" data-target="#secModal"
                            data-backdrop="static" data-keyboard="false">Submit</button>
                    </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="col-lg-12">
            <div class="modal-content" id="card-header">
                <div class="modal-header">
                    <h5 class="modal-title" id="header1" id="exampleModalLabel">Bank Details</h5>
                </div>
                <div class="modal-body">
                   <div class="container">
                    <form action="{{ route('admin.storeModalBankDocumentData') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <label for="recipient-name" class="col-form-label">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name"
                                    placeholder="Enter Bank Name">
                            </div>
                            <div class="col-sm">
                                <label for="message-text" class="col-form-label">Account Number</label>
                                <input type="text" class="form-control" name="account_number"
                                    placeholder="Enter Account No">
                            </div>
                        </div>
                       <div class="row">
                        <div class="col-sm">
                            <label for="message-text" class="col-form-label">IBAN No</label>
                            <input type="text" class="form-control" name="iban_no" placeholder="Enter IBAN No">
                        </div>
                        <div class="col-sm">
                            <label for="space" class="form-label">Bank Code</label>
                            <select class="form-control bank_code" id="bank_code" name="bankcode">
                                <option value="">-----Select Code-----</option>
                                <option value="ifsc">Ifsc Code</option>
                                <option value="swift">Swift Code</option>
                            </select>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-sm" id="swift">
                            <label for="message-text" class="col-form-label">Swift Code</label>
                            <input type="text" class="form-control" name="swift"
                                placeholder="Enter Swift Code">
                        </div>
                        <div class="col-sm" id="ifsc">
                            <label for="message-text" class="col-form-label">IFSC Code</label>
                            <input type="text" class="form-control" name="ifsc" placeholder="Enter Ifsc Code">
                        </div>
                       </div>
                       <br>
                       <div class="modal-footer">
                        <button type="submit" id="btn-btn" class="btn btn-primary" data-toggle="modal" data-target="#secModal"
                            data-backdrop="static" data-keyboard="true">Submit</button>
                    </div>
                    </form>
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load', function() {
        @if (Auth::user()->hasRole('Owner'))
            @if (Auth::user()->customerDetail->step == 0)
                $('#exampleModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#exampleModal').modal('show');
            @elseif (Auth::user()->customerDetail->step == 1)
                $('#exampleModal2').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#exampleModal2').modal('show');
            @elseif (Auth::user()->customerDetail->step == 2)
                $('#exampleModal3').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#exampleModal3').modal('show');
            @endif
        @endif

    });
</script>
<script>
    $(document).ready(function() {
        $('#ifsc').hide();
        $('#swift').hide();
        $("#bank_code").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'ifsc') {
                    $('#ifsc').show();
                    $('#swift').hide();

                } else if (optionValue == 'swift') {
                    $('#swift').show();
                    $('#ifsc').hide();

                }
            });
        }).change();
    });
</script>
