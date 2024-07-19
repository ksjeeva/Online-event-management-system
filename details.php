<?php
$conn = mysqli_connect("localhost","root","","project");

$name = $_POST['uname'];
$phone = $_POST['phnumber'];
$email = $_POST['gmail'];
$pass = $_POST['sword'];

$sql ="INSERT INTO `login`(`user_name`, `password_name`, `gmail`, `number`) VALUES ('$name','$pass','$email','$phone')";

$result = $conn->query($sql);
if($result){
    echo "<script>alert('Register successfull!'); location.replace('login.html');</script>";
}else{
    echo "sorry";
}


?>