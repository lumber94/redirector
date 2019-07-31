<?php

    namespace Lumber94\Redirector\Providers;

    use Illuminate\Support\ServiceProvider as BaseServiceProvider;

    /**
     * Class ServiceProvider
     *
     * @package App\Providers
     */
    class ServiceProvider extends BaseServiceProvider
    {
        /**
         * Bootstrap services.
         *
         * @return void
         */
        public function boot(): void
        {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
            $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'redirect');
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'redirect');

            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/redirect'),
            ], 'redirect-lang');
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/redirect'),
            ], 'redirect-views');
            $this->publishes([
                __DIR__ . '/../config/redirect.php' => config_path('redirect.php'),
            ], 'redirect-config');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'redirect-migrations');
        }

        /**
         * Register services.
         *
         * @return void
         * @throws \Illuminate\Contracts\Container\BindingResolutionException
         */
        public function register(): void
        {
            $this->mergeConfigFrom(__DIR__ . '/../config/redirect.php', 'redirect');

            $this->app->make('Lumber94\Redirector\Http\Controllers\RedirectController');
        }
    }
