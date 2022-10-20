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
                                <th scope="col">Tenant Code</th>
                                <th scope="col">Tenant Name Eglish</th>
                                <th scope="col">Tenant Arabic Name</th>
                                <th scope="col">Tenant Document</th>
                                <th scope="col">Qid Document</th>
                                <th scope="col">CR Document</th>
                                <th scope="col">Passport</th>
                                <th scope="col">Tenant Nationality</th>
                                <th scope="col">Tenant Primary Number</th>
                                <th scope="col">Tenant Secondary Number</th>
                                <th scope="col">Email </th>
                                <th scope="col">Post Office</th>
                                <th scope="col">Address</th>
                                <th scope="col">Tenant Type</th>
                                <th scope="col">Unit Type</th>
                                <th scope="col">Unit Address</th>
                                <th scope="col">Rental Period</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Payment Receipt</th>
                                {{-- <th scope="col">Attachment File</th> --}}
                                <th scope="col">Remark</th>
                                <th scope="col">Remark</th>
                                <th scope="col">View Document</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_tenant as $tenant)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{$tenant->tenant_code}}</td>
                                    <td>{{$tenant->tenant_english_name}}</td>
                                    <td>{{$tenant->tenant_arabic_name}}</td>
                                    <td>{{$tenant->tenant_document}}</td>
                                    <td>{{$tenant->qid_document}}</td>
                                    <td>{{$tenant->cr_document}}</td>
                                    <td>{{$tenant->passport}}</td>
                                    <td>{{$tenant->tenant_nationality}}</td>
                                    <td>{{$tenant->tenant_primary_mobile}}</td>
                                    <td>{{$tenant->tenant_secondary_mobile}}</td>
                                    <td>{{$tenant->email}}</td>
                                    <td>{{$tenant->post_office}}</td>
                                    <td>{{$tenant->address}}</td>
                                    <td>{{$tenant->tenant_type}}</td>
                                    <td>{{$tenant->unit_type}}</td>
                                    <td>{{$tenant->unit_address}}</td>
                                    <td>{{$tenant->rental_period }}</td>
                                    <td>{{$tenant->payment_method}}</td>
                                    <td>{{$tenant->payment_receipt}}</td>
                                    {{-- <td>

                                        @php
                                       $pic= json_decode($tenant->attachment_file)
                                        @endphp
                                        <img src="{{asset('upload/tenant/'.$pic)}}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/>
                                        <img src="{{asset('upload/tenant/'.$pic)}}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/>
                                    </td> --}}
                                    <td>{{$tenant->attachment_remark}}</td>
                                    <td> @php $tid=Crypt::encrypt($tenant->id); @endphp
                                        <a href="{{route('admin.tenantDocument',$tid)}}">view</a></td>
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
