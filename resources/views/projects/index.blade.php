@extends('layouts.app', ['page' => __('Projects'), 'pageSlug' => 'projects'])
@section('content')
	<h1>Projects</h1>
	<table class="table">
		    <thead>
				<tr>
					<th>Name</th>
					<th>Create</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					@foreach ($projects as $project)
					<tr>
						<td>{{$project->name}}</td>
						<td>Created on {{ date('d M Y', $project->created_at->timestamp) }}</td>
						<td><a class="btn btn-info" href="/projects/{{$project->id}}/edit" style="margin-bottom: 1em;">Edit Project</a></td>
					</tr>
					@endforeach
			</tbody>
		</table>

	<a href="/projects/create" class="btn btn-info">Create new project</a>
@endsection 