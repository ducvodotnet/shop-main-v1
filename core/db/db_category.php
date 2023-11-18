<?php
require_once 'config.php';
$pdo = get_pdo();

function get_all_categories(){
    global $pdo;

    $sql = "SELECT * FROM categories";
    $stmt = $pdo->prepare($sql);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
     
    $category_list = array();

    // Lặp kết quả
    foreach ($result as $row){
        $category_list[] = array(
            'id' => $row['id'],
            'image' => $row['image'],
            'name' => $row['name'],
            'description' => $row['description'],
        );
    }
    
    return $category_list;
}

function delete_category($category_id){
    global $pdo;

    $sql = "DELETE FROM categories WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $category_id);

    $stmt->execute();

}

function insert_category($name, $img){
    global $pdo;
    $sql = "INSERT INTO categories(ID, NAME, image, description) VALUES(NULL, :name, :image, :description)";
    $stmt = $pdo->prepare($sql);
    
   
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':image', $img);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
}

function get_category($category_id){
    global $pdo;

    $sql = "SELECT * FROM categories WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $category_id);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'name' => $row['name'],
            'image' => $row['image'],
            'description' => $row['description'],
        );
    }

    return null;
}

function update_category($id, $name, $img){
    global $pdo;
    $sql = "UPDATE categories SET NAME=:name, image=:img WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

   
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
}