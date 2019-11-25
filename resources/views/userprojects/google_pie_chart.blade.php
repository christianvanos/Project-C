@extends('layouts.app', ['page' => __('Chart'), 'pageSlug' => 'google_pie_chart'])

@push('head')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script type="text/javascript">
   var analytics = <?php echo $name; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart1);
   google.charts.setOnLoadCallback(drawChart2);

  
   function drawChart1()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Progress of backlog items'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart1'));
    chart.draw(data, options);
   }
   function drawChart2()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Progress of backlog item'
    };
    var chart = new google.visualization.BarChart(document.getElementById('pie_chart2'));
    chart.draw(data, options);
   }
  </script>
 @endpush
 @section('content')
  <br />
  <div class="container">
   
   <div class="panel panel-default">
    
    <div class="panel-body" align="left">
    <!--Draw the charts -->
     <div id="pie_chart1" style="width:550px; height:450px; float:left">
     <div id="pie_chart2" style="width:550px; height:450px; float:center">
     </div>
    </div>
   </div>
   
  </div>

   
   <div class="panel panel-default">
    
    <div class="panel-body" align="left">
     <div id="pie_chart2" style="width:550px; height:450px; float:right">
     </div>
    </div>
   </div>
   
  </div>
  
@endsection 