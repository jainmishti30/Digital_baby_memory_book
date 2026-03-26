<!DOCTYPE html>
<html>
<head>
<title>Add Baby Memory</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Add Baby Memory</h2>

<form action="save_memory.php" method="POST" enctype="multipart/form-data">

Title:
<input type="text" name="title"><br><br>

Description:
<textarea name="description"></textarea><br><br>

Date:
<input type="date" name="date"><br><br>

Photo:
<input type="file" name="photo"><br><br>

<button type="submit">Save Memory</button>

</form>

</body>
</html>