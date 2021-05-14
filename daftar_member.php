<?php
// Turn off all error reporting
session_start();
error_reporting(0);
if($_SESSION['username']== ''){
  header('Location:index.php');
}
// include database connection file
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM member ORDER BY id ASC");
?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="order.php">RPL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="order.php">Order <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar_barang.php">Daftar Barang</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="daftar_member.php">Benefit Member</a>
      </li>
      </li><li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="bg-dark text-white">
<div class="bg-secondary text-white">
    <br></br>
        <h1 class="text-center ">Daftar Member</h1>
    <br></br>
</div>
<table class="table table-dark">
    <thead class="bg-dark text-white">
    <tr>
        <th scope="col" class='text-center'>ID Member</th>
        <th scope="col" class='text-center'>Nama Member</th>
        <th scope="col" class='text-center'>Jenis Member</th>
        <th scope="col" class='text-center'>Update</th>
    </tr>
    </thead>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td class='text-center'>".$user_data['idCustomer']."</td>";
        echo "<td class='text-center'>".$user_data['nama']."</td>";
        echo "<td class='text-center'>".$user_data['idJenisMember']."</td>";
        echo "<td class='text-center'><a href='edit_member.php?id=$user_data[id]'class='btn btn-primary'>Edit</a> <a href='delete_member.php?id=$user_data[id]'class='btn btn-danger'>Delete</a></td></tr>";
        
            
    }
    ?>
</table>


<footer class="page-footer bg-secondary text-white">
    <div class="container">
      <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
          <h2 class="mb-1">Praktikum RPL</h2>
        </li>
      </ul>
    </div>
    <div class="footer-copyright text-center py-3">2021 Copyright: Kelompok 13</div>
  </footer>
  
</div>
</html>

