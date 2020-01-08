@extends('layouts.app', ['page' => __('burndownchart'), 'pageSlug' => 'charts'])

@push('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
    /**
     * Sum elements of an array up to the index provided.
     */
    function sumArrayUpTo(arrData, index) {
      

      var total = 0;
      for (var i = 0; i <= index; i++) {
        if (arrData.length > i) {
          total += arrData[i];
            }
      }
      return total;
    }
    function showBurnDown(elementId, total, scopeChange = []) {
      var speedCanvas = document.getElementById(elementId);
      Chart.defaults.global.defaultFontFamily = "Arial";
      Chart.defaults.global.defaultFontSize = 16;
      const totalPointsInProject = @php echo max($points) @endphp;
      const totalPointsPerSprint = totalPointsInProject / {{ $amount }};
      i = 0;
      console.log(total);
      var speedData = {
        labels: @php echo json_encode($dates) @endphp, // DATES
        datasets: [
          {
            label: "Burndown",
            data: total,
            fill: false,
            borderColor: "#EE6868",
            backgroundColor: "#EE6868",
            lineTension: 0,
          },
          {
            label: "Target",
            borderColor: "#6C8893",
            backgroundColor: "#6C8893",
            lineTension: 0,
            borderDash: [5, 5],
            fill: false,
            data: @php echo json_encode($burndown_coordinates); @endphp            
          },
        ]
      };
      var chartOptions = {
        legend: {
          display: true,
          position: 'right',
          labels: {
            boxWidth: 80,
            fontColor: 'grey'
          }
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: @php echo max($points) + 1 @endphp
                }
            }]
        }
      };
      var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
      });
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     var analytics = @php echo json_encode($result); @endphp
  
     google.charts.load('current', {'packages':['corechart']});
  
     google.charts.setOnLoadCallback(drawChart1);
  
    
     function drawChart1()
     {
      var data = google.visualization.arrayToDataTable(analytics);
      var options = {
       title : 'Progress of backlog items',
       titleTextStyle: { color: '#FFF'},
       legendTextStyle: { color: '#FFF'},
       backgroundColor: {fill:'transparent'}
      };
      var chart = new google.visualization.PieChart(document.getElementById('pie_chart1'));
      chart.draw(data, options);
     }
    </script>
  @endpush
  

  @section('content')
  <div class="row">
    <div class="col-md-12">
  <div class="card ">
    <div class="card-header">
        <h4 class="card-title" style="float: left">Charts</h4>
        <div class="dropdown" style="float: right">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sprint {{ $current_sprint->number }}
            </button>                     
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach($all_sprints->reverse() as $sprint)
                    <a class="dropdown-item" href="/charts/{{ $project->id }}/{{ $sprint->id }}">Sprint {{ $sprint->number }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card-body">

        <div style="width: 60%; margin: auto"><canvas id="burndown"></canvas></div>
        <script>
        showBurnDown (
          "burndown",
          @php echo json_encode($points) @endphp, // burndown data POINTS
          @php echo json_encode($fake_points) @endphp // scope change
        );
        </script>

    <div class="container" style="float:left; width: 50%;">
      
      <div class="panel panel-default">
      
      <div class="panel-body" align="left">
      <!--Draw the charts -->
        <div id="pie_chart1" style="width:550px; height:450px; float:left">
        </div>
      </div>
      </div>
      
    </div>
      
    </div>
  </div>
</div>
</div>
</div>
    

@endsection 