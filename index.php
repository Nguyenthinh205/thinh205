<!-- giao diện hiển thị sinh viên -->
<?php
include 'db.php';

// Lấy danh sách sinh viên
$sql = "SELECT * FROM table_Students";
$result = $conn->query($sql);
// xủ lý tìm kiếm

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM table_Students WHERE fullname LIKE '%$search%' OR hometown LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title >Danh sách sinh viên</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<h1 class="title">Danh sách sinh viên</h1>
<a href="add.php" class="btn btn-info">Thêm mới sinh viên</a>
    <table class ="table" id="studentTable">
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ học vấn</th>
            <th>Nhóm</th>
            <th>Hành động</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['fullname'] ?></td>
                    <td><?= date('d-m-Y', strtotime($row['dob'])) ?></td>
                    <td><?= $row['gender'] == 1 ? 'Nam' : 'Nữ' ?></td>
                    <td><?= $row['hometown'] ?></td>
                    <td>
                        <?php
                        switch ($row['level']) {
                            case 0: echo "Tiến sĩ"; break;
                            case 1: echo "Thạc sĩ"; break;
                            case 2: echo "Kỹ sư"; break;
                            default: echo "Khác";
                        }
                        ?>
                    </td>
                    <td>Nhóm <?= $row['group_id'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>"class ="btn btn-info">Sửa</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class ="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">Không có sinh viên nào</td>
            </tr>
        <?php endif; ?>
    </table>

    
    <!-- form tìm kiếm -->
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Nhập tên hoặc quê quán" value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-danger">Tìm kiếm</button>
        <!-- xóa tìm kiếm -->
       <a href="index.php" class="btn btn-info">Xóa tìm kiếm</a>
        </div> 
</body>
</html>
