<?php

use Phalcon\Mvc\Controller;
session_start();

class OrderController extends Controller
{
    public function indexAction()
    {
        date_default_timezone_set("Asia/Calcutta");
        $this->mongo->store->orders->insertOne(['product_id' => $_GET['id'],
         'user_id' => $_SESSION['id'],'time'=>date("Y-m-d h:i:sa")]);
        $_SESSION['product_id'] = $_GET['id'];
        echo "Order Placed Successfully.....";
        echo "<br><br>Click here for <a href='order/review'>Review</a>";
        print_r($_SESSION);
    }
    public function reviewAction()
    {
        //redirect to view
    }
    public function savereviewAction()
    {
        $grade = $this->request->get('grade');
        $rating = $this->request->get('rating');
        $data = [
            'time' => time(),
            'grade' => $grade,
            'score' => $rating
        ];
        $this->mongo->sample_restaurants->restaurants->findOne(
            ['restaurant_id' => $_SESSION['product_id']],
            ['$set' => ['address' => $data]]
        );
        $this->response->redirect('userdashboard');
    }
}
