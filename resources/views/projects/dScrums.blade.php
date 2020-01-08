@extends('layouts.app', ['page' => __('Daily Scrum'), 'pageSlug' => 'dailyscrum_' . $project->id])
@section('content')
<h1>Daily Scrum</h1>
<div class="card">
  <div class="card-body">
    <form method="POST" action='/projects/{{$project->id}}/dScrums'>

        {{ csrf_field() }}

        <div class="form-group">
            <label for="members_id">Member</label>
            <input type="text" name="members_id" class="form-control" value="{{$user_name}}">
        </div>
        <div class="form-group">
            <label for="sprint_id">Sprint</label>
            <input type="text" name="sprint_id" class="form-control" value="{{$project->sprints->last()->id}}">
        </div>
        <div class="form-group">
            <label for="has_done">What have you done since the last Daily Scrum?</label>
            <input type="text" name="has_done" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_doing">What are you going to do now?</label>
            <input type="text" name="is_doing" class="form-control">
        </div>
        <div class="form-group">
            <label for="errors">What problems have you faced?</label>
            <input type="text" name="errors" class="form-control">
        </div>
            <button type="submit" class="btn btn-info animation-on-hover ">Upload Daily Scrum</button>
    </form>
  </div>
</div>

@endsection