<?php
namespace App\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use App\Extensions\Handler as CustomHandler;

class AppServiceProvider extends ServiceProvider
{
public function register(): void
{

$this->app->singleton(ExceptionHandler::class, function ($app) {
return new CustomHandler($app);
});
}

public function boot()
{

}
}
