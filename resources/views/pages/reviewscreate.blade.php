@extends('layouts.app', ['page' => __('Create a Review'), 'pageSlug' => 'reviews_' . $project->id])

@section('content')
<div class="card">
    <div class="card-body">
      <form method="POST" action="/reviews/store" enctype="multipart/form-data">
        @csrf   
        <div>
            <label for="file">Upload review file</label><br/>
            <input id="file" name="file" type="file" name="..." required  />
        </div>
        <br/>
        <div class="form-group">
            <label for="outcome">General outcome</label>
            <input type="text" class="form-control" name="outcome" id="outcome" placeholder="Type here the general outcome" required>
        </div>
        <div class="form-group">
            <label for="sprint">Sprint number</label>
            <select class="form-control" name="sprintNumber" id="sprint" required>
                @foreach($sprintNumbers as $sprintnumber)
                <option style="color:black;">{{$sprintnumber}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden"name="invisible" value="{{$current_project}}">
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
@endsection