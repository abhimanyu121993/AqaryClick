@extends('admin.includes.layout', ['breadcrumb_title' => 'Contract Report'])
@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
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
            <div class="col-12">
                <h6>Filters</h6>
            </div>
        </div>
        <form method="post">
            @csrf
            <input type="hidden" name="owner_id" value='{{ $owner }}'>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="form-label">Select Year</label>
                        <select class="form-select" name="year">
                            @if ($year)
                                <option value="{{ $year }}" selected hidden>{{ $year }}</option>
                            @endif
                            @for ($i = 2000; $i < 2050; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="form-label">Status</label>
                        <select class="form-select" name="status">
                            @if ($status == '')
                            @else
                                <option value="{{ $status }}" selected hidden>{{ $status }}</option>
                            @endif
                            <option value="">All</option>
                            <option value="expire">Expire</option>
                            <option value="overdue">Overdue</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1 mt-4">
                    <button type='submit' class="btn btn-danger">Apply</button>
                </div>
            </div>
        </form>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <table id="example" class="display table table-bordered dt-responsive dataTable " aria-describedby="buttons-datatables">
                    <thead>
                        <tr><th>Sr No.</th><th>Contract No</th><th>Tenant Name</th><th>Contract Start Date</th><th>Contract Expiry Date</th><th>Contract Period Months</th>
                            <th>Grace Period</th><th>Monthly Rent</th><th>Total Value of Contract</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($contractsthisyear as $c)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $c->contract_code ?? '' }}</td>
                            <td>{{ $c->tenantDetails->tenant_english_name ?? '' }}</td>
                            <td>{{$c->lease_start_date??''}}</td>
                            <td>{{$c->lease_end_date??''}}</td>
                            <td>{{$c->lease_period_month??''}}</td>
                            <td>{{$c->grace_period??0}}</td>
                            <td>{{number_format($c->rent_amount??0,'2')}}</td>
                            <td>{{$total=number_format(floatval($c->rent_amount)*floatval($c->lease_period_month)??0,'2')}}</td>
                            <td class="text-danger">{{ $c->expire?'Expired': '' }}</td>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
                title: 'Report Of Year ' + {{ $year }},
                pieHole: 0.5,
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('thisyear'));
            chart2.draw(datayear, optionsyear);


        }
    </script>
@endsection
