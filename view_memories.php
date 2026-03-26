<?php
include "db.php";

$sql = "SELECT * FROM memories ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>

<?php
include("db.php"); // or db.php

$sql = "SELECT * FROM memories ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Baby Memories</title>
</head>
<body>

<h1>Baby Memory Gallery</h1>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="memory-box" style="border:1px solid #ccc;padding:15px;margin:20px;width:300px;">
    <h3><?php echo $row['title']; ?></h3>

    <img src="uploads/<?php echo $row['photo']; ?>" 
         style="width:100%;border-radius:10px;">

    <p><?php echo $row['description']; ?></p>
    <p><b>Date:</b> <?php echo $row['date']; ?></p>
</div>

<?php } ?>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Baby Memories</title>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<style>

body{
font-family: Arial;
background:#f5f5f5;
}

.memory{
background:white;
padding:20px;
margin:20px;
border-radius:10px;
width:300px;
box-shadow:0 0 10px #ccc;
}

img{
width:100%;
border-radius:10px;
}

.container{
display:flex;
flex-wrap:wrap;
}

</style>
</head>

<body>

<h1>Baby Memory Gallery</h1>


<div class="container">

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<div class="memory">

<h3><?php echo $row['title']; ?></h3>

<img src="uploads/<?php echo $row['photo']; ?>">

<p><?php echo $row['description']; ?></p>

<p><b>Date:</b> <?php echo $row['date']; ?></p>

<a href="edit_memory.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete_memory.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this memory?')">Delete</a>

<a href="edit_memory.php?id=<?php echo $row['id']; ?>">Edit</a>

</a href>

</div>

<?php
}
?>

</div>

</body>
</html>