@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Owners'])
@section('title', 'Manage Owners')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Customer's</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                <thead>           
                <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">IFSC Code</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($bank_details->bank_details as $bank)
                                    <th>{{ $loop->index+1 }}</th>
                                    <td>{{ $bank->bank_name }}</td>
                                    <td>{{ $bank->account_number }}</td>
                                    <td>{{ $bank->ifsc }}</td>
                                    <td>{{ $bank->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.bankdelete',$bank_details->id) }}">Delete</a>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
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
