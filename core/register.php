<?php
  // Import file config database
  require_once "config.php";

  // Kết nối với database
  $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // Lấy dữ liệu từ form
  $password = $_POST["password"];
  $email = $_POST["email"];
  $role = "users";

  // Kiểm tra dữ liệu
  if ($username == "" || $password == "" || $email == "") {
    echo "Vui lòng nhập đầy đủ thông tin.";
  } else {
    // Kiểm tra username đã tồn tại chưa
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
      echo "Email đăng nhập đã tồn tại.";
    } else {
      // Chèn dữ liệu vào database
      $sql = "INSERT INTO users (email, password,role) VALUES (?, ?, ?)";
      $stmt = $db->prepare($sql);
      $stmt->execute([$email, $password, $role]);

      // Thông báo đăng ký thành công
      echo "Đăng ký thành công.";
    }
  }
?>