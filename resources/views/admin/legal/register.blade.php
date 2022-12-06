@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Legal'])
@section('title', 'Manage Legal')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex table-main-heading">
                <h4 class="card-title mb-0 flex-grow-1">Manage Legal</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{route('admin.legal.store')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Choose Contract</label>
                                <select class="select2 form-select" id="contract_id" name='contract_id'>
                                    <option value="">--Select Contract--</option>
                                    @foreach($tenantDetail as $td)
                                    <option value="{{ $td->id}}">{{ $td->contract_code??'' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Tenant Name</label>
                                <input type="text" class="form-control" id="tenant_name" name="tenant_name" readonly>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Mobile No</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" readonly>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Unit Ref</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="unit_ref" name="unit_ref" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="name" class="form-label">Last Payment Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="last_payment_date" name="last_payment_date" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label class="form-label" for="flag">Status</label>
                                <select class="select2 form-select" id="process" name='status'>
                                <option value="Collection Process">Collection Process</option>
                                <option value="In the Court">In the Court</option>
                                <option value="Settelment Process">Settelment Process</option>
                                <option value="Settelment Done">Settelment Done</option>
                                <option value="Exempt by the lessor">Exempt by the lessor</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-4">
                                <label for="attachment_file" class="form-label">Attachment File</label>
                                <div class="input-group">
                                    <input type="file" class="form-control"  id="attachment_file" name="attachment_file[]" multiple>
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
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1">All Legal Details</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead class="thead-color">
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Unit Ref</th>
                                <th scope="col">File</th>                                
                                <th scope="col">Status</th>
                                <th scope="col">Current Status</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($legalDetail as $legal)
                                <tr>
                                    <th scope="row">{{ $loop->index+ 1 }}</th>
                                    <td>{{ $legal->tenantName->tenant_english_name??''}}</td>
                                    <td>
                                        {{ $legal->tenant_mobile??''}}
                                    </td>
                                    <td>
                                    {{ $legal->unit_ref??''}}

                        </td>
                        <form action="{{ route('admin.alllegal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lid" value="{{ $legal->id ?? '' }}" />

                        <td>
                             
                            <div class="d-flex">
                                    <img src="{{asset('upload/legal_doc/'.$legal->file)}}" class="" style="height:50px;width:50px;" /> &nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name='attachment_file[]' class="form-control" multiple />
                                </div>  
                    </td>
                                    <td>
                                <select class="select2 form-select" id="process" name='status'>
                                <option value="Collection Process">Collection Process</option>
                                <option value="In the Court">In the Court</option>
                                <option value="Settelment Process">Settelment Process</option>
                                <option value="Settelment Done">Settelment Done</option>
                                <option value="Exempt by the lessor">Exempt by the lessor</option>
                                </select>
                                    </td>
                                    <td>
                                        {{ $legal->status??'' }}
                                    </td>
                                    <td>
                                <input type="text" class="form-control" name="remark" value="{{ isset($legal)? $legal->remark : '' }}" />                                
                                    </td>
                           <td>
                           <button type="submit" class="btn-icon btn btn-primary btn-round btn-sm"
                                                         ><i data-feather="check-circle"></i></button>
                                                       
                           </td>
                           </form>

                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Grids in modals -->
@endsection


@section('script-area')
<script>
    $(document).ready(function() {
        $(document).on('change','#contract_id',function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-legal-contract') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        console.log(p);
                        $("#tenant_name").val(p.res.tenant_details.tenant_english_name);
                        $("#mobile_no").val(p.res.tenant_details.tenant_primary_mobile);

                        $("#unit_ref").val(p.unit_ref);

                    }
                });
            });
        }).change();
    });
</script>
@endsection