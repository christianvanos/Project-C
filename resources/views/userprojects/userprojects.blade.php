@extends('layouts.app', ['page' => __('Userprojects'), 'pageSlug' => 'userprojects'])

@section('content')

<div class="card">
   <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @elseif (session('error'))
          <div class="alert alert-danger" role="alert">
              {{ session('error') }}
          </div>
      @endif
      <div class="card-header">
         <h4 class="card-title">Adding a user to a project</h4>
      </div>
      <div class="card-body">
        <form action="create" method="POST">
           <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <div class="form-group">
                  <label for="users">Users</label>
                  <select class="form-control" name="users" id="users">
                     @foreach($users as $user)
                        <option>{{ $user->name }}</option>
                     @endforeach
                  </select>
            </div>
            <div class="form-group">
                  <label for="projects">Projects</label>
                  <select class="form-control" name="projects" id="projects">
                     @foreach($projects as $project)
                        <option>{{ $project->name }}</option>
                     @endforeach
                  </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>


@endsection 