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
  @endpush
  

  @section('content')

    <div style="width:70%;"><canvas id="burndown"></canvas></div>
    <script>
    showBurnDown (
      "burndown",
      @php echo json_encode($points) @endphp, // burndown data POINTS
      @php echo json_encode($fake_points) @endphp // scope change
    );
    </script>
    

@endsection 