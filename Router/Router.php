<?php

namespace Router;

use ReflectionClass;
use ReflectionException;

class Router
{
    /** @var array */
    private array $diConfig;

    /**
     * @var Route[]
     */
    private array $routes = [];

    /**
     * @param $diConfig
     */
    public function __construct($diConfig)
    {
        $this->diConfig = $diConfig;
    }

    /**
     * @param string $url
     * @param string $controller
     * @param string $action
     */
    public function register(string $url, string $controller, string $action): void
    {
        $this->routes[$url] = new Route($url, $controller, $action);
    }

    public function handle(string $url, string $requestType, array $file)
    {
        $route = $this->routes[$url];

        $controllerName = $route->getController();
        $methodName = $route->getAction();

        $controller = $this->getClassWithResolvedDependencies($controllerName);

        if (!is_callable($controller)) {
            $controller = [$controller, $methodName];
        }

        echo $controller(...array_values($file ?? []));
    }

    /**
     * @param string $className
     * @return mixed
     * @throws ReflectionException
     */
    private function getClassWithResolvedDependencies(string $className): object
    {
        $dependencies = [];
        $class = new ReflectionClass($className);
        $parameters = $class->getConstructor()->getParameters();
        foreach ($parameters as $parameter) {
            $interface = $parameter->getClass();
            $dependencies[] = new $this->diConfig[$interface->getName()];
        }

        return new $className(...$dependencies);
    }
}
