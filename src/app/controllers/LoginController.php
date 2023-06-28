<?php


use Phalcon\Mvc\Controller;
session_start();
class LoginController extends Controller
{
    public function indexAction()
    {
        //redirect to view
    }

    public function loginAction()
    {
        $email = $this->request->getPost('email');
        $pswd = $this->request->getPost('pswd');
        $response = $this->mongo->blog->user->findOne(['email' => $email, 'pswd' => $pswd]);
        if ($response) {
            $_SESSION['isLogin']=$response->id;
            $this->response->redirect('userdashboard');
        } else {
            echo "Wrong email or password";
            echo $this->tag->linkTo('login/index', ' Go Back');
        }
    }
}
