<?php

session_start();
include "connect.php";

$id = $_SESSION['user_id'];

mysqli_query($conn,"DELETE FROM users WHERE id=$id");

session_destroy();

echo "Account Deleted Successfully<br><br>";
echo "<a href='login.html'>Return to Login</a>";

?>