@extends('admin.includes.layout', ['breadcrumb_title' => 'File Management'])
@section('title', 'Files')
@section('main-content')
@php
                                            $filehtml='<option value="">--Select Code--</option>';
                                            foreach($tenantcode as $b){
                                                $filehtml .='<option value="'.$b->id.'">'.$b->tenant_english_name??'';
                                                    $filehtml .=' / '.$b->tenant_primary_mobile??'';
                                                    $filehtml .='</option>';
                                            }
                                        @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($filesedit)? 'Update Files' : 'Create Files' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($filesedit) ? route('admin.tenant-files.update', $filesedit->id) : route('admin.tenant-files.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($filesedit))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="card-body field_wrapper4">
                             <div class="row clone4">
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Tenant</label>
                                <select class="select2 form-select js-example-basic-single" id="tenant_code" name="tenant_code[]">
                                @if (isset($city))
                                    <option value="{{ $city->tenant_code }}" selected>{{ $city->tenant_code}}</option>
                                    @else
                                    <option value="">--Select Code--</option>
                                    @foreach ($tenantcode as $code)
                                    <option value="{{ $code->id }}">{{ $code->tenant_english_name??''}}/{{ $code->tenant_primary_mobile??''}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
            
                
                <div class="col-xxl-3 col-md-4">
                        <label for="city" class="form-label">File Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="file_name[]" placeholder="File Name">
                        </div>
                    </div>
                <div class="col-xxl-3 col-md-4">
                        <label for="city" class="form-label">Attachment</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <br />
                        <a href="javascript:void(0);" class="add_button4 btn btn-success" title="Add field">+</a>
                    </div>
                </div>
                        </div>
                                <!--end col-->
                            </div>
                            <div class="row mt-2">
                            <div class="col-xxl-3 col-md-6">
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit">{{isset($filesedit) ? 'Update' : 'Submit'}}</button>
                                    </div>
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
            <h4 class="card-title mb-0 flex-grow-1">Manage Files</h4>
        </div><!-- end card header -->
        <div class="card-body">
        <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                <thead>
                    <tr>
                        <th scope="col">Sr.No.</th>
                        <th scope="col">Tenant Name</th>
                        <th scope="col">Building Name</th>
                        <th scope="col">File Name</th>
                        <th scope="col">Attachment</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $f)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $f->tenantDetails->tenant_english_name ??'' }}</td>
                            <td>{{ $f->tenantDetails->buildingDetails->name ??'' }}</td>

                            <td>{{ $f->file_name ??'' }}</td>
                            <td><a href="{{ asset('upload/tenant/files').'/'.$f->attachment}}" target="_ blank">{{  $f->attachment ?? ''   }}</a></td>
                            <td>{{ $f->created_at??'' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($f->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <!-- <li><a class="dropdown-item" href="{{route('admin.tenant-files.edit',$bid)}}">Edit</a></li> -->
                                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                        <form id="delete-form-{{ $bid }}" action="{{ route('admin.tenant-files.destroy', $bid) }}"
                                            method="post" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>
                    @endforeach
                    </tr>
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
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script>
var   filehtml='{!!   $filehtml !!}';

var count = 1;

</script>
<script>
          // product detail
        var addButton4 = $('.add_button4'); //Add button selector
        var wrapper4 = $('.field_wrapper4'); //Input field wrapper
        var fieldHTML4 = '<div class="row">\
        <div class="col-sm-3"><label for="" class="form-label">Tenant</label>\
<select class="select2 form-select js-example-basic-single" name="tenant_code[]">'+filehtml+'</select>\
           </div>\
        <div class="col-sm-4">\
                    <label for="" class="form-label">File Name</label>\
                    <input type="text" class="form-control" name="file_name[]" placeholder="File Name">\
                </div>\
                <div class="col-sm-4">\
                    <label for="" class="form-label">File Attachment</label>\
                    <input type="file" class="form-control" name="attachment_file[]" placeholder="Attachment File">\
                </div>\
                <div class="col-sm-1">\
                    <br/>\
                    <a href="javascript:void(0);" class="add_button btn btn-danger remove_button4" title=" field">-</a>\
                </div></div>';

        //Once add button is clicked
        $(addButton4).click(function() {

            $(wrapper4).append(fieldHTML4); //Add field html

        });

        //Once remove button is clicked
        $(wrapper4).on('click', '.remove_button4', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove(); //Remove field html

        });

</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
