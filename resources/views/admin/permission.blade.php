@extends('admin.includes.layout', ['breadcrumb_title' => 'Permission'])
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
@section('title', 'Permissions')

@section('main-content')
    <!-- Basic Input -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif


    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div id="card-header" class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Create Permission</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.permission.store') }}" method="POST">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="permission" class="form-label">Permission Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="permission" name="permission"
                                            placeholder="Permission Name">
                                        <button class="btn btn-primary" id="btn-btn" type="submit">Submit</button>
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
                <div id="card-header" class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Permissions</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container" id="example">
                        <thead >
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $data)
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

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="#" id="pop">View</a></li>
                                                <li><a class="dropdown-item" href="#" id="pop">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" id="pop">Delete</a></li>
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
