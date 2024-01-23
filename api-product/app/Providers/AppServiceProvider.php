<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dedoc\Scramble\Scramble;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // echo "<pre>";
        // print_r($_ENV);

        // print_r($_SERVER);

        if (App::environment(['local', 'production'])) {
            URL::forceScheme('https');
            // die('aaa');
            // The environment is either local OR staging...
        }
        Scramble::routes(function (Route $route) {
            return Str::startsWith($route->uri, 'api/');
        });

    }
}
