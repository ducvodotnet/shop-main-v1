<?php
    include_once "../config/dbconnect.php";

    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $c_description = $_POST['c_description'];



    $updateItem = mysqli_query($conn,"UPDATE categories SET 
        name = '$c_name',
        description = '$c_description'
        WHERE id = $c_id");


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