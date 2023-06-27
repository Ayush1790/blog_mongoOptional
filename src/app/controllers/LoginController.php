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
        $response = $this->mongo->store->user->findOne(['email' => $email, 'pswd' => $pswd]);
        if ($response) {
            $_SESSION['role'] = $response->role;
            $_SESSION['id'] = $response->email;
            if ($response->role == 'user') {
                $this->response->redirect('userdashboard');
            } elseif ($response->role == 'admin') {
                $this->response->redirect('admin');
            } elseif ($response->role == 'manager') {
                $this->response->redirect('manager');
            }
        } else {
            echo "Wrong email or password";
            echo $this->tag->linkTo('login/index', ' Go Back');
        }
    }
}
