<?php

use Phalcon\Mvc\Controller;


class UserdashboardController extends Controller
{
    public function indexAction()
    {
        session_start();
        if (isset($_GET['msg']) && $_GET['msg'] == 'myBlog') {
            $result = $this->mongo->blog->blog->find(['user_id'=>(int)$_SESSION['isLogin']]);
          } else {
            $result = $this->mongo->blog->blog->find();
          }
          $this->view->data=$result;
    }
}
