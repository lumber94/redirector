<div class="form-group">
    <label for="inputUrlFrom">
        {{ __('redirect::redirect.url_from') }}
    </label>
    {!! Form::url('url_from', $redirect->url_from ?? old('url_from'), [
        'id'          => 'inputUrlFrom',
        'class'       => 'form-control' . ($errors->has('url_from') ? ' is-invalid' : ''),
        'placeholder' => __('redirect::redirect.enter_url_from'),
        'required'    => true,
    ]) !!}
    @includeWhen($errors->has('url_from'), 'redirect::errors')
</div>
<div class="form-group">
    <label for="inputUrlTo">
        {{ __('redirect::redirect.url_to') }}
    </label>
    {!! Form::url('url_to', $redirect->url_to ?? old('url_to'), [
        'id'          => 'inputUrlTo',
        'class'       => 'form-control' . ($errors->has('url_to') ? ' is-invalid' : ''),
        'placeholder' => __('redirect::redirect.enter_url_to'),
        'required'    => true,
    ]) !!}
    @includeWhen($errors->has('url_to'), 'redirect::errors')
</div>
<div class="form-group">
    <label for="inputStatusCode">
        {{ __('redirect::redirect.status_code') }}
    </label>
    {!! Form::select('status_code', config('redirect.status_codes'), $redirect->status_code ?? old('status_code'), [
        'id'          => 'inputStatusCode',
        'class'       => 'custom-select' . ($errors->has('status_code') ? ' is-invalid' : ''),
        'required'    => true,
        'placeholder' => __('redirect::redirect.choose_option'),
    ]) !!}
    @includeWhen($errors->has('status_code'), 'redirect::errors')
</div>
<div class="form-group">
    <div class="form-check">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', 1, $redirect->is_active ?? old('is_active'), [
            'id'    => 'inputIsActive',
            'class' => 'form-check-input',
        ]) !!}
        <label class="form-check-label" for="inputIsActive">
            {{ __('redirect::redirect.is_active') }}
        </label>
    </div>
</div>
<div class="form-group">
    <label for="inputPosition">
        {{ __('redirect::redirect.position') }}
    </label>
    {!! Form::number('position', $redirect->position ?? old('position'), [
        'id'          => 'inputPosition',
        'class'       => 'form-control' . ($errors->has('position') ? ' is-invalid' : ''),
        'placeholder' => __('redirect::redirect.enter_position'),
        'required'    => true,
        'min'         => 1,
        'max'         => 999999,
    ]) !!}
    @includeWhen($errors->has('position'), 'redirect::errors')
</div>
