@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Legal'])
@section('title', 'Register Legal')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Register Legal</h4>
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
                                <label class="form-label" for="flag">Tenant Name</label>
                                <select class="select2 form-select" id="tenant_name" name='tenant_name'>
                                    <option value="">--Select Name--</option>
                                    @foreach($tenantDetail as $td)
                                    <option value="{{ $td->id}}">{{ $td->tenant_english_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Mobile No</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" readonly>
                                  
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Unit Ref</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="unit_ref" readonly>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label class="form-label" for="flag">Status</label>
                                <select class="select2 form-select" id="process" name='status'>
                                <option value="Collection Process">Collection Process</option>
                                <option value="In the Court">In the Court</option>
                                <option value="Settelment Process">Settelment Process</option>
                                <option value="Settelment Done">Settelment Done</option>
                                <option value="Exempt by the lessor">Exempt by the lessor</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-12">
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


<!-- Grids in modals -->
@endsection


@section('script-area')
<script>
    $(document).ready(function() {
        $("#tenant_name").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetch-tenant') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $("#mobile_no").val(p.tenant_primary_mobile);
                    }
                });
            });
        }).change();
    });
</script>
@endsection