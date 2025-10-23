<?php

namespace System\Route;

use System\Controller\Controller;
use System\Route\Container;
use ReflectionClass;
use ReflectionProperty;

class SelectController
{
    private $controller;
    private $method;
    private $getRoute;
    private $allRouters = [];
    private $routerAliases;
    private $routeRegex = [
        '{id}' => '([0-9]{1,})',
        '{slug}' => '([a-zA-z0-9_-]+)',
        '{id}-{slug}' => '([0-9]{1,})\-([a-zA-z0-9_-]+)',
        '{any}' => '([a-zA-Z0-9-_\.\=\&\%\@\!\'\"\(\)\+\*\;\,]+)',
    ];
    private $container;

    public function __construct(GetRoute $getRoute, ?Container $container = null)
    {
        $this->getRoute = $getRoute;
        $this->container = $container;

        $this->controller = $getRoute->getControllerName();
        $this->method = $getRoute->getMethodName();
        $this->routerAliases = $getRoute->getControllerNameAliases();

        if ($getRoute->getMethodNameAliases()) {
            $this->routerAliases = "{$this->routerAliases}/{$getRoute->getMethodNameAliases()}";
        }
    }

    public function run()
    {
        $similarRoutes = $this->takesSimilarRoutes();
        $similarRoutes = $this->takesRegexRoutes($similarRoutes);
        $similarRoutes = $this->takesActualRouteByRegex($similarRoutes);
        $similarRoutes = $this->takesRouteData($similarRoutes);
        $similarRoutes = $this->takesRoutesSimilarToMethod($similarRoutes);

        $actualRoute = current($similarRoutes);
        $controller = $actualRoute['controller'];
        $method = $actualRoute['method'];
        $data = $actualRoute['data'] ?? [];

        $this->instantiateController($controller, $method, $data);
    }

    protected function takesSimilarRoutes(): array
    {
        if ($this->routerAliases == '') {
            $blankRoute = array_filter($this->allRouters, fn($r) => $r['alias'] == '');
            $uniqueBarRoute = array_filter($this->allRouters, fn($r) => $r['alias'] == '/');
            if (!count($blankRoute) && count($uniqueBarRoute)) {
                $this->routerAliases = '/';
            }
        }
        $barsInActualRoute = substr_count($this->routerAliases ?? '', '/');
        return array_filter($this->allRouters, function ($route) use ($barsInActualRoute) {
            if ($route['alias'] == '/') return $this->routerAliases == '/';
            if (preg_match('/\{(.*)\?\}/', $route['alias'])) return true;
            return substr_count($route['alias'], '/') == $barsInActualRoute;
        });
    }

    protected function takesRegexRoutes(array $similarRoutes): array
    {
        return array_map(function ($route) {
            if (preg_match_all("/\{([a-zA-Z0-9\?]+)\}/", $route['alias'], $matches)) {
                $route['realRoute'] = $route['alias'];
                $route['alias'] = $this->manipulateRouteRegex($route['alias'], $matches);
            }
            $route['route'] = $route['alias'];
            return $route;
        }, $similarRoutes);
    }

    protected function manipulateRouteRegex(string $route, array $matches): string
    {
        foreach ($matches[0] as $regex) {
            $optional = false;
            if (preg_match('/\{(.*)\?\}/', $regex)) {
                $optional = true;
                $regex = str_replace('?}', '}', $regex);
            }
            $regexValue = $this->routeRegex[$regex] ?? '(.*)';
            $regexValue = $optional ? "{$regexValue}?" : $regexValue;
            $regex = $optional ? str_replace('}', '?}', $regex) : $regex;
            $route = str_replace($regex, "?{$regexValue}", $route);
        }
        return $route;
    }

    protected function takesActualRouteByRegex(array $similarRoutes): array
    {
        $similarRoutes = array_filter($similarRoutes, function ($data) {
            $route = str_replace('/', '\/', $data['route']);
            return preg_match("/^{$route}/", $this->routerAliases ?? '', $matches);
        });
        if (!count($similarRoutes)) {
            echo json_encode(['Route not found']);
            exit;
        }
        return $similarRoutes;
    }

    protected function takesRouteData(array $similarRoutes): array
    {
        return array_map(function ($data) {
            $route = str_replace('/', '\/', $data['route']);
            preg_match("/^{$route}/", $this->routerAliases, $match);
            array_shift($match);
            $data['data'] = $match;

            if (count($data['data']) === 1 && preg_match('/\//', $data['data'][0])) {
                $data['data'] = explode('/', $data['data'][0]);
            }
            return $data;
        }, $similarRoutes);
    }

    protected function takesRoutesSimilarToMethod(array $similarRoutes): array
    {
        $similarRoutes = array_filter($similarRoutes, fn($r) => $r['type'] == $_SERVER['REQUEST_METHOD']);
        if (!count($similarRoutes)) {
            echo json_encode(['This route is not compatible with' => $_SERVER['REQUEST_METHOD']]);
            exit;
        }
        return $similarRoutes;
    }

    protected function instantiateController(string $controller, string $method, array $data = [])
    {
        if (strstr($controller, '\\')) {
            $controller = "App\\Http\\Controllers\\{$controller}";
        } else {
            $controller = "App\\Http\\Controllers\\{$controller}";
        }

        $this->verifyIfControllerExists($controller);

        // Criação via container se disponível
        $controllerInstance = $this->container
            ? $this->container->make($controller)
            : new $controller();

        $this->verifyIfMethodExists($controllerInstance, $method);

        if (empty($data)) {
            return call_user_func([$controllerInstance, $method]);
        }

        $data = explode('/', $data[0]);
        return call_user_func_array([$controllerInstance, $method], $data);
    }

    protected function verifyIfControllerExists(string $controller): void
    {
        if (!class_exists($controller)) {
            echo json_encode(['Controller not found']);
            exit;
        }
    }

    protected function verifyIfMethodExists(Controller $controller, $method): void
    {
        if (!method_exists($controller, $method)) {
            echo json_encode(['Method not found']);
            exit;
        }
    }

    public function get(string $aliases, string $controllerAndMethod) { $this->create($aliases, $controllerAndMethod, "GET"); }
    public function post(string $aliases, string $controllerAndMethod) { $this->create($aliases, $controllerAndMethod, "POST"); }
    public function put(string $aliases, string $controllerAndMethod) { $this->create($aliases, $controllerAndMethod, "PUT"); }
    public function delete(string $aliases, string $controllerAndMethod) { $this->create($aliases, $controllerAndMethod, "DELETE"); }

    public function create(string $aliases, string $controllerAndMethod, string $type = "GET")
    {
        [$controllerName, $methodName] = explode('@', $controllerAndMethod);

        $this->allRouters[] = [
            'controller' => $controllerName,
            'method' => $methodName,
            'alias' => $aliases,
            'type' => $type,
        ];
    }
}
