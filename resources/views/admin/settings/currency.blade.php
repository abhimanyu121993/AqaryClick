@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Currency'])
@section('title', 'Manage Currency')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Manage Currency</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead>
                            <tr>
                     <th scope="col">Sr.No.</th>
                                <th scope="col">Counrty</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Code</th>
                                <th scope="col">Symbol</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                        @foreach ($currencyDetails as $c)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $c->country??''}}</td>
                                    <td>{{ $c->currency??''}}</td>
                                    <td>{{ $c->code??''}}</td>
                                    <td>{{ $c->symbol??''}}</td>
                                    <td>
                                    <div class="form-check form-check-primary form-switch">
                        <input type="checkbox" value="{{$c->id}}" class="form-check-input is_active" id="is_active" {{ $c->status==0?'':'checked' }} />
                    </div>
                                    </td>

                                    </tr>
                                    @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>



    <!-- Grids in modals -->
@endsection


@section('script-area')
<script>
    $(document).on('click','.is_active' ,function() {
        var id = $(this).val();
        var newurl = "{{ url('admin/isactive-currency') }}/" + id;

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

$(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.getCurrency') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data:'country',
                        name:'country',
                    },
                    {
                        data:'currency',
                        name:'currency'
                    },
                    {
                        data:'code',
                        name:'code'
                    },
                    {
                        data:'symbol',
                        name:'symbol'
                    },
                    {
                        data:'statuscontrol',
                        name:'status'
                    },



                ]
            });
        });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

@endsection
