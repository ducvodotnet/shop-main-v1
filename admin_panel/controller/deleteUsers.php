<?php

    include_once "../config/dbconnect.php";
    
    $u_id=$_POST['record'];
    $query="DELETE FROM users where id='$u_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Users Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>