@extends('admin.includes.layout', ['breadcrumb_title' => 'File Management'])
<style>
    #card-header{
       background:#c8f4f6;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
   }
   #pop{
       color: black !important;
   }
   #header1
   {
       background: #ecf0f3;
       border: none !important;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
       box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
   }
   #h1
   {
       color: black;
   }
   #example
   {
       font-size: 14px;
   }
   thead
    {
        background:#c9e6e7 !important;
    }
   input ,select,textarea ,#building_type{
       border-radius: 10px !important;
       border: none !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
   }
   .dataTables_info,.dataTables_paginate {
       font-weight: bolder;
   }
   #btn-btn
   {
       background:#ffffff;
       color: black;
       border: none;
       border-radius: 10px !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
   #btn-btn:hover
   { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('title', 'Files')
@section('main-content')
@php
$filehtml='<option value="">--Select Building--</option>';
foreach($building as $b){
$filehtml .='<option value="'.$b->id.'">'.$b->name??'';
    $filehtml .=' / '.$b->building_no??'';
    $filehtml .='</option>';
}
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Create Files</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('admin.buildingFilesStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body field_wrapper4">
                            <div class="row clone4">
                                <div class="col-xxl-3 col-md-3">
                                    <label for="space" class="form-label">Building Name</label>
                                    <select class="select2 form-select js-example-basic-single" id="building_code" name="building_code[]">
                                        <option value="">--Select Building--</option>
                                        @foreach($building as $b)
                                        <option value="{{ $b->id }}">{{$b->name??''}}/{{ $b->building_no??''}}</option>
                                        @endforeach
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
                                    <a href="javascript:void(0);" class="add_button4 btn btn-success" id="btn-btn" title="Add field">+</a>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                </div>
                <div class="row mt-2">
                    <div class="col-xxl-3 col-md-6">
                        <div class="input-group">
                            <button class="btn btn-primary" id="btn-btn"type="submit">Submit</button>
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
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1">Manage Files</h4>
            </div><!-- end card header -->
            <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
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
                            <td>{{ $f->buildingDetails->name ??'' }}</td>
                            <td>{{ $f->file_name ??'' }}</td>
                            <td><a href="{{ asset('upload/building/files').'/'.$f->attachment}}" target="_ blank">{{ $f->attachment ?? ''   }}</a></td>
                            <td>{{ $f->created_at??'' }}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($f->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <!-- <li><a class="dropdown-item" href="{{route('admin.tenant-files.edit',$bid)}}">Edit</a></li> -->
                                        <li><a class="dropdown-item" id="pop" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                        <form id="delete-form-{{ $bid }}" action="{{ route('admin.buildingFilesDelete', $bid) }}" method="post" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Grids in modals -->
@endsection


@section('script-area')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    var filehtml = '{!!   $filehtml !!}';

    var count = 1;
</script>
<script>
    // product detail
    var addButton4 = $('.add_button4'); //Add button selector
    var wrapper4 = $('.field_wrapper4'); //Input field wrapper
    var fieldHTML4 = '<div class="row">\
        <div class="col-sm-3"><label for="" class="form-label">Building Name</label>\
<select class="form-control select2 form-select" name="building_code[]">' + filehtml + '</select>\
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
                    <a href="javascript:void(0);" class="add_button btn btn-danger remove_button4"  id="btn-btn" title=" field">-</a>\
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
@endsection
