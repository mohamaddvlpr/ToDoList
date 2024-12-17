<?php

use Router\Route;

const BASE_PATH = __DIR__ . '/../';

require '../functions.php';

basePath(path: 'Router/Route.php');

$route = new Route();

controllerPath();

$routes = basePath(path: 'routes.php');

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$method = $_POST["METHOD"] ?? $_SERVER["REQUEST_METHOD"];

$route->dispatch(requestUri: $uri, requestMethod: $method);

routeToController(uri: $uri, routes: (array) $routes);
