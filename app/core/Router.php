<?php

namespace app\core;

class Router
{

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require($_SERVER['DOCUMENT_ROOT'] . '/app/config/routes.php');
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    /**
     * @param $route string
     * @param $params array
     */
    protected function add($route, $params)
    {
        $route = '~^' . $route . '$~';
        $this->routes[$route] = $params;

    }

    public function run()
    {
        if ($this->match()) {
            $path = 'app\controller\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo 'No Action found';
                }
            }
        } else {
            echo 'No Controller found';
        };
    }

    /**
     * @return bool
     */

    protected function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
}