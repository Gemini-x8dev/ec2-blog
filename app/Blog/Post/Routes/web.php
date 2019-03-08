<?php

use Illuminate\Routing\Router;

Route::middleware(['web'])->group(function (Router $router) {
    $router->resource('post','PostController');
});