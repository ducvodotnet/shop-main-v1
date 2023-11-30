<?php
require_once 'core/boot.php';
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $action = $_POST['action'];
    header('Location: checkout.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include_once './view/_checkout.php';
}