<?php
    include_once "../config/dbconnect.php";

    $product_id = $_POST['product_id'];
    $ProductName = $_POST['p_name'];
    $description= $_POST['p_description'];
    $productscol= $_POST['p_productscol'];
    $price = $_POST['p_price'];
    $quantity = $_POST['p_quantity'];
    $category = $_POST['category'];



    $updateItem = mysqli_query($conn,"UPDATE products SET 
        name = '$ProductName',
        description = '$description',
        productscol = '$productscol',
        price = '$price',
        quantity = '$quantity',
        category_id = '$category'
        WHERE id = $product_id");


    if($updateItem)
    {
        echo mysqli_error($conn);
        header("Location: ../index.php?category=success");
    }
     else
     {
         echo "Records added successfully.";
         header("Location: ../index.php?category=success");
     }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>