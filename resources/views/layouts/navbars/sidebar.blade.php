@php
    if (!isset($pageSlug)) {
        $pageSlug = '';
    }
@endphp

<div class="sidebar" data="blue">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'scrumboard') class="active" @endif>
                <a href="/scrumboard">
                    <i class="tim-icons icon-components"></i>
                    <p>{{ __('Scrumboard') }}</p>
                </a>
            </li>
            <li>
                <a href="/projects">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p> {{ __('Projects') }}</p>
                </a>
            </li>
            <li>
                <a href="/userprojects">
                    <i class="tim-icons icon-image-02"></i>
                    <p> {{ __('Users Projects') }}</p>
                </a>
            </li>
            <li>
                <a href="/charts">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p> {{ __('Chart') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('User Profile') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ url('/usersprojects')  }}">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ __('Project Management') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
