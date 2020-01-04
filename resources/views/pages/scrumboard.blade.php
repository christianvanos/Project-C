@extends('layouts.app', ['page' => __('Scrumboard'), 'pageSlug' => 'scrumboard_' . $project->id])

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="sprint-id" content="{{ $current_sprint->id }}">    
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
                            @foreach($all_sprints->reverse() as $sprint)
                                <a class="dropdown-item" href="/scrumboard/{{ $project->id }}/{{ $sprint->id }}">Sprint {{ $sprint->number }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-subtitle mb-2" style="float: left">{{ \Carbon\Carbon::parse($current_sprint->start_date)->format('d-m-Y')}}</h4>
                    <h4 class="card-subtitle mb-2" style="float: right">{{ \Carbon\Carbon::parse($current_sprint->end_date)->format('d-m-Y')}}</h4>
                    <div class="progress" style="width: 60%; margin: auto; height: 13px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{ $percentage }}%"></div>
                    </div>
                    <div class="task-board sortable ui-sortable" id="sort_backlog">
                        @foreach($backlogs as $backlog)
                            <div class="status-card ui-sortable-handle" data-backlog-id="{{ $backlog->id }}">
                                <div class="card-header" style="cursor: pointer;" data-backlog-name="{{ $backlog->name }}" data-backlog-label="{{ $backlog->label }}" data-backlog-id="{{ $backlog->id }}" data-toggle="modal" data-target="#edit_backlogModal">
                                <h5 class="card-title">{{ $backlog->name }} <span class="badge @if($backlog->label == "todo") badge-danger @elseif($backlog->label == "done") badge-warning @else badge-info @endif ">{{ $backlog->label }}</span></h5>                                    
                                </div>
                                <ul class="backlog sortable ui-sortable" id="sort_item">
                                    @foreach ($userstory_items as $item)
                                        @if($item->backlog_id == $backlog->id or ($item->backlog->is_product_backlog and $backlog->is_product_backlog))
                                            <li class="text-row ui-sortable-handle" data-item-id="{{$item->id}}" data-item-description="{{$item->description}}" data-item-story-points="{{$item->story_points}}" data-item-moscow="{{$item->moscow}}" data-item-userstory-id="{{$item->userstory->id}}" @foreach($item->members as $member) data-item-member-id="{{$member->member_id}}" @break @endforeach data-item-definition-of-done="{{ $item->definition_of_done }}" data-toggle="modal" data-target="#edit_userstoryitemModal">
                                                <fieldset>
                                                    <legend>{{ $item->description }}</legend>
                                                    {{ $item->story_points }} story-points 
                                                    @foreach ($item->members as $member)
                                                        <i>{{ $member->member->user->name }}</i> <br/>
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
                    @include('includes.edit_userstory_item')
                    @include('includes.edit_backlog')
                    
                    <script src="{{ asset('js/scrumboard') }}/userstory_item_move.js"></script>
                    <script src="{{ asset('js/scrumboard') }}/backlog_move.js"></script>
                </div>
            </div>
        </div>
    </div>
@endsection