@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('redirect::redirect.close') }}">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('redirect::redirect.close') }}">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
