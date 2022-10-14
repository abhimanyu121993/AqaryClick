@extends('admin.includes.layout', ['breadcrumb_title' => 'Staff'])
@section('title', 'Staff')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($staff)? 'Update Staff' : 'Create Staff' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($staff) ? route('admin.staff.update', $staff->id) : route('admin.staff.store') }}" method="POST">
                            @if (isset($staff))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="fname" value="{{isset($staff)? $staff->fname: '' }}" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="lname" value="{{isset($staff)? $staff->lname: '' }}" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{isset($staff)? $staff->mobile: '' }}" placeholder="Enter Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Email Id</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" value="{{isset($staff)? $staff->email: '' }}" placeholder="abc@gmail.com">
                                    </div>
                                </div>
                                <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                            <button class="btn btn-primary" type="submit">{{isset($staff) ? 'Update' : 'Submit'}}</button>
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
                    <h4 class="card-title mb-0 flex-grow-1">Manage Staff</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email Id</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->fname }}</td>
                                    <td>{{ $unit->lname }}</td>
                                    <td>{{ $unit->mobile }}</td>
                                    <td>{{ $unit->email}}</td>
                                   <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($unit->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.staff.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.staff.destroy', $bid) }}"
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
