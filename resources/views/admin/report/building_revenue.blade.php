<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>AqaryClick</title>
  </head>
  <body>
    <h3 class="text-center text-light bg-warning pb-1">Building Revenue Report</h3>

    <table class="table table-bordered">
        <tr>
            <th class="text-primary">Building Name</th><td>{{$data['building']->name}}</td>
            <th class="text-primary">Building Code</th><td>{{$data['building']->building_code}}</td>
            <th class="text-primary">Construction Date</th><td>{{\Carbon\Carbon::parse($data['building']->construction_date)->format('d-M-Y')}}</td>

        </tr><tr>
            <th class="text-primary">City</th><td colspan="2">{{$data['building']->cityDetails->name}}</td>
            <th class="text-primary">Zone</th><td>{{$data['building']->areaDetails->name}}</td>
        </tr>
    </table>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
               <th>Sr No</th> <th>Total Unit</th> <th>Actual Expected Revenue</th><th>Revenue Date</th><th>Actual Collected Revenue</th><th>In Legal</th><th>Vacant</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['revenue'] as $revenue)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$revenue['totalunit']}}</td>
                    <td>{{$revenue['act_exp_rev']}}</td>
                    <td>{{$revenue['rev_date']}}</td>
                    <td>{{$revenue['act_col_rev']}}</td>
                    <td>{{$revenue['legal']}}</td>
                    <td>{{$revenue['vacant']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>