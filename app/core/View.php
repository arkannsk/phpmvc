<?php

namespace app\core;

class View
{
    /**
     * @var string path to controller-action
     */
    public $path;
    /**
     * @var string basic page route
     */
    public $route;
    /**
     * @var string name of basic page layout
     */
    public $layout = 'default';
    /**
     * @var string meta tag title
     */
    public $title;


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /**
     * @param array $params
     */

    public function render($params = [])
    {
        $path = 'app/view/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/view/layout/'.$this->layout.'.php';
        }
    }

}