@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<h1>Daily Scrum</h1>

@if(count($errors)>0)
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="card">
  <div class="card-body">
    <form method="POST" action='/projects/{{$project->id}}/dScrums'>

        {{ csrf_field() }}

        <div class="form-group">
            <label for="has_done">What have you done since the last Daily Scrum?</label>
            <input type="text" name="has_done" class="form-control" value="{{ old('has_done') }}">
        </div>
        <div class="form-group">
            <label for="is_doing">What are you going to do now?</label>
            <input type="text" name="is_doing" class="form-control" value="{{ old('is_doing') }}">
        </div>
        <div class="form-group">
            <label for="errors">What problems have you faced?</label>
            <input type="text" name="errors" class="form-control" value="{{ old('errors') }}">
        </div>
            <button type="submit" class="btn btn-info animation-on-hover ">Upload Daily Scrum</button>
    </form>
  </div>
</div>

@endsection