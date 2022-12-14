@extends('admin.includes.layout', ['breadcrumb_title' => 'Membership'])
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
@section('title', 'Membership')
@section('main-content')
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1"> Membership</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ isset($edit) ? route('admin.membership.update', $edit->id) : route('admin.membership.store') }}" method="POST" enctype="multipart/form-data">
                        @if (isset($edit))
                        @method('PATCH')
                    @endif
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{isset($edit)? $edit->title:'' }}" name="title" placeholder="Enter Title">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="remark" class="form-label">Description</label>
                            <textarea class="form-control"  name="desc">{!!isset($edit)? $edit->description:'' !!}
                                </textarea>
                        </div>
                        <div class="row col-md-12">
                        <div class=" col-md-4">
                            <label for="owner_name" class="form-label">User Count</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{isset($edit)? $edit->user_count:'' }}" name="user_count" placeholder="Counts">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="owner_name" class="form-label">Icon</label>
                            <div class="input-group">
                                @isset($edit)
                                <img src="{{ asset($edit->icon) }}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/>&nbsp;
                                @endisset
                                <input type="file" class="form-control" name="icon" placeholder="Enter icon">
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <label for="state" class="form-label">Text Color</label>
                            <div class="input-group">
                                <input type="color" class="form-control" value="{{isset($edit)?$edit->text_color:'' }}" name="txt_color" placeholder="CR Document">
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4 ">
                            <label for="country" class="form-label">Background Color</label>
                            <div class="input-group">
                                <input type="color" class="form-control" value="{{isset($edit)?$edit->bgcolor:'' }}" name="bg_color" placeholder="Passport Document">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="space" class="form-label">Is Active</label>
                            <select class="form-control" id="tenant_document_type" name="is_active">
                                <option selected hidden>-----Is Active-----</option>
                                <option value="1" @if(isset($edit)){{ $edit->is_active==1?'selected': '' }}@endif>True</option>
                                <option value="0" @if(isset($edit)){{ $edit->is_active==0?'selected': '' }} @endif>False</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="owner_name" class="form-label">Price</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="price"
                                  value="{{isset($edit)? $edit->price :''}}"  placeholder="Tenant Secondary Mobile No">
                            </div>
                        </div>
                    </div>
                    <br>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-3">
                                <button class="btn btn-primary" id="btn-btn" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container card col-12 table-responsive p-3 card shadow-lg" id="header1">
        <h2 class="mb-4" id="h1">Manage Membership</h2>
        <table class="table align-middle table-responsive" >
            <thead >
                <tr>
                    <th scope="col">SR.NO</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">User Count</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Text Color</th>
                    <th scope="col">Background Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($member as $data)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->title ?? '' }}</td>
                            <td>{!! $data->description ?? '' !!}</td>
                            <td>{{ $data->user_count ?? '' }}</td>
                            <td><img src="{{asset($data->icon)}}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/></td>
                            <td>{{ $data->text_color ?? '' }}</td>
                            <td>{{ $data->bgcolor ?? '' }}</td>
                            <td>{{ $data->price?? '' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            {{-- @php
                                                $eid = Crypt::encrypt($data->id);
                                            @endphp --}}
                                                <li><a class="dropdown-item" id="pop" href="{{ route('admin.membership.edit',$data->id) }}">Edit</a>
                                                </li>
                                                <form
                                                action="{{ route('admin.membership.destroy', $data->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class=" btn fa fa-trash text-danger" id="pop"
                                                   >Delete</button>
                                            </form>
                                        </ul>
                                    </div>
                                </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

@endsection
@section('script-area')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('desc');
    </script>
@endsection
