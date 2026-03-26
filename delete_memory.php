<?php
include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM memories WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: view_memories.php");

?>