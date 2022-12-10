@extends('admin.includes.layout', ['breadcrumb_title' => 'Fetch Permission'])
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
@section('title', 'Fetch Permissions')
@section('main-content')
    <div class="card" id="header1">
        <div class="card-header" id="card-header">
            Fetch Permission
        </div>
        <div class="card-body">
            <form action="{{ route('admin.fetchPermission') }}" method="post">
                <div class="row gy-4">
                    <div class="col-xxl-3 col-md-6">
                        <label for="role" class="form-label">Role Name</label>
                        @csrf
                        <select name="role" class="form-select" onChange='permissions(this)'>
                            <option value="" selected hidden>--Select Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-md-6 ">
                        <button class="btn btn-primary mt-4" id="btn-btn" type="submit">Fetch</button>
                    </div>
                    <!--end col-->
                </div>
            </form>
        </div>
    </div>

    @if (isset($selectrole))
        <div class="card" id="header1">
            <div class="card-header" id="card-header">
                Permissions
            </div>
            <div class="card-body">
                <form action="{{ route('admin.assignPermission') }}" method="post">
                    @csrf
                    <input type="hidden" name='roleid' value="{{ $selectrole->id }}">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>Permissions Name</th>
                                <th>Menu</th>
                                <th>Create</th>
                                <th>Read</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!isset($permissionnames))
                                <tr>
                                    <td colspan="7">No permission assigned</td>
                                </tr>
                            @else
                                @foreach ($permissionnames as $pname)
                                    <tr>
                                        <th>
                                            {{ $pname->name }}
                                        </th>
                                        @foreach ($pname->permissions as $permission)
                                            <td>
                                                <input type="checkbox" class="form-check" value="{{ $permission->name }}"
                                                    name='rolepermissions[]'
                                                    {{ $selectrole->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <button class="btn btn-primary" type="submit"> Update Permission</button>
                </form>
            </div>
        </div>
    @endif
@endsection

@section('script-area')
@endsection
