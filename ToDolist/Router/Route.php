<?php

namespace Router;

use Exception;

class Route
{
    protected static $routes = [];

    /**
     * Get Method For Getting Information
     * @return void
     */
    public static function get(string $uri,  $callback): void
    {
        self::$routes['GET'][$uri] = $callback;
    }

    /**
     * Post Method For Import Information From Form Page
     * @return void
     */
    public static function post(string $uri, $callback): void
    {
        self::$routes['POST'][$uri] = $callback;
    }

    /**
     * Delete Method For Delete Information
     * @return void
     */
    public static function delete(string $uri,  $callback): void
    {
        self::$routes["DELETE"][$uri] = $callback;
    }

    /**
     * Put Method For Update All Of Information
     * @return void
     */
    public static function put(string $uri, $callback): void
    {
        self::$routes['PUT'][$uri] = $callback;
    }

    /**
     * Patch Method For Updated Select Information
     * @return void
     */
    public static function patch(string $uri, $callback): void
    {
        self::$routes['PATCH'][$uri] = $callback;
    }

    public static function dispatch($requestUri, $requestMethod)
    {
        foreach (static::$routes[$requestMethod] as $uri => $callback) {
            if ($uri === $requestUri) {
                if (is_callable($callback)) {
                    return call_user_func($callback);
                } elseif (is_string($callback)) {
                    return static::callController($callback);
                }
            }
        }
        abort(404);
    }

    public static function callController($controller)
    {
        [$class, $method] = explode('@', $controller);
        if (class_exists($class)) {
            $instance = new $class;
            if (method_exists($instance, $method)) {
                return $instance->$method();
            }
        }
        throw new Exception("Controller Or Method Not Found");
    }
}
