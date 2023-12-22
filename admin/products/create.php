<?php
require_once '../../core/boot.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Xác thực ảnh
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        #Xampp ko di chuyển được img vì windows khác linux
        #$target_dir=".../public/img/";
        $target_dir = "C:/xampp/htdocs/do-an/shopv1/public/img/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $image = 'http://localhost/do-an/shopv1/public/img/' . $_FILES['image']['name'];
        // Di chuyển ảnh
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);


        $category = get_all_categories();
        foreach ($category as $id) {
            if ($id['name'] == $_POST["category_id"]) {
                $_POST["category_id"] = $id['id'];
                break;
            }
        }



        // Lưu thông tin vào database
        $createProduct = array(
            "image" => $image,
            "name" => $_POST['name'],
            "description" => $_POST["description"],
            "price" => $_POST["price"],
            "quantity" => $_POST["quantity"],
            "category_id" => $_POST["category_id"]
        );
        insert_product($createProduct);

        header('Location: index.php');
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nameCategory = get_all_categories();

    include_once '../view/products/_create.php';

}
