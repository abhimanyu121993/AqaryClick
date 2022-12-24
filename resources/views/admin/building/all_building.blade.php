@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Property'])
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
@section('title', 'Manage Property')
@section('main-content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h4 id="h1" class="card-title mb-0 flex-grow-1">Manage Property</h4>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body ">

                    <div class='table-responsive'>
                        <table id="example" class="table table-striped table-bordered  " >
                            <thead >
                                <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col"> Building Code</th>
                                    <th scope="col">Building Name</th>
                                    <th scope="col">Building No</th>
                                    <th scope="col">Zone No</th>
                                    <th scope="col">St No</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Zone Name</th>
                                    <th scope="col">Building Type</th>
                                    <th scope="col">Total Unit</th>
                                    <th scope="col">Ownership Type</th>
                                    <th scope="col">Ownership No</th>
                                    <th scope="col">Pin No</th>
                                    <th scope="col">Building Status</th>
                                    {{-- <th scope="col">Country</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Pincode</th>
                                    <th scope="col">Property Receiving Date</th>
                                    <th scope="col">Owner Name</th>
                                    <th scope="col">Lessor's Name</th> --}}
                                    <th scope="col">Image</th>
                                    <th scope="col">Document</th>
                                    @role('superadmin')
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    @endrole
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody >

                            </tbody>
                            {{-- <tbody>
                                @foreach ($buildings as $building)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $building->building_no ?? '' }}</td>
                                        <td>{{ $building->building_code ?? '' }}</td>
                                        <td>{{ $building->building_type ?? '' }}</td>
                                        <td>{{ $building->name ?? '' }}</td>
                                        <td>{{ $building->cost_building ?? '' }}</td>
                                        <td>{{ $building->construction_date ?? '' }}</td>
                                        <td>{{ $building->person_incharge ?? '' }}</td>
                                        <td>{{ $building->person_job ?? '' }}</td>
                                        <td>{{ $building->person_mobile ?? '' }}</td>
                                        <td>{{ $building->nationality->name ?? '' }}</td>
                                        <td>{{ $building->cityDetails->name ?? '' }}</td>
                                        <td>{{ $building->area ?? '' }}</td>
                                        <td>{{ $building->pincode ?? '' }}</td>
                                        <td>{{ $building->building_receive_date ?? '' }}</td>
                                        <td>{{ $building->owner_name ?? '' }}</td>
                                        <td>{{ $building->lessor_name ?? '' }}</td>
                                        <td><img src="{{ asset('upload/building/' . $building->building_pic) }}"
                                                class="me-75 bg-light-danger" style="height:35px;width:35px;" /></td>
                                        <td>
                                            @php $bid=Crypt::encrypt($building->id); @endphp
                                            <a href="{{ route('admin.document', $bid) }}">View</a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>
                                                @php $bid=Crypt::encrypt($building->id); @endphp
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    @can('Building_edit')
                                                        <li><a class="dropdown-item" id="pop"
                                                                href="{{ route('admin.register_building.edit', $bid) }}">Edit</a>
                                                        </li>
                                                    @endcan
                                                    @can('Building_delete')
                                                        <li><a class="dropdown-item" href="#" id="pop"
                                                                onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                                        </li>
                                                    @endcan
                                                    <form id="delete-form-{{ $bid }}"
                                                        action="{{ route('admin.register_building.destroy', $bid) }}"
                                                        method="post" style="display: none;">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </div>
                                        </td>
                                @endforeach
                                </tr>
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $.fn.dataTable.ext.errMode = 'none'; $('#example').on('error.dt', function(e, settings, techNote, message) { console.log( 'An error occurred: ', message); });
</script>
    <!-- Grids in modals -->
@endsection


@section('script-area')
    <script>
        // $(document).ready(function() {
        //     $('#example').DataTable();
        // });
        $(document).ready(function() {
            $.fn.dataTable.ext.errMode = 'none';
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                searchable: true,
                scrollX: true,
                ajax: '{!! route('admin.get-buildings') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data:'building_code',
                        name:'buiding_code'
                    },
                    {
                        data:'name',
                        name:'name'
                    },
                    {
                        data:'building_no',
                        name:'building_no'
                    },
                    {
                        data:'zone_no',
                        name:'zone_no',
                    },
                    {
                        data:'street_no',
                        name:'street_no'
                    },
                    {
                        data:'city_details.name',
                        name:'city_details.name'
                    },
                    {
                        data:'area',
                        name:'area'
                    },
                    {
                        data:'building_type',
                        name:'building_type'
                    },
                    {
                        data:'units',
                        name:'units'
                    },
                    {
                        data:'ownership_type',
                        name:'ownership_type'
                    },
                    {
                        data:'ownership_no',
                        name:'ownership_no'
                    },
                    {
                        data:'pincode',
                        name:'pincode'
                    },
                    {
                        data:'status',
                        name:'status'
                    },
                    {
                        data:'image',
                        name:'image'
                    },
                    {
                        data:'document',
                        name:'document'
                    },
                    @role('superadmin')
                    {
                        data:'updated',
                        name:'updated'
                    },
                    {
                        data:'deleted',
                        name:'deleted'
                    },
                    @endrole
                    {
                        data:'action',
                        name:'action'
                    }
                ]
            });
        });


    </script>


    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script> --}}
@endsection
