@extends('layouts.app', ['page' => __('charts'), 'pageSlug' => 'charts'])

@section('content')
<html lang="en">
  <head>
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
    function showBurnDown(elementId, burndownData, scopeChange = []) {
      var speedCanvas = document.getElementById(elementId);
      Chart.defaults.global.defaultFontFamily = "Arial";
      Chart.defaults.global.defaultFontSize = 14;
      const totalPointsInProject = burndownData[0];
      const totalPointsPerSprint = totalPointsInProject / 9;
      i = 0;
      var speedData = {
        labels: ["Week 1","Week 2","Week 3","Week 4","Week 5","Week 6","Week 7","Week 8","Week 9", "Week 10"],
        datasets: [
          {
            label: "Burndown",
            data: burndownData,
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
          position: 'top',
          labels: {
            boxWidth: 80,
            fontColor: 'black'
          }
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: Math.round(burndownData[0] * 1.1)
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
  </head>
  
  <body>

    <div style="width:800px;"><canvas id="burndown43"></canvas></div>
    <script>
    showBurnDown (
      "burndown43",
      [70, 63, 56, 53, 42, 38, 28, 14, 7, 0], // burndown data
      [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]  // scope change
    );
    </script>
    
  </body>

@endsection 