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
    <h1 class="text-danger text-center">Statement</h1>
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
      <td>23335959</td>
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
      <td>Gt. Roard Delhi</td>
      <th>Electric No</th>
      <td>252554</td>
      <th>Mobile No</th>
      <td>9959582656</td>
    </tr>
    <tr>
      <th>P.O.Box</th>
      <td>25101</td>
      <th>Email Id</th>
      <td colspan="3">abhi@gmail.com</td>
    </tr>
  </tbody>
  <thead>
    <tr>
      <th scope="col" class="text-center" colspan="6" style="background-color:#003a51;color:white;">ACCOUNT DETAILS FOR EACH UNITS</th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="6" style="background-color:#dbeaf9;color:black;">B102/MF/U201/OFFICE/AIRPORT</th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" >Date</th>
      <th scope="col" >Particular</th>
      <th scope="col" >Debit Amount</th>
      <th scope="col" >Credit Amount</th>
      <th scope="col" >CR/DR</th>
      <th scope="col" >Balance</th>

    </tr>
  </thead>
  <tbody>
  <tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr>
    <tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr><tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr><tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr><tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr>
  </tbody>
  <thead>
    <tr>
      <th scope="col" colspan="6" style="background-color:#dbeaf9;color:black;">B102/MF/U202/OFFICE/DOHA</th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" >Date</th>
      <th scope="col" >Particular</th>
      <th scope="col" >Debit Amount</th>
      <th scope="col" >Credit Amount</th>
      <th scope="col" >CR/DR</th>
      <th scope="col" >Balance</th>

    </tr>
  </thead>
  <tbody>
  <tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr>
    <tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr><tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr><tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr><tr>
      <td>01-01-2022</td>
      <td>Total Invoice Due</td>
      <td>12000 QAR</td>
      <td></td>
      <td>CR</td>
      <td>12000 QAR</td>

    </tr>
  </tbody>
</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>