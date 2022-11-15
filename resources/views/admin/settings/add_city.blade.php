@extends('admin.includes.layout', ['breadcrumb_title' => 'City'])
@section('title', 'city')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($city)? 'Update City' : 'Create City' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($city) ? route('admin.city.update', $city->id) : route('admin.city.store') }}" method="POST">
                            @if (isset($city))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <label for="space" class="form-label">Select Country</label>
                                <select class="form-control" id="country_name" name="country_name">
                                @if (isset($city))
                                    <option value="{{ $city->country_name }}" selected>{{ $city->country_name}}</option>
                                    @else
                                    <option value="">--Select Country--</option>
                                    @foreach ($country as $count)
                                    <option value="{{ $count->id }}">{{ $count->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">City Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" value="{{isset($city)? $city->name: '' }}" placeholder="City Name">
                                        <button class="btn btn-primary" type="submit">{{isset($city) ? 'Update' : 'Submit'}}</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Unit Type</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Country</th>
                                <th scope="col">City Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->nationality->name??'' }}</td>
                                    <td>{{ $unit->name??'' }}</td>
                                    <td>{{ $unit->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($unit->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.city.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.city.destroy', $bid) }}"
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
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
