<?php
include "db.php";

$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];

$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

move_uploaded_file($temp, "uploads/".$photo);

$sql = "INSERT INTO memories (title, description, photo, date)
VALUES ('$title','$description','$photo','$date')";

if(mysqli_query($conn,$sql)){
    echo "Memory Saved Successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<form action="save_memory.php" method="POST" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Title">

<textarea name="description"></textarea>

<input type="date" name="date">

<input type="file" name="photo">

<button type="submit">Save Memory</button>

</form>