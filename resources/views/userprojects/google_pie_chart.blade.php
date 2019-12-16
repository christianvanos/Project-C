@extends('layouts.app', ['page' => __('Chart'), 'pageSlug' => 'google_pie_chart'])

@push('head')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script type="text/javascript">
   var analytics = <?php echo $description; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart1);
   google.charts.setOnLoadCallback(drawChart2);

  
   function drawChart1()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Progress of backlog items',
     width: 400,
     height: 200,
     backgroundColor: { fill:'transparent' },
     titleTextStyle: {
      color: 'white'
     },
     legend: {
        textStyle: { color: 'white' }
    },
    is3D: true
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart1'));
    chart.draw(data, options);
   }
   function drawChart2()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
      title : 'Progress of backlog items',
      width: 400,
      height:100,
      legend:{textStyle:{color:"white"}},
      backgroundColor: { fill:'transparent' },
      titleTextStyle: {
    color: 'white'
     }
    };
    var chart = new google.visualization.BarChart(document.getElementById('bar_chart2'));
    chart.draw(data, options);
   }
  </script>
 @endpush
 @section('content')
  <br />
  <div class="card">
    <div class="card-body">
        <!--Draw the charts -->
        <div id="pie_chart1" style="float:left">
        
        </div>
        </div>
  </div>
  
@endsection 