<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $name=$_POST['namaPelanggan'];
    $idBarang=$_POST['idBarang'];
    $jumlahBarang=$_POST['jumlahBarang'];
    
    

    
    $result = mysqli_query($mysqli, "UPDATE invoice SET namaPelanggan='$name',jumlahBarang=$jumlahBarang,id_barang=$idBarang WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: order.php");
}

// Getting id from url
$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM invoice WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['namaPelanggan'];
    $idBarang=$user_data['id_barang'];
    $jumlahBarang=$user_data['jumlahBarang'];
}
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
      <li class="nav-item ">
        <a class="nav-link" href="order.php">Order <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar_barang.php">Daftar Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar_member.php">Benefit Member</a>
      </li>
    </ul>
    
  </div>
</nav>

<div class="bg-dark text-white">


    <h1 class="text-center">Ubah Pesanan</h1>
    <form action="edit_pesanan.php" method="post" >
    <div class="form-group">
        <label for="nama">Nama Pelanggan</label>
        <input type="text" class="form-control" name="namaPelanggan" value=<?php echo $name;?>>

    </div>
    <div class="form-group">
        <label for="idBarang">ID Barang</label>
        <input type="number" class="form-control" name="idBarang" value=<?php echo $idBarang;?>>

    </div>
    <div class="form-group">
        <label for="jumlahBarang">Jumlah Barang</label>
        <input type="number" class="form-control" name="jumlahBarang" value=<?php echo $jumlahBarang;?>>

    </div>
    <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" class="btn btn-primary" value="Update"></td>
    </tr>
</form>

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