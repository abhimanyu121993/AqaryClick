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
                    <h4 class="card-title mb-0 flex-grow-1 text-center" id="h1">Tenant Overdue Report</h4>
                </div>
                <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-body">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead style="background-color: #264da6;color:white">
                            <tr>
                                <th scope="col">Total Invoice Paid</th>
                                <th scope="col">Total Amount Paid</th>
                                <th scope="col">Total Invoice Unpaid</th>
                                <th scope="col">Total Amount Unpaid</th>
                                <th scope="col">Invoices Balance Unpaid</th>
                                <th scope="col">Total Outstanding</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$invoice??''}}</td>
                                <td>{{ number_format($inv_paid_amt) ?? 0 }}</td>
                                <td>{{ $not_paid_invoice ?? 0 }}</td>
                                <td>{{ number_format($invoice_not_paid_amt) ?? 0 }}</td>
                                <td>{{number_format($invoice_balance)?? 0}}</td>
                                <td>{{ number_format($outstanding) ?? 0 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body field_wrapper -responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                        <thead style="background-color: #264da6;color:white">
                            <tr>
                                <th scope="col">Sr.No.</th>
                                <th scope="col">Contract No</th>
                                <th scope="col">Tenant Name</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Payment Date</th>
                                <th scope="col">Due Amount</th>
                                <!-- <th scope="col">Total Contract</th> -->
                                <!-- <th scope="col">Amount Paid</th> -->
                                <th scope="col">Payment Status</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Overdue Period </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Allinvoice as $inv)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $inv->Contract->contract_code ?? '' }}</td>
                                    <td>{{ $inv->TenantName->tenant_english_name ?? '' }}</td>
                                    <td>{{ $inv->invoice_no ?? '' }}</td>
                                    <td>{{ Carbon\Carbon::parse($inv->due_date)->format('d-M-Y') ?? '' }}</td>
                                    <td>{{ Carbon\Carbon::parse($inv->created_at)->format('d-M-Y') ?? '' }}</td>
                                    <td>{{ number_format($inv->total_balance) ?? '' }}</td>
                                    <!-- <td>{{ $inv->Contract->total_contract ?? '' }}</td> -->
                                    <!-- <td>{{ $inv->amt_paid ?? '' }}</td> -->
                                    <td>{{ $inv->payment_status ?? '' }}</td>
                                    <td>{{ $inv->payment_method ?? '' }}</td>
                                    <td>{{ $inv->overdue_period ?? '' }}Days</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</html>