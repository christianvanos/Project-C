@extends('layouts.app', ['page' => __('Userprojects'), 'pageSlug' => 'userprojects'])
@section('content')
	<h1>Project members</h1>

	@foreach ($project_members as $project_member)
		<li><h>User id: </h>{{$project_member->user_id}}</li>
		<li><h>Project id: </h>{{$project_member->project_id}}</li>

		<button><a href="/userprojects/{{$project_member->id}}/edit" style="margin-bottom: 1em;">Edit Project members</a></button>
		<br>
		<br>


	@endforeach

	<br>
	<br>
	<br>

	<button><a href="/userprojects1" style="margin-bottom: 1em;">Create new project member
		</a></button>
@endsection 