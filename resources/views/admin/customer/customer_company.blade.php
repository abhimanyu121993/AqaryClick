@extends('admin.includes.layout', ['breadcrumb_title' => 'Register Customer'])
@section('title', 'Register Customer')
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
                                <th scope="col">Authorised Manager</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Company Address</th>
                                <th scope="col">Company Activity</th>
                                <th scope="col">Company Documents</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
{{-- {{ $company_details->companyDocuments }} --}}
                            @foreach ($company_details->companyOwner as $company )
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $company->authorised_maneger }}</td>
                                    <td>{{ $company->company_name }}</td>
                                    <td>{{ $company->company_address }}</td>
                                    <td>{{ $company->company_activity }}</td>
                                    <a href="#">
                                    <td>{{ $company->companyDocuments }}</td>
                                </a>
                                    <td>{{ $company->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.companydelete',$company->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
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
