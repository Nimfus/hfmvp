<?php

namespace Router;

class Route
{
    /** @var string */
    private string $url;

    /** @var string */
    private string $controller;

    /** @var string */
    private string $action;

    /**
     * @param string $url
     * @param string $controller
     * @param string $action
     */
    public function __construct(string $url, string $controller, string $action)
    {
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @param string $url
     * @return bool
     */
    public function matches(string $url): bool
    {
        return $this->url === $url;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}
