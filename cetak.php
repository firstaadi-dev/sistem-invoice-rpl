<?php
session_start();
// Turn off all error reporting
//error_reporting(0);

$nomorInvoice = $_GET['no'];
$namaPelanggan = $_GET['name'];

include_once("config.php");
date_default_timezone_set('Asia/Jakarta');

$result = mysqli_query($mysqli, "SELECT * FROM recordpesanan WHERE nomorInvoice= $nomorInvoice");
$total = mysqli_query($mysqli, "SELECT SUM(harga * jumlahBarang) AS 'Total Harga' FROM recordpesanan WHERE nomorInvoice = $nomorInvoice");
$diskon = mysqli_query($mysqli, "SELECT diskon FROM memberbenefit WHERE nama='$namaPelanggan'");
?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="mr-4 ml-4">
<h1 class="text-center">Invoice Pembayaran Pesanan</h2>
<h2>Nama    : <?php echo $namaPelanggan; ?></h2>
<h2>Tanggal : <?php echo date("Y-m-d H:i:s"); ?></h2>
<h2>Kasir   : <?php echo $_SESSION['username']; ?></h2>
<table class="table table-striped ">
        <thead class="thead-dark">

<tr>
 <th>Nama Barang</th> 
 <th>Harga</th>
 <th>Jumlah Barang</th>
 </thead>
 <tbody>
<?php  
while($user_data = mysqli_fetch_array($result)) {         
    echo "<tr>";
    echo "<td>".$user_data['nama']."</td>";
    echo "<td>".$user_data['harga']."</td>";
    echo "<td>".$user_data['jumlahBarang']."</td>";
    
        
}
?>
</tbody>
</table>
<table class="table table-striped ">
        <thead class="thead-dark">

<tr>
 <th>Total Harga</th>
 </tr>
 </thead>
<?php  
while($user_data = mysqli_fetch_array($total)) {
            
    echo "<tr>";
    echo "<td>"."Rp.".$user_data['Total Harga']."</td>"; 
    $total = $user_data['Total Harga']; 
}
?>


</table>
<table class="table">
        <thead class="thead-dark">

<tr>
 <th>Diskon</th>
 </thead>
<?php  
while($user_data = mysqli_fetch_array($diskon)) {
          
    echo "<tr>";
    echo "<td>".$user_data['diskon']."%"."</td>"; 
    $diskon = $user_data['diskon']; 
}

?>
</table>

    

<table class="table">
        <thead class="thead-dark">

<tr>
 <th>Bayar</th>
 </thead>
<?php  
    $hargaAkhir = $total * ((100 - $diskon)/100);
    echo "<tr>";
    echo"<td>"."Rp.".$hargaAkhir."</td>";
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