@extends('admin.includes.layout', ['breadcrumb_title' => 'All Tenants'])
@section('title', 'All Tenants')
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
@section('main-content')
{{-- {{ $all_tenant }} --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">

                <div class="col-4">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Tenants List</h4>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    <a class="btn btn-primary" id="btn-btn" href="{{Route('admin.excel-export.tenant')}}">Export</a>
                </div>


            </div><!-- end card header -->
            <div class="card-body table-responsive ">
                <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">

                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">File No.</th>
                            <th scope="col">Tenant Code</th>
                            <th scope="col">Tenant Type</th>
                            <th scope="col">Tenant Name</th>
                            <th scope="col">DOCYMENT TYPE</th>
                            <th scope="col">QID </th>
                            <th scope="col">CR. NO</th>
                            <th scope="col">EST CARD NO</th>
                            <th scope="col">GVT. HOUSING</th>
                            <th scope="col">PASSPORT</th>
                            <th scope="col">NATIONALITY</th>
                            <th scope="col">AUTHORIZED PERSON</th>
                            <th scope="col">QID NO</th>
                            <th scope="col">MOBILE NO </th>
                            <th scope="col">EMAIL </th>
                            <th scope="col">P.O.BOX</th>
                            <th scope="col">BUILDING NAME</th>
                            <th scope="col">UNIT TYPE</th>
                            <th scope="col">UNIT NO</th>
                            <th scope="col">UNIT REF</th>
                            <th scope="col">Floor. No</th>
                            <th scope="col">Rental period</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          
                            <!-- <th scope="col">Tenant Secondary Number</th>
                            <th scope="col">Primary Email </th>
                            <th scope="col">Alternative Email </th>
                            <th scope="col">Address</th>
                            <th scope="col">Unit Address</th>
                            <th scope="col">Rental Period</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Payment Receipt</th>
                            <th scope="col">Remark</th>
                            <th scope="col">View Document</th>
                            <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_tenant as $tenant)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>{{$tenant->file_no}}</td>
                            <td>{{$tenant->tenant_code}}</td>
                            <td>{{isset($tenant)? ($tenant->tenant_type =='TC'?'Company':''):''}}
                                {{isset($tenant)? ($tenant->tenant_type =='TP'?'Personal':''):''}}
                                {{isset($tenant)? ($tenant->tenant_type =='TG'?'Government':''):''}}
                            </td>
                            <td>{{$tenant->tenant_english_name}}</td>
                            <td>{{$tenant->tenant_document}}</td>
                            <td>{{$tenant->qid_document}}</td>
                            <td>{{$tenant->cr_document}}</td>
                            <td>{{$tenant->established_card_no}}</td>
                            <td>{{$tenant->government_housing_no}}</td>
                            <td>{{$tenant->passport}}</td>
                            <td>{{$tenant->tenantNationality->name??''}}</td>
                            <td>{{$tenant->authorized_person??''}}</td>
                            <td>{{$tenant->authorized_person_qid ?? ''}}</td>
                            <td>{{$tenant->tenant_primary_mobile ?? ''}}</td>
                            <td>{{$tenant->email ?? ''}}</td>
                            <td>{{$tenant->post_office ?? ''}}</td>
                            <td>{{$tenant->buildingDetails->name ?? ''}}</td>
                            <td>{{$tenant->unittypeinfo->name??''}}</td>
                            <td>{{$tenant->unit->unit_no ??''}}</td>
                            <td>{{$tenant->unit->unit_ref ??''}}</td>
                            <td>{{$tenant->unit->unitfloor->name ?? ''}}</td>
                            <td>{{$tenant->contracts->count()>0?$tenant->contracts->first()->lease_period_month:'N/A'}} months</td>
                            <td>{{$tenant->status ?? ''}}</td>
                            <td>
                                <div class="dropdown"><a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php $tid=Crypt::encrypt($tenant->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a id="pop" class="dropdown-item" href="{{route('admin.yearlyStatement',$tid)}}">Statement</a></li>
                                        <li><a id="pop" class="dropdown-item" href="{{route('admin.tenant.edit',$tid)}}">Edit</a></li>
                                        <li><a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $tid }}').submit();">Delete</a></li>

                                        <form id="delete-form-{{ $tid }}" action="{{ route('admin.tenant.destroy', $tid) }}" method="post" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>

<!--                        <td>{{$tenant->tenant_secondary_mobile}}</td>
                            <td>{{$tenant->alternate_email}}</td>
                            <td>{{$tenant->address}}</td>
                            <td>{{$tenant->unit_address}}</td>
                            <td>{{$tenant->rental_period }}</td>
                            <td>{{$tenant->payment_method}}</td>
                            <td>{{$tenant->payment_receipt}}</td>
                            <td>{{$tenant->attachment_remark}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink " id="btn-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-eye-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($tenant->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @php $pics=json_decode($tenant->attachment_file); @endphp
                                        @foreach ($pics as $pic)
                                        <li><a id="pop" class="dropdown-item" href="{{route('admin.TenantsDownloadDocument',$pic)}}">{{$pic??''}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td> -->
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
