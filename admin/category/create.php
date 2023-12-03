<?php

include ("../core/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $img = $_POST['img'];
    insert_category($name, $img);

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_list = get_all_categories();
    include_once '../view/category/_create.php';
}