@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract Reciept Edit'])
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
@section('title', 'Contract Reciept Edit')
@section('main-content')

    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <div class="row">
        <form action="{{ route('storeWebSetting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-lg-12" id="card-header">
                <div class="col-12" id="p1">
                    <label for="remark" class="form-label" id="h1">About US </label>
                    <textarea class="form-control" name="about_us"></textarea>
                </div>
            </div>
            <br>
            <div class="row gy-4">
                <div class="col-xxl-3 col-md-3">
                    <button class="btn btn-success" id="btn-btn" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div>
    <div class="row">
        <div class="col">
            <form action="" method="post">
            <label for="remark" class="form-label" id="h1">Title </label>
          <input type="text" class="form-control" name="title" placeholder="Title" aria-label="First name">
          <div class="col-xxl-3 col-md-3">
            <br>
            <button class="btn btn-success" id="btn-btn" type="submit">Submit</button>
        </div>
    </form>
        </div>
        <div class="col">
            <label for="remark" class="form-label" id="h1">File </label>
          <input type="file" name="file" class="form-control"  aria-label="Last name">
          <br>
          <div class="col-xxl-3 col-md-3">
            <button class="btn btn-success" id="btn-btn" type="submit">Submit</button>
        </div>
        </div>
      </div>
</div>
<div>
    <form action="{{ route('storeDesc') }}" method="POST">
<div class="row gy-4 mt-2">
    <div class="col-xxl-12 col-md-12">
        <label for="remark" class="form-label">Description</label>
        <textarea class="form-control" name="remark"></textarea>
    </div>
</div><br>
<div class="row gy-4">
    <div class="col-xxl-3 col-md-3">
        <button class="btn btn-success" id="btn-btn" type="submit">Submit</button>
    </div>
</div>
</form>
</div>
@endsection
@section('script-area')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('about_us');
    </script>



@endsection
