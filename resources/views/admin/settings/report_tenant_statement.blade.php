<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tenant Statement</title>
  </head>
  <body>
  </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="header1">
                <div class="card-header align-items-center d-flex" id="card-header">
                    <h4 class="card-title mb-0 flex-grow-1 text-center" id="h1">Statement of Account</h4>
                </div><!-- end card header -->
                <div class="card-body table-responsive">
                <table id="example" class="display table table-bordered dt-responsive dataTable dtr-inline" style="width: 100%;" aria-describedby="ajax-datatables_info">
                <thead>
      <tr>
        <th scope="col" class="text-center" colspan="6" style="background-color:#003a51;color:white;">ACCOUNT DETAILS FOR EACH CONTRACT</th>
      </tr>
    </thead>

    @foreach($res as $c )
    <thead>
      <tr>
        <th scope="col" colspan="6" style="background-color:#dbeaf9;color:black;">{{ $c->contract->contract_code??'' }}</th>
      </tr>
    </thead>
    <thead>
      <tr>
        <th scope="col">S.n</th>
        <th scope="col">Date</th>
        <th scope="col">Description</th>
        <th scope="col">Debit</th>
        <th scope="col">Credit</th>
        <th scope="col">Account Balance</th>
      </tr>
    </thead>
    <tbody>
      @isset($c->payHistory)
      @foreach($c->payHistory as $tp)

      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$tp->created_at->format('d-M-Y')??''}}</td>
        <td></td>
        <td class="text-danger">{{($tp->status=='dr')?$tp->amount:'0.00'}}</td>
        <td class="text-success">{{($tp->status=='cr')?$tp->amount:'0.00'}}</td>
        <td>{{ $tp->remaining??'' }} QAR</td>
      </tr>
      @endforeach
      @endisset
    </tbody>

    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>