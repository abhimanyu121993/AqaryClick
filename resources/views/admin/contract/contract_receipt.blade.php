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
    <center><button type="button" class="btn btn-lg btn-outline-danger mt-2" id="download">Download Contract</button></a>
  </center>
<div id="contract-download">
  <h1 class="text-center">Lease Agreement (عقد الإيجار)</h1>
  <div class="container">
    <div class="row">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Contract No:{{$conn->contract_code??'' }}<br>
              Customer No:{{ str_pad($conn->lessor??'',3,'0' ,STR_PAD_LEFT) }}</th>
            <th class="text-right">{{$conn->contract_code??'' }}:رقم العقد <br>
            {{ str_pad($conn->lessor??'',3,'0' ,STR_PAD_LEFT) }}: رقم العميل </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 50%;">
              <p>This LEASE AGREEMENT is made as of {{\Carbon\Carbon::parse($conn->created_at)->format('d F Y')}} by and between the following Parties</p><br><b>1. First Party <br>
                {{ $conn->tenantDetails->tenant_english_name??'' }} </b><br>
              @if($conn->tenantDetails->qid_document==!null)
                QID: {{ $conn->tenantDetails->qid_document??'' }}
              @elseif($conn->tenantDetails->cr_document==!null)
              CR: {{ $conn->tenantDetails->cr_document??'' }}
              @else
              Passport: {{ $conn->tenantDetails->passport??'' }}
              @endif
              P.O. Box :{{ $conn->tenantDetails->post_office??'' }} , {{ $conn->tenantDetails->unit_address??'' }}<br>
              Phone: {{ $conn->tenantDetails->tenant_primary_mobile??'' }}<br>
              Email:{{ $conn->tenantDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b>)<br>
              <b class="text-center">And</b><br>
              <b>2. Second Party <br>
                M/s, /Mr. {{ $conn->ownerDetails->name??'' }} C. R. No ({{ $conn->businessDetails->cr_no??'' }})</b><br>
              Represented by:<br>
              Mr:{{ $conn->lessorDetails->first_name??'' }}<br>
              QID: 265235158985
              P.O. Box :{{ $conn->businessDetails->post_box??'' }} , {{ $conn->businessDetails->address??'' }}<br>
              phone1:{{ $conn->businessDetails->phone??'' }}<br>
              Email:{{ $conn->businessDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b> )

            </td>
            <td style="width: 50%;" >
            <p>This LEASE AGREEMENT is made as of {{\Carbon\Carbon::parse($conn->created_at)->format('d F Y')}} by and between the following Parties</p><br><b>1. First Party <br>
                {{ $conn->tenantDetails->tenant_arabic_name??'' }} </b><br>
              @if($conn->tenantDetails->qid_document==!null)
                QID: {{ $conn->tenantDetails->qid_document??'' }}
              @elseif($conn->tenantDetails->cr_document==!null)
              CR: {{ $conn->tenantDetails->cr_document??'' }}
              @else
              Passport: {{ $conn->tenantDetails->passport??'' }}
              @endif
              P.O. Box :{{ $conn->tenantDetails->post_office??'' }} , {{ $conn->tenantDetails->unit_address??'' }}<br>
              Phone: {{ $conn->tenantDetails->tenant_primary_mobile??'' }}<br>
              Email:{{ $conn->tenantDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b>)<br>
              <b class="text-center">And</b><br>
              <b>2. Second Party <br>
                M/s, /Mr. {{ $conn->ownerDetails->name??'' }} C. R. No ({{ $conn->businessDetails->cr_no??'' }})</b><br>
              Represented by:<br>
              Mr:{{ $conn->lessorDetails->first_name??'' }}<br>
              QID: 265235158985
              P.O. Box :{{ $conn->businessDetails->post_box??'' }} , {{ $conn->businessDetails->address??'' }}<br>
              phone1:{{ $conn->businessDetails->phone??'' }}<br>
              Email:{{ $conn->businessDetails->email??'' }}<br>
              Hereinafter referred to as (<b>The Lessor</b> )
            </td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_one_english!!}
            </td>
            <td style="width:50%">
              {!!$contract->clause_one_arabic!!}
            </td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_two_english!!}
            </td>
            <td style="width:50%"> {!!$contract->clause_two_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_three_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_three_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_four_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_four_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_five_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_five_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_six_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_six_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_seven_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_seven_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_eight_english!!}

            </td>
            <td style="width:50%">{!!$contract->clause_eight_arabic!!}</td>
          </tr>

          <tr>
            <td style="width:50%">
              {!!$contract->clause_nine_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_nine_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_ten_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_ten_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_eleven_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_eleven_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_twelve_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_twelve_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_therteen_english!!}
            </td>
            <td style="width:50%">{!! $contract->clause_therteen_arabic !!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_fourteen_english!!}
            </td>
            <td style="width:50%">
              {!!$contract->clause_fourteen_arabic!!}
            </td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_fifteen_english!!}
            </td>
            <td style="width:50%"> {!!$contract->clause_fifteen_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_sixteen_english!!}
            </td>
            <td style="width:50%"> {!!$contract->clause_sixteen_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_seventeen_english!!}
            </td>
            <td style="width:50%">{!!$contract->clause_seventeen_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_eighteen_english!!}
            </td>
            <td style="width:50%"> {!!$contract->clause_eighteen_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              {!!$contract->clause_nineteen_english!!}
            </td>
            <td style="width:50%"> {!!$contract->clause_nineteen_arabic!!}</td>
          </tr>
          <tr>
            <td style="width:50%">
              <p><b><u>First Party (The Lessor)</u></b></p><br>
              <p><b><u>Second Party (The Lessor)</u></b></p><br>
              <p><b><u>The Guarantor</u></b></p><br>
            </td>
            <td style="width:50%">
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
