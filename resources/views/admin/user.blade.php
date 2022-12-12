@extends('admin.includes.layout', ['breadcrumb_title' => 'User'])
@section('title', 'User')
<style>
        #card-header{
        background:#c8f4f6;
        border-top-left-radius:15px;
        border-top-right-radius: 15px;
    }
    thead
    {
        background:#c9e6e7;
    }
    #example
    {
        font-size: 14px;
    }
    input ,select{
        border-radius: 10px !important;
        border: none !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;
    }

    #header1,#header
    {
        background: #ecf0f3;
        border: none !important;
        border-top-left-radius:15px;
        border-top-right-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
    }
    .dataTables_info,.dataTables_paginate {
        font-weight: bolder;
    }
    #btn-btn
    {
        background:#ffffff;
        border-radius: 10px !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
    #btn-btn:hover
    { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('main-content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-xxl-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($userEdit)? 'Update User' : 'Register User' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($userEdit)?route('admin.customer.update',$userEdit->id):route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @if(isset($userEdit))
                            @method('PUT')
                            @endif
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{isset($userEdit)?$userEdit->first_name:''}}" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{isset($userEdit)?$userEdit->last_name:''}}" placeholder="Last Name">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" value="{{isset($userEdit)?$userEdit->email:''}}" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="phone" name="phone"  value="{{isset($userEdit)?$userEdit->phone:''}}" placeholder="Phone">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="email" class="form-label">Select Role</label>
                                    <select name="roleid"  class="form-select">
                                        @if(isset($userEdit))
                                        <option value="{{$userEdit->roles[0]->name}}">{{$userEdit->roles[0]->name}}</option>
                                        @else
                                        <option value="">--Select Role--</option>
                                        @endif
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id ??'' }}">{{ $role->name ??''}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <label for="pic" class="form-label">Image Thumbnail</label>
                                    <input type="file" class="form-control" name="pic" />
                                </div>

                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-12 col-md-12">
                                    <button class="btn col-xxl-2 col-md-2 float-end" type="submit" id="btn-btn">Submit</button>
                                </div>
                                @if (isset($edituser))
                                    <div class="col-sm-6">
                                        <img src="{{asset($edituser->pic) }}" class="bg-light-info" alt="" style="height:100px;width:100px;">
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Users</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                    <table class="table table-nowrap container" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>
                                        <img src="{{$user->pic? asset( $user->pic):asset('user.png') }}" class="me-75 bg-light-danger"
                                            style="height:60px;width:60px;border-radius:100%;" />
                                    </td>
                                    <td>{{ $user->first_name ?? '' }}</td>
                                    <td>{{ $user->last_name ?? '' }}</td>
                                    <td>{{ $user->email ?? '' }}</td>
                                    <td>{{ $user->phone ?? '' }}</td>
                                    <td>{{ $user->roles[0]->name ?? '' }}</td>
                                    <td>
                                    <div class="form-check form-check-primary form-switch">
                                        <input type="checkbox" value="{{$user->id}}" class="form-check-input is_active" id="is_active" {{ $user->status==0?'':'checked' }} />
                                    </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($user->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item text-black" href="#">View</a></li>
                                                <li><a class="dropdown-item text-black" href="{{route('admin.user.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item text-black" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.user.destroy', $bid) }}"
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
    $('.is_active').on('click', function() {
        var id = $(this).val();
        var newurl = "{{ url('admin/isactive') }}/" + id;

        $.ajax({
            url: newurl,
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {

                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script>
@endsection
