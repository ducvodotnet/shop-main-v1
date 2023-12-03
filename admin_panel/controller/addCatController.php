<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $name = $_POST['name'];
        $description= $_POST['description'];


        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./public/img/";
        $image=$location.$name;

        $target_dir="../../public/img/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);
       
         $insert = mysqli_query($conn,"INSERT INTO categories
         (id,image,name,description) 
         VALUES (NULL,'$image','$name','$description')");
 
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