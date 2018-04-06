<?php

namespace app\controller;

use app\core\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->view->render();
    }

    public function contactAction()
    {
        $this->view->render();
    }

    public function scheduleAction()
    {
        $this->view->render();
    }
}