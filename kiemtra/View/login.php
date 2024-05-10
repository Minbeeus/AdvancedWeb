<?php
session_start();

require_once 'Config/database_config.php';

// Kết nối đến CSDL
$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT MaUser FROM User WHERE TenUser = '$username' AND MatKhau = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        
        // Chuyển hướng người dùng đến trang Sach.php sau khi đăng nhập thành công
        header("Location: Sach.php");
        exit;
    } else {
        echo "Tên người dùng hoặc mật khẩu không đúng.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post" action="">
        <label for="username">Tên người dùng:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>