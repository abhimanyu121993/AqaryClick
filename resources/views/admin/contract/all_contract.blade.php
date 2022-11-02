@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Contract'])
@section('title', 'Manage Contract')
@section('main-content')

<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Contract </h4>
                </div><!-- end card header -->
                <div class="card-body  table-responsive">
                    <table class="table table-nowrap container">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Contract Code</th>
                                <th scope="col">Tenant Name</th>
                                <th scope="col">Document Type</th>
                                <th scope="col">Qid No</th>
                                <th scope="col">CR No</th>
                                <th scope="col">Passport No</th>
                                <th scope="col">Sponsor Id</th>
                                <th scope="col">Sponsor Name</th>
                                <th scope="col">Sponsor Nationality</th>
                                <th scope="col">Sponsor Mobile</th>
                                <th scope="col">Tenant Nationality</th>
                                <th scope="col">Tenant Mobile</th>
                                <th scope="col">Lessor's Name</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">Lease Start Date</th>
                                <th scope="col">Lease End Date</th>
                                <th scope="col">Lease Period Month</th>
                                <th scope="col">Lease Period Day</th>
                                <th scope="col">Grace Start Date</th>
                                <th scope="col">Grace End Date</th>
                                <th scope="col">Grace Period Month</th>
                                <th scope="col">Grace Period Day</th>
                                <th scope="col">Approved By</th>
                                <th scope="col">Attestation No</th>
                                <th scope="col">Attestation Status</th>
                                <th scope="col">Attestation Expiry</th>
                                <th scope="col">Contract Status</th>
                                <th scope="col">Rent Ammount</th>
                                <th scope="col">Tenant sign</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contract as $con)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $con->contract_code??'' }}</td>
                                    <td>{{ $con->tenant_name??'' }}</td>
                                    <td>{{ $con->document_type??'' }}</td>
                                    <td>{{ $con->qid_document??'' }}</td>
                                    <td>{{ $con->cr_document??'' }}</td>
                                    <td>{{ $con->passport_document??'' }}</td>
                                    <td>{{ $con->sponsor_id??''}}</td>
                                    <td>{{ $con->sponsor_name??''}}</td>
                                    <td>{{ $con->sponsor_nationality??''}}</td>
                                    <td>{{ $con->sponsor_mobile??''}}</td>
                                    <td>{{ $con->tenant_nationality??''}}</td>
                                    <td>{{ $con->tenant_mobile??''}}</td>
                                    <td>{{ $con->lessor??''}}</td>
                                    <td>{{ $con->release_date??''}}</td>
                                    <td>{{ $con->lease_start_date??''}}</td>
                                    <td>{{ $con->lease_end_date??''}}</td>
                                    <td>{{ $con->lease_period_month ??''}}</td>
                                    <td>{{ $con->lease_period_day??''}}</td>
                                    <td>{{ $con->grace_start_date ??''}}</td>
                                    <td>{{ $con->grace_end_date ??''}}</td>
                                    <td>{{ $con->grace_period_month ??''}}</td>
                                    <td>{{ $con->grace_period_day ??''}}</td>
                                    <td>{{ $con->approved_by ??''}}</td>
                                    <td>{{ $con->attestation_no ??''}}</td>
                                    <td>{{ $con->attestation_status ??''}}</td>
                                    <td>{{ $con->attestation_expiry ??''}}</td>
                                    <td>{{ $con->contract_status ??''}}</td>
                                    <td>{{ $con->rent_amount ??''}}</td>
                                    <td><img src="{{asset('upload/contract/signature'.$con->tenant_sign)}}" class="me-75 bg-light-danger" style="height:35px;width:35px;"/></td>
                                    <td>{{ $con->remark ??''}}</td>
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
