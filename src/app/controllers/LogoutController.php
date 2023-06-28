<?php

use Phalcon\Mvc\Controller;


class LogoutController extends Controller
{
    public function indexAction()
    {
        session_start();
        session_destroy();
        $this->response->redirect('userdashboard');
    }
}
