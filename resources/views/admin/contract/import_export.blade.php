@extends('admin.includes.layout', ['breadcrumb_title' => 'Import/Export Contract'])
@section('title', 'Import Export Contract')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="col-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Bulk Upload Contract</h4>
                    <div class="col-2">
                    <a href="{{route('admin.excel-export.grace-export')}}" class="btn btn-primary">Export Graces</a>
                </div>
                </div><!-- end card header -->
                <div class="col-6">
        <!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('admin.bulkUploadContract') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-6 col-md-6">
                                    <label for="name" class="form-label">Upload File</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bulk_upload" name="bulk_upload">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6 pt-4">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </div>
                            <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-6">
                                    <a href="{{ asset('assets/excel_format/newcontract_format.csv') }}"
                                        target="_blank">Example format</a>
                                </div>
                            </div>

                        </form>
                    </div>
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
