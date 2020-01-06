@extends('layouts.app', ['page' => __('Retrospectives'), 'pageSlug' => 'retrospectives_' . $project->id])

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title" style="float: left">Retrospectives</h4>
            <div style="float: right">
                <a href="{{ url('retrospective/create/' . $current_project) }}" class="btn btn-info">New Retrospective</A> 
            </div>
        </div>
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
                            <td>{{ $data[1] }}</td>
                            <td>
                                @if($data[2] != null)
                                <a href="/files/{{$data[2]}}">Download</a>
                                @else
                                No file
                                @endif
                            </td>
                        @if($admin == true)
                        <td>
                            <a href="/retrospective/delete/{{ $data[3] }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            <a href="/retrospective/edit/{{ $data[3] }}" class="btn btn-success">Edit</a>
                        </td>
                        @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection