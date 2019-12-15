@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<h1>{{$project->name}}: Daily Scrums</h1>
<h4>For which sprint would you like to see the Daily scrums?</h4>
@foreach ($sprints as $sprint)
    <button type="button" class="btn btn-default btn-sm"><a href='/projects/{{$sprint->id}}/daily_scrums' style="color:white">Sprint {{$sprint->number}}</a></button>
    <br>
    <br>
@endforeach
        <div>
				<button type="button" class="btn btn-success btn-sm" ><a href= "/projects/{{$project->id}}/dScrums" style="color:white"><b>Create Daily Scrum</b></a></button>
		</div>
@endsection