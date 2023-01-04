@extends('admin.includes.layout', ['breadcrumb_title' => 'Building Details'])
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
@section('title', 'Building Details')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Building Details Assets </h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{isset($editAsset)? route('admin.asset-update',$editAsset->id):route('admin.building-asset')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="field_wrapper mt-2" id="header1">
                            <div class="card-header align-items-center d-flex">
                                <div class="row">
                                    <div class="row gy-4 mb-3">
                                        <div class="col-xxl-3 col-md-3 mb-2">
                                            <label class="form-label" for="flag">Building Name</label>
                                            <select class="form-select js-example-basic-single" id="building_name" name="building_id[]">
                                                <option value="">
                                                    @if (isset($editAsset))
                                                    @if ($editAsset->building_id =='')
                                                    --Select Builidng Name--
                                                    @endif
                                                    @else
                                                    --Select Builidng Name--
                                                    @endif
                                                </option>
                                                @foreach ($building as $build)
                                                <option value="{{ $build->id }}" {{ isset($editAsset)? ($editAsset->building_id == $build->id ? 'selected' : '') :'' }}>{{ $build->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <label for="space" class="form-label">Enum Type</label>
                                            <select class="select2  form-select js-example-basic-single" id="type" name="type[]">
                                            <option value="" selected hidden>--Select Type--</option>
                                                <option value="img" {{isset($editAsset)?($editAsset->type =='img' ?'selected hidden':''):''}}>image</option>
                                                <option value="plan" {{isset($editAsset)?($editAsset->type =='plan' ?'selected hidden':''):''}}>plan</option>
                                                <option value="video" {{isset($editAsset)?($editAsset->type =='video' ?'selected hidden':''):''}}>video</option>
                                            </select>
                                        </div>
                                        <div class="col-xxl-3 col-md-3" id="content_video">
                                            <label for="name" class="form-label">Video</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="video[]" value="" placeholder="Building Content">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3" id="content_image">
                                            <label for="name" class="form-label">Image</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="image[]" value="" placeholder="Building Content">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3" id="content_plan">
                                            <label for="name" class="form-label">Plan</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="plan[]" value="" placeholder="Building Content">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <label for="name" class="form-label">Title</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="title" name="title[]" value="{{$editAsset->title ?? ''}}" placeholder="Building Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-4 mb-3">
                                        <div class="col-xxl-3 col-md-12">
                                            <label for="building_desc" class="form-label">Detail</label>
                                            <textarea class="form-control" name="detail[]" id="detail">
                                            {{$editAsset->detail ?? ''}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-2 mt-2">
                                        <div class="input-group">
                                            <a href="javascript:new_link()" id="btn-btn" class="btn btn-success fw-medium addButton"><i class="ri-add-fill me-1 align-bottom"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <button class="btn btn-primary" id="btn-btn" type="submit">{{isset($editAsset) ? 'Update' : 'Submit'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!----Building Asset table start------>
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="header1">
            <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                <h4 class="card-title mb-0 flex-grow-1" id="h1">Building Assets</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">Building Name</th>
                            <th scope="col">Tilte</th>
                            <th scope="col">Enum Type</th>
                            <th scope="col">Content</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($building as $build)
                        @if ($build->buildingAssets)
                        @foreach ($build->buildingAssets as $asset)
                        <tr>
                            <th scope="row">{{$asset->id}}</th>
                            <td>{{ $asset->building->name??''}}</td>
                            <td>{{ $asset->title??''}}</td>
                            <td>{{ $asset->type??''}}</td>
                            <td>
                                @if ($asset->type =='img')
                                    <img src="{{asset($asset->content) ??''}}" style="height:50px;width:50px;" alt="">
                                @elseif ($asset->type=='plan')
                                    <img src="{{asset($asset->content) ??''}}" style="height:50px;width:50px;" alt="">
                                @elseif ($asset->type=='video')
                                     <a href="{{ $asset->content??''}}"></a>
                                @endif
                            </td>
                            <td>{{ $asset->detail??''}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill"></i>
                                    </a>
                                    @php $bid=Crypt::encrypt($asset->id); @endphp
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" id="pop" href="{{route('admin.asset-edit',$bid)}}">Edit</a></li>
                                        <li><a class="dropdown-item" id="pop" href="{{route('admin.asset-delete',$bid)}}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!----Building Asset table End------>
<!-- Grids in modals -->
@endsection


@section('script-area')

<script>
     var addButton1= $('.addButton');
     var wrapper1 = $('.field_wrapper');   
     var fieldHTML1=' <div class="field_wrapper mt-2" id="header1">\
                            <div class="card-header align-items-center d-flex">\
                                <div class="row">\
                                    <div class="row gy-4 mb-3">\
                                        <div class="col-xxl-3 col-md-3 mb-2">\
                                            <label class="form-label" for="flag">Building Name</label>\
                                            <select class="form-select js-example-basic-single" id="building_name" name="building_id[]">\
                                                <option value="">--Select Builidng Name--</option>\
                                                @foreach ($building as $build)\
                                                <option value="{{ $build->id }}">{{ $build->name }}</option>\
                                                @endforeach\
                                            </select>\
                                        </div>\
                                        <div class="col-xxl-3 col-md-3">\
                                            <label for="space" class="form-label">Enum Type</label>\
                                            <select class="select2  form-select js-example-basic-single" id="type" name="type[]">\
                                                <option value="" selected hidden>--Select Type--</option>\
                                                <option value="img">image</option>\
                                                <option value="plan">plan</option>\
                                                <option value="video">video</option>\
                                            </select>\
                                        </div>\
                                        <div class="col-xxl-3 col-md-3" id="content_video" style="display:none">\
                                            <label for="name" class="form-label">Video</label>\
                                            <div class="input-group">\
                                                <input type="text" class="form-control" name="video[]" value="" placeholder="Building Content">\
                                            </div>\
                                        </div>\
                                        <div class="col-xxl-3 col-md-3" id="content_image" style="display:none">\
                                            <label for="name" class="form-label">Image</label>\
                                            <div class="input-group">\
                                                <input type="file" class="form-control" name="image[]" value="" placeholder="Building Content">\
                                            </div>\
                                        </div>\
                                        <div class="col-xxl-3 col-md-3" id="content_plan" style="display:none">\
                                            <label for="name" class="form-label">Plan</label>\
                                            <div class="input-group">\
                                                <input type="file" class="form-control" name="plan[]" value="" placeholder="Building Content">\
                                            </div>\
                                        </div>\
                                        <div class="col-xxl-3 col-md-3">\
                                            <label for="name" class="form-label">Title</label>\
                                            <div class="input-group">\
                                                <input type="text" class="form-control" id="title" name="title[]" value="" placeholder="Building Title">\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <div class="row gy-4 mb-3">\
                                        <div class="col-xxl-3 col-md-12">\
                                            <label for="building_desc" class="form-label">Detail</label>\
                                            <textarea class="form-control" name="detail[]" id="detail">\
                                            </textarea>\
                                        </div>\
                                    </div>\
                                    <div class="col-xxl-12 col-md-2 mt-2">\
                                       <div class="input-group">\
                                          <a href="javascript:new_link()" id="btn-btn" class="btn btn-success fw-medium removeButton">-</a>\
                                       </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>';

//Once add button is clicked
    $(addButton1).click(function() {
        $(wrapper1).append(fieldHTML1); //Add field html

    });


     //Once remove button is clicked
     $(wrapper1).on('click', '.removeButton', function(e) {
        e.preventDefault();
        $(this).closest('.field_wrapper').remove(); //Remove field html

    });

</script>
<script>
    $(document).ready(function() {
        $('#content_video').hide();
        $('#content_image').hide();
        $('#content_plan').hide();
        @if(isset($editAsset))
        @if($editAsset->type=='img')
        $('#content_image').show();
        @elseif($editAsset->type=='plan')
        $('#content_plan').show();
        @else
        $('#content_video').show();
@endif
        @endif
        $(document).on('change', "#type", function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var image=$(this).closest('div').parent('div').children('#content_image');
                var plan=$(this).closest('div').parent('div').children('#content_plan');
                var video=$(this).closest('div').parent('div').children('#content_video');
                if (optionValue == 'img') {
                    $(image).show();
                    $(plan).hide();
                    $(video).hide();
                } else if (optionValue == 'plan') {
                    $(image).hide();
                    $(plan).show();
                    $(video).hide();
                } else if (optionValue == 'video') {
                    $(image).hide();
                    $(plan).hide();
                    $(video).show();
                }
            });
        });
    });
</script>
@endsection