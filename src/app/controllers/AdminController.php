<?php

use Phalcon\Mvc\Controller;


class AdminController extends Controller
{
    public function indexAction()
    {
        //view
        $res = $this->mongo->store->orders->find();
        $users = $this->mongo->store->user->find();
        $data = "";
        $user = "";
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
        $this->view->user = $users;
        $this->view->data = $data;
    }
    public function addAction()
    {
        // view
    }
    public function adddetailAction()
    {
        $data = $this->request->get();
        $detail = [
            'name' => $data['name'],
            'resturant_id' => $data['id'],
            'cuisine' => $data['cuisine'],
            'borough' => $data['borough'],
            'address' => [
                'building' => $data['building'],
                'street' => $data['street'],
                'zipcode' => $data['zip']
            ]
        ];
        $this->mongo->sample_restaurants->restaurants->insertOne([$detail]);
        $this->response->redirect('admin');
    }
    public function managerAction()
    {
        //view
    }
}
