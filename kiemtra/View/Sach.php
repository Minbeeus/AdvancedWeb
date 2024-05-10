<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require_once 'Config/database_config.php';

// Kết nối đến CSDL
$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn SQL để lấy 5 dòng dữ liệu từ bảng Sach
$sql = "SELECT * FROM Sach LIMIT 5";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Sách</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách sách</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Năm xuất bản</th>
            <th>Giá</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Duyệt qua từng hàng dữ liệu và hiển thị trên bảng
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MaSach"] . "</td>";
                echo "<td>" . $row["TenSach"] . "</td>";
                echo "<td>" . $row["SoLuong"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="logout.php">Đăng xuất</a>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>