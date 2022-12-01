@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Customer'])
@section('title', 'Manage Customer')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex table-main-heading">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Customer</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead class="thead-color">
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>                                
                                <th scope="col">Approved</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customerDetails as $cust)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $cust->first_name??''}}</td>
                                    <td>{{ $cust->last_name??''}}</td>
                                    <td>{{ $cust->mobile??''}}</td>
                                    <td>{{ $cust->email??''}}</td>
                                    <td>
                                    <div class="form-check form-check-primary form-switch">
                        <input type="checkbox" value="{{$cust->id}}" class="form-check-input is_active" id="is_active" {{ $cust->is_active==0?'':'checked' }} />
                    </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($cust->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <!-- <li><a class="dropdown-item" href="{{ route('admin.customer.edit', $bid) }}">Edit</a></li> -->
                                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.customer.destroy', $bid) }}"
                                                    method="post" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach
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
    $('.is_active').on('click', function() {
        var id = $(this).val();
        var newurl = "{{ url('admin/isactive-customer') }}/" + id;

        $.ajax({
            url: newurl,
            method: 'get',
            beforeSend: function() {
                $('.is_active').attr('disabled', 'true');
            },
            success: function() {
                
                $('.is_active').removeAttr('disabled')

            }
        });
    });
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

@endsection
