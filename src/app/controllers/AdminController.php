<?php

use Phalcon\Mvc\Controller;


class AdminController extends Controller
{
    public function indexAction()
    {
        $data=$this->mongo->blog->blog->find();
        $this->view->data=$data;
    }
  
}
