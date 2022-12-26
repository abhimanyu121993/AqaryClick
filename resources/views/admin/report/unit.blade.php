<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Report</title>
  </head>
 
<body>
<div class="row">

<div class="col-lg-12">
                                    <div class="card-header border-bottom-dashed p-4">
                                    <center> <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Print</a></center>
                                    </div>
                                    <!--end card-header-->
                                </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1 text-center" id="h1">{{$type=='vacant'?'Unit Vacant Report':($type=='occupied'?'Unit Occupied Report':'Unit Report')}}</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead style="background-color: #EDC70B;">
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Building Type</th>
                                <th scope="col">Unit Type</th>
                                <th scope="col">Unit No</th>
                                <th scope="col">Floor No</th>
                                <th scope="col">Area/M<sup>2</sup></th>
                                <th scope="col">Unit Rent</th>
                                @if($type=='vacant')
                                <th scope="col">Vacant Date</th>
                                <th scope="col">Vacant Reason</th>
                                @endif
                                <th scope="col">Revenue Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unit as $u)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $u->buildingDetails->name??'' }}</td>
                                    <td>{{ $u->buildingDetails->building_type??'' }}</td>
                                    <td>{{ $u->unitTypeDetails->name ??'' }}</td>
                                    <td>{{ $u->unit_no ??'' }}</td>
                                    <td>{{ $u->unitfloor->name??'' }}</td>
                                    <td>{{ $u->unit_size??''}}</td>
                                    <td>{{ $u->actual_rent??''}}</td>
                                    @if($type=='vacant')
                                    <td>{{isset($u->vacant_date)?carbon\carbon::parse($u->vacant_date)->format('d-M-Y'):''}}</td>
                                    <td>{{ $u->reason_vacant??''}}</td>
                                    @endif
                                    <td></td>





                                   
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>