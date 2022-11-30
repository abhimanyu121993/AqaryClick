<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Receipt</title>
</head>

<body>
    <center><button type="button" class="btn btn-lg btn-outline-danger mt-2" id="download">Download Report</button></a>
  </center>
<div id="contract-download">
  <h1 class="text-center">Lease Agreement (عقد الإيجار)</h1>
  <div class="container">
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Contract No:{{$conn->contract_code }}<br>
              Customer No:{{Auth::user()->customer_code??'' }}</th>
            <th class="text-right">RE / HTC / 0005:رقم العقد <br>
              MU / HTC / 015: رقم العميل </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <p>This LEASE AGREEMENT is made as of {{\Carbon\Carbon::parse($conn->created_at)->format('d F Y')}} by and between the following Parties</p><br><b>1. First Party <br>
                {{ $conn->ownerDetails->first_name??'' }} </b><br>
              QID: 265235158985
              P.O. Box :{{ $conn->ownerDetails->pincode??'' }} , {{ $conn->ownerDetails->address??'' }}<br>
              Phone: {{ $conn->ownerDetails->phone??'' }}<br>
              Email:{{ $conn->ownerDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b>)<br>
              <b class="text-center">And</b><br>
              <b>2. Second Party <br>
                M/s, /Mr. {{ $conn->tenantDetails->tenant_english_name??'' }} C. R. No ({{ $conn->contract_code??'' }})</b><br>
              Represented by:<br>
              Mr:{{ $conn->lessorDetails->first_name??'' }}<br>
              QID: 265235158985
              P.O. Box :{{ $conn->tenantDetails->post_office??'' }} , {{ $conn->tenantDetails->unit_address??'' }}<br>
              phone1:{{ $conn->tenantDetails->tenant_primary_mobile??'' }} , phone2:{{ $conn->tenantDetails->tenant_secondary_mobile??'' }} <br>
              Email:{{ $conn->tenantDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b> )

            </td>
            <td>Contract No:RE/HTC/0005<br>
              Customer No:MU/HTC/015</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">Preamble</h3>
              {!!$contract->clause_one_english!!}
            </td>
            <td>
              <h3>
                <center><input type="text" name="" id=""></center>
                "المقدمة "
              </h3>
              {!!$contract->clause_one_arabic!!}
            </td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause One”</h3>
              {!!$contract->clause_two_english!!}
            </td>
            <td> {!!$contract->clause_two_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Two”</h3>
              {!!$contract->clause_three_english!!}
            </td>
            <td>{!!$contract->clause_three_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Three”</h3>
              {!!$contract->clause_four_english!!}
            </td>
            <td>{!!$contract->clause_four_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Four”</h3>
              {!!$contract->clause_five_english!!}
            </td>
            <td>{!!$contract->clause_five_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Five”</h3>
              {!!$contract->clause_six_english!!}
            </td>
            <td>{!!$contract->clause_six_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Six”</h3>
              {!!$contract->clause_seven_english!!}
            </td>
            <td>{!!$contract->clause_seven_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Seven”</h3>
              {!!$contract->clause_eight_english!!}

            </td>
            <td>{!!$contract->clause_eight_arabic!!}</td>
          </tr>

          <tr>
            <td>
              <h3 class="text-center">“Clause Eight”</h3>
              {!!$contract->clause_nine_english!!}
            </td>
            <td>{!!$contract->clause_nine_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Nine”</h3>
              {!!$contract->clause_ten_english!!}
            </td>
            <td>{!!$contract->clause_ten_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Ten”</h3>
              {!!$contract->clause_eleven_english!!}
            </td>
            <td>{!!$contract->clause_eleven_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Eleven”</h3>
              {!!$contract->clause_twelve_english!!}
            </td>
            <td>{!!$contract->clause_twelve_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Twelve”</h3>
              {!!$contract->clause_therteen_english!!}
            </td>
            <td>{!! $contract->clause_therteen_arabic !!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Thirteen”</h3>
              {!!$contract->clause_fourteen_english!!}
            </td>
            <td>
              <h1 class="text-center">"البند الثالث عشر"</h1>
              {!!$contract->clause_fourteen_arabic!!}
            </td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Fourteen”</h3>
              {!!$contract->clause_fifteen_english!!}
            </td>
            <td> {!!$contract->clause_fifteen_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Fifteen”</h3>
              {!!$contract->clause_sixteen_english!!}
            </td>
            <td> {!!$contract->clause_sixteen_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Sixteen”</h3>
              {!!$contract->clause_seventeen_english!!}
            </td>
            <td>{!!$contract->clause_seventeen_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Seventeen”</h3>
              {!!$contract->clause_eighteen_english!!}
            </td>
            <td> {!!$contract->clause_eighteen_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <h3 class="text-center">“Clause Eighteen”</h3>
              {!!$contract->clause_nineteen_english!!}
            </td>
            <td> {!!$contract->clause_nineteen_arabic!!}</td>
          </tr>
          <tr>
            <td>
              <p><b><u>First Party (The Lessor)</u></b></p><br>
              <p><b><u>Second Party (The Lessor)</u></b></p><br>
              <p><b><u>The Guarantor</u></b></p><br>
            </td>
            <td>
              <p><b><u>الطرف الأول "المؤجر"
                  </u></b></p><br>
              <p><b><u>الطرف الثاني "المستأجر"
                  </u></b></p><br>
              <p><b><u>الكفیل الضامن</u></b></p><br>
            </td>
          </tr>
        </tbody>
      </table>
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
                const invoice = this.document.getElementById("contract-download");
                console.log(invoice);
                console.log(window);
                var opt = {
                    filename: 'AqaryClick-Contract.pdf',
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
