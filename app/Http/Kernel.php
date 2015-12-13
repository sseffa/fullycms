<?php namespace Fully\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
        'Illuminate\Cookie\Middleware\EncryptCookies',
        'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
        'Illuminate\Session\Middleware\StartSession',
        'Illuminate\View\Middleware\ShareErrorsFromSession',
        'Fully\Http\Middleware\VerifyCsrfToken'
    ];
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'before'               => 'Fully\Http\Middleware\BeforeMiddleware',
        'sentry.auth'          => 'Fully\Http\Middleware\SentryAuth',
        'auth.basic'           => 'Illuminate\Auth\Middleware\AuthenticateWithBasicAuth',
        'guest'                => 'Fully\Http\Middleware\RedirectIfAuthenticated',
        'localize'             => 'Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes',
        'localizationRedirect' => 'Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter',
    ];
}
