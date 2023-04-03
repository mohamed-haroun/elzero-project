<?php

declare(strict_types=1);

namespace core;
use controllers\SiteController;
use exceptions\RouterNotFoundException;

class Router
{
    public array $routes;
    public function __construct(public Request $request, public Response $response)
    {
    }

    public function register(string $requestMethod, string $route, array $action):static
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, array $action):static
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, array $action):static
    {
        return $this->register('post', $route, $action);
    }

    /**
     * @throws RouterNotFoundException
     */
    public function resolve(): string|null
    {
        $path = $this->request->getPath();
        $requestMethod = $this->request->getRequestMethod();
        $args[] = $path[1];
        $args['request'] = $this->request;

        $action = ($this->routes[$requestMethod][$path[0]]) ?? null;

        if (! $action) {
            $this->response->setStatusCode(404);

            (new SiteController("main_layout"))->render("error_page", ["pageName" => "error_page"]);
            exit();
        }

        if (is_callable($action)) {
            call_user_func($action, $args);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)){

                $class = new $class();

                if(method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], [$args]);
                }
            }

        }
        throw new RouterNotFoundException();
    }
}