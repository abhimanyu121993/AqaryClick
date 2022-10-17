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
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Broker Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="name" value="{{isset($broker)? $broker->name: '' }}" placeholder="broker Name">
                                        <button class="btn btn-primary" type="submit">{{isset($broker) ? 'Update' : 'Submit'}}</button>
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

    

    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
