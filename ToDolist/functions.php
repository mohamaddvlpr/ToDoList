<?php

ob_start();

if (!function_exists('dd')) {
    function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';

        die();
    }
}

if (!function_exists('urlIs')) {
    function urlIs($path)
    {
        return $_SERVER["REQUEST_URI"] === $path;
    }
}

if (!function_exists('viewPath')) {
    function viewPath($path, $parameter = [])
    {
        extract($parameter);
        require "views/{$path}" . ".view.php";
    }
}

if (!function_exists('categoriesPath')) {
    function categoriesPath($path)
    {
        return "views/categories/{$path}";
    }
}

if (!function_exists('routeToController')) {
    function routeToController($uri, $routes)
    {
        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
        }
    }
}

if (!function_exists('abort')) {
    function abort($code)
    {
        http_response_code($code);

        basePath("views/{$code}.php");

        die();
    }
}

if (!function_exists('basePath')) {
    function basePath($path)
    {
        return require_once BASE_PATH . $path;
    }
}


if (!function_exists('currentTaskUri')) {
    function currentTaskUri()
    {
        if ($_SERVER["REQUEST_URI"] === '/tasks') {
            viewPath('tasks/index');
        } else if ($_SERVER["REQUEST_URI"] === '/create/tasks') {
            return false;
        } else {
            abort(404);
        }
    }
}


if (!function_exists('currentUserUri')) {
    function currentUserUri()
    {
        if ($_SERVER["REQUEST_URI"] === '/users') {
            viewPath('users/index');
        } else if ($_SERVER["REQUEST_URI"] === '/create/users') {
            return false;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('controllerPath')) {
    function controllerPath()
    {
        spl_autoload_register(function ($className) {

            $file = BASE_PATH . '/src/controllers/' . $className . '.php';
            if (file_exists($file)) {
                require $file;
            } else {
                die("File for class '$className' not found at $file");
            }
        });
    }
}

if (!function_exists('redirect')) {
    function redirect($to)
    {
        header('location:' . $to);
        die;
    }
}
