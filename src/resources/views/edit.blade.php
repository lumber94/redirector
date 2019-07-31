@extends('redirect::layouts.app')

@section('content')
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                {{ link_to_route(config('redirect.route_as') . 'redirect.index', __('redirect::redirect.back'), [], [
                    'class' => 'btn btn-outline-secondary my-2 my-sm-0',
                ]) }}
            </li>
        </ul>
    </nav>
    {!! Form::model($redirect, [
        'url'    => route(config('redirect.route_as') . 'redirect.update', ['redirect' => $redirect]),
        'method' => 'PUT',
    ]) !!}
    @include('redirect::fields')
    {!! Form::submit(__('redirect::redirect.edit'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
