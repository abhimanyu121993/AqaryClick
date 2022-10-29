@extends('admin.includes.layout', ['breadcrumb_title' => 'Broker'])
@section('title', 'Broker')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($broker)? 'Update broker' : 'Create broker' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($broker) ? route('admin.broker.update', $broker->id) : route('admin.broker.store') }}" method="POST">
                            @if (isset($broker))
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
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="fname" name="first_name" value="{{isset($broker)? $broker->fname: '' }}" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="lname" name="last_name" value="{{isset($broker)? $broker->lname: '' }}" placeholder="Enter Last Name">
                                    </div>
                                </div><div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{isset($broker)? $broker->mobile: '' }}" placeholder="Enter Mobile No">
                                    </div>
                                </div><div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email" value="{{isset($broker)? $broker->email: '' }}" placeholder="abc@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-4 mt-2">
                                <div class="col-xxl-3 col-md-6">
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit">{{isset($broker) ? 'Update' : 'Submit'}}</button>
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
@endsection
