<?php
/**
 * Created by PhpStorm.
 * User: zy
 * Date: 2016/2/1
 * Time: 14:06
 */

class OrderController extends Controller {


    public function index(){
        $this->view = View::build('order/OrderView');
    }

    public function orderDetail(){
        $this->view = View::build('order/OrderDetailView');
    }
}