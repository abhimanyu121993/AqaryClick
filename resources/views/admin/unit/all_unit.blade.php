@extends('admin.includes.layout', ['breadcrumb_title' => 'Manage Units'])
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
@section('title', 'Manage units')
@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex table-main-heading" id="card-header">
                        <div class="col-lg-6">
                            <h4 class="card-title mb-0 flex-grow-1" id="h1">Manage Unit</h4>
                        </div>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline table-responsive" style="width: 100%;">
                <thead >
                <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Unit No</th>
                                <th scope="col">Unit Type</th>
                                <th scope="col">Unit Status</th>
                                <th scope="col">Unit Floor</th>
                                <th scope="col">Unit Feature</th>
                                <th scope="col">Unit Size</th>
                                <th scope="col">Electric No</th>
                                <th scope="col">Water No</th>
                                <th scope="col">Unit Rent</th>
                                <th scope="col">Is Vacant</th>
                                <th scope="col">Vacant Reason</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $unit->buildingDetails->name??'' }}</td>
                                    <td>{{ $unit->unit_no??''}}</td>
                                    <td>{{ $unit->unitTypeDetails->name ??'' }}</td>
                                    <td>{{ $unit->unitStatus->name??'' }}</td>
                                    <td>{{ $unit->unitfloor->name??'' }}</td>
                                    <td>{{ $unit->unitFeature->name??''}}</td>
                                    <td>{{ $unit->unit_size??''}}</td>
                                    <td>{{ $unit->electric_no??''}}</td>
                                    <td>{{ $unit->water_no??''}}</td>
                                    <td>{{ $unit->actual_rent??''}}</td>
                                    <td>
                                            <div class="form-check form-check-primary form-switch">
                                                <input type="checkbox" value="{{ $unit->id }}"
                                                    class="form-check-input is_vacant" id="is_vacant"
                                                    {{ isset($unit->unitStatus)?($unit->unitStatus->name=='vacant'?'checked':''):'' }}
                                                     />
                                            </div>
                                        </td>
                                    <td>{{$unit->reason_vacant??''}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="ri-more-2-fill"></i>
                                            </a>
                                            @php $bid=Crypt::encrypt($unit->id); @endphp
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item" id="pop" href="{{route('admin.unit.edit',$bid)}}">Edit</a></li>
                                                <li><a class="dropdown-item" id="pop" href="#" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();">Delete</a></li>

                                                <form id="delete-form-{{ $bid }}" action="{{ route('admin.unit.destroy', $bid) }}"
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
      <!-- Modal -->
      <div class="modal fade " id="contractrejdesc" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" id="h1" >Reason Why You Vacant This Unit?</h4>
                    </div>
                    <form action="" method="post" id="contractrejform">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="desc" rows="3" placeholder="Write Something Here!"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button id="btn-btn" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
        $('.is_vacant').on('click', function() {
            var id = $(this).val();
            var newurl = "{{ url('admin/isvacant') }}/" + id;
            var check = $(this).is(':checked');
            var furl="{{url('admin/reason-vacant/')}}/";
            $('.close').on('click', function() {
                $(".myModalaa").modal('hide');
            })


            $.ajax({
                url: newurl,
                method: 'get',
                beforeSend: function() {
                    $('.is_vacant').attr('disabled', 'true');
                },
                success: function(data) {
                    alert(typeof data);
                    return 0;
                    if(typeof data !='number'){
                        // alert('There is a contract which is not expire please expire this first -'+data);
                        var newurl="{{ route('admin.contract.create') }}";
                        Swal.fire({
  icon: 'error',
  title: 'Can\'t Vacant',
  text: 'This Unit Is Under Contract -'+data+', Please ! Expired This Contract First',
  footer: '<a href="'+newurl+'">Goto Contract</a>'
});
                        // window.location.reload();
                        $('.is_vacant').removeAttr('disabled')
                    }
                    else{
                    $('.is_vacant').removeAttr('disabled')
                    if (check) {
                        $('#contractrejform').attr('action',furl+id);
                        $("#contractrejdesc").modal('show');
                    }
                }
                }
            });
        });
    </script>

@endsection
