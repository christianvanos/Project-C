@extends('layouts.app', ['page' => __('Userstories'), 'pageSlug' => 'userstories_' . $project->id])

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title" style="float: left">Userstories</h4>
                </div>
                <div class="card-body">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <th scope="col">{{__('Description')}}</th>
                            <th scope="col">{{__('Acceptence Criterea')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($userstories as $story)
                                <tr>
                                    <td>{{$story->description}}</td>
                                    <td>{{$story->acceptance_criteria}}</td>
                                    <td>{{$story->status()}} %</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection