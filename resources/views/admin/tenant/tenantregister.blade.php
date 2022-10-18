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
                        <div class="row gy-4 mb-3">
                            <div class=" col-md-6">
                                <label for="name" class="form-label">File number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="file_number" placeholder="File Number">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="owner_name" class="form-label">Tenant Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_code" placeholder="Tenant Code">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="owner_name" class="form-label">Tenant Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tenant_name" placeholder="Tenant Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="space" class="form-label">Tenant Type</label>
                                <select class="form-control" id="customer" name="customer_type">
                                    <option value="">-----Select Tenant Type-----</option>
                                    <option value="Personal">Personal</option>
                                    <option value="Company">Company</option>
                                </select>
                            </div>
                            <div class=" col-md-6">
                                <label for="incharge_name" class="form-label">Primary Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="primary_phone"
                                        placeholder="Primary Phone Number">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="incharge_name" class="form-label">Secondary Phone number </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="secondary_phone"
                                        placeholder="Secondary Phone Number">
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <label for="incharge_name" class="form-label">Email </label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                <div class="row gy-4 mb-3" id="cmpname">
                    <div class="col-md-6" id="cname">
                        <label for="country" class="form-label">Post Office Box</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="post_office" placeholder="Post Office">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="remark" class="form-label">Unit Address</label>
                        <textarea class="form-control" name="address">
                        </textarea>
                    </div>
                    <div class="col-md-6" id="authp">
                        <label for="country" class="form-label">Account Number</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="account_number"
                                placeholder=" Account Number ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="space" class="form-label">Tenant Status</label>
                        <select class="form-control" name="tenant_status">
                            <option value="">-----Select Tenant Status-----</option>
                            <option value="new">New</option>
                            <option value="old">Old</option>
                            <option value="related">Related Party</option>
                        </select>
                    </div>
                    <div class="col-md-6" id="fname">
                        <label for="country" class="form-label">Document Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="document_name" placeholder="Document name">
                        </div>
                    </div>
                    <div class="col-md-6" id="fname">
                        <label for="country" class="form-label">Total Unit</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="total_unit" placeholder=" Total Unit">
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    <div class="col-md-6">
                        <label for="city" class="form-label">Sponsor Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_name" placeholder="sponsor Name">
                        </div>
                    </div><div class="col-md-6">
                        <label for="city" class="form-label">Sponsor Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_email" placeholder="Sponsor Email">
                        </div>
                    </div><div class="col-md-6">
                        <label for="city" class="form-label">Sponsor Phone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_phone" placeholder="sponsor Phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">Sponsor OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="sponsor_oid" placeholder="sponsor OID">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">File Attachment</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File" multiple>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="remark" class="form-label">Attachment Remark</label>
                        <textarea class="form-control" name="attachment_remark">
                        </textarea>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <label for="space" class="form-label">Document Type</label>
                        <select class="form-control" id="tenant_document_type" name="tenant_document">
                            <option value="">-----Select Document Type-----</option>
                            <option value="OID">OID</option>
                            <option value="CR">CR</option>
                            <option value="Passcode">Passcode</option>
                        </select>
                    </div><br>
                <div class="row">
                    <div class="col-md-6 mb-2" id="oid">
                        <label for="country" class="form-label">OID</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="oid_document" placeholder="Oid Document Number">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2" id="cr">
                        <label for="state" class="form-label">CR</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="cr_document"
                                placeholder="CR Document">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2" id="passcode">
                        <label for="country" class="form-label">Passcode</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="passcode" placeholder="Passcode Document">
                        </div>
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

@endsection
@section('script-area')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
//    alert();
$(document).ready(function() {
            // alert("jhgigygyugy");
            $("#tenant_document_type").change(function() {
                // alert('tenant');
                $('#oid').hide();
                $('#cr').hide();
                $('#passcode').hide();
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    // alert(optionValue);
                    if (optionValue == 'oid_dcmnt') {
                        $('#oid').show();
                    } else if (optionValue == 'cr_dcmnt') {
                        $('#cr').show();
                    }else if (optionValue == 'passcode_dcmnt') {
                        $('#passcode').show();
                    }
                });
            }).change();
        });
</script>
@endsection
