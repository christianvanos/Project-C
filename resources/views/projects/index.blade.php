@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
	<h1>Projecten</h1>

	@foreach ($projects as $project)
		<li>{{$project->name}}</li>
		<li>Created on {{ date('d M Y', $project->created_at->timestamp) }}</li>

		<button type="button" class="btn btn-default btn-sm"><a href="/projects/{{$project->id}}/edit" style="margin-bottom: 1em;">Edit Project</a></button>
		<button type="button" class="btn btn-default btn-sm"><a href="/projects/{{$project->id}}/sprint" style="margin-bottom: 1em;">Sprints</a></button>
		<br>
		<br>


	@endforeach

	<br>
	<br>
	<br>

	<button type="button" class="btn btn-default btn-sm"><a href="/projects/create" style="margin-bottom: 1em;">Create new project
		</a></button>
@endsection 