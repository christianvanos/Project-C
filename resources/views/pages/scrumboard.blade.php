@extends('layouts.app', ['page' => __('Scrumboard'), 'pageSlug' => 'scrumboard'])

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="sprint-id" content="{{ $current_sprint->id }}">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{ asset('css') }}/scrumboard.css">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title" style="float: left">Scrumboard</h4>
                    <div class="dropdown" style="float: right">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sprint {{ $current_sprint->number }}
                        </button>                     
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @foreach($all_sprints as $sprint)
                                <a class="dropdown-item" href="/scrumboard/{{ $project->id }}/{{ $sprint->id }}">Sprint {{ $sprint->number }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="task-board sortable ui-sortable" id="sort_backlog">
                        @foreach($backlogs as $backlog)
                            <div class="status-card ui-sortable-handle" style="cursor: pointer;" data-backlog-id="{{ $backlog->id }}">
                                <div class="card-header">
                                <h5 class="card-title">{{ $backlog->name }} <span class="badge @if($backlog->label == "todo") badge-danger @elseif($backlog->label == "done") badge-warning @else badge-info @endif ">{{ $backlog->label }}</span></h5>                                    
                                </div>
                                <ul class="backlog sortable ui-sortable" id="sort_item">
                                    @foreach ($userstory_items as $item)
                                        @if($item->backlog_id == $backlog->id or ($item->backlog->is_product_backlog and $backlog->is_product_backlog))
                                            <li class="text-row ui-sortable-handle" data-item-id="{{$item->id}}">
                                                <fieldset>
                                                    <legend>{{ $item->description }}</legend>
                                                    {{ $item->story_points }} story-points 
                                                    @foreach ($item->members as $member)
                                                        {{ $member->member->user->name }}
                                                    @endforeach
                                                </fieldset>
                                            </li>
                                        @endif
                                    @endforeach                            
                                </ul>
                                <div class="card-footer">
                                    <h5 class="card-title">
                                        <i class="tim-icons icon-simple-add"></i>
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add_userstoryitemModal" data-backlog-id="{{ $backlog->id }}">
                                            Add an item
                                        </button>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                        <div class="status-card" style="cursor: pointer; border-style: dotted;">
                            <div class="card-foorter" style="margin-left: 15px;">
                                <i class="tim-icons icon-simple-add"></i>
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#add_backlogModal" data-sprint-id="{{ $current_sprint->id }}">Add Backlog</button>
                            </div>
                        </div>
                    </div>
                    

                    @include('includes.add_userstory_item')
                    @include('includes.add_backlog')
                    
                    <script src="{{ asset('js/scrumboard') }}/userstory_item_move.js"></script>
                    <script src="{{ asset('js/scrumboard') }}/backlog_move.js"></script>
                </div>
            </div>
        </div>
    </div>
@endsection