<?php
    include_once "../config/dbconnect.php";

    $u_id = $_POST['u_id'];
    $Email = $_POST['u_email'];
    $Password = $_POST['u_password'];



    $updateItem = mysqli_query($conn,"UPDATE users SET 
        email = '$Email',
        password = '$Password',
        role = 'user' 
        WHERE id = $u_id");


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