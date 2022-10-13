@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract'])
@section('title', 'Contract')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($contractedit)? 'Update Contract' : 'Contract Register' }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ isset($contractedit) ? route('admin.contract.update', $contractedit->id) : route('admin.contract.store') }}" method="POST">
                            @if (isset($contractedit))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="row gy-4">
                            <div class="col-md-6 mb-1">
                            <label class="form-label" for="flag">Tenant Type</label>
                        <select class="select2 form-select" id="flag" name='tenant_type'>
                            <option value="personal">Personal</option>
                            <option value="company">Company</option>
                        </select>
                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Document Type</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="document_type" value="{{isset($contractedit)? $contractedit->document_type: '' }}" placeholder="contractedit Name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Id</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="sponsor_id" value="{{isset($contractedit)? $contractedit->sponsor_id: '' }}" placeholder="Enter sponsor Id">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="sponsor_name" value="{{isset($contractedit)? $contractedit->sponsor_name: '' }}" placeholder="Enter sponsor name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="sponsor_mobile" value="{{isset($contractedit)? $contractedit->sponsor_mobile: '' }}" placeholder="Enter sponsor mobile ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Lessor's</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="lessor" value="{{isset($contractedit)? $contractedit->lessor: '' }}" placeholder="Enter Lessor">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Nationality</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="tenant_nationality" value="{{isset($contractedit)? $contractedit->tenant_nationality: '' }}" placeholder="Enter Nationality">
                                    </div>
                                </div>
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit">{{isset($contractedit) ? 'Update' : 'Submit'}}</button>
                                    </div>
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
                    <h4 class="card-title mb-0 flex-grow-1">Manage Contract </h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Tenant Type</th>
                                <th scope="col">Sponsor Name</th>
                                <th scope="col">Tenant Mobile</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contract as $con)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $con->tenant_type }}</td>
                                    <td>{{ $con->sponsor_name }}</td>
                                    <td>{{ $con->sponsor_mobile }}</td>
                                    <td>{{ $con->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($con->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{route('admin.contract.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.contract.destroy', $bid) }}"
                                                    method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Grids in modals -->
@endsection


@section('script-area')
@endsection
