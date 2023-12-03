<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $ProductName = $_POST['p_name'];
        $description= $_POST['p_description'];
        $productscol= $_POST['p_productscol'];
        $price = $_POST['p_price'];
        $quantity = $_POST['p_quantity'];
        $category = $_POST['category'];
       
            
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="/public/img/";
        $image='http://localhost/do-an/shopv1'.$location.$name;

        #Xampp ko di chuyển được img vì windows khác linux
        #$target_dir=".../public/img/";
        $target_dir="C:/xampp/htdocs/do-an/shopv1/public/img/";
        $finalImage= $target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO products
         (id,image,name,description,productscol,price,quantity,category_id) 
         VALUES (NULL,'$image','$ProductName',$description,'$productscol','$price','$quantity','$category')");
 
         if(!$insert)
         {
            echo mysqli_error($conn);
            header("Location: ../index.php?category=error");
        }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?category=success");
         }
     
    }
        
?>