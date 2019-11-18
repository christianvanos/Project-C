@extends('layouts.app', ['page' => __('Chart'), 'pageSlug' => 'google_pie_chart'])

@push('head')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript">
   var analytics = <?php echo $name; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Percentage of name backlog'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
 @endpush
 @section('content')
  <br />
  <div class="container">
   <br />
   
   <div class="panel panel-default">
    
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">

     </div>
    </div>
   </div>
   
  </div>
@endsection 