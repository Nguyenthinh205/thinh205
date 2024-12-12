<!-- xử lý xóa sinh viên -->
<?php
include 'db.php';

// Lấy ID sinh viên từ URL
$id = $_GET['id'];

// Xóa sinh viên từ database
$sql = "DELETE FROM table_Students WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Lỗi: " . $conn->error;
}
?>
