<?php
$conn = mysqli_connect("localhost", "root", "", "project");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$name = $_POST['uname'];
$pass = $_POST['sword'];

// Prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$pass = mysqli_real_escape_string($conn, $pass);

$sql = "SELECT * FROM `login` WHERE user_name='$name'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

$row = mysqli_fetch_assoc($result);

if ($row) {
    $dbname = $row['user_name'];
    $dbpass = $row['password_name'];

    if ($pass == $dbpass) {
        header('Location: page.html');
        exit();
    } else {
        echo "Incorrect password";
    }
} else {
    echo "Username not found";
}

mysqli_close($conn);
?>
