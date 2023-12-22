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
    $createOrder = array(
        "id" => $_POST['id'],
        "code" => $_POST['code'],
        "status" => $_POST['status'],
        'user_id' => $_POST['user_id'],
    );
    insert_order($createOrder);

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userName = get_all_user();

        include_once '../view/orders/_create.php';
    
   
}