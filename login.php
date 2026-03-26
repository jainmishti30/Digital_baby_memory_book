<?php
include "db.php";
session_start();

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM parents WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
$_SESSION['parent']=$email;
header("Location: admin/dashboard.php");
exit();
}else{
$error = "Invalid Login";
}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Parent Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav class="navbar">
<a href="index.php">Home</a>
<a href="view_memories.php">Memories</a>
<a href="timeline.php">Timeline</a>
<a href="login.php">Parent Login</a>
</nav>

<div class="add-memory">

<h2>Parent Login</h2>

<?php
if(isset($error)){
echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

<label>Email</label><br>
<input type="email" name="email" required>

<br><br>

<label>Password</label><br>
<input type="password" name="password" required>

<br><br>

<button type="submit" name="login">Login</button>

</form>

</div>

</body>
</html>