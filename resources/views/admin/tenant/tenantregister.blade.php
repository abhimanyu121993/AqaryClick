@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Tenant'])
@section('title', 'Register Tenant')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"> Tenant Detail</h4>
            </div><!-- end card header -->
            <div class="card-body">
                    <form action="{{ route('admin.tenant.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- @if (isset($customer))
                        @method('patch')
                    @endif --}}
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
                        <div class="row gy-4 mb-3">
                            <div class=" col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_code" placeholder="Tenant Code">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name In English</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_english_name" placeholder="Tenant Name In English">
                                </div>
                            </div>
                            <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name In Arabic</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_arabic_name" placeholder="Tenant Name In Arabic">
                                </div>
                            </div>
                            {{-- <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_code" placeholder="Tenant Code">
                                </div>
                            </div> --}}
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Document Type</label>
                                <select class="form-control" id="tenant_document_type" name="tenant_document">
                                    <option value="">-----Select Document Type-----</option>
                                    <option value="QID">QID</option>
                                    <option value="CR">CR</option>
                                    <option value="Passport">Passport</option>
                                </select>
                            </div><br>
                        
                            <div class="col-xxl-3 col-md-3 mb-2" id="qid">
                                <label for="country" class="form-label">QID</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="qid_document" placeholder="Qid Document Number">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                                <label for="state" class="form-label">CR</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cr_document"
                                        placeholder="CR Document">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3 mb-2" id="passport">
                                <label for="country" class="form-label">Passport</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="passport" placeholder="Passport Document">
                                </div>
                            </div>
                        <div class="col-xxl-3 col-md-3 mb-2">
                            <label for="space" class="form-label">Tenant Nationality</label>
                            <select class="form-control" id="customer" name="tenant_nationality">
                                <option value="">-----Select Tenant Nationality-----</option>
                                @foreach($nation as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Tenant Primary Mobile Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_primary_mobile" placeholder="Tenant Priamry Mobile Number">
                            </div>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="owner_name" class="form-label">Tenant Secondary Mobile Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tenant_secondary_mobile" placeholder="Tenant Secondary Mobile Number">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-12">
                            <label for="remark" class="form-label">Tenant Address</label>
                            <textarea class="form-control" name="tenant_address">
                            </textarea>
                        </div>
                        <div class=" col-xxl-3 col-md-3">
                            <label for="incharge_name" class="form-label">Email </label>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                            <div class="col-xxl-3 col-md-3" id="cname">
                                <label for="country" class="form-label">Post Office Box</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="post_office" placeholder="Post Office">
                                </div>
                            </div>
                            {{-- <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_code" placeholder="Tenant Code">
                                </div>
                            </div> --}}
                            {{-- <div class=" col-xxl-3 col-md-3">
                                <label for="owner_name" class="form-label">Tenant Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_name" placeholder="Tenant Name">
                                </div>
                            </div> --}}
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Tenant Type</label>
                                <select class="form-control" id="customer" name="tenant_type">
                                    <option value="">-----Select Tenant Type-----</option>
                                    <option value="Company">Company</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Single">Single</option>
                                    <option value="Family">Family</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Unit Type</label>
                                <select class="form-control" id="customer" name="unit_type">
                                    <option value="">-----Select Unit Type-----</option>
                                    <option value="Residental">Residental</option>
                                    <option value="Office">Office</option>
                                    <option value="Store">Store</option>
                                    <option value="land">land</option>
                                    <option value="Shop">Shop</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Unit Address</label>
                                <textarea class="form-control" name="unit_address">
                                </textarea>
                            </div>
                            <div class="col-xxl-3 col-md-3" id="authp">
                                <label for="country" class="form-label">Rental Period</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="rental_period"
                                        placeholder="Rental Period">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Payment Method</label>
                                <select class="form-control" id="#" name="payment_method">
                                    <option value="">-----Select Payment Method-----</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheques">Cheques</option>
                                    <option value="Transfer Bank">Transfer Bank</option>
                                </select>
                            </div>
                            {{-- <div class="col-xxl-3 col-md-3" id="authp">
                                <label for="country" class="form-label">Payment Method</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="payment_method"
                                        placeholder=" Account Number ">
                                </div>
                            </div> --}}
                            <div class="col-xxl-3 col-md-3">
                                <label for="country" class="form-label">Receipt Of Cheques</label><br>
                            <div class="form-check-inline ">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" value="yes" name="payment_receipt">Yes
                                </label>
                              </div>
                              <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" value="no" name="payment_receipt">No
                                </label>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="city" class="form-label">File Attachment</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File" multiple>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="attachment_remark">
                                </textarea>
                            </div>
                            {{-- <div class=" col-xxl-3 col-md-3">
                                <label for="incharge_name" class="form-label">Primary Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="primary_phone"
                                        placeholder="Primary Phone Number">
                                </div>
                            </div>
                             <div class=" col-xxl-3 col-md-3">
                                <label for="incharge_name" class="form-label">Secondary Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="secondary_phone"
                                        placeholder="Secondary Phone Number">
                                </div>
                            </div>
                             <div class=" col-xxl-3 col-md-3">
                                <label for="incharge_name" class="form-label">Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email">
                                </div>
                            </div>

                 <div class="row gy-4 mb-3" id="cmpname">
                    <div class="col-xxl-3 col-md-3" id="cname">
                        <label for="country" class="form-label">Post Office Box</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="post_office" placeholder="Post Office">
                        </div>
                    </div>
                     <div class="col-xxl-3 col-md-12">
                        <label for="remark" class="form-label">Unit Address</label>
                        <textarea class="form-control" name="address">
                        </textarea>
                    </div> -
                    <div class="col-xxl-3 col-md-3" id="authp">
                        <label for="country" class="form-label">Account Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="account_number"
                                placeholder=" Account Number ">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="space" class="form-label">Tenant Status</label>
                        <select class="form-control" name="tenant_status">
                            <option value="">-----Select Tenant Status-----</option>
                            <option value="new">New</option>
                            <option value="old">Old</option>
                            <option value="related">Related Party</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-md-3" id="fname">
                        <label for="country" class="form-label">Document Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="document_name" placeholder="Document name">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3" id="fname">
                        <label for="country" class="form-label">Total Unit</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="total_unit" placeholder=" Total Unit">
                        </div>
                    </div>
                     <div class="col-xxl-3 col-md-3">
                        <label for="space" class="form-label">Tenant Nationality</label>
                        <select class="form-control" id="customer" name="customer_nationality">
                            <option value="">-----Select Tenant Nationality-----</option>
                            <option value="Indian">Indian</option>
                            <option value="Dubai">Dubai</option>
                            <option value="England">England</option>
                            <option value="Chinies">Chinies</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Sponsor</h4>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_name" placeholder="sponsor Name">
                        </div>
                    </div><div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_email" placeholder="Sponsor Email">
                        </div>
                    </div><div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_phone" placeholder="sponsor Phone">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">Sponsor OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_oid" placeholder="sponsor OID">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="city" class="form-label">File Attachment</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File" multiple>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="remark" class="form-label">Attachment Remark</label>
                        <textarea class="form-control" name="attachment_remark">
                        </textarea>
                    </div>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <label for="space" class="form-label">Document Type</label>
                        <select class="form-control" id="tenant_document_type" name="tenant_document">
                            <option value="">-----Select Document Type-----</option>
                            <option value="OID">OID</option>
                            <option value="CR">CR</option>
                            <option value="Passcode">Passcode</option>
                        </select>
                    </div><br>
                <div class="row">
                    <div class="col-xxl-3 col-md-3 mb-2" id="oid">
                        <label for="country" class="form-label">OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="oid_document" placeholder="Oid Document Number">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3 mb-2" id="cr">
                        <label for="state" class="form-label">CR</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cr_document"
                                placeholder="CR Document">
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-3 mb-2" id="passcode">
                        <label for="country" class="form-label">Passcode</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="passcode" placeholder="Passcode Document">
                        </div>
                    </div>
                </div> --}}
            </div>
                <div>
                </div>
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-3">
                        <button class="btn btn-primary" type="submit">Save</button>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
//    alert();
$(document).ready(function() {
            // alert("jhgigygyugy");
            $("#tenant_document_type").change(function() {
                // alert('tenant');
                $('#qid').hide();
                $('#cr').hide();
                $('#passport').hide();
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    // alert(optionValue);
                    if (optionValue == 'QID') {
                        $('#qid').show();
                    } else if (optionValue == 'CR') {
                        $('#cr').show();
                    }else if (optionValue == 'Passport') {
                        $('#passport').show();
                    }
                });
            }).change();
        });
</script>
@endsection
