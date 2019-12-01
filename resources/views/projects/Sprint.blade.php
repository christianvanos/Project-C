@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<h1>{{$project->name}}: Sprints</h1>
@foreach ($sprints as $sprint)
        <font size="5"><li>Sprint {{$sprint->number}}</li></font>
        @foreach($sprint->daily_scrums as $daily_scrum)
            <li>{{$daily_scrum->is_doing}}</li>
        @endforeach
        
        <button type="button" class="btn btn-default btn-sm">Progress</a></button>
        <button type="button" class="btn btn-default btn-sm"><a href='/projects/{{$project->id}}/{{$sprint->number}}/daily_scrums'>Daily Scrums</a></button>
        <br$>
        <br>
        <br>
@endforeach
@endsection