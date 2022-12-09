@extends('admin.includes.layout', ['breadcrumb_title' => 'All Tenants'])
@section('title', 'All Tenants')
@section('main-content')
{{-- {{ $all_tenant }} --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex table-main-heading">

                <div class="col-4">
                    <h4 class="card-title mb-0 flex-grow-1">Tenants List</h4>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    <a class="btn btn-primary" href="{{Route('admin.excel-export.tenant')}}">Export</a>
                </div>


            </div><!-- end card header -->
            <div class="card-body table-responsive ">
                <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">

                    <thead class="thead-color">
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Tenant Code</th>
                            <th scope="col">Tenant Name Eglish</th>
                            <th scope="col">Tenant Arabic Name</th>
                            <th scope="col">Tenant Document</th>
                            <th scope="col">QID Document</th>
                            <th scope="col">CR Document</th>
                            <th scope="col">Passport</th>
                            <th scope="col">Est Card No</th>
                            <th scope="col">Govt. Housing No.</th>
                            <th scope="col">Tenant Nationality</th>
                            <th scope="col">Tenant Primary Number</th>
                            <th scope="col">Tenant Secondary Number</th>
                            <th scope="col">Primary Email </th>
                            <th scope="col">Alternative Email </th>
                            <th scope="col">Post Office</th>
                            <th scope="col">Address</th>
                            <th scope="col">Tenant Type</th>
                            <th scope="col">Unit Type</th>
                            <th scope="col">Unit Address</th>
                            <th scope="col">Rental Period</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Payment Receipt</th>
                            <th scope="col">Remark</th>
                            <th scope="col">View Document</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_tenant as $tenant)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{$tenant->tenant_code}}</td>
                            <td>{{$tenant->tenant_english_name}}</td>
                            <td>{{$tenant->tenant_arabic_name}}</td>
                            <td>{{$tenant->tenant_document}}</td>
                            <td>{{$tenant->qid_document}}</td>
                            <td>{{$tenant->cr_document}}</td>
                            <td>{{$tenant->passport}}</td>
                            <td>{{$tenant->established_card_no}}</td>
                            <td>{{$tenant->government_housing_no}}</td>
                            <td>{{$tenant->tenantNationality->name??''}}</td>
                            <td>{{$tenant->tenant_primary_mobile}}</td>
                            <td>{{$tenant->tenant_secondary_mobile}}</td>
                            <td>{{$tenant->email}}</td>
                            <td>{{$tenant->alternate_email}}</td>
                            <td>{{$tenant->post_office}}</td>
                            <td>{{$tenant->address}}</td>
                            <td>{{isset($tenant)? ($tenant->tenant_type =='TC'?'Company':''):''}}
                                {{isset($tenant)? ($tenant->tenant_type =='TP'?'Personal':''):''}}
                                {{isset($tenant)? ($tenant->tenant_type =='TG'?'Government':''):''}}
                            </td>
                            <td>{{$tenant->unittypeinfo->name??''}}</td>
                            <td>{{$tenant->unit_address}}</td>
                            <td>{{$tenant->rental_period }}</td>
                            <td>{{$tenant->payment_method}}</td>
                            <td>{{$tenant->payment_receipt}}</td>
                            <td>{{$tenant->attachment_remark}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-eye-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($tenant->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @php $pics=json_decode($tenant->attachment_file); @endphp
                                        @foreach ($pics as $pic)
                                        <li><a class="dropdown-item" href="{{route('admin.TenantsDownloadDocument',$pic)}}">{{$pic??''}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown"><a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php $tid=Crypt::encrypt($tenant->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{route('admin.yearlyStatement',$tid)}}">Statement</a></li>
                                        <li><a class="dropdown-item" href="{{route('admin.tenant.edit',$tid)}}">Edit</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $tid }}').submit();">Delete</a></li>

                                        <form id="delete-form-{{ $tid }}" action="{{ route('admin.tenant.destroy', $tid) }}" method="post" style="display: none;">
                                            @method('DELETE')
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

@endsection