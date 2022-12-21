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

                                        <div class="d-flex">
                                            <div  class="flex-grow-1">
                                                @if ($company->customer_type == 'Indivisual')
                                                    <h3>{{ $company->business_name ?? '' }}</h3>
                                                @else
                                                    <img src="{{ asset('upload/company/logo/' . $company->logo) }}"
                                                        class="card-logo card-logo-dark" alt="logo dark" height="150"
                                                        width="200">
                                                @endif
                                                <div class="mt-sm-5 mt-4">
                                                    <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                                    <p class="text-muted mb-1" id="address-details">
                                                        {{ $company->address ?? '' }}</p>
                                                    <!-- <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 90201</p> -->
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0 mt-sm-0 mt-3">

                                                <h6><span class="text-muted fw-normal">Company Registration No:</span><span id="legal-register-no">{{ $company->cr_no??'' }}</span></h6>
                                                <h6><span class="text-muted fw-normal"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;</span><span id="email">{{ $company->email??'' }}</span></h6>
                                                <h6 class="mb-0"><span class="text-muted fw-normal"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;</span><span id="contact-no"> {{ $company->phone??'' }}</span></h6>
                                                <h6 class="mb-0"><span class="text-muted fw-normal">Post Box:&nbsp;<span id="contact-no"> {{ $company->post_box??'' }}</span></h6>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-header-->
                                </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1 text-center" id="h1">Tenant Contracts Report</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead style="background-color: #EDC70B;">
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Contract No</th>
                                <th scope="col">Tenant Name</th>
                                <th scope="col">Contract Start Date</th>
                                <th scope="col">Contract Expiry Date</th>
                                <th scope="col">Contract Period Months</th>
                                <th scope="col">Monthly Rent</th>
                                <th scope="col">Total Value of Contract</th>
                                <th scope="col">Total Remaining</th>
                                <th scope="col">Overdue</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $c)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $c->contract_code ?? '' }}</td>
                                    <td>{{ $c->tenantDetails->tenant_english_name ?? '' }}</td>
                                    <td>{{$c->lease_start_date??''}}</td>
                                    <td>{{$c->lease_end_date??''}}</td>
                                    <td>{{$c->lease_period_month??''}}</td>
                                    <td>{{number_format($c->rent_amount)??0}}</td>
                                    <td>{{$total=floatval($c->rent_amount)*floatval($c->lease_period_month)??0}}</td>
                                    <td>{{number_format($total-($c->Allinvoices->sum('amt_paid')??0))}}</td>
                                    <td>{{ $c->overdue ?? '' }}</td>

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