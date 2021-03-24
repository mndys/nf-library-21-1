<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
$request = Request::createFromGlobals();
$response = new Response();
$routes = require __DIR__ . '/../config/routes.php';

foreach ($routes as $route) {
    if ($request->getMethod() === $route[0] && $request->getRequestUri() === $route[1]) {
        $content = call_user_func($route[2]);
        $response->setContent($content);
    }
}

if (!$response->getContent()) {
    $response = new Response('404 - Not Found', 404);
}

$response->send();
