<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Welcome</H1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1" id="h1">client Contracts Report</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Contract No</th>
                                <th scope="col">Customer Phone</th>
                                <th scope="col">Contract Start Date</th>
                                <th scope="col">Contract Expiry Date</th>
                                <th scope="col">Duration of the contract</th>
                                <th scope="col">Monthly Rent</th>
                                <th scope="col">Total Value of Contract</th>
                                <th scope="col">Total Remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $c)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $c->contract_code ?? '' }}</td>
                                    <td>{{ $c->tenantDetails->tenant_primary_mobile ?? '' }}</td>
                                    <td>{{$c->lease_start_date??''}}</td>
                                    <td>{{$c->lease_end_date??''}}</td>
                                    <td>{{$c->lease_period_month??''}}</td>
                                    <td>{{number_format($c->rent_amount)??0}}</td>
                                    <td>{{$total=floatval($c->rent_amount)*floatval($c->lease_period_month)??0}}</td>
                                    <td>{{number_format($total-($c->Allinvoices->sum('amt_paid')??0))}}</td>

                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>