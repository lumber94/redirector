<?php

    return [

        // config for route prefix
        'route_prefix'     => env('BACKEND_PREFIX', 'admin'),

        // config for route as
        'route_as'         => env('BACKEND_AS', 'admin.'),

        // config for route middleware
        'route_middleware' => ['web'],

        // config for custom pagination attribute $perPage
        'per_page'         => 20,

        // config for redirect status codes
        'status_codes'     => [
            301 => '301',
            302 => '302',
        ],

    ];
