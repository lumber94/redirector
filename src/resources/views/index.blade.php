@extends('redirect::layouts.app')

@section('content')
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                {{ link_to_route(config('redirect.route_as') . 'redirect.create', __('redirect::redirect.create'), [], [
                    'class' => 'btn btn-outline-secondary my-2 my-sm-0',
                ]) }}
            </li>
        </ul>
        {!! Form::open([
            'route'  => config('redirect.route_as') . 'redirect.index',
            'class'  => 'form-inline',
            'method' => 'GET',
        ]) !!}
        <div class="input-group">
            {!! Form::text('search', request('search'), [
                'class'        => 'form-control',
                'placeholder'  => __('redirect::redirect.search'),
                'aria_label'   => __('redirect::redirect.search'),
                'autocomplete' => 'off',
            ]) !!}
            <div class="input-group-append">
                {!! Form::submit(__('redirect::redirect.search'), [
                    'class' => 'btn btn-outline-success my-2 my-sm-0',
                ]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('redirect::redirect.url_from') }}</th>
                <th scope="col">{{ __('redirect::redirect.url_to') }}</th>
                <th scope="col">{{ __('redirect::redirect.status_code') }}</th>
                <th scope="col">{{ __('redirect::redirect.is_active') }}</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($redirects as $number => $redirect)
                <tr>
                    <th scope="row">{{ ++$number }}</th>
                    <td>{{ $redirect->url_from }}</td>
                    <td>{{ $redirect->url_to }}</td>
                    <td>{{ $redirect->status_code }}</td>
                    <td>
                        @if($redirect->is_active)
                            <span class="badge badge-success text-uppercase">{{ __('redirect::redirect.yes') }}</span>
                        @else
                            <span class="badge badge-danger text-uppercase">{{ __('redirect::redirect.no') }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                {{ link_to_route(config('redirect.route_as') . 'redirect.edit', __('redirect::redirect.edit'), ['redirect' => $redirect], [
                                    'class' => 'btn btn-outline-primary my-2 my-sm-0',
                                ]) }}
                            </div>
                            <div class="col-md-6">
                                {!! Form::open([
                                    'url'    => route(config('redirect.route_as') . 'redirect.destroy', ['redirect' => $redirect]),
                                    'method' => 'POST',
                                ]) !!}
                                @method('DELETE')
                                {!! Form::submit(__('redirect::redirect.destroy'), [
                                    'class' => 'btn btn-outline-danger my-2 my-sm-0',
                                ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h4 class="text-center text-info text-uppercase">
                            <i>{{ __('redirect::redirect.nothing_found') }}</i>
                        </h4>
                    </td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">{{ $redirects->render() }}</td>
            </tr>
        </tfoot>
    </table>
@endsection
