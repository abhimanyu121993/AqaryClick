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

   
       
        @foreach ($buildings as $building)
        <div class="card  mt-3">
        <div class="card-header">
            <h3 class="text-center">Building Report</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <b>Building Name :-</b> {{$building->name}}
                </div>
                <div class="col">
                    <b>Total Unit :- </b> {{$building->Units->count()}}
                </div>
                <div class="col">
                    <b>Vacant :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','vacant')->first()->id)->count()}}
                </div>
                <div class="col">
                    <b>Occupied :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','Occupied')->first()->id)->count()}}
                </div>
                <div class="col">
                    <b>Under Maintanance :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','under mentainance')->first()->id)->count()}}
                </div>
                 <div class="col">
                    <b>Legal :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','court')->first()->id)->count()+$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','court')->first()->id)->count()}}
                </div>
                <div class="col">
                    <b>Building status :- </b>{{$building->status??''}}
                </div>
            </div>
        </div>
        </div>
            <table class="table table-bordered">
                <thead class="bg-info text-light">
                    <tr>
                        <th>Sr.No</th>
                        <th>Unit No</th>
                        <th>Unit Type</th>
                        <th>Unit Status</th>
                        <th>Area/m<sup>2</sup></th>
                        <th>Electric No</th>
                        <th>Actual Rent</th>
                        <th>Unit Ref</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($building->Units as $unit)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$unit->unit_no??''}}</th>
                            <th>{{$unit->unittypeinfo->name??''}}</th>
                            <th>{{$unit->unitStatus->name??''}}</th>
                            <th>{{$unit->unit_size??''}}</th>
                            <th>{{$unit->electric_no??''}}</th>
                            <th>{{$unit->actual_rent??''}}</th>
                            <th>{{$unit->unit_ref??''}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
     
        @endforeach

   
    <!-- Optional JavaScript; choose one of the two! -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>

</html>
