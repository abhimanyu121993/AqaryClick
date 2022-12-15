@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Legal'])
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
@section('title', 'Manage Legal')
@section('main-content')


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="header1">
                            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Update Legal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                <form action="{{route('admin.updateLegal')}}" method="POST" enctype="multipart/form-data">
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
                                            <div class="col-xxl-6 col-md-12">
                                                <label class="form-label" for="flag">Status</label>
                                                <select class="select2 form-select" id="process" name='status'>
                                                <option value="" selected hidden id="option">--Select Status--</option>
                                                    <option value="Collection Process">Collection Process</option>
                                                    <option value="In the Court">In the Court</option>
                                                    <option value="Settelment Process">Settelment Process</option>
                                                    <option value="Settelment Done">Settelment Done</option>
                                                    <option value="Exempt by the lessor">Exempt by the lessor</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-6 col-md-12">
                                                <label for="attachment_file" class="form-label">Attachment File</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="attachment_file" name="attachment_file[]" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-4 mb-3">
                                            <div class="col-xxl-3 col-md-12">
                                                <label for="remark" class="form-label">Remark</label>
                                                <textarea id="remark" class="form-control" name="remark">  
                                                </textarea>
                                            </div>
                                            <div class="col-xxl-3 col-md-12">
                                                <div class="input-group">
                                                    <input type="hidden" class="form-control" id="legal" name="id" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gy-4">
                                            <div class="col-xxl-3 col-md-6">
                                            <button class="btn btn-primary" id="btn-btn" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1">All Legal Details</h4>
            </div><!-- end card header -->
            <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                    <thead class="">
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Contract code</th>
                            <th scope="col">File No</th>
                            <th scope="col">Lease Start</th>
                            <th scope="col">Lease End</th>

                            <th scope="col">Tenant Name</th>

                            <th scope="col">Mobile No</th>
                            <th scope="col">Unit Ref.</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                            <th scope="col"> Total Invoice Overdue</th>


                            <th scope="col">Remark</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($legalDetail as $legal)
                        <tr>
                            <th scope="row">{{ $loop->index+ 1 }}</th>
                            <td>{{ $legal->contractDetails->contract_code??''}}</td>
                            <td>
                            {{ $legal->contractDetails->tenantDetails->file_no??''}}
                            </td>
                            <td>{{ $legal->contractDetails->lease_start_date??''}}</td>
                            <td>{{ $legal->contractDetails->lease_end_date??''}}</td>

                            <td>
                            {{ $legal->tenant_name??''}}
                            </td>
                            <td>
                            {{ $legal->tenant_mobile??''}}

                            </td>
                            <td>
                            {{ $legal->unit_ref??''}}

                            </td>
                            <td>
                            {{ $legal->status??''}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-eye-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($legal->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @php $pics=json_decode($legal->file); @endphp
                                        @foreach ($pics as $pic)
                                        <li><a href="{{ asset('upload/legal_doc').'/'.$pic}}" target="_ blank" id="pop">{{ $pic ?? ''   }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td>{{$legal->contractDetails?intval($legal->contractDetails->overdue/30):0}}</td>
                            <td>
                            {{ $legal->remark??'' }}
                            </td>

                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                    @php $bid=Crypt::encrypt($legal->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item leage_id" href="#" id="pop" data-id="{{$bid}}" data-bs-toggle="modal" data-bs-target="#exampleModal" >Edit</a></li>
                                        <li><a class="dropdown-item" href="#" id="pop" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                        <form id="delete-form-{{ $bid }}" action="{{ route('admin.legal.destroy', $bid) }}" method="post" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>


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
        $(document).on('change', '#contract_id', function() {
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

<Script>
     $(document).ready(function() {
        $(document).on('click', '.leage_id', function() {
            var Id = $(this).attr("data-id");
                 var newurl = "{{url('admin/legal')}}/"+Id+"/{{'edit'}}";
                 $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(response) {
                        $('#legal').val(response.data.id);
                        $('#remark').text(response.data.remark)
                        $('#attachment_file').val(response.data.attachment_file)
                        $('#process').val(response.data.status)
                    }
                });
        });
     });
</Script>

@endsection