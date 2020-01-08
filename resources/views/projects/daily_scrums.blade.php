@extends('layouts.app', ['page' => __('Daily Scrum'), 'pageSlug' => 'dailyscrum_' . $project->id])

@section('content')
    <h1>{{$project->name}}</h1>
    <div>
				<button type="button" class="btn btn-success btn-sm" ><a href= "/projects/{{$project->id}}/dScrums" style="color:white"><b>Create Daily Scrum</b></a></button>
		</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title" style="float: left">Daily Scrums</h4>
                    <div class="dropdown" style="float: right">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sprint {{$sprint->number}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach($sprints->reverse() as $sprint)
                                <a class="dropdown-item" href="/projects/{{ $project->id }}/{{ $sprint->id }}/daily_scrums">Sprint {{ $sprint->number }}</a>
                            @endforeach
                        </div>
                    </div>  
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Is doing</th>
                                <th>Has done</th>
                                <th>Errors</th>
                                <th>Created on</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daily_scrums as $daily_scrum)
                                <tr>
                                    <td>{{$daily_scrum->member->user->name}}</td>
                                    <td style="word-break:break-all;">{{$daily_scrum->is_doing}}</td>
                                    <td style="word-break:break-all;">{{$daily_scrum->has_done}}</td>
                                    <td style="word-break:break-all;">{{$daily_scrum->errors}}</td>
                                    <td style="word-break:break-all;">{{ date('d M Y', $daily_scrum->created_at->timestamp) }}</td>
                                </tr>
                            @endforeach        
                        </tbody>
                    </table>
              
@endsection