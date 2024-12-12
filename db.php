<!-- kết nối cơ sở dữ liệu -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QLSV_NguyenDinhDucThinh";

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
