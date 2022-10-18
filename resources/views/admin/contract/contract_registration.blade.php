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
                        <form action="{{ isset($contractedit) ? route('admin.contract.update', $contractedit->id) : route('admin.contract.store') }}" method="POST" enctype="multipart/form-data">
                            @if (isset($contractedit))
                            @method('patch')
                        @endif
                            @csrf
                            <div class="row gy-4">
                            <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Tenant Name</label>

                    <select class="select2 form-select" id="tenant_name" name='tenant_name' @if (isset($contractedit)) disabled @endif required>
                        @if (isset($contractedit))
                        <option value="{{$contractedit->tenant_name }}" selected>{{ $contractedit->tenant_name}}</option>
                        @endif
                        <option value="">-----Select Type-----</option>
                        @foreach($tenant as $tent)
                        <option value="{{ $tent}}">{{ $tent}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-1">
                    <label class="form-label" for="flag">Document Type</label>

                    <select class="select2 form-select" id="flag" name='document_type' @if (isset($contractedit)) disabled @endif required>
                        @if (isset($contractedit))
                        <option value="{{$contractedit->document_type }}" selected>{{ $contractedit->document_type}}</option>
                        @endif
                        <option value="">----Select Document Type----</option>
                        @foreach($tenant_doc as $tent)
                        <option value="{{ $tent}}">{{ $tent}}</option>
                        @endforeach>
                    </select>
                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_name" name="sponsor_name" value="{{isset($contractedit)? $contractedit->sponsor_name: '' }}" placeholder="Enter sponsor name">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Id</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_id" name="sponsor_id" value="{{isset($contractedit)? $contractedit->sponsor_id: '' }}" placeholder="Enter sponsor Id">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Nationality</label>
                                    <select class="select2 form-select"  name='sponsor_nationality' @if (isset($contractedit)) disabled @endif required>
                        @if (isset($contractedit))
                        <option value="{{$contractedit->sponsor_nationality }}" selected>{{ $contractedit->sponsor_nationality}}</option>
                        @endif
                        <option value="" id="sponsor_nationality" >----Select Nationality----</option>
                        @foreach($tenant_nation as $tent)
                        <option value="{{ $tent}}">{{ $tent}}</option>
                        @endforeach
                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Sponsor Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="sponsor_mobile" name="sponsor_mobile" value="{{isset($contractedit)? $contractedit->sponsor_mobile: '' }}" placeholder="Enter sponsor mobile ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Tenant Mobile</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="tenant_mobile" value="{{isset($contractedit)? $contractedit->tenant_mobile: '' }}" placeholder="Enter tenant mobile ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Lessor's Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="lessor" value="{{isset($contractedit)? $contractedit->lessor: '' }}" placeholder="Enter Lessor name">
                                    </div>
                                </div> <div class="col-xxl-3 col-md-6">
                                <label for="lessor_sign" class="form-label">Lessor Sign</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="lessor_sign" name="lessor_sign">
                                </div>
                            </div>

                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Release Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="release_date" value="{{isset($contractedit)? $contractedit->release_date: '' }}" placeholder="Enter Release Date ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Lease Start Date </label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="lease_start_date" value="{{isset($contractedit)? $contractedit->lease_start_date: '' }}" placeholder="Enter Lease Start Date ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Lease End Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="lease_end_date" value="{{isset($contractedit)? $contractedit->lease_end_date: '' }}" placeholder="Enter Lease End Date">
                                    </div>
                                </div><div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Lease Period Month</label>
                                    <select class="select2 form-select" id="flag" name='lease_period_month' @if (isset($contractedit)) disabled @endif required>
                        @if (isset($contractedit))
                        <option value="{{$contractedit->lease_period_month }}" selected>{{ $contractedit->lease_period_month}}</option>
                        @endif
                        <option value="">-----Select Month-----</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value=" August"> August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>

                           
                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Lease Period Day</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="lease_period_day" value="{{isset($contractedit)? $contractedit->lease_period_day: '' }}" placeholder="Enter Lease Period Day">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Grace Start Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="grace_start_date" value="{{isset($contractedit)? $contractedit->grace_start_date: '' }}" placeholder="Enter Grace Start Date">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Grace End Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="grace_end_date" value="{{isset($contractedit)? $contractedit->grace_end_date: '' }}" placeholder="Enter Grace End Date">
                                    </div>
                                </div><div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Grace Period Month</label>
                                    <!-- <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="grace_period_month" value="{{isset($contractedit)? $contractedit->grace_period_month: '' }}" placeholder="Enter Grace Period Month">
                                    </div> -->
                                    <select class="select2 form-select" id="flag" name='grace_period_month' @if (isset($contractedit)) disabled @endif required>
                        @if (isset($contractedit))
                        <option value="{{$contractedit->grace_period_month }}" selected>{{ $contractedit->grace_period_month}}</option>
                        @endif
                        <option value="">-----Select Month-----</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value=" August"> August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>

                           
                    </select>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Grace Period Day</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="grace_period_day" value="{{isset($contractedit)? $contractedit->grace_period_day: '' }}" placeholder="Enter Grace Period Day">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Approved By</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="approved_by" value="{{isset($contractedit)? $contractedit->approved_by: '' }}" placeholder="Enter Approved By ">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Attestation No</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" name="attestation_no" value="{{isset($contractedit)? $contractedit->attestation_no: '' }}" placeholder="Enter Attestation No">
                                    </div>
                                </div><div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Attestation Expiry</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="name" name="attestation_expiry" value="{{isset($contractedit)? $contractedit->attestation_expiry: '' }}" placeholder="Enter Attestation Expiry">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="name" class="form-label">Contract Status</label>
                                    <select class="form-control select2 form-select" name="contract_status">
                            <option value="">-----Select Status-----</option>
                            <option value="new">New</option>
                            <option value="old">Old</option>
                        </select>
                                </div>
                                <div class="row gy-4 mb-3">
                                <div class="col-xxl-3 col-md-12">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark">
                                    {{isset($contractedit)? $contractedit->remark: '' }}
                                    </textarea>
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
<script>
    $(document).ready(function() {
        $("#tenant_name").change(function() {

            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('/admin/fetchtenant') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    success: function(p) {
                        $('#sponsor_name').val(p.sponsor_name);
                        $('#sponsor_id').val(p.sponsor_oid);
                        $('#sponsor_mobile').val(p.sponsor_phone);
                        $('#sponsor_nationality').val(p.customer_nationality);

                    }
                });
            });
        }).change();
    });
</script>
@endsection
