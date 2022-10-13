@extends('admin.includes.layout', ['breadcrumb_title' => 'area'])
@section('title', 'area')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($area)? 'Update area' : 'Create area' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($area) ? route('admin.area.update', $area->id) : route('admin.area.store') }}" method="POST">
                            @if (isset($area))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="row gy-4">
                            <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Select Type</label>

                    <select class="select2 form-select" id="flag" name='city_id' @if (isset($area)) disabled @endif required>
                        @if (isset($area))
                        <option value="{{ $cityDetail[0]->id }}" selected>{{ $cityDetail[0]->name}}</option>
                        @endif
                        @foreach($cityDetail as $cd)
                        <option value="{{ $cd->id}}">{{ $cd->name }}</option>
                        @endforeach
                    </select>
                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Area Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" value="{{isset($area)? $area->name: '' }}" placeholder="Enter Area">
                                        <button class="btn btn-primary" type="submit">{{isset($area) ? 'Update' : 'Submit'}}</button>
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
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">City</th>
                                <th scope="col">Area</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->city->name ?? '' }}</td>
                                    <td>{{ $unit->name ?? '' }}</td>
                                    <td>{{ $unit->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($unit->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.area.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.area.destroy', $bid) }}"
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
