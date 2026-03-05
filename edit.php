<?php

session_start();
include "connect.php";

$id = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$row = mysqli_fetch_assoc($result);

?>

<h2>Edit Profile</h2>

<form action="update.php" method="POST">

<input type="text" name="name" value="<?php echo $row['name']; ?>">

<input type="email" name="email" value="<?php echo $row['email']; ?>">

<input type="text" name="phone" value="<?php echo $row['phone']; ?>">

<input type="number" name="age" value="<?php echo $row['age']; ?>">

<input type="text" name="gender" value="<?php echo $row['gender']; ?>">

<input type="password" name="password" value="<?php echo $row['password']; ?>">

<button type="submit">Update</button>

</form>