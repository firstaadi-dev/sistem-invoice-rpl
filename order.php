<?php
// Turn off all error reporting
session_start();
error_reporting(0);
if($_SESSION['username']== ''){
  header('Location:index.php');
}
$nomorInvoice = $_GET['nomorInvoice'];
$namaPelanggan = $_GET['name'];

if(isset($_POST['Submit'])) {
    $namaPelanggan = $_POST['namaPelanggan'];
    $nomorInvoice = $_POST['nomorInvoice'];
    $idBarang = $_POST['idBarang'];
    $jumlahBarang = $_POST['jumlahBarang'];

    // include database connection file
    include_once("config.php");

    
    $result = mysqli_query($mysqli, "INSERT INTO invoice(namaPelanggan,nomorInvoice,id_barang,jumlahBarang) VALUES('$namaPelanggan','$nomorInvoice','$idBarang','$jumlahBarang')");
    $result = mysqli_query($mysqli, "INSERT IGNORE INTO member(nama,idCustomer,idJenisMember) VALUES('$namaPelanggan',0,1)");
    
}
if(isset($_POST['Check'])) {
    $nomorInvoice = $_POST['nomorInvoice'];
}

include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM recordpesanan WHERE nomorInvoice= $nomorInvoice");

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
      <li class="nav-item active">
        <a class="nav-link" href="order.php">Order <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar_barang.php">Daftar Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar_member.php">Benefit Member</a>
      </li><li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0",method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Invoice" aria-label="Search" name="nomorInvoice">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="Check">Search</button>
    </form>
  </div>
</nav>




<div class="bg-dark text-white">
<div class="bg-secondary text-white">
    <br></br>
        <h1 class="text-center ">Form Pemesanan</h1>
    <br></br>
</div>
<form action="order.php" method="post" name="form1">
    <div class="form-group">
        <label for="namaPelanggan">Nama Pelanggan</label>
        <input type="text" class="form-control" name="namaPelanggan" value=<?php echo $namaPelanggan;?>>

    </div>
    <div class="form-group">
        <label for="nomorInvoice">Nomor Invoice</label>
        <input type="text" class="form-control" name="nomorInvoice" value=<?php echo $nomorInvoice;?>>

    </div>
    <div class="form-group">
        <label for="idBarang">Barang(ID)</label>
        <input type="number" class="form-control" name="idBarang">

    </div>
    <div class="form-group">
        <label for="jumlahBarang">Jumlah</label>
        <input type="number" class="form-control" name="jumlahBarang">

    </div>
    <button type="submit" name="Submit" class="btn btn-primary" value="Add">Submit</button>
</form>



<table class="table table-dark">
    <thead class="bg-secondary text-white">
    <tr>
        <th scope="col" class='text-center'>Nama Pelanggan</th>
        <th scope="col" class='text-center'>Nomor Invoice</th>
        <th scope="col" class='text-center'>Nama Barang</th>
        <th scope="col" class='text-center'>Harga</th>
        <th scope="col" class='text-center'>Jumlah Barang</th>
        <th scope="col" class='text-center'>Update</th>
    </tr>
    </thead>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        $namaPelanggan = $user_data['namaPelanggan'];
        echo "<td class='text-center'>".$user_data['namaPelanggan']."</td>";
        echo "<td class='text-center'>".$user_data['nomorInvoice']."</td>";
        echo "<td class='text-center'>".$user_data['nama']."</td>";
        echo "<td class='text-center'>".$user_data['harga']."</td>";
        echo "<td class='text-center'>".$user_data['jumlahBarang']."</td>";
        echo "<td class='text-center'><a href='edit_pesanan.php?id=$user_data[id]' class='btn btn-primary'>Edit</a> <a href='delete_pesanan.php?id=$user_data[id]&no=$user_data[nomorInvoice]&name=$user_data[namaPelanggan]'class='btn btn-danger'>Delete</a></td></tr>";
        
            
    }
    echo "<a href='cetak.php?no=$nomorInvoice&name=$namaPelanggan'>Cetak Pesanan</a>"
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