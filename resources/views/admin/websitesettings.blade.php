@extends('admin.includes.layout', ['breadcrumb_title' => 'Website - Setting'])
@section('title', 'Website')
@section('main-content')
<div class="container">
    <div class="card">
        <div class="card-header"> Setup Your Settings</div>
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
                    <td colspan="100%"> <input type="submit" class="btn btn-danger" value="Update Setting"> </td>
                </tr>
            </tfoot>
           </table>

        </form>
        </div>
    </div>
</div>
@endsection