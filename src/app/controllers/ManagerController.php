<?php

use Phalcon\Mvc\Controller;
use Phalcon\Escaper;
class ManagerController extends Controller
{
    public function indexAction()
    {
        $res = $this->mongo->store->orders->find();
        $data = "";
        if ($res) {
            foreach ($res as $key => $value) {
                $rest = $this->mongo->sample_restaurants->restaurants->findOne(['restaurant_id' => $value->product_id]);
                $user = $this->mongo->store->user->findOne(['email' => $value->user_id]);
                $data .= "<tr>
                <td>$user->name</td>
                <td>$user->email</td>
                <td>$rest->name</td>
                <td>$rest->cuisine</td>
                <td>$value->time</td>
                </tr>";
            }
        }
        $this->view->data = $data;
    }
    public function addAction()
    {
        //redirect to view
    }
    public function adddetailAction()
    {
        $data=$this->request->get();
        $detail=[
            'name'=>$data['name'],
            'resturant_id'=>$data['id'],
            'cuisine'=>$data['cuisine'],
            'borough'=>$data['borough'],
            'address'=>[
                'building'=>$data['building'],
                'street'=>$data['street'],
                'zipcode'=>$data['zip']
            ]
        ];
        $this->mongo->sample_restaurants->restaurants->insertOne([$detail]);
        $this->response->redirect('manager');
    }
    public function managerAction(){
        $data = array(
            'name' =>  $escaper->escapeHtml($this->request->getPost('name')),
            'email' => $escaper->escapeHtml($this->request->getPost('email')),
            'pswd' =>  $escaper->escapeHtml($this->request->getPost('pswd')),
            'pincode' => $escaper->escapeHtml($this->request->getPost('pincode')),
            'role' => 'manager'
        );
         $this->mongo->store->user->insertOne($data);
         $this->response->redirect('admin');
    }
}
