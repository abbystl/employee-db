<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone', position='$position' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
        Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        Phone: <input type="text" name="phone" value="<?= $row['phone'] ?>" required><br>
        Position: <input type="text" name="position" value="<?= $row['position'] ?>" required><br>
        <input type="submit" value="Update Employee">
    </form>
</body>
</html>