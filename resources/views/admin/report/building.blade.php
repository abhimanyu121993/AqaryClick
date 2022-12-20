<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>AqaryClick</title>
</head>

<body>

   
        <h3 class="text-center">Building Report</h3>
        @foreach ($buildings as $building)
        <div class="card container mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4">
                    <b>Building Name :-</b> {{$building->name}}
                </div>
                <div class="col-sm-4">
                    <b>Total Unit :- </b> {{$building->Units->count()}}
                </div>
                <div class="col-sm-4">
                    <b>Vacant :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','vacant')->first()->id)->count()}}
                </div>
                <div class="col-sm-4">
                    <b>Occupied :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','Occupied')->first()->id)->count()}}
                </div>
                <div class="col-sm-4">
                    <b>Under Maintanance :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','under mentainance')->first()->id)->count()}}
                </div> <div class="col-sm-4">
                    <b>Legal :- </b>{{$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','court')->first()->id)->count()+$building->Units->where('unit_status',\App\Models\UnitStatus::where('name','court')->first()->id)->count()}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Unit No</th>
                        <th>Unit Type</th>
                        <th>Unit Status</th>
                        <th>Area/m<sup>2</sup></th>
                        <th>Actual Rent</th>
                        <th>Unit Ref</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($building->Units as $unit)
                        <tr>
                            <th>{{$loop->index+1}}</th>
                            <th>{{$unit->unit_no}}</th>
                            <th>{{$unit->unittypeinfo->name}}</th>
                            <th>{{$unit->unitStatus->name}}</th>
                            <th>{{$unit->unit_size}}</th>
                            <th>{{$unit->actual_rent}}</th>
                            <th>{{$unit->unit_ref}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        @endforeach

   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
