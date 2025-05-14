<?php
include 'config.php';

// Thêm sinh viên
if (isset($_POST['add'])) {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $conn->query("INSERT INTO students (student_id, full_name) VALUES ('$student_id', '$full_name')");
    header("Location: index.php");
}

// Xoá sinh viên
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header("Location: index.php");
}

// Cập nhật sinh viên
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $conn->query("UPDATE students SET student_id='$student_id', full_name='$full_name' WHERE id=$id");
    header("Location: index.php");
}

// Lấy dữ liệu để sửa
$edit = false;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();
    $edit = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Sinh viên</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f7f7f7; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        form { margin-bottom: 20px; }
        input[type=text] { padding: 8px; width: 200px; }
        input[type=submit] { padding: 8px 16px; background: #28a745; color: white; border: none; cursor: pointer; }
        .edit-btn { background: #007bff; color: white; padding: 5px 10px; text-decoration: none; }
        .delete-btn { background: #dc3545; color: white; padding: 5px 10px; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Quản lý sinh viên</h2>

    <form method="post">
        <input type="hidden" name="id" value="<?= $edit ? $row['id'] : '' ?>">
        <input type="text" name="student_id" placeholder="Mã sinh viên" value="<?= $edit ? $row['student_id'] : '' ?>" required>
        <input type="text" name="full_name" placeholder="Họ tên" value="<?= $edit ? $row['full_name'] : '' ?>" required>
        <input type="submit" name="<?= $edit ? 'update' : 'add' ?>" value="<?= $edit ? 'Cập nhật' : 'Thêm mới' ?>">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Hành động</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM students");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['student_id'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td>
                <a class="edit-btn" href="?edit=<?= $row['id'] ?>">Sửa</a>
                <a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Xoá sinh viên này?')">Xoá</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>



