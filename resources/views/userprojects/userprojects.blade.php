@extends('layouts.app', ['page' => __('Userprojects'), 'pageSlug' => 'userprojects'])

@section('content')

<div class="card">
      <div class="card-body">
        <form action="create" method="POST">
           <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
           <h1>Adding user to a project</h1>
            <div class="form-group">
                  <label for="users">Users</label>
                  <select class="form-control" name="users" id="users">
                     @foreach($users as $user)
                        <option style="color: black;">{{ $user->name }}</option>
                     @endforeach
                  </select>
            </div>
            <div class="form-group">
                  <label for="projects">Projects</label>
                  <select class="form-control" name="projects" id="projects">
                     @foreach($projects as $project)
                        <option style="color: black;">{{ $project->name }}</option>
                     @endforeach
                  </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>


@endsection 