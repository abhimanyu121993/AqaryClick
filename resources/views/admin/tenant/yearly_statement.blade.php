<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Statement</title>
</head>
<body>
<center><button type="button" class="btn btn-lg btn-outline-danger mt-2" id="download">Download Statement</button></a>
  </center>  
<div id="statement-download" class="mt-2">
  <table class="table table-bordered border-primary">
    <thead>
      <tr>
        <th scope="col" class="text-center" colspan="6" style="background-color:#003a51;color:white;">STATEMENT OF ACCOUNT</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="col">Account Of</th>
        <td scope="col">{{ $tenant->tenant_english_name??'' }}</td>
        <th scope="col">{{ $tenant->tenant_document??'' }}</th>
        <td scope="col">{{ $tenant->qid_document??$tenant->cr_document??$tenant->passport??$tenant->established_card_no??$tenant->government_housing_no??'No Available' }}</td>
        <th scope="col">Status</th>
        <td scope="col">Active</td>

      </tr>

      <tr>
        <th>Unit Ref</th>
        <td>{{ $tenant->unit->unit_ref??'' }}</td>
        <th>Total Unit</th>
        <td>03</td>
        <th>Tenant Code</th>
        <td>{{ $tenant->tenant_code??'' }}</td>
      </tr>
      <tr>
        <th>Grace Start Date</th>
        <td>22-12-2022</td>
        <th>Grace End Date</th>
        <td>22-12-2022</td>
        <th>Grace Period</th>
        <td>02</td>
      </tr>
      <tr>
        <th>Unit Address</th>
        <td>{{ $tenant->buildingDetails->name??'' }}</td>
        <th>Electric No</th>
        <td>{{ $tenant->unit->electric_no??'' }}</td>
        <th>Mobile No</th>
        <td>{{ $tenant->tenant_primary_mobile??'' }},{{ $tenant->tenant_secondary_mobile??'' }}</td>
      </tr>
      <tr>
        <th>P.O.Box</th>
        <td>{{ $tenant->post_office??'' }}</td>
        <th>Email Id</th>
        <td colspan="3">{{ $tenant->email??'' }}</td>
      </tr>
    </tbody>
    <thead>
      <tr>
        <th scope="col" class="text-center" colspan="6" style="background-color:#003a51;color:white;">ACCOUNT DETAILS FOR EACH CONTRACT</th>
      </tr>
    </thead>
    @foreach($tenant->contracts as $c )
    <thead>
      <tr>
        <th scope="col" colspan="6" style="background-color:#dbeaf9;color:black;">{{ $c->contract_code??'' }}</th>
      </tr>
    </thead>
    <thead>
      <tr>
        <th scope="col">S.n</th>
        <th scope="col">Date</th>
        <th scope="col">Particular</th>
        <th scope="col">Amount</th>
        <th scope="col">CR/DR</th>
        <th scope="col">Balance</th>
      </tr>
    </thead>
    <tbody>
      @isset($c->tenant_payment)
      @foreach($c->tenant_payment->payHistory as $tp)

      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$tp->created_at->format('d-M-Y')??''}}</td>

        <td>Rental INV about {{$tp->created_at->format('M-Y')??''}}</td>
        <td>{{$tp->amount??''}}</td>
        <td>{{strtoupper($tp->status)??''}}</td>
        <td>{{ $tp->remaining??'' }} QAR</td>
      </tr>
      @endforeach
      @endisset
    </tbody>

    @endforeach

  </table>
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
                const invoice = this.document.getElementById("statement-download");
                console.log(invoice);
                console.log(window);
                var opt = {
                    filename: 'Monthly-Statement.pdf',
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