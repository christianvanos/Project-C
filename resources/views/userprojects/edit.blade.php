@extends('layouts.app', ['page' => __('Userprojects'), 'pageSlug' => 'userprojects'])
@section('content')
	<h1 class="title">Edit Project</h1>
	<form method="POST" action="/userprojects/{{$Project_Member->id}}" style="margin-bottom: 1em;">


		{{method_field('PATCH')}}
		{{csrf_field()}}


		<div class="field">
			<label class="label" for="user_id">User</label>
            <label class="label" for="projects_id">Project</label>

			<div class="control">
				<input type="text" class="input" name="user_id" placeholder="user_id" value="{{$Project_Member->user_id}}">
				</div>
				<div class="control">
                <input type="text" class="input" name="projects_id" placeholder="projects_id" value="{{$Project_Member->projects_id}}">
			</div>
		</div>

		<div>
			<div>
				<button type="submit" class="button is-link">Submit</button>
			</div>

		</div>
	</form>

	<form method="POST" action="/userprojects/{{$Project_Member->id}}" >
		{{method_field('DELETE')}}
		{{csrf_field()}}
		<div>
			<div>
				<button type="submit" class="button">Delete Project Member</button>
			</div>

		</div>
	</form>
@endsection 