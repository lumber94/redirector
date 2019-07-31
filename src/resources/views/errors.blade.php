@if($errors->has('url_from'))
    <div class="invalid-feedback">
        {{ $errors->first('url_from') }}
    </div>
@endif
@if($errors->has('url_to'))
    <div class="invalid-feedback">
        {{ $errors->first('url_to') }}
    </div>
@endif
@if($errors->has('status_code'))
    <div class="invalid-feedback">
        {{ $errors->first('status_code') }}
    </div>
@endif
@if($errors->has('position'))
    <div class="invalid-feedback">
        {{ $errors->first('position') }}
    </div>
@endif
