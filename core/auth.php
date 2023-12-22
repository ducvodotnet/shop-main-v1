<?php
require_once 'db/config.php';
$pdo = get_pdo();

function register($email, $password, $role='user'){
    if(email_exisit($email))
        return false;
    
    global $pdo;

    $sql = "INSERT INTO USERS(ID, EMAIL, PASSWORD, ROLE) VALUES(NULL, :email, :password , :role)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);

    $stmt->execute();

    return login($email, $password);
}

function login($email, $password){
    global $pdo;

    $sql = "SELECT * FROM USERS WHERE EMAIL=:email AND PASSWORD=:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return array(
            'id' => $row['id'],
            'email' => $row['email'],
            'password' => $row['password'],
            'role' => $row['role']
        );
    }

    return false;
}

function email_exisit($email){
    global $pdo;

    $sql = "SELECT * FROM USERS WHERE EMAIL=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
     
    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row){
        return true;
    }

    return false;
}
function get_all_user()
{
    global $pdo;

    $sql = "SELECT * FROM USERS";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();
    $userList = array();

    if (count($result) > 0) {
        foreach ($result as $row) {
            $user = array(
                "id" => $row['id'],
                "email" => $row['email'],
                "password" => $row['password'],
                "role" => $row['role'],
            );
            array_push($userList, $user);
        }
    }
    return $userList;

}
function get_user($user_id)
{
    global $pdo;

    $sql = "SELECT * FROM USERS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row) {
        return array(
            "id" => $row['id'],
            "email" => $row['email'],
            "password" => $row['password'],
            "role" => $row['role'],
        );
    }

    return null;
}

function delete_user($user_id)
{
    global $pdo;

    $sql = "DELETE FROM USERS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);

    $stmt->execute();
}

function insert_user($user)
{
    global $pdo;
    $sql = "INSERT INTO USERS(ID, EMAIL, PASSWORD, ROLE) VALUES(NULL, :email, :password, :role)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':email', $user['email']);
    $stmt->bindParam(':password', $user['password']);
    $stmt->bindParam(':role', $user['role']);

    $stmt->execute();
}

function update_user($user)
{
    global $pdo;
    $sql = "UPDATE USERS SET EMAIL=:email, PASSWORD=:password, ROLE=:role WHERE ID=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $user['id']);
    $stmt->bindParam(':email', $user['email']);
    $stmt->bindParam(':password', $user['password']);
    $stmt->bindParam(':role', $user['role']);
    $stmt->execute();
}
?>