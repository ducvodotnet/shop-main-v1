<?php
include ("../core/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];

    update_category($category_id, $name, $img);

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_id = $_GET['id'];
    $category = get_category($category_id);

    include_once '../view/category/_edit.php';
}