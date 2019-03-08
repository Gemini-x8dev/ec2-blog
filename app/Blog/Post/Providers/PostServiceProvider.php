<?php

namespace Blog\Post\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    protected $namespace = 'Blog\Post\Controllers';

    public function register()
    {
        $this->loadViewsFrom(__DIR__. "/../views","POST");
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__. "/../Routes/web.php");
    }
}
