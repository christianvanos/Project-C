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
      const totalPointsInProject = total[0];
      const totalPointsPerSprint = totalPointsInProject / 9;
      i = 0;
      var speedData = {
        labels: ["Week 1","Week 2","Week 3","Week 4","Week 5","Week 6","Week 7","Week 8","Week 9", "Week 10"],
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
            data: [
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 0)), // 1
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 1)), // 2
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 2)), // 3
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 3)), // 4
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 4)), // 5
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 5)), // 6
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 6)), // 7
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 7)), // 8
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 8)), // 9
              Math.round(totalPointsInProject - (totalPointsPerSprint * i++) + sumArrayUpTo(scopeChange, 9))  // 10
            ]
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
                    max: Math.round(total[0] * 1.1)
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

    <div style="width:800px;"><canvas id="burndown"></canvas></div>
    <script>
    showBurnDown (
      "burndown",
      [{{$burndowntotal[0]}}, 9, 8, 7, 6, 5, 4, 3, 2, 1], // burndown data
      [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]  // scope change
    );
    </script>
    

@endsection 