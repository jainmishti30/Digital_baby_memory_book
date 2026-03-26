<?php

$conn = mysqli_connect("localhost","root","","baby_memory_book");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>