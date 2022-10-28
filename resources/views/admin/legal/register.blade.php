@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Legal'])
@section('title', 'Register Legal')
@section('main-content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{ isset($buildingedit)? 'Update Building' : 'Register Building' }}</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ isset($buildingedit) ? route('admin.register_building.update', $buildingedit->id) : route('admin.register_building.store') }}" method="POST" enctype="multipart/form-data">
                        @if (isset($buildingedit))
                        @method('patch')
                        @endif
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
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Building Code</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="building_code" name="building_code" value="{{isset($buildingedit)? $buildingedit->building_code: '' }}" placeholder="Building Code">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <label for="name" class="form-label">Building Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="building_name" value="{{isset($buildingedit)? $buildingedit->name: '' }}" placeholder="Building Name">
                                </div>
                            </div>
                        </div>
                        <div class="row gy-4 mb-3">
                            <div class="col-xxl-3 col-md-12">
                                <label for="remark" class="form-label">Remark</label>
                                <textarea class="form-control" name="remark">
                                {{isset($buildingedit)? $buildingedit->remark: '' }}
                                    </textarea>
                            </div>
                        </div>
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-md-6">
                                <button class="btn btn-primary" type="submit">{{isset($buildingedit) ? 'Update' : 'Submit'}}</button>
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

@endsection