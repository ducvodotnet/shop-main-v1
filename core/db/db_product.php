<?php

require_once 'config.php';

$pdo = get_pdo();

function get_all_products()
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    $productList = array();

    if (count($result) > 0) {
        // Hiển thị dữ liệu của bảng
        foreach ($result as $row) {
            $product = array(
                "id" => $row["id"],
                "image" => $row["image"],
                "name" => $row["name"],
                "description" => $row["description"],
                "price" => $row["price"],
                "quantity" => $row["quantity"],
                "category_id" => $row["category_id"]
            );
            array_push($productList, $product);
        }
    }

    return $productList;
}


/**
 * Get Product detail
 * host/product-detail.php?id=1
 * @id id of product
 */
function get_product($id){
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE ID=:id";
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
            'image' => $row['image'],
            'name' => $row['name'],
            'productscol' => $row['productscol'],
            'description' => $row['description'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id']
        );
    }

    return null;
}

/**
 * Get product list by category
 */
function get_products_by_category($category_id){
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE CATEGORY_ID=:category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'productscol' => $row['productscol'],
            'description' => $row['description'],
            'price' => $row['price'],
            'category_id' => $row['category_id']
        );
    }
    
    return $product_list;
}


/**
 * Get product by name
 */
function get_products_by_name($name){
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE NAME LIKE :name";
    $stmt = $pdo->prepare($sql);

    $name = "%$name%";
    $stmt->bindParam(':name', $name);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image'],
            'description' => $row['description'],
            'productscol' => $row['productscol'],
            'price' => $row['price'],
            'category_id' => $row['category_id']
        );
    }
    
    return $product_list;
}

/**
 * Get product related
 */
function get_products_related($product_id, $category_id){
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE ID != :product_id AND CATEGORY_ID = :category_id LIMIT 4";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':category_id', $category_id);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $product_list[] = array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'productscol' => $row['productscol'],
            'description' => $row['description'],
            'price' => $row['price'],
            'category_id' => $row['category_id']
        );
    }
    
    return $product_list;
}

function update_product($product)
{
    global $pdo;
    $sql = "UPDATE PRODUCTS SET IMAGE=:image, NAME=:name, DESCRIPTION=:description, PRICE=:price, QUANTITY=:quantity, CATEGORY_ID=:category_id WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $product['id']);
    $stmt->bindParam(':image', $product['image']);
    $stmt->bindParam(':name', $product['name']);
    $stmt->bindParam(':description', $product['description']);
    $stmt->bindParam(':price', $product['price']);
    $stmt->bindParam(':quantity', $product['quantity']);
    $stmt->bindParam(':category_id', $product['category_id']);

    $stmt->execute();
}

function update_product_quantity_by_id($product)
{
    global $pdo;

    $sqlGetQuantity = "SELECT quantity FROM PRODUCTS WHERE ID=:id";
    $stmtGetQuantity = $pdo->prepare($sqlGetQuantity);

    $stmtGetQuantity->bindParam(':id', $product['id']);
    $stmtGetQuantity->execute();

    $currentQuantity = $stmtGetQuantity->fetchColumn();
    $updateQuantity = $currentQuantity - $product['quantity'];


    $sql = "UPDATE PRODUCTS SET QUANTITY=:quantity WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $product['id']);
    $stmt->bindParam(':quantity', $updateQuantity);

    $stmt->execute();

}

function get_products($product_id)
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $product_id);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    $productList = array();

    if (count($result) > 0) {
        // Hiển thị dữ liệu của bảng
        foreach ($result as $row) {
            return array(
                "id" => $row["id"],
                "image" => $row["image"],
                "name" => $row["name"],
                "description" => $row["description"],
                "price" => $row["price"],
                "quantity" => $row["quantity"],
                "category_id" => $row["category_id"]
            );
        }
    }

    return null;
}

function insert_product($product)
{
    global $pdo;
    $sql = "INSERT INTO PRODUCTS(ID, IMAGE, NAME, DESCRIPTION, PRICE, QUANTITY, CATEGORY_ID) VALUES(NULL, :image, :name, :description, :price, :quantity, :category_id)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':image', $product['image']);
    $stmt->bindParam(':name', $product['name']);
    $stmt->bindParam(':description', $product['description']);
    $stmt->bindParam(':price', $product['price']);
    $stmt->bindParam(':quantity', $product['quantity']);
    $stmt->bindParam(':category_id', $product['category_id']);

    $stmt->execute();
}
function delete_product($product_id)
{
    global $pdo;

    $sql = "DELETE FROM PRODUCTS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $product_id);

    $stmt->execute();
}