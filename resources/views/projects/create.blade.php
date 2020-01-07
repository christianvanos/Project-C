@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
	<h1>Create new Project</h1>
	@if(count($errors)>0)
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="card">
  <div class="card-body">
	<form method="POST" action="/projects">

		{{ csrf_field() }}
		<div class="form-group">
			<input type="text"  class="form-control" name="title" placeholder="Project name">
		</div>
   </div>
</div>
		<div>
			<button type="submit" class="btn btn-success btn-sm">Create Project</button>
		</div>

	</form>
@endsection 