<?php

/**
 * SPA BOOTSTRAP — spa/bootstrap/app.php
 *
 * Inicialitza el SPA Laravel-style dins del school-project.
 * BASE_PATH apunta a la rel de school-project (on viu la BD i el vendor).
 * SPA_PATH apunta a school-project/spa/
 */

// Autoloader: Spa\Http\Router → spa/app/Http/Router.php
spl_autoload_register(function (string $class) {
    if (str_starts_with($class, 'App\\')) {
        $relative = substr($class, 4); // remove "App\"
        $path = SPA_PATH . '/app/' . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($path)) {
            require $path;
        }
    }
});

// Helpers globals (view, redirect, config, flash, e…)
require SPA_PATH . '/app/helpers.php';

// Router
$router = new App\Http\Router();

require SPA_PATH . '/routes/web.php';

// Dispatch
$router->dispatch();
