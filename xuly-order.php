<?php
require_once './core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_SESSION['cart'])){
        
        $order = array(
            'code' => string_random(10),
            'status' => 'pending',
            'user_id' => 1
        );
    
        insert_order(
            $order['code'],
            $order['status'],
            $order['user_id']
        );
    
        $find_order = find_order_by_code($order['code']);
    
        $cart = $_SESSION['cart'];
        foreach($cart as $ods){
            $order_detail = array(
                'order_id' => $find_order['id'],
                'product_id' => $ods['product_id'],
                'quantity' => $ods['quantity'],
                'price' => $ods['price']
            );
    
            insert_order_detail(
                $order_detail['order_id'],
                $order_detail['product_id'],
                $order_detail['quantity'],
                $order_detail['price']
            );
        }
    
        unset($_SESSION['cart']);
        header(('Location: index.php'));

    }else{
        header(('Location: index.php'));
    }    
    
}