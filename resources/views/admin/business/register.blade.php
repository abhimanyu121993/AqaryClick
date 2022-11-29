@extends('admin.includes.layout', ['breadcrumb_title' => 'Business Details'])
@section('title', 'Business Details')
@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"> Business Details</h4>
                </div><!-- end card header -->
                <div class="card-body">
                        <form action="{{ route('admin.business.store') }}" method="POST" enctype="multipart/form-data">
                            {{-- @if (isset($customer))
                            @method('patch')
                        @endif --}}
                            @csrf
                            <!-- <div class="row gy-4 mb-3">
                                <div class=" col-md-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class=" col-md-3">
                                    <label for="owner_name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                               
                                <div class=" col-md-3">
                                    <label for="incharge_name" class="form-label">Customer Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="customer_code"
                                            placeholder="Customer Code">
                                    </div>
                                </div>
                                
                               
                              
                            </div> -->

                    <div class="row gy-4 mb-3" id="cmpname">
                        <!-- <div class="card-header align-items-center d-flex" id="company">
                            <hr>
                            <h4 class="card-title mb-0 flex-grow-1"> Business Detail</h4>
                        </div> -->
                        <div class="col-md-3">
                                    <label for="space" class="form-label">Customer Type</label>
                                    <select class="form-control" id="customer" name="customer_type">
                                        <option value="" selected hidden>-----Select Customer-----</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Company">Company</option>
                                    </select>
                                </div>
                        <div class="col-md-3">
                                    <label for="space" class="form-label">Business Type</label>
                                    <select class="form-control" id="customer" name="business_type">
                                        <option value="" selected hidden>-----Select Business-----</option>
                                        <option value="Product">Product</option>
                                        <option value="Service">Service</option>
                                        <option value="Product-service">Both</option>
                                    </select>
                                </div>
                        <div class="col-md-3" id="cname">
                            <label for="country" class="form-label">Business Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="business_name" placeholder="Enter Business Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="city" class="form-label">CR Reg. No.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="cr_reg_no" placeholder="Enter CR Reg. Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                                    <label for="remark" class="form-label">Address</label>
                                    <textarea class="form-control" name="address">
                                    </textarea>
                                </div>
                        <div class=" col-md-3">
                                    <label for="incharge_name" class="form-label"> Email </label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class=" col-md-3">
                                    <label for="incharge_name" class="form-label">Phone number </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                        <div class="col-md-3" id="authp">
                            <label for="country" class="form-label">Authorized Person</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="authorized_person"
                                    placeholder="Enter Authorized Person Name">
                            </div>
                        </div>
                        <div class="col-md-3" id="cmplog">
                            <label for="state" class="form-label">Image Logo</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="company_logo" placeholder="Company Logo">
                            </div>
                        </div>
                        <div class="col-md-3" id="fname">
                            <label for="country" class="form-label">Document Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="document_name" placeholder="Document name">
                            </div>
                        </div>
                        <div class="col-md-3" id="fname">
                            <label for="country" class="form-label">Document</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="document_file" placeholder="Upload File">
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                            <label for="city" class="form-label">Document Exipry Date</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="document_exp_date" placeholder="Expiry Date">
                            </div>
                        </div> 
                       
                        <div class="col-md-3">
                                        <label for="space" class="form-label">Company Activity</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="company_activity"
                                                placeholder="Enter Activity">
                                        </div>
                                    </div>
                    </div>
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1"> Bank Detail</h4>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-md-3 mb-2">
                            <label for="country" class="form-label">Bank Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Details">
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="state" class="form-label">Account Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="account_number"
                                    placeholder="Enter Account No">
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="state" class="form-label">IBAN No</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="iban_no"
                                    placeholder="Enter IBAN No">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="space" class="form-label">Bank Code</label>
                            <select class="form-control" id="bank_code" name="bankcode">
                                <option value="">-----Select Code-----</option>
                                <option value="ifsc">Ifsc Code</option>
                                <option value="swift">Swift Code</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2" id="swift">
                            <label for="country" class="form-label">Swift Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="swift" placeholder="Enter Swift Code">
                            </div>
                        </div>
                        <div class="col-md-3 mb-2" id="ifsc">
                            <label for="country" class="form-label">IFSC Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ifsc" placeholder="Enter Ifsc Code">
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">Save</button>
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
    <!-- <script>
        $(document).ready(function() {
            // alert("jhgigygyugy");
            $("#customer").change(function() {
                $('#indi').hide();
                $('#cmpname').hide();
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    // alert(optionValue);
                    if (optionValue == 'Individual') {
                        $('#indi').show();
                    } else if (optionValue == 'Company') {
                        $('#cmpname').show();
                    }
                });
            }).change();
        });
    </script> -->

<script>
        $(document).ready(function() {
            $("#bank_code").change(function() {
                $('#ifsc').hide();
                $('#swift').hide();
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
@endsection
