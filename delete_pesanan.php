<?php
// include database connection file
include_once("config.php");


$id = $_GET['id'];
$nomorInvoice = $_GET['no'];
$namaPelanggan= $_GET['name'];

$result = mysqli_query($mysqli, "DELETE FROM invoice WHERE id=$id");


header("Location:order.php?nomorInvoice=$nomorInvoice&name=$namaPelanggan");
?>
