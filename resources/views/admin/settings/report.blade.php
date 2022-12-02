@extends('admin.includes.layout', ['breadcrumb_title' => 'Report'])
@section('title', 'Report')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Tenant Report</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="" method="POST">
                            @csrf
                            <div class="row gy-4">
                            <div class="col-md-3 mb-1">
                            <label class="form-label" for="flag">Building Name</label>
                            <select class="select2 form-select js-example-basic-single" id="building_name" name='building_name'>
                                <option value="" selected hidden disabled>--Select Building--</option>
                                <option value="all">All</option>
                                @foreach($building as $build)
                                <option value="{{ $build->id}}">{{ $build->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <label class="form-label" for="flag">Tenant Name</label>
                            <select class="select2 form-select js-example-basic-single" id="tenant_name" name='tenant_name'>
                                <option value="" selected hidden disabled>--Select Tenant--</option>
                                
                            </select>
                        </div>
                                
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Tenant Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Bank Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">File</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Bank Name">
                                        <button class="btn btn-primary" type="submit">Submit</button>
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
                    <h4 class="card-title mb-0 flex-grow-1">Contract Report</h4>
                </div><!-- end card header -->
                <div class="card-body">
                
                </div>
            </div>
        </div>
    </div>



    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
