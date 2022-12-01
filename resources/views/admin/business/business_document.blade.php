@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Document'])
@section('title', 'Manage Document')
@section('main-content')
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Document</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead class="thead-color">
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Business Name</th>
                                <th scope="col">Document Name</th>
                                <th scope="col">file</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($document as $doc)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $doc->businessDocument->business_name??'' }}</td>
                                    <td>{{ $doc->document_name??'' }}</td>
                                    <td>{{ $doc->file}}</td>
                                    <td>
                                        {{ $doc->expire_date }}
                                    </td>
                                    <td>
                                       {{ $doc->description }}
                                    </td>       
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($doc->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                               <li><a class="dropdown-item" id="bank-edit" href="{{route('admin.business.edit',$bid)}}">Edit</a></li>
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
