@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
	<h1>Sprints</h1>

	@foreach ($sprints as $sprint)
		<li><a href="/projects/{{$sprint->projects_id}}/dScrums">Daily Scrum</a></li>

	@endforeach
@endsection