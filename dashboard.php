<?php

session_start();
include "connect.php";

$id = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>

body{
font-family:Arial;
background:#f4f6ff;
}

.container{
width:420px;
margin:80px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 10px 20px rgba(0,0,0,0.1);
text-align:center;
}

button{
width:100%;
padding:10px;
margin-top:10px;
border:none;
border-radius:5px;
cursor:pointer;
}

.edit{background:#4CAF50;color:white;}
.delete{background:#e53935;color:white;}
.logout{background:#555;color:white;}

</style>

</head>

<body>

<div class="container">

<h2>Welcome <?php echo $row['name']; ?></h2>

<p>Email: <?php echo $row['email']; ?></p>
<p>Phone: <?php echo $row['phone']; ?></p>
<p>Age: <?php echo $row['age']; ?></p>
<p>Gender: <?php echo $row['gender']; ?></p>

<a href="edit.php"><button class="edit">Edit Profile</button></a>

<a href="delete.php"><button class="delete">Delete Account</button></a>

<a href="logout.php"><button class="logout">Logout</button></a>

</div>

</body>
</html>