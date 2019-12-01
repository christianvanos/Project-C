@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<h1>{{$project->name}}: Sprints</h1>
@foreach ($sprints as $sprint)
    <button type="button" class="btn btn-default btn-sm">Sprint {{$sprint->number}}</button>
    <button type="button" class="btn btn-default btn-sm"><a href='/projects/{{$sprint->id}}/daily_scrums'>Daily Scrums</a></button>
    <br>
    <br>
@endforeach
@endsection