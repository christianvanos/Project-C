@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Users') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                @if (Auth::user()->isAdmin())
                                <th scope="col">Actions</th>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user[0] }}</td>
                                        <td>
                                            <a href="mailto:{{ $user[1] }}">{{ $user[1] }}</a>
                                        </td>
                                        <td>{{ $user[2]->format('d/m/Y H:i') }}</td>
                                        @if (Auth::user()->isAdmin())
                                        <td>
                                            <a href="{{ url('/admin_edit?id=' . $user[3]) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('/user_admin?id=' . $user[3]) }}" class="btn btn-info">Make admin</a>
                                        </td>
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">

                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
