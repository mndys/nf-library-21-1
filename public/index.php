<?php

require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Symfony\Component\HttpFoundation\Request;

$request = new Request($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
$request = Request::createFromGlobals();

use Symfony\Component\HttpFoundation\Response;

$response = new Response('Not Found', 404);
$response->send();


$request = Request::createFromGlobals();
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$routes = require __DIR__ . '/../config/routes.php';
$response = '';

foreach ($routes as $route) {
    if ($method === $route[0] && $uri === $route[1]) {
        $response = call_user_func($route[2]);
    }
}

if (!$response) {
    http_response_code(404);
    $response = '404 - Not Found';
}

echo $response;
