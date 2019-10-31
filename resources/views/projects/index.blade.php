@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
	<h1>Projecten</h1>

	@foreach ($projects as $project)
		<li>{{$project->name}}</li>
		<li>Created at: {{ date('d M Y - H:i:s', $project->created_at->timestamp) }}</li>

		<button><a href="/projects/{{$project->id}}/edit" style="margin-bottom: 1em;">Edit Project</a></button>
		<br>
		<br>


	@endforeach

	<br>
	<br>
	<br>

	<button><a href="/projects/create" style="margin-bottom: 1em;">Create new project
		</a></button>
@endsection 