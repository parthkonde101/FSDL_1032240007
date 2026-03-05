<?php

session_start();
include "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$user = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $user['id'];

header("Location: dashboard.php");

}else{

echo "Invalid Email or Password";

}

?>