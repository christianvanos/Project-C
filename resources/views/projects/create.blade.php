@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
	<h1>Create new Project</h1>

	<form method="POST" action="/projects">

		{{ csrf_field() }}


		<div>
			<input type="text" name="title" placeholder="Project name">
		</div>

		<div>
			<button type="submit">Create Project</button>
		</div>

	</form>
@endsection 