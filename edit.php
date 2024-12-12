<!-- giao diện chỉnh sửa sinh viên -->
<?php
include 'db.php';

// Lấy thông tin sinh viên từ ID
$id = $_GET['id'];
$sql = "SELECT * FROM table_Students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $group_id = $_POST['group_id'];

    $sql = "UPDATE table_Students 
            SET fullname = '$fullname', dob = '$dob', gender = $gender, 
                hometown = '$hometown', level = $level, `group_id` = $group_id 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin sinh viên</title>
</head>
<body>
    <h1>Chỉnh sửa thông tin sinh viên</h1>
    <form method="POST">
        <label>Họ và tên: <input type="text" name="fullname" value="<?= $student['fullname'] ?>" required></label><br>
        <label>Ngày sinh: <input type="date" name="dob" value="<?= date('Y-m-d', strtotime($student['dob'])) ?>" required></label><br>
        <label>Giới tính:
            <input type="radio" name="gender" value="1" <?= $student['gender'] == 1 ? 'checked' : '' ?>> Nam
            <input type="radio" name="gender" value="0" <?= $student['gender'] == 0 ? 'checked' : '' ?>> Nữ
        </label><br>
        <label>Quê quán: <input type="text" name="hometown" value="<?= $student['hometown'] ?>" required></label><br>
        <label>Trình độ học vấn:
            <select name="level">
                <option value="0" <?= $student['level'] == 0 ? 'selected' : '' ?>>Tiến sĩ</option>
                <option value="1" <?= $student['level'] == 1 ? 'selected' : '' ?>>Thạc sĩ</option>
                <option value="2" <?= $student['level'] == 2 ? 'selected' : '' ?>>Kỹ sư</option>
                <option value="3" <?= $student['level'] == 3 ? 'selected' : '' ?>>Khác</option>
            </select>
        </label><br>
        <label>Nhóm: <input type="number" name="group_id" value="<?= $student['group_id'] ?>" min="1" required></label><br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
