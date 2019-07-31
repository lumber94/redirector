<?php

    namespace Lumber94\Redirector\Http\Middleware;

    use Closure;
    use Lumber94\Redirector\Models\Redirect;

    /**
     * Class RedirectMiddleware
     *
     * @package Lumber94\Redirector\Http\Middleware
     */
    class RedirectMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param            $request
         * @param  \Closure  $next
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
         */
        public function handle($request, Closure $next)
        {
            $redirect = Redirect::whereUrlFrom($request->url())->first();

            if (is_null($redirect)) {
                return $next($request);
            }

            return redirect($redirect->url_to, $redirect->status_code);
        }
    }
