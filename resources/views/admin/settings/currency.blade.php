@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Currency'])
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
@section('title', 'Manage Currency')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Currency</h4>
                </div><!-- end card header -->
                <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered table-reponsive" style="width: 100%;" aria-describedby="ajax-datatables_info">
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
