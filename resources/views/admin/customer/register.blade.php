@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Customer'])
@section('title', 'Register Customer')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1"> Personal Detail</h4>
                </div><!-- end card header -->
                <div class="card-body">
                        <form action="route" method="POST">
                            {{-- @if (isset($customer))
                            @method('patch')
                        @endif --}}
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class=" col-md-6">
                                    <label for="name" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="owner_name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="incharge_name" class="form-label"> Email </label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="incharge_name" class="form-label">Phone number </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="remark" class="form-label">Address</label>
                                    <textarea class="form-control" name="address">
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="space" class="form-label">Customer Type</label>
                                    <select class="form-control" id="building" name="building_type">
                                        <option value="">-----Select Customer-----</option>
                                        <option value="one">Individual</option>
                                        <option value="two">Company</option>
                                    </select>
                                </div>
                            </div>

                    <div class="row gy-4 mb-3" id="cmpname">
                        <div class="card-header align-items-center d-flex" id="company">
                            <hr>
                            <h4 class="card-title mb-0 flex-grow-1"> Company Detail</h4>
                        </div>
                        <div class="col-md-6" id="cname">
                            <label for="country" class="form-label">Company Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="col-md-6" id="cadd">
                            <label for="state" class="form-label">Company Address</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="company_address" placeholder="Company Address">
                            </div>
                        </div>
                        <div class="col-md-6" id="authp">
                            <label for="country" class="form-label">Authorized Person</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="authorised_manager"
                                    placeholder="Authorized Person Name">
                            </div>
                        </div>
                        <div class="col-md-6" id="cmplog">
                            <label for="state" class="form-label">Company Logo</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="company_logo" placeholder="Company Logo">
                            </div>
                        </div>
                        <div class="col-md-6" id="fname">
                            <label for="country" class="form-label">Document</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="document_file" placeholder="Upload File">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Document Exipry Date</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="document_exp_date" placeholder="Expiry Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Company Reg. Num.</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="reg_num" placeholder="Enter Reg. Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="space" class="form-label">Company Activity</label>
                            <select class="form-control" id="building" name="building_type">
                                <option value="">-----Select Customer-----</option>
                                <option value="Trading_in_Computer_Software">Trading in Computer Software</option>
                                <option value="Real_Estate_Management">Real Estate Management</option>
                                <option value="Car_Spare_Part_Trading">Car Spare Part Trading</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1"> Bank Detail</h4>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-md-6 mb-2">
                            <label for="country" class="form-label">Bank Details</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Details">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="state" class="form-label">Account Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="acccount_number"
                                    placeholder="Company Address">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="country" class="form-label">IFSC Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ifsc" placeholder="Company Name">
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
    <script>
        $(document).ready(function() {
            // alert("jhgigygyugy");
            $("#building").change(function() {
                $('#indi').hide();
                $('#cmpname').hide();
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    // alert(optionValue);
                    if (optionValue == 'one') {
                        $('#indi').show();
                    } else if (optionValue == 'two') {
                        $('#cmpname').show();
                    }
                });
            }).change();
        });
    </script>
@endsection
