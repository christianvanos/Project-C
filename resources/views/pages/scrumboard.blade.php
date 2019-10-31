@extends('layouts.app', ['page' => __('Scrumboard'), 'pageSlug' => 'scrumboard'])

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="task-board">
                        @foreach($backlogs as $backlog)
                            <div class="status-card">
                                <div class="card-header">
                                    <h5 class="card-title">{{ $backlog->name }}</h5>                                    
                                </div>
                                <ul class="sortable ui-sortable" id="sort0" data-status-id="{{ $backlog->id }}">
                                    @foreach ($userstory_items as $item)
                                        @if($item->backlog_id == $backlog->id)
                                            <li class="text-row ui-sortable-handle" data-task-id="{{$item->id}}">{{ $item->description }}</li>
                                        @endif
                                    @endforeach                            
                                </ul>
                                <div class="card-footer">
                                    <h5 class="card-title">
                                        <i class="tim-icons icon-simple-add"></i>
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-backlog-id="{{ $backlog->id }}">
                                            Add an item
                                        </button>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="modal modal-black fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="addItemForm">
                                        <div class="form-group">
                                            <label for="description_input">Description</label>
                                            <input type="text" class="form-control" name="description" id="description_input" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="points_input">Points</label>
                                            <input type="text" class="form-control" name="points" id="points_input" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="moscow_select">MoSCoW Priority</label>
                                            <select multiple class="form-control" id="moscow_select" name="moscow" required>
                                                <option>Must Have</option>
                                                <option>Could Have</option>
                                                <option>Should Have</option>
                                                <option>Would Have</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="userstory_select">Userstory</label>
                                            <select multiple class="form-control" id="userstory_select" name="userstory_id" required>
                                                @foreach($userstories as $story)
                                                    <option value="{{ $story->id }}">{{ $story->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="defenition_of_done_textarea">Definition of Done</label>
                                            <textarea class="form-control" name="definition_of_done" id="defenition_of_done_textarea" required></textarea>
                                        </div>
                                        <input type="hidden" id="input_backlog_id" name="backlog_id" class="form-control">
                                        <button type="submit" class="btn btn-default">Send</button>
                                        <button type="button" style="float: right" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="{{ asset('js') }}/scrumboard_item_location_replace.js"></script>
                    <script src="{{ asset('js') }}/scrumboard_item_add.js"></script>
                </div>
            </div>
        </div>
    </div>
@endsection