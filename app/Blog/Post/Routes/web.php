<?php

use Illuminate\Routing\Router;

Route::middleware(['web'])->group(function (Router $router) {
    $router->resource('post','PostController');
    $router->get('/chess-board', function() {
        return view('POST::chess');
    });
});
