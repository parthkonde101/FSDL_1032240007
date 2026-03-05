<?php

session_start();
include "connect.php";

$id = $_SESSION['user_id'];

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$password=$_POST['password'];

$sql="UPDATE users SET
name='$name',
email='$email',
phone='$phone',
age='$age',
gender='$gender',
password='$password'
WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: dashboard.php");

?>