<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM memories WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];

$query = "UPDATE memories 
SET title='$title', description='$description', date='$date' 
WHERE id=$id";

mysqli_query($conn,$query);

header("Location: view_memories.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Memory</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2>Edit Baby Memory</h2>

<form method="POST">

<label>Title</label><br>
<input type="text" name="title" value="<?php echo $row['title']; ?>" required>

<br><br>

<label>Description</label><br>
<textarea name="description"><?php echo $row['description']; ?></textarea>

<br><br>

<label>Date</label><br>
<input type="date" name="date" value="<?php echo $row['date']; ?>">

<br><br>

<button type="submit" name="update">Update Memory</button>

</form>

</body>
</html>