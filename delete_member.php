<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete 
$id = $_GET['id'];


$result = mysqli_query($mysqli, "DELETE FROM member WHERE id=$id");


header("Location:daftar_member.php");
?>
