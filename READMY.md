# Laravel Redirect

The package that provide an easy way to make redirect from old to new urls.

## Installing

```
composer require lumber94/redirector
```

After updating composer, add the service provider to the providers array in `config/app.php`

```
Lumber94\Redirector\Providers\ServiceProvider::class
```

Publish migrations:

```
php artisan vendor:publish --tag=redirect-migrations
```

## Optional Features

```
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
```

## How to use?

You can connect middleware in `app/Http/Kernel.php` class for web routes.

```
    protected $middlewareGroups = [
        'web' => [
            ...
            \Lumber94\Redirector\Http\Middleware\RedirectMiddleware::class,
            ...
        ],
    ];
```

Or you can connect middleware as specific and use them in your specific route:

```
    protected $routeMiddleware = [
        'redirect' => \Lumber94\Redirector\Http\Middleware\RedirectMiddleware::class,
    ];

    Route::get('/', function () {
        // ...
    })->middleware('redirect');
```

And now all what you need to do is create your redirects in redirect module.


## What we can publish?

```
php artisan vendor:publish --tag=redirect-lang
php artisan vendor:publish --tag=redirect-views
php artisan vendor:publish --tag=redirect-config
php artisan vendor:publish --tag=redirect-migrations
```
