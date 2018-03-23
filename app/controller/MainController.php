<?php

namespace app\controller;

use app\core\Controller;
use app\model\Schedule;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->view->render('Главная страница');
    }

    public function contactAction()
    {
        $this->view->render('Контакты');
    }

    public function scheduleAction()
    {
        $this->view->render('Расписание');
        $model = new Schedule;
        var_dump($model->getSchedule());
    }
}