@extends('admin.includes.layout', ['breadcrumb_title' => 'Analytic Dashboard'])
@section('title', 'Analytic Dashboard')

@section('main-content')
<div class='row' style='height:300px;'>
<div class='col-md-6'>
<div id="piechart" style="width:100%; height:100%;"></div>
</div>
<div class='col-md-6'>
    <div id="piechart2" style="width:100%; height:100%;"></div>
    </div>
</div>

<div class='row' style='height:300px;'>
    <div class='col-md-6'>
    <div id="piechart3" style="width:100%; height:100%;"></div>
    </div>
    <div class='col-md-6'>
        <div id="piechart4" style="width:100%; height:100%;"></div>
        </div>
</div>

<div class='row' style='height:300px;'>
    <div class='col-md-6'>
        <div id="piechart5" style="width:100%; height:100%;"></div>
        </div>
        <div class='col-md-6'>
            <div id="piechart6" style="width:100%; height:100%;"></div>
            </div>
</div>

    <div class='row' style='height:300px;'>
            <div class='col-md-6'>
            <div id="piechart7" style="width:100%; height:100%;"></div>
            </div>
            <div class='col-md-6'>
                <div id="piechart8" style="width:100%; height:100%;"></div>
    </div>
    </div>

@endsection
@section('script-area')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        // var data = google.visualization.arrayToDataTable([
        //   ['Task', 'Hours'],
        //   ['Work',     11],
        //   ['Eat',      2],
        //   ['Commute',  2],
        //   ['Watch TV', 2],
        //   ['Sleep',    7]
        // ]);

        // var options = {
        //   title: 'User Report',
        //   is3D:true
        // };
        var userReport=google.visualization.arrayToDataTable({{ Js::from($userReport) }});
        var userReportOp = {
          title: 'Customer Report',
          is3D:true
        };
        var unitReport=google.visualization.arrayToDataTable({{ Js::from($unitReport) }});
        var unitReportOp = {
          title: 'Unit Report',
          is3D:true
        };
        var chequeReportOp = {
          title: 'Cheque Report',
          is3D:true
        };
        var chequeReport=google.visualization.arrayToDataTable({{ Js::from($chequeReport) }});
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
        var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
        // var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
        // var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
        // var chart4 = new google.visualization.PieChart(document.getElementById('piechart4'));
        // var chart5 = new google.visualization.PieChart(document.getElementById('piechart5'));
        // var chart6 = new google.visualization.PieChart(document.getElementById('piechart6'));
        // var chart7 = new google.visualization.PieChart(document.getElementById('piechart7'));
        // var chart8 = new google.visualization.PieChart(document.getElementById('piechart8'));

        chart.draw(userReport, userReportOp);
        chart2.draw(unitReport,unitReportOp);
        chart3.draw(chequeReport,chequeReportOp);
        chart4.draw(data,options);
        chart5.draw(data,options);
        chart6.draw(data,options);
        chart7.draw(data,options);
        chart8.draw(data,options);
      }
    </script>

@endsection
