<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $c_name = $_POST['c_name'];
        $c_description = $_POST['c_description'];


        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="/public/img/";
        $image='http://localhost/do-an/shopv1'.$location.$name;

        #Xampp ko di chuyển được img vì windows khác linux
        #$target_dir=".../public/img/";
        $target_dir="C:/xampp/htdocs/do-an/shopv1/public/img/";
        $finalImage= $target_dir.$name;

        move_uploaded_file($temp,$finalImage);
       
         $insert = mysqli_query($conn,"INSERT INTO categories
         (id,image,name,description) 
         VALUES (NULL,'$image','$c_name','$c_description')");
 
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