<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $Email = $_POST['u_email'];
        $Password = $_POST['u_password'];


         $insert = mysqli_query($conn,"INSERT INTO users
         (id,email,password,role) 
         VALUES (NULL,'$Email','$Password','user')");
 
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