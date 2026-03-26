<?php
include "db.php";

$sql = "SELECT * FROM memories ORDER BY date ASC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Baby Timeline</title>
    <link rel="stylesheet" href="style.css">


<style>

body{
font-family:Arial;
background:#fff5f8;
}

.timeline{
width:80%;
margin:auto;
}

.event{
background:white;
padding:20px;
margin:20px 0;
border-left:5px solid #ff6b9a;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.event img{
width:200px;
border-radius:10px;
}

</style>
</head>

<body>

<h1 style="text-align:center;color:#ff6b9a;">
Baby Milestone Timeline
</h1>

<div class="timeline">

<?php
while($row=mysqli_fetch_assoc($result)){
?>

<div class="event">

<h3><?php echo $row['title']; ?></h3>

<p><b>Date:</b> <?php echo $row['date']; ?></p>

<img src="uploads/<?php echo $row['photo']; ?>">

<p><?php echo $row['description']; ?></p>

</div>

<?php
}
?>

</div>

</body>
</html>