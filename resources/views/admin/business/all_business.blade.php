@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Business'])
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
@section('title', 'Manage Business')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Business</h4>
            </div><!-- end card header -->
            <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered  table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                    <thead >
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Customer Type</th>
                            <th scope="col">Business Type</th>
                            <th scope="col">Business Name</th>
                            <th scope="col">CR No</th>
                            <th scope="col">Address</th>
                            <th scope="col">Business Email</th>
                            <th scope="col">Business Phone</th>
                            <th scope="col">Authorized Person</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Document details</th>
                            <th scope="col">Bank details</th>
                            <th scope="col">Activity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($business as $business)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $business->businessOwner->name??'' }}</td>
                            <td>{{ $business->customer_type??'' }}</td>
                            <td>{{ $business->business_type??'' }}</td>
                            <td>{{ $business->business_name??'' }}</td>
                            <td>{{ $business->cr_no??'' }}</td>
                            <td>{{ $business->address??'' }}</td>
                            <td>{{ $business->email??'' }}</td>
                            <td>{{ $business->phone??''}}</td>
                            <td>{{ $business->authorized_person??''}}</td>
                            <td>{{ $business->logo??''}}</td>

                            @php $bid=Crypt::encrypt($business->id); @endphp
                            <td>
                                <a href="{{route('admin.businessDocument',$bid)}}">View</a>
                            </td>
                            <td>
                                <a href="{{route('admin.showBankDetail',$bid)}}">View</a>
                            </td>

                            <td>{{ $business->activity??''}}</td>


                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($business->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{route('admin.business.edit',$bid)}}" id="pop">Edit</a></li>
                                        <li><a class="dropdown-item" href="#"  id="pop" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>
                                        <form id="delete-form-{{ $bid }}" action="{{ route('admin.business.destroy', $bid) }}" method="post" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </td>
                        </tr> @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-area')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#ifsc').hide();
        $('#swift').hide();
        $("#bank_code").change(function() {
            $('#ifsc').hide();
            $('#swift').hide();
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue == 'ifsc') {
                    $('#ifsc').show();
                    $('#swift').hide();
                } else if (optionValue == 'swift') {
                    $('#swift').show();
                    $('#ifsc').hide();


                }
            });
        }).change();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection