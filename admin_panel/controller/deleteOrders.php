<?php

    include_once "../config/dbconnect.php";
    
    $o_id = $_POST['record'];
    
    $query="DELETE FROM order_items where order_id='$o_id'; DELETE FROM orders where id='$o_id';";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Orders Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>