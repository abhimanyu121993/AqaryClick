<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Invoice Receipt</title>
</head>

<body>
<center><button type="button" class="btn btn-lg btn-outline-danger mt-2" id="download">Download Receipt</button></a>
  </center>
  <div id="receipt-download">
    <h1 class="text-danger text-center">سند استلام</h1><br>
    <h1 class="text-danger text-center">Receipt Voucher</h1>
    <div class="container text-center" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                                    <div class="card-header border-bottom-dashed p-4">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 text-start" style="float: left;">
                                                @if($company->customer_type=="Indivisual")
                                                <h3>{{ $company->business_name??'' }}</h3>

                                                @else
                                                <img src="{{asset('upload/company/logo/'.$company->logo)}}" class="card-logo card-logo-dark" alt="logo dark" height="150" width="200">
                                                @endif
                                                <div class="mt-sm-5 mt-4">
                                                    <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                                    <p class="text-muted mb-1" id="address-details">{{ $company->address??'' }}</p>
                                                    <!-- <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 90201</p> -->
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 mt-sm-0 mt-3">
                                                <h6><span class="text-muted fw-normal">Company Registration No:</span><span id="legal-register-no">{{ $company->cr_no??'' }}</span></h6>
                                                <h6><span class="text-muted fw-normal">Email:</span><span id="email">{{ $company->email??'' }}</span></h6>
                                                <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no"> {{ $company->phone??'' }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card-header-->
                                </div>
                <div class="col-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Amount Received</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $symbol??'SAR' }} {{ $invoice->amt_paid??'' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Receipt No</th>
                            <th class="text-danger">1001</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="col">Date</th>
                                <td>{{\Carbon\Carbon::parse($invoice->created_at)->format('d M Y')??''}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Received From</th>
                    <th scope="col"></th>
                    <th scope="col">استلمنا من السادة :</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Amount</td>
                    <td>{{ $symbol??'SAR' }} {{ $invoice->amt_paid??'' }}</td>
                    <td>مبلغ وقدره :</td>
                </tr>
                <tr>
                    <td>Payment against</td>
                    <td></td>
                    <td>وذلك مقابل </td>
                </tr>
                <tr>
                    <td>Payment Method</td>
                    <td>{{ $invoice->payment_method??''}}</td>
                    <td>طريقة الدفع :</td>
                </tr>
                <tr>
                    <td>Cheque No</td>
                    <td>{{$cheque[0]->cheque_no??''}}</td>
                    <td>شيك رقم :</td>
                </tr>
                <tr>
                    <td>Acc/No</td>
                    <td>{{ $invoice->tenant_account??''}}</td>
                    <td>رقم حساب البنك</td>
                </tr>
                <tr>
                    <td>Bank Name</td>
                    <td>{{ $invoice->tenant_bank??''}}</td>
                    <td>اسم البنك</td>
                </tr>

            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <b>Accountant</b>
            </div>
            <div class="col">
            </div>
            <div class="col">
                <b>Receiver's signature</b>
            </div>
        </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("receipt-download");
                console.log(invoice);
                console.log(window);
                var opt = {
                    filename: 'Invoice-Receipt.pdf',
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