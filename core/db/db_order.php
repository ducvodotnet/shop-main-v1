<?php

require_once 'config.php';

$pdo = get_pdo();

//Insert order
function insert_order($code, $status, $user_id){
    $sql = "INSERT INTO ORDERS(ID, CODE, STATUS, USER_ID) VALUES(NULL, :code, :status, :user_id)";
    global $pdo;
    $stmt = $pdo->prepare($sql);
   
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
}

//update order

function update_order($order)
{
    global $pdo;
    $sql = "UPDATE ORDERS SET CODE=:code, STATUS=:status, USER_ID=:user_id WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $order['id']);
    $stmt->bindParam(':code', $order['code']);
    $stmt->bindParam(':status', $order['status']);
    $stmt->bindParam(':user_id', $order['user_id']);


    $stmt->execute();
}

//delete order
function delete_order($orders_id)
{
    global $pdo;

    // Lệnh SQL thứ nhất:
    $sql1 = "DELETE FROM order_items WHERE ID=:id";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->bindParam(':id', $orders_id);
    $stmt1->execute();

    // Lệnh SQL thứ hai:
    $sql2 = "DELETE FROM ORDERS WHERE ID=:id";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':id', $orders_id);
    $stmt2->execute();
}

//Select data
function get_order_list(){
    $sql = "SELECT * FROM ORDERS";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    // Lặp kết quả
    $order_list = [];

    foreach ($result as $row){
        array_push($order_list, array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        ));
    }

    return $order_list;
}

function find_order($id){
    $sql = "SELECT * FROM ORDERS WHERE ID=:id";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        );
    }

    return null;
}

function find_order_by_code($code){
    $sql = "SELECT * FROM ORDERS WHERE CODE=:code";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':code', $code);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        );
    }

    return null;
}

function get_all_orders()
{
    global $pdo;

    $sql = "SELECT * FROM ORDERS, order_items where orders.id = order_items.order_id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    $orderList = array();

    if (count($result) > 0) {
        // Hiển thị dữ liệu của bảng
        foreach ($result as $row) {
            $order = array(
                "id" => $row["id"],
                "code" => $row["code"],
                "status" => $row["status"],
                "user_id" => $row["user_id"],
                "product_id" => $row["product_id"],
                "quantity" => $row["quantity"],
                "price" => $row["price"],
            );
            array_push($orderList, $order);
        }
    }
    return $orderList;
}

function get_order($orders_id)
{
    global $pdo;

    $sql = "SELECT * FROM ORDERS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $orders_id);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row) {
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'users_id' => $row['user_id'],
        );
    }

    return null;
}
?>