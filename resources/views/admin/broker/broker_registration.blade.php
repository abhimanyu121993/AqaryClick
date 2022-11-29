@extends('admin.includes.layout', ['breadcrumb_title' => 'Broker'])
@section('title', 'Broker')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($broker)? 'Update Broker/Agent' : 'Create Broker/Agent' }}</h4>
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
                                <label for="space" class="form-label">Broker/Agent</label>
                                <select class="form-control select2 form-select" id="flag" name="boker_agent">
                                @if (isset($brokeredit))
                                    <option value="{{ $brokeredit->broker_agent }}" selected>{{ $brokeredit->broker_agent}}</option>
                                    @else
                                <option value="" selected hidden>--Select Type--</option>   
                                <option value="broker">Broker</option>
                                    <option value="agent">Agent</option>
                                    @endif
                                </select>

                            </div>
                            <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Join Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="join_date" name="join_date" value="{{Carbon\Carbon::now()->format('d-m-Y') }}" placeholder="Enter Join Date " readonly>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="broker_fname" name="broker_fname" value="{{isset($brokeredit)? $broker->broker_name: '' }}" placeholder="Enter Name">
                                    </div>
                                </div>
                                <!-- <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Broker Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="broker_lname" name="broker_lname" value="{{isset($brokeredit)? $broker->broker_lname: '' }}" placeholder="Enter Broker Last Name">
                                    </div>
                                </div> -->
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">ID</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="broker_id" name="broker_id" value="{{isset($brokeredit)? $broker->broker_id: '' }}" placeholder="Enter Id">
                                    </div>
                                </div><div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" value="{{isset($broker)? $broker->mobile: '' }}" placeholder="Enter Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="email" name="email" value="{{isset($brokeredit)? $brokeredit->email: '' }}" placeholder="abc@gmail.com">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Commission</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="commission" name="commission" value="{{isset($broker)? $broker->commission: '' }}" placeholder="Enter Commission">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Broker Type</label>
                                <select class="form-control select2 form-select" id="broker_type" name="boker_type">
                                @if (isset($brokeredit))
                                    <option value="{{ $brokeredit->broker_type }}" selected>{{ $brokeredit->broker_type}}</option>
                                    @else
                                <option value="" selected hidden>--Select Type--</option>   
                                <option value="personal">Personal</option>
                                    <option value="company">Company</option>
                                    @endif
                                </select>
                            </div>
                          
                            <div class="col-xxl-3 col-md-3">
                                <label for="space" class="form-label">Property Type</label>
                                <select class="form-control select2 form-select" id="broker_type" name="boker_type">
                                @if (isset($brokeredit))
                                    <option value="{{ $brokeredit->property_type }}" selected>{{ $brokeredit->perperty_type}}</option>
                                    @else
                                <option value="" selected hidden>--Select Type--</option>   
                                <option value="unit">Unit</option>
                                    <option value="building">Building</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Unit Ref.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="unit_ref" name="unit_ref" value="{{isset($brokeredit)? $brokeredit->unit_ref: '' }}" placeholder="Enter Unit ref">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Building Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="building_name" name="building_name" value="{{isset($brokeredit)? $brokeredit->building_name: '' }}" placeholder="Enter Building Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-3">
                                    <label for="name" class="form-label">Last Transaction Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="last_transaction" name="last_transaction" value="22-12-22" placeholder="Last Transaction Date">
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
