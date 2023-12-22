<?php

require_once 'config.php';

$pdo = get_pdo();

//Insert order

function insert_order_items($order_items)
{
    global $pdo;
    $sql = "INSERT INTO ORDER_ITEMS(ID, ORDERS_ID, PRODUCTS_ID, QUANTITY, PRICE) VALUES(NULL, :orders_id, :product_id, :quantity, :price)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':orders_id', $order_items['orders_id']);
    $stmt->bindParam(':product_id', $order_items['product_id']);
    $stmt->bindParam(':quantity', $order_items['quantity']);
    $stmt->bindParam(':price', $order_items['price']);

    $stmt->execute();
}


//update order
function update_order_detail($product_id, $order_id, $quantity, $price){
    $sql = "UPDATE order_items SET PRODUCT_ID=:product_id, ORDER_ID=:order_id, QUANTITY=:quantity, price=:price WHERE ID=:id";
    global $pdo;
    $stmt = $pdo->prepare($sql);
   
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':price', $price);
    $stmt->execute();
}

//delete order
function delete_order_detail($id){
    $sql = "DELETE FROM order_items WHERE ID=:id";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

//Select data
function get_order_detail_list(){
    $sql = "SELECT * FROM order_items";
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
            'product_id' => $row['product_id'],
            'order_id' => $row['order_id'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
        ));
    }

    return $order_list;
}

function find_order_detail($id){
    $sql = "SELECT * FROM order_items WHERE ID=:id";
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
            'product_id' => $row['product_id'],
            'order_id' => $row['order_id'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
        );
    }

    return null;
}

function update_order_items($order_items)
{
    global $pdo;
    $sql = "UPDATE order_items SET ORDER_ID=:order_id, PRODUCT_ID=:order_id, QUANTITY=:quantity, PRICE=:price WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $order_items['id']);
    $stmt->bindParam(':order_id', $order_items['order_id']);
    $stmt->bindParam(':product_id', $order_items['product_id']);
    $stmt->bindParam(':quantity', $order_items['quantity']);
    $stmt->bindParam(':price', $order_items['price']);

    $stmt->execute();
}

function insert_order_detail($product_id, $order_id, $quantity, $price){
    $sql = "INSERT INTO order_items(ID, ORDER_ID, PRODUCT_ID, QUANTITY, price) VALUES(NULL, :product_id, :order_id, :quantity, :price)";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':price', $price);

    $stmt->execute();
}

?>