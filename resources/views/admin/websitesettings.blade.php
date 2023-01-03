@extends('admin.includes.layout', ['breadcrumb_title' => 'Website - Setting'])
<style>
    #card-header {
        background: #c8f4f6;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    #pop {
        color: black !important;
    }

    #header1 {
        background: #ecf0f3;
        border: none !important;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
    }

    #h1 {
        color: black;
    }

    #example {
        font-size: 14px;
    }

    thead {
        background: #c9e6e7 !important;
    }

    input,
    select,
    textarea,
    #building_type {
        border-radius: 10px !important;
        border: none !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
    }

    .dataTables_info,
    .dataTables_paginate {
        font-weight: bolder;
    }

    #btn-btn {
        background: #ffffff;
        color: black;
        border: none;
        border-radius: 10px !important;
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;
    }

    #btn-btn:hover {
        box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;
    }
</style>
@section('title', 'Website')
@section('main-content')
<div class="container">
    <div class="card" id="header1" >
        <div class="card-header"id="card-header"> Setup Your Settings</div>
        <div class="card-body">
            <form action="{{route('admin.website-setting-update')}}" method="post" enctype="multipart/form-data">
                @csrf
           <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>Sr. No</th><th>Setting Name</th><th>Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $k=>$d)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td> {{$d->name}} </td>
                        <td> <input  class='form-control' type="{!! $d->type !!}" name='{{$d->name}}' value="{{$d->value}}"> @if($d->type=='file') <img src='{{asset('upload/website/').'/'.$d->value}}' style="height:100px;"> @endif</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="100%"> <input type="submit" id="btn-btn" class="btn btn-danger" value="Update Setting"> </td>
                </tr>
            </tfoot>
           </table>

        </form>
        </div>
    </div>
</div>
@endsection