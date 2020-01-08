@extends('layouts.app', ['page' => __('Daily Scrum'), 'pageSlug' => 'dailyscrum_' . $project->id])

@section('content')
    <h1>Daily Scrums, Sprint: {{$sprint->number}}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>is doing</th>
                <th>has done</th>
                <th>errors</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daily_scrums as $daily_scrum)
                <tr>
                    <td>{{$daily_scrum->member->user->name}}</td>
                    <td style="word-break:break-all;">{{$daily_scrum->is_doing}}</td>
                    <td style="word-break:break-all;">{{$daily_scrum->has_done}}</td>
                    <td style="word-break:break-all;">{{$daily_scrum->errors}}</td>
                </tr>
            @endforeach        
        </tbody>
    </table>   
@endsection