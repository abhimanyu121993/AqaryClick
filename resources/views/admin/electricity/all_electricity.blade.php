@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Electricity'])
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
@section('title', 'Manage Electricity')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Electricity</h4>
                    <div class="col-2">
                    <a href="{{route('admin.excel-export.electric')}}" class="btn btn-primary" id="btn-btn">Export</a>
                </div>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                <thead >            
                <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Unit No</th>
                                <th scope="col">Unit Type</th>
                                <th scope="col">Electricity Under</th>
                                <th scope="col">Name</th>
                                <th scope="col">Electric No</th>
                                <th scope="col">Water No</th>
                                <th scope="col">Bill Amount</th>
                                <th scope="col">Privious Payment</th>
                                <th scope="col">Paid By</th>
                                <th scope="col">Remark</th>
                                <th scope="col">View</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($electric as $el)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><i>{{ $el->building->name ?? '' }}</i></td>
                                    <td>{{ $el->unit_no ?? '' }}</td>
                                    <td>{{ $el->unit_type ?? '' }}</td>
                                    <td>{{ $el->electric_under ?? '' }}</td>
                                    <td>{{ $el->name ?? '' }}</td>
                                    <td>{{ $el->electric_no ?? '' }}</td>
                                    <td>{{ $el->water_no ?? '' }}</td>
                                    <td>{{ $el->bill_amt ?? '' }}</td>
                                    <td>{{ $el->last_payment ?? '' }}</td>
                                    <td>{{ $el->paid_by ??''}}</td>
                                    <td>{{ $el->remark ??''}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-eye-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($el->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            @php $pics=json_decode($el->file); @endphp
                                            @foreach ($pics as $pic)
                                                <li><a class="dropdown-item" id="pop" href="{{route('admin.getDownload',$pic)}}">{{$pic??''}}</a></li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($el->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @can('ElectricityBill_edit')
                                                <li><a class="dropdown-item" id="pop" href="{{route('admin.electricity.edit',$bid)}}">Edit</a></li>
                                                @endcan
                                                @can('ElectricityBill_delete')
                                                <li><a class="dropdown-item" id="pop" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>
                                                 @endcan
                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.electricity.destroy', $bid) }}"
                                                    method="post" style="display: none;">
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
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
