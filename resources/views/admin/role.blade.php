@extends('admin.includes.layout', ['breadcrumb_title' => 'Role'])
@section('title', 'Roles')
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
    input ,select{
        border-top-left-radius: 10px !important;
        border-bottom-left-radius: 10px !important;
        border: none !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;
    }
    .dataTables_info,.dataTables_paginate {
        font-weight: bolder;
    }
    #btn-btn
    {
        background:#ffffff;
        color: black;
        border: none;
        border-top-right-radius: 10px !important;
        border-bottom-right-radius: 10px !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
    #btn-btn:hover
    { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div id="card-header" class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">{{ isset($RoleEdit)? 'Update Role' : 'Create Role' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($RoleEdit)? route('admin.role.update',$RoleEdit->id) : route('admin.role.store') }}" method="POST">
                        @if (isset($RoleEdit))
                        @method('patch')
                        @endif
                        @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="role" class="form-label">Role Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="role" name="role" value="{{ isset($RoleEdit)? $RoleEdit->name : '' }}" placeholder="Role Name">
                                        <button class="btn btn-primary" id="btn-btn" type="submit">{{ isset($RoleEdit)? 'Update' : 'Submit' }}</button>
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
            <div class="card" id="header1">
                <div id="card-header"class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Roles</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Role Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Roles as $data)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($data->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a id="pop" class="dropdown-item" href="{{route('admin.role.edit',$bid)}}">Edit</a></li>
                                                <li><a id="pop" class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.role.destroy', $bid) }}"
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
