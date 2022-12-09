{{-- @extends('admin.includes.layout', ['breadcrumb_title' => 'Import Data'])
@section('title', 'Import Data')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">

                <div class="card-body">
                    <div class="live-preview">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12-3">
                                <label for="first_name" class="form-label">Building</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="first_name" name="building"
                                        placeholder="Building Data">
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="col-xxl-3 col-md-6">
                            <button class="btn btn-primary" type="submit">Import</button>
                        </div>
                    </div>
                    <br>
                    <form action="" method="">
                        <div class="col-lg-12">
                            <label for="last_name" class="form-label">Unit</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="last_name" name="unit"
                                    placeholder="Unit Data">
                            </div>

                            <!--end col-->
                        </div>
                    </form><br>
                    <div class="col-xxl-3 col-md-6">
                        <button class="btn btn-primary" type="submit">Import</button>
                    </div>
                    <br>
                <form action="">
                    <div class="col-lg-12 ">
                        <label for="email" class="form-label">Tenant</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="email" name="tenant"
                                placeholder="Tenant Data">
                        </div>
                    </div>
                </form>
                <br>
                <div class="col-xxl-3 col-md-6">
                    <button class="btn btn-primary" type="submit">Import</button>
                </div>
                <br>
                <form action="">
            <div class="col-lg-12 ">
                <label for="phone" class="form-label">Monthly Statment</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="phone" name="monthly_period" placeholder="Monthly">
                </div>
                <!--end col-->
            </div>
        </form>
            <br>
            <div class="col-xxl-3 col-md-6">
                <button class="btn btn-primary" type="submit">Import</button>
            </div>
        </div>
    </div><!-- end card header -->
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection --}}



@extends('admin.includes.layout', ['breadcrumb_title' => 'Import/Export Building'])
@section('title', 'Import Export Building')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="col-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Building</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="" method="POST" enctype="multipart/form-data">
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
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload Building</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="building_upload" >
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Unit</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="" method="POST" enctype="multipart/form-data">
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
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Building Unit</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload" >
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Tenant</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="" method="POST" enctype="multipart/form-data">
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
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload Tenant</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload" >
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Contract</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="" method="POST" enctype="multipart/form-data">
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
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload Contract</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload" >
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Monthly Status</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="#" method="POST" enctype="multipart/form-data">
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
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload Monthly Status</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload" >
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Grids in modals -->
@endsection


@section('script-area')

@endsection
