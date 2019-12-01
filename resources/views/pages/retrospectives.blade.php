@extends('layouts.app', ['page' => __('Retrospectives'), 'pageSlug' => 'notifications'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Retrospectives</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sprint number</th>
                        <th>Outcome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                        <tr>
                        <td>{{ $data[0] }}</td>
                        <td>{{ $data[1] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection