@extends('layouts.app', ['page' => __('Create a Retrospective'), 'pageSlug' => 'retrospectives_' . $project->id])

@section('content')
<div class="card">
    <div class="card-header">
      <h4 class="card-title">Edit Retrospective</h4>
    </div>
    <div class="card-body">
      <form method="POST" action="/retrospective/update" enctype="multipart/form-data">
        @csrf   
        <div>
            <label for="file">Upload retrospective file</label><br/>
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