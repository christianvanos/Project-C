@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<h1>Daily Scrums</h1>
@foreach($daily_scrums as $daily_scrum)
<li>is doing: <br> {{$daily_scrum->is_doing}}</li><br>
<li>has done:<br>  {{$daily_scrum->has_done}}</li><br>
<li>errors:<br>  {{$daily_scrum->errors}}</li>
<br>
@endforeach

 
@endsection