<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    protected Request $request;
    protected Response $response;

    protected function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->response = new Response();
    }
    protected function render(string $view): Response
    {
        return $this->response;
    }
    protected function json(mixed $data): Response
    {
        return $this->response;
    }
    protected function notFound(string $message): Response
    {
        return $this->response;
    }
    protected function redirect(string $url): Response
    {
        return $this->response;
    }
}
