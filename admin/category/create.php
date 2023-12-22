<?php
require_once '../../core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xác thực ảnh
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        #Xampp ko di chuyển được img vì windows khác linux
        #$target_dir=".../public/img/";
        $target_dir="C:/xampp/htdocs/do-an/shopv1/public/img/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $image='http://localhost/do-an/shopv1/public/img/'.$_FILES['image']['name'];
        // Di chuyển ảnh
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Lưu thông tin vào database
        $createCategory = array(
                "image" => $image,  // Lưu đường dẫn tương đối
                "name" => $_POST['name'],
                "description" => $_POST['description'],
        );
        insert_category($createCategory);

        header('Location: index.php');
}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        include_once '../view/category/_create.php';
    
}



