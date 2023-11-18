<?php
  require_once "config.php";
// Tạo kết nối
$conn = new mysqli("$servername", "$username", "$password", "$dbname");
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin đăng nhập từ biểu mẫu
$email = $_POST['email'];
$password = $_POST['password'];

// Kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Đăng nhập thành công, thực hiện hành động sau khi đăng nhập
    echo "Đăng nhập thành công!";
} else {
    // Đăng nhập thất bại, thực hiện hành động khi đăng nhập thất bại
    echo "Đăng nhập thất bại!";
}

// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>