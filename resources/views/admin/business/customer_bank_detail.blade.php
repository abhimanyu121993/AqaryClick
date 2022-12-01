@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Bank'])
@section('title', 'Manage Bank')
@section('main-content')
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Bank</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead class="thead-color">
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Business Name</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account No</th>
                                <th scope="col">IBAN No</th>
                                <th scope="col">IFSC Code</th>
                                <th scope="col">SWIFT Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $bn)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $bn->businessbank->business_name??'' }}</td>
                                    <td>{{ $bn->bank_name??'' }}</td>
                                    <td>{{ $bn->account_number??''}}</td>
                                    <td>{{ $bn->iban_no??''}}</td>
                                    <td>{{ $bn->ifsc??''}}</td>
                                    <td>{{ $bn->swift??''}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($bn->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                               <li><a class="dropdown-item" href="" value="{{$bid}}" id="edit-bank" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">Edit</a></li>
                                               <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>
                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.business.destroy', $bid) }}"
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Update Bank Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.updateBank') }}" method="post">
                    @csrf
                <input type="text" class="form-control" id="bid" name="bid" hidden>

                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="firstName" class="form-label">Bank Name</label>

                                <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Enter firstname">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="lastName" class="form-label">Account No</label>
                                <input type="text" class="form-control" id="" Name="account_number" placeholder="Enter Account No">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="lastName" class="form-label">IBAN No</label>
                                <input type="text" class="form-control" id="" Name="iban_no" placeholder="Enter Iban No">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="space" class="form-label">Bank Code</label>
                            <select class="form-control" id="bank_code" name="bankcode">
                                <option value="">-----Select Code-----</option>
                                <option value="ifsc">Ifsc Code</option>
                                <option value="swift">Swift Code</option>
                            </select>
                        </div>
                        <div class="col-md-12 swift" id="swift">
                            <label for="country" class="form-label">Swift Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="swift" placeholder="Enter Swift Code">
                            </div>
                        </div>
                        <div class="col-md-12 ifsc" id="ifsc">
                            <label for="country" class="form-label">IFSC Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="ifsc" placeholder="Enter Ifsc Code">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script-area')
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
