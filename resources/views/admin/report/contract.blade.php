@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract Report'])
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div id="donutchart" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body p-0">
                        <div id="thisyear" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-12"><h6>Filters</h6></div>
            <form action="{{route('Report.reportContract')}}" method="post" id="filterform">
                @csrf
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="form-label">Select Year</label>
                <select class="form-select" name="year" id='year'>
                    @for($i=2000;$i<2050;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
            </div>
        </form>
        </div>
    </div>

.

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Contract', 'Number'],
                ['Expired', {{ $contracts->where('expire', true)->count() }}],
                ['Overdue', {{ $contracts->where('overdue', '>', 0)->count() }}],
                ['Rejected', {{ $contracts->where('status', true)->count() }}]
            ]);

            var options = {
                title: 'All Report',
                pieHole: 0.5,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);

            var datayear = google.visualization.arrayToDataTable([
                ['Contract', 'Number'],
                ['Expired', {{ $contractsthisyear->where('expire', true)->count() }}],
                ['Overdue', {{ $contractsthisyear->where('overdue', '>', 0)->count() }}],
                ['Rejected', {{ $contractsthisyear->where('status', true)->count() }}]
            ]);
            var optionsyear = {
                title:'Report Of Year '+{{$year}},
                pieHole: 0.5,
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('thisyear'));
            chart2.draw(datayear, optionsyear);
          

        }

        $('#year').on('change',function(){
            $('#filterform').submit();
        });
    </script>
@endsection
