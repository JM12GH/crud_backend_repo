<?php

namespace App\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


/**
 * @method routes(Closure $param)
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
//
    }

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->routes(function () {
// Web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

// API routes
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }
}
