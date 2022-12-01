@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Units'])
@section('title', 'Manage units')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Unit</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;">
                <thead class="thead-color">            
                <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Unit No</th>
                                <th scope="col">Unit Type</th>
                                <th scope="col">Unit Status</th>
                                <th scope="col">Unit Floor</th>
                                <th scope="col">Unit Feature</th>
                                <th scope="col">Unit Size</th>
                                <th scope="col">Electric No</th>
                                <th scope="col">Water No</th>
                                <th scope="col">Unit Desc</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->buildingDetails->name??'' }}</td>
                                    <td>{{ $unit->unit_no??''}}</td>
                                    <td>{{ $unit->unitTD??'' }}</td>
                                    <td>{{ $unit->unitStatus->name??'' }}</td>
                                    <td>{{ $unit->unit_floor??'' }}</td>
                                    <td>{{ $unit->unitFeature->name??''}}</td>
                                    <td>{{ $unit->unit_size??''}}</td>
                                    <td>{{ $unit->electric_no??''}}</td>
                                    <td>{{ $unit->water_no??''}}</td>
                                    <td>{{ $unit->unit_desc??''}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($unit->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.unit.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.unit.destroy', $bid) }}"
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
