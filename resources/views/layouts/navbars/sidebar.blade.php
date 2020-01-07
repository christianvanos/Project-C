@php
    if (!isset($pageSlug)) {
        $pageSlug = '';
    }
    if (!isset($current_project)) {
        $current_project = '';
    }
@endphp

<div class="sidebar" data="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="/projects">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p> {{ __('Projects') }}</p>
                </a>
            </li>
            <li>
                <a href="/userprojects1">
                    <i class="tim-icons icon-image-02"></i>
                    <p>Add User to project</p>
                </a>
            </li>
            @foreach($my_projects as $project)
                @php $project = $project->project; @endphp
                <li @if($current_project == $project->id) class="active" @endif>
                    <a data-toggle="collapse" href="#project-{{ $project->id }}"  @if($current_project != $project->id ) aria-expanded="false" @else aria-expanded="true" @endif>
                        <i class="tim-icons icon-settings" ></i>
                        <span class="nav-link-text" >{{ $project->name }}</span>
                        <b class="caret mt-1"></b>
                    </a>
                    
                    <div @if($current_project != $project->id ) class="collapse" @else class="collapse show" @endif id="project-{{ $project->id }}">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == ('scrumboard_' . $project->id)) class="active" @endif>
                                <a href="/scrumboard/{{ $project->id }}/{{ $project->sprints()->latest()->first()->id}}">
                                    <i class="tim-icons icon-bullet-list-67"></i>
                                    <p>{{ __('Scrumboard') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == ('userstories_' . $project->id)) class="active" @endif>
                                <a href="/userstories/{{ $project->id }}">
                                    <i class="tim-icons icon-credit-card"></i>
                                    <p>{{ __('Userstories') }}</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'sprints_' . $project->id) class="active " @endif>
                                    <a href="/projects/{{$project->id}}/sprint">
                                        <i class="tim-icons icon-components"></i>
                                        <p>Daily Scrums</p>
                                    </a>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'retrospectives_' . $project->id) class="active " @endif>
                            <a href="/retrospectives?id={{$project->id}}">
                                    <i class="tim-icons icon-notes"></i>
                                    <p>Retrospectives</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'members_' . $project->id) class="active " @endif>
                                <a href="{{ url('/user?id='. $project->id) }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>Team Members</p>
                                </a>
                            </li>
                            <li @if ($pageSlug == 'charts_' . $project->id) class="active " @endif>
                                <a href="/charts">
                                    <i class="tim-icons icon-chart-pie-36"></i>
                                    <p> {{ __('Chart') }}</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endforeach
            <li>
                <a href="/scruminfo">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p> {{ __('Scrum definitions') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
