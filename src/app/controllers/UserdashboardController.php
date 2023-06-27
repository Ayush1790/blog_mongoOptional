<?php

use Phalcon\Mvc\Controller;


class UserdashboardController extends Controller
{
    public function indexAction()
    {
        if ($_POST['cuisine']) {
            $response = $this->mongo->sample_restaurants->restaurants->find(['cuisine' => $_POST['cuisine']]);
            unset($_POST['cuisine']);
            $this->view->data = $response;
        } else {
            $response = $this->mongo->sample_restaurants->restaurants->find();
            $this->view->data = $response;
        }
    }
}
