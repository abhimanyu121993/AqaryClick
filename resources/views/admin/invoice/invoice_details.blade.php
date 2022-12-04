<!doctype html>
<html lang="en">

<head>
    <style>
        .card{
            background: transparent !important;
        }
        #watermark{
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          z-index: -1;
          font-size: 100px;
          font-weight:500px;
          display: grid;
          justify-content: center;
          align-content: center;
          opacity: 0.1;
          transform: (180deg);
        }
        .background
        {
            height: auto;
            width: 100%;
            position: relative;
            z-index: 10000;
            overflow: hidden;
        }
        #img
        {
            height: 1100px;
            width: 70%;
            top: -100px;
            position: absolute;
            opacity: .1;
            left: 240px;
            z-index: 1000;
        }
        </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h1 class="text-center text-danger">Invoice</h1>
<div class="background" id='background'>

                @if ($company->customer_type == 'Indivisual')
                <img src="{{ asset("upload/building/building.png") }}" id="img" alt="img">
                @else
                <img src="{{ asset('upload/company/logo/' . $company->logo) }}"
                    class="card-logo card-logo-dark" alt="logo dark" id="img">
            @endif

    <div class="main-content" >
        <div class="page-content" id="invoice-download">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="card" id="demo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header border-bottom-dashed p-4">
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
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                                                <h5 class="fs-14 mb-0"><span
                                                        id="invoice-no">{{ $invoice->invoice_no ?? '' }}</span></h5>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                                <h5 class="fs-14 mb-0"><span
                                                        id="invoice-date">{{ \Carbon\Carbon::parse($invoice->created_at)->format('d M Y') ?? '' }}</span>
                                                </h5>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                                <span class="badge badge-soft-success fs-11"
                                                    id="payment-status">{{ $invoice->payment_status ?? '' }}</span>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                                <h5 class="fs-14 mb-0">{{ $symbol??'' }}&nbsp;<span id="total-amount">{{ round($amt_paid??'',2) }}</span></h5>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12" >
                                    <div class="card-body p-4 border-top border-top-dashed">

                                        <div class="row g-3">
                                            <div class="col-6">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Lessor</h6>
                                                <p class="fw-medium mb-2" id="billing-name">
                                                    {{ $lessor->first_name ?? '' }}</p>
                                                <p class="text-muted mb-1" id="billing-address-line-1">
                                                    {{ $lessor->address ?? '' }}</p>
                                                <p class="text-muted mb-1"><span>Phone: +</span><span
                                                        id="billing-phone-no">{{ $lessor->mobile ?? '' }}</span></p>
                                                <!-- <p class="text-muted mb-0"><span>Tax: </span><span id="billing-tax-no">12-3456789</span> </p> -->
                                            </div>
                                            <!--end col-->
                                            <div class="col-6 text-center">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Tenant</h6>
                                                <p class="fw-medium mb-2" id="shipping-name">
                                                    {{ $invoice->TenantName->tenant_english_name ?? '' }} ({{ $invoice->TenantName->file_no ?? '' }})</p>
                                                <p class="text-muted mb-1" id="shipping-address-line-1">Address:
                                                    <br>{{ $invoice->TenantName->unit_address ?? '' }} </p>
                                                <p class="text-muted mb-1"><span>Phone:</span><span
                                                        id="shipping-phone-no">{{ $invoice->TenantName->tenant_primary_mobile ?? '' }},{{ $invoice->TenantName->tenant_secondry_mobile ?? '' }}</span>
                                                </p>
                                                <p class="text-muted mb-1"><span>Tax No:</span><span
                                                        id="shipping-phone-no">{{ $invoice->tax_no?? '' }}</span>
                                                </p>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">Sn.</th>
                                                        <th scope="col">unit ref</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Due Amount</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    <tr>
                                                        <th scope="row">01</th>

                                                        <td>{{ $unit_ref->unit_ref ?? 'No Record' }}</td>
                                                        <td class="text-start">
                                                            <p class="text-muted mb-0">{{ $invoice->remark ?? '' }}</p>
                                                        </td>
                                                        <td>{{ $symbol??'SAR' }}&nbsp;{{round($due_amt,2)}}</</td>
                                                        <td class="text-end">{{ $symbol??'' }}&nbsp;{{ round($amt_paid??0 ,2) }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="border-top border-top-dashed mt-2" style="float: right;">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                style="width:250px">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end">{{ $symbol??'' }}&nbsp;{{ round($amt_paid??0 ,2) }}</td>
                                                    </tr>
                                                    <tr>
                                                <td>Estimated Tax ({{ $invoice->tax_per??0 }}%)</td>
                                                <td class="text-end">{{ $symbol??'' }}&nbsp;{{ round($tax_amt??0,2) }}</td>
                                            </tr>
                                                    <tr>
                                                        <td>Due Amount</td>
                                                        <td class="text-end"> <span>{{ $symbol??'' }}&nbsp;</span>{{round($due_amt??0, 2)}}</td>
                                                    </tr>

                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total Amount</th>
                                                        <th class="text-end">{{ $symbol??'' }}&nbsp;{{ $total_amt??0 }}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="mt-3 col-9">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                            <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">{{ $invoice->payment_method??''}}</span></p>
                                            @if($invoice->payment_method=='Cheque')
                                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">#</th>
                                                        <th scope="col">Cheque No</th>
                                                        <th scope="col">Deposite Date</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Bank Name</th>
                                                        <th scope="col">Cheque Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    @foreach ($cheque as $c)
                                                        <tr>
                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                            <td>{{ $c->cheque_no ?? '' }}</td>
                                                            <td>{{ $c->deposite_date ?? '' }}</td>
                                                            <td>
                                                                {{ $c->sar_amt ?? '' }}
                                                            </td>
                                                            <td>{{ $c->bankDetails->name ?? '' }}</td>
                                                            <td class="text-end">{{ $c->cheque_status ?? '' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            <!--end table-->
                                        </div>



                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="mt-1">
                                <div class="alert alert-info">
                                    <p class="mb-0"><span class="fw-semibold">PAYMENT TERMS:</span>
                                        <span id="note">Payment of the invoice shall be made by the receipt
                                            voucher.
                                        </span>
                                    </p>
                                </div>

                            </div>
                            <h5 class="text-center">Thank You For Your Business.</h5>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div><!-- container-fluid -->

        </div><!-- End Page-content -->
        <center>
            <div class="hstack gap-2 justify-content-center d-print-none mt-4" style="margin-bottom: 5px;">
                <a href="javascript:window.print()" class="btn btn-primary"><i
                        class="ri-printer-line align-bottom me-1"></i> Print</a>
                <a href="javascript:void(0);" class="btn btn-danger" id="download"><i
                        class="ri-download-2-line align-bottom me-1"></i> Download</a>
                <a href="{{ route('admin.receiptVouchure', $invoice->invoice_no) }}" class="btn btn-success"><i
                        class="ri-download-2-line align-bottom me-1"></i>Receipt</a>
            </div>
        </center>
    </div>
</div><!-- end main content-->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        window.onload = function() {
            document.getElementById("download")
                .addEventListener("click", () => {
                    const invoice = this.document.getElementById("background");
                    console.log(invoice);
                    console.log(window);
                    var opt = {
                        filename: 'AqaryClick-Invoice.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 0.98
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'letter',
                            orientation: 'portrait'
                        }
                    };
                    html2pdf().from(invoice).set(opt).save();
                })
        }
    </script>
</body>

</html>
