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
                                    <td><div class="dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ri-eye-2-fill"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{route('admin.documentDownload',$doc->file)}}">{{$doc->file??''}}</a></li>
                                    </ul>
                                    </div></td>
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
                                                {{-- <li><a class="dropdown-item" href="{{ route('admin.editDocument',$bid) }}" value="{{$bid}}" id="edit-bank" >Edit</a></li> --}}
                                                <li><a class="dropdown-item" href="{{ route('admin.editDocument',$bid) }}" value="{{$bid}}" id="edit-bank" data-bs-toggle="modal" data-bs-target="#exampleModalgrid{{ $bid }}">Edit</a></li>
                                                {{-- <li><a class="dropdown-item" id="bank-edit" value="{{ $bid }}" data-bs-target="#exampleModalgrid">Edit</a></li> --}}
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
    <div class="modal fade" id="exampleModalgrid{{ $bid }}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Update Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ Route('admin.updateDocument',$editdocument->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" class="form-control" id="bid" value="{{ $editdocument->id }}" name="bid" >

                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                     <label for="" class="form-label">Document Name</label>
                                <input type="text" class="form-control" id="document_name" value="{{ $editdocument->document_name }}" name="document_name[]" placeholder="Enter Document Name" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                     <label for="" class="form-label">Document File</label>
                                     <img src="{{ asset('company/document'.$editdocument->docfile) }}" alt="img" height="50px;" width="50px;">
                                <input type="file" class="form-control" id="docfile" name="docfile[]" required>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="" class="form-label">Document Expiry</label>
                                <input type="date" class="form-control" value="{{ $editdocument->expire_date }}" id="document_exp" name="document_exp_date[]">
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
{{-- <script>
    $(document).on('click', '#exampleModalgridLabel', function() {
            var id = $(this).val();

            var newurl = "{{ url('/admin/edit-document') }}/" + id;

            $.ajax({
                url: newurl,
                method: 'get',
                success: function(p) {
                    var data = JSON.parse(p);
                    $('#document_name').val(data.document_name);
                    $('#docfile').text(data.file);
                    $('#document_exp').val(data.expire_date);
                }
            });
        });
</script> --}}
@endsection
