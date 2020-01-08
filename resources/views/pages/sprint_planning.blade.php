@extends('layouts.app', ['page' => __('sprint_planning'), 'pageSlug' => 'sprint_planning_' . $project->id])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Sprint Planning</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sprint number</th>
                        <th>Outcome</th>
                        <th>File</th>
                        @if($admin == true)
                        <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                            <td>{{ $data[0] }}</td>
                            <td style="word-break:break-all;">{{ $data[1] }}</td>
                            <td>
                                @if($data[2] != null)
                                <a href="/files/{{$data[2]}}">Download</a>
                                @else
                                No file
                                @endif
                            </td>
                        @if($admin == true)
                        <td>
                            <a href="/sprintPlanning/delete/{{ $data[3] }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            <a href="/sprintPlanning/edit/{{ $data[3] }}" class="btn btn-success">Edit</a>
                        </td>
                        @endif
                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            @if($admin == true)
                            <td></td>
                            @endif
                            <td><a href="{{ url('sprintPlanning/create/' . $current_project) }}" class="btn btn-primary">New</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection