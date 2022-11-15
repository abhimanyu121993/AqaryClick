@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Customers'])
@section('title', 'Manage Customers')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Customer's</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead>
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Company</th>
                                <th scope="col">Bank Accounts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $usr)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $usr->name }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->phone}}</td>
                                    <td>
                                        Show Company
                                    </td>
                                    <td>
                                       Show Account's
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
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
@endsection
