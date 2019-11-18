@extends('layouts.app', ['page' => __('charts'), 'pageSlug' => 'charts'])

@section('content')
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Chart.js demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/0.2.0/Chart.min.js" type="text/javascript"></script>
</head>

<body>
    <div><canvas id="sprints" width="600" height="400"></canvas></div>
    <script>
        var pieData = [
            {
                value:10,
                color:"#878BB6"
            },
            {
                value : 40,
                color : "#4ACAB4"
            },
            {
                value : 10,
                color : "#FF8153"
            },
            {
                value : 30,
                color : "#FFEA88"
            }
        ];
        // Get the context of the canvas element we want to select
        var sprints= document.getElementById("sprints").getContext("2d");
        new Chart(sprints).Pie(pieData);
    </script>

    <h1>Project Pie Chart</h1>
</body>

@endsection 