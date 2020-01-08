@extends('layouts.app', ['page' => __('Daily Scrum'), 'pageSlug' => 'dailyscrum_' . $project->id])
@section('content')
<h1>{{$project->name}}</h1>
<h4>For which sprint would you like to see the daily scrums?</h4>
@foreach ($sprints as $sprint)

    <button type="button" class="btn btn-default btn-sm"><a href='/projects/{{$sprint->id}}/daily_scrums'>Sprint {{$sprint->number}}</a></button>
    <br>
    <br>
@endforeach
@endsection