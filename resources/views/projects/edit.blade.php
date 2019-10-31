@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
	<h1 class="title">Edit Project</h1>
	<form method="POST" action="/projects/{{$project->id}}" style="margin-bottom: 1em;">


		{{method_field('PATCH')}}
		{{csrf_field()}}


		<div class="field">
			<label class="label" for="title">Name</label>


			<div class="control">
				<input type="text" class="input" name="title" placeholder="Title" value="{{$project->name}}">
			</div>
		</div>

		<div>
			<div>
				<button type="submit" class="button is-link">Submit</button>
			</div>

		</div>
	</form>

	<form method="POST" action="/projects/{{$project->id}}" >
		{{method_field('DELETE')}}
		{{csrf_field()}}
		<div>
			<div>
				<button type="submit" class="button">Delete Project</button>
			</div>

		</div>
	</form>
@endsection 