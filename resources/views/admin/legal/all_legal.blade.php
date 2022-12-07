@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Legal'])
@section('title', 'Manage Legal')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Legal</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead class="thead-color">
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Unit Ref</th>
                                <th scope="col">File</th>                                
                                <th scope="col">Status</th>
                                <th scope="col">Current Status</th>
                                <th scope="col">Remark</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($legalDetail as $legal)
                                <tr>
                                    <th scope="row">{{ $loop->index+ 1 }}</th>
                                    <td>{{ $legal->tenantName->tenant_english_name??''}}</td>
                                    <td>
                                        {{ $legal->??''}}
                                    </td>
                                    <td>
                                    {{ $legal->unit_ref??''}}

                        </td>
                        <form action="{{ route('admin.alllegal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lid" value="{{ $legal->id ?? '' }}" />

                        <td>
                             
                            <div class="d-flex">
                                    <img src="{{asset('upload/legal_doc/'.$legal->file)}}" class="" style="height:50px;width:50px;" /> &nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name='attachment_file[]' class="form-control" multiple />
                                </div>  
                    </td>
                                    <td>
                                <select class="select2 form-select" id="process" name='status'>
                                <option value="Collection Process">Collection Process</option>
                                <option value="In the Court">In the Court</option>
                                <option value="Settelment Process">Settelment Process</option>
                                <option value="Settelment Done">Settelment Done</option>
                                <option value="Exempt by the lessor">Exempt by the lessor</option>
                                </select>
                                    </td>
                                    <td>
                                        {{ $legal->status??'' }}
                                    </td>
                                    <td>
                                <input type="text" class="form-control" name="remark" value="{{ isset($legal)? $legal->remark : '' }}" />                                
                                    </td>
                           <td>
                           <button type="submit" class="btn-icon btn btn-primary btn-round btn-sm"
                                                         ><i data-feather="check-circle"></i></button>
                                                       
                           </td>
                           </form>

                            </tr>@endforeach
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
