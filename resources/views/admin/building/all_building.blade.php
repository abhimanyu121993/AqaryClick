@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Property'])
@section('title', 'Manage Property')
@section('main-content')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title mb-0 flex-grow-1">Manage Property</h4>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body ">

                    <div class='table-responsive'>
                        <table id="example" class="table table-striped table-bordered  " style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col"> Property No</th>
                                    <th scope="col"> Property Code</th>
                                    <th scope="col"> Property Type</th>
                                    <th scope="col">Property Name</th>
                                    <th scope="col">Property Cost</th>
                                    <th scope="col">Construction Date</th>
                                    <th scope="col">Person Incharge</th>
                                    <th scope="col">Person Job</th>
                                    <th scope="col">Person Mobile</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Pincode</th>
                                    <th scope="col">Property Receiving Date</th>
                                    <th scope="col">Owner Name</th>
                                    <th scope="col">Lessor's Name</th>
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
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.register_building.edit', $bid) }}">Edit</a>
                                                        </li>
                                                    @endcan
                                                    @can('Building_delete')
                                                        <li><a class="dropdown-item" href="#"
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
                        data:'building_no',
                        name:'building_no'
                    },
                    {
                        data:'building_code',
                        name:'buiding_code'
                    },
                    {
                        data:'building_type',
                        name:'building_type'
                    },
                    {
                        data:'name',
                        name:'name'
                    },
                    {
                        data:'cost_building',
                        name:'cost_building'
                    },
                    {
                        data:'construction_date',
                        name:'construction_date'
                    },
                    {
                        data:'person_incharge',
                        name:'person_incharge'
                    },
                    {
                        data:'person_job',
                        name:'person_job'
                    },
                    {
                        data:'person_mobile',
                        name:'person_mobile'
                    },
                    {
                        data:'nationality.name',
                        name:'nationality.name'
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
                        data:'pincode',
                        name:'pincode'
                    },
                    {
                        data:'building_receive_date',
                        name:'building_receive_date'
                    },
                    {
                        data:'owner_name',
                        name:'owner_name'
                    },
                    {
                        data:'lessor_name',
                        name:'lessor_name'
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
