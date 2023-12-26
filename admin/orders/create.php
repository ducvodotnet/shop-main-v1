<?php
require_once '../../core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = get_all_user();
    foreach( $user as $id){
        if ($id['email'] == $_POST["user_id"]) {
            $_POST["user_id"] = $id['id'];
            break;
        }
    }
    $products = get_all_products();
    foreach( $products as $id){
        if ($id['name'] == $_POST["product_id"]) {
            $_POST["product_id"] = $id['id'];
            break;
        }
    }

    $createOrder = array(
        'code' => $_POST['code'],
        'status' => $_POST['status'],
        'user_id' => $_POST['user_id'],
    );
    insert_order(            
        $createOrder['code'],
        $createOrder['status'],
        $createOrder['user_id']
    );

    $find_order = find_order_by_code($createOrder['code']);

    $createOrder_detail = array(
        "order_id" => $find_order['id'],
        "product_id" => $_POST['product_id'],
        "quantity" => $_POST['quantity'],
        'price' => $_POST['price'],
    );
    insert_order_detail(                
        $createOrder_detail['order_id'],
        $createOrder_detail['product_id'],
        $createOrder_detail['quantity'],
        $createOrder_detail['price']
    );

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userName = get_all_user();
    $productsName = get_all_products();
        include_once '../view/orders/_create.php';
    
   
}