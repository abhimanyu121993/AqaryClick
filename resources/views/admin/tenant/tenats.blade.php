@extends('admin.includes.layout', ['breadcrumb_title' => 'All Tenants'])
@section('title', 'All Tenants')
@section('main-content')
{{-- {{ $all_tenant }} --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tenants List</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">File Number</th>
                                <th scope="col">Tenant Code</th>
                                <th scope="col">Customer Type</th>
                                <th scope="col">primary Phone</th>
                                <th scope="col">Secondary Phone</th>
                                <th scope="col">Eamil</th>
                                <th scope="col">Post Office Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Tenant Status</th>
                                <th scope="col">Document Name</th>
                                <th scope="col">Total Unit</th>
                                <th scope="col">Customer Nationality</th>
                                <th scope="col">Sponsor Name</th>
                                <th scope="col">Sponsor Email</th>
                                <th scope="col">Sponsor Phone</th>
                                <th scope="col">Sponsor Oid</th>
                                <th scope="col">Attachment File</th>
                                <th scope="col">Attachment Remark</th>
                                <th scope="col">Tenant Document</th>
                                <th scope="col">OID</th>
                                <th scope="col">Attachment File</th>
                                <th scope="col">Passcode</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_tenant as $tenant)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{$tenant->file_number}}</td>
                                    <td>{{$tenant->tenant_code}}</td>
                                    <td>{{$tenant->customer_type}}</td>
                                    <td>{{$tenant->primary_phone}}</td>
                                    <td>{{$tenant->secondary_phone}}</td>
                                    <td>{{$tenant->email}}</td>
                                    <td>{{$tenant->post_office}}</td>
                                    <td>{{$tenant->address}}</td>
                                    <td>{{$tenant->tenant_status}}</td>
                                    <td>{{$tenant->document_name}}</td>
                                    <td>{{$tenant->total_unit}}</td>
                                    <td>{{$tenant->customer_nationality}}</td>
                                    <td>{{$tenant->sponsor_name}}</td>
                                    <td>{{$tenant->sponsor_email}}</td>
                                    <td>{{$tenant->sponsor_phone}}</td>
                                    <td>{{$tenant->sponsor_oid}}</td>
                                    <td>
                                        <img src="{{asset('upload/tenant/'.$tenant->attachment_file)}}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/>
                                    </td>
                                    <td>{{$tenant->attachment_remark}}</td>
                                    <td>{{$tenant->tenat_document}}</td>
                                    <td>{{$tenant->oid_document??''}}</td>
                                    <td>{{$tenant->cr_document??''}}</td>
                                    <td>{{$tenant->passcode??''}}</td>
                                    <td></td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $tid=Crypt::encrypt($tenant->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $tid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $tid }}" action="{{ route('admin.tenant.destroy', $tid) }}"
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
@endsection