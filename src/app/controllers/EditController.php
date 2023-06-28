<?php

use Phalcon\Mvc\Controller;


class EditController extends Controller
{
    public function indexAction()
    {
     $id=$this->request->get('id');
     $res=$this->mongo->blog->blog->findOne(['id'=>(int)$id]);
     $this->view->data=$res;
    }

    public function addAction(){
        $title=$this->request->getPost('title');
        $desc=$this->request->getPost('desc');
        $id=$this->request->getPost('id');
        $this->mongo->blog->blog->updateOne(['id'=>(int)$id],['$set'=>['title'=>$title,'desc'=>$desc]]);
        if(isset($_SESSION['isAdmin'])){
            $this->response->redirect('admin');
        }else{
            $this->response->redirect('userdashboard');
        }

    }
}
