<?php

use Phalcon\Mvc\Controller;
use Phalcon\Escaper;

class SignupController extends Controller
{
    public function indexAction()
    {
        //redirect to view
    }

    public function registerAction()
    {
        $escaper = new Escaper();
    $data = array(
        'name' =>  $escaper->escapeHtml($this->request->getPost('name')),
        'email' => $escaper->escapeHtml($this->request->getPost('email')),
        'pswd' =>  $escaper->escapeHtml($this->request->getPost('pswd')),
        'pincode' => $escaper->escapeHtml($this->request->getPost('pincode')),
    );
    $res = $this->mongo->blog->user->insertOne($data);
        if ($res->getInsertedCount()) {
            $this->response->redirect('login');
        }
    }
}
