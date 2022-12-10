<?php 
class orderController{
    public function make() {
        require_once 'models/orderModel.php';
        $order = new Order();
        $order->makeOrder();
    }
}