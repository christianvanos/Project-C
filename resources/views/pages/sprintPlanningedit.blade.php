@extends('layouts.app', ['page' => __('Create a Sprint planning'), 'pageSlug' => 'sprint_planning_' . $project->id])

@section('content')
<div class="card">
    <div class="card-body">
      <form method="POST" action="/sprintPlanning/update" enctype="multipart/form-data">
        @csrf   
        <div>
            <label for="file">Upload sprint planning file</label><br/>
            <input id="file" name="file" type="file" name="..."   />
        </div>
        <br/>
        <div class="form-group">
            <label for="outcome">General outcome</label>
        <input type="text" class="form-control" name="outcome" id="outcome" placeholder="Type here the general outcome" value="{{$data->description}}" >
        </div>
        <div class="form-group">
            <label for="sprint">Sprint number</label>
            <select class="form-control" name="sprintNumber" id="sprint" >
                <option style="color:black;">{{$data->sprint()->first()->number}}</option>
                @foreach($sprintNumbers as $sprintnumber)
                <option style="color:black;">{{$sprintnumber}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden"name="invisible" value="{{$current_project}}">
        <input type="hidden"name="meeting_id" value="{{$meeting_id}}">
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
    </div>
  </div>
@endsection