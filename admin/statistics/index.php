<?php
require_once '../core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $productList = get_all_products();
    $userList = get_all_user();
    $orderList = get_all_orders();
    $productQuantity = 0;
    $userQuantity = 0;
    $orderQuantity = 0;
    foreach ($productList as $product) {
        $productQuantity += $product['quantity'];
    }
    foreach ($userList as $user) {
        $userQuantity++;
    }
    foreach ($orderList as $order) {
        $orderQuantity++;
    }

    include_once './view/statistics/_index.php';
    
}