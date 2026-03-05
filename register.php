<?php

include "connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$sql = "INSERT INTO users(name,email,phone,age,gender,password)
VALUES('$name','$email','$phone','$age','$gender','$password')";

if(mysqli_query($conn,$sql)){
    echo "Registration Successful";
}else{
    echo "Error: " . mysqli_error($conn);
}

?>