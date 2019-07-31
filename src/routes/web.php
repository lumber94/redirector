<?php

    Route::prefix(config('redirect.route_prefix'))
        ->as(config('redirect.route_as'))
        ->middleware(config('redirect.route_middleware'))
        ->namespace('Lumber94\Redirector\Http\Controllers')
        ->group(function() {
            Route::resource('redirect', 'RedirectController');
        });
