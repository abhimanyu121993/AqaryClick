@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Contract'])
@section('title', 'Manage Contract')
<style>
    #card-header{
       background:#c8f4f6;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
   }
   #pop{
       color: black !important;
   }
   #header1
   {
       background: #ecf0f3;
       border: none !important;
       border-top-left-radius:15px;
       border-top-right-radius: 15px;
       box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px 0px;
   }
   #h1
   {
       color: black;
   }
   #example
   {
       font-size: 14px;
   }
   thead
    {
        background:#c9e6e7 !important;
    }
   input ,select,textarea ,#building_type{
       border-radius: 10px !important;
       border: none !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset !important;
   }
   .dataTables_info,.dataTables_paginate {
       font-weight: bolder;
   }
   #btn-btn
   {
       background:#ffffff;
       color: black;
       border: none;
       border-radius: 10px !important;
       box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px;}
   #btn-btn:hover
   { box-shadow: rgb(201, 212, 221) 3px 3px 6px 0px inset, rgba(211, 206, 206, 0.349) -3px -3px 6px 1px inset;}
</style>
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                    <div class="col-sm-6">
                        <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Contract </h4>
                    </div>

                </div><!-- end card header -->
                <div class="card-body  ">
                    <div class="col-sm-12 table-responsive">
                        <table id="example" class="table table-bordered table-resposive" id="example">
                            <thead >
                                <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col">Contract Code</th>
                                    <th scope="col">Tenant Name</th>
                                    <th scope="col">Document Type</th>
                                    <th scope="col">QID No</th>
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
                                    <th scope="col">All Grace</th>
                                    <th scope="col">Approved By</th>
                                    <th scope="col">Attestation No</th>
                                    <th scope="col">Attestation Status</th>
                                    <th scope="col">Attestation Expiry</th>
                                    <th scope="col">Contract Status</th>
                                    <th scope="col">Expire</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">Reject_Desc</th>
                                    <th scope="col">Rent Ammount</th>
                                    <th scope="col">Total Invoice</th>
                                    <th scope="col">Guarantees</th>
                                    <th scope="col">Guarantees Payment Mode</th>
                                    <th scope="col">Tenant sign</th>
                                    <th scope="col">Remark</th>
                                    <th scope="col">Receipt</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contract as $con)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $con->contract_code ?? '' }}</td>
                                        <td>{{ $con->tenantDetails->tenant_english_name ?? '' }}</td>
                                        <td>{{ $con->document_type ?? '' }}</td>
                                        <td>{{ $con->qid_document ?? '' }}</td>
                                        <td>{{ $con->cr_document ?? '' }}</td>
                                        <td>{{ $con->passport_document ?? '' }}</td>
                                        <td>{{ $con->sponsor_id ?? '' }}</td>
                                        <td>{{ $con->sponsor_name ?? '' }}</td>
                                        <td>{{ $con->sponsor_nationality ?? '' }}</td>
                                        <td>{{ $con->sponsor_mobile ?? '' }}</td>
                                        <td>{{ $con->countryDetails->name ?? '' }}</td>
                                        <td>{{ $con->tenant_mobile ?? '' }}</td>
                                        <td>{{ $con->lessor ?? '' }}</td>
                                        <td>{{ $con->release_date ?? '' }}</td>
                                        <td>{{ $con->lease_start_date ?? '' }}</td>
                                        <td>{{ $con->lease_end_date ?? '' }}</td>
                                        <td>{{ $con->lease_period_month ?? '' }}</td>
                                        <td>{{ $con->lease_period_day ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.graceDetails',$con->contract_code ??'') }}" class="graceBtn"
                                                data-id="{{ $con->id }}">View</a>
                                        </td>
                                        <td>{{ $con->lessorDetails->name ?? '' }}</td>
                                        <td>{{ $con->attestation_no ?? '' }}</td>
                                        <td>{{ $con->attestation_status ?? '' }}</td>
                                        <td>{{ $con->attestation_expiry ?? '' }}</td>
                                        <td>{{ $con->contract_status ?? '' }}</td>
                                        <td>
                                    <div class="form-check form-check-primary form-switch">
                                        <input type="checkbox" value="{{$con->id}}" class="form-check-input is_expired" id="is_expired" {{ $con->expire==0?'':'checked' }} />
                                    </div>
                                    </td>
                                        <td>
                                            <div class="form-check form-check-primary form-switch">
                                                <input type="checkbox" value="{{ $con->id }}"
                                                    class="form-check-input is_reject" id="is_reject"
                                                    {{ $con->status == 0 ? '' : 'checked' }} />
                                            </div>
                                        </td>
                                        <td>{{ $con->reject_desc ?? '' }}</td>
                                        <td>{{$con->rent_amount ?? '' }}</td>
                                        <td>{{ $con->total_invoice ?? '' }}</td>
                                        <td>{{ $con->guarantees ?? '' }}</td>
                                        <td>{{ $con->guarantees_payment_method ?? '' }}</td>

                                        <td><img src="{{ asset('upload/contract/signature/' . $con->tenant_sign) }}"
                                                class="me-75 bg-light-danger" style="height:35px;width:35px;" /></td>
                                        <td>{{ $con->remark ?? '' }}</td>
                                        <td><a class="dropdown-item"
                                                href="{{ $con->status==0?route('admin.receipt',$con->contract_code ??''):'#' }}">view</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" role="button"  id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill"></i>
                                                </a>
                                                @php $bid=Crypt::encrypt($con->id); @endphp
                                                <ul  class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    @can('Contract_edit')
                                                        <li><a id="pop" class="dropdown-item"
                                                                href="{{ route('admin.contract.edit', $bid) }}">Edit</a></li>
                                                    @endcan
                                                    @can('Contract_delete')
                                                        <li><a id="pop" class="dropdown-item" href="#"
                                                                onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a>
                                                        </li>
                                                    @endcan
                                                    <form id="delete-form-{{ $bid }}"
                                                        action="{{ route('admin.contract.destroy', $bid) }}" method="post"
                                                        style="display: none;">
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
    </div>


    </div>
        <!-- Modal -->
        <div class="modal fade " id="contractrejdesc" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="h1" >Why You Reject This Contract ?</h4>
                    </div>
                    <form action="" method="post" id="contractrejform">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="desc" rows="3" placeholder="Write Something Here!"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-btn" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <!-- Grids in modals -->
@endsection


@section('script-area')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.10/sweetalert2.all.js"
        integrity="sha512-+QEgB4wm6Qoshtwrn0TqoNEuufvlGDpN36Ht5yicS4QMZolMZopGsfpMzf+ZaSUb3m7Fw3FwJ2Nu6TCgyuQ0qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.is_reject').on('click', function() {
            var id = $(this).val();
            var newurl = "{{ url('admin/isreject') }}/" + id;
            var check = $(this).is(':checked');
            var furl="{{url('admin/description/')}}/";
            $('.close').on('click', function() {
                $(".myModalaa").modal('hide');
            })


            $.ajax({
                url: newurl,
                method: 'get',
                beforeSend: function() {
                    $('.is_reject').attr('disabled', 'true');
                },
                success: function() {

                    $('.is_reject').removeAttr('disabled')
                    if (check) {
                        $('#contractrejform').attr('action',furl+id);
                        $("#contractrejdesc").modal('show');
                    }
                }
            });
        });
    </script>
<script>
    $('.is_expired').on('click', function() {
        var id = $(this).val();
        var newurl = "{{ url('admin/isexpired') }}/" + id;

        $.ajax({
            url: newurl,
            method: 'get',
            beforeSend: function() {
                $('.is_expired').attr('disabled', 'true');
            },
            success: function() {

                $('.is_expired').removeAttr('disabled')

            }
        });
    });
</script>
@endsection
