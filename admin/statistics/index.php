<?php
require_once '../core/boot.php';

if (!isset($_SESSION['orderStatistical'])) {

    $_SESSION['orderStatistical'] = array();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['from']) && isset($_POST['arrive'])) {
        $_SESSION['dateFrom'] = $_POST['from'];
        $_SESSION['dateArrive'] = $_POST['arrive'];
    }
    $_SESSION['getorderDate'] = array(
        'dateFrom' => $_SESSION['dateFrom'],
        'dateArrive' => $_SESSION['dateArrive'],
    );

    $_SESSION['orderStatistical'] = get_orders_by_date($_SESSION['getorderDate']);
    header('location: index.php');

    // chk xong
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