<?php
// include database connection file
include_once("config.php");


if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $name=$_POST['nama'];
    $idCustomer=$_POST['idCustomer'];
    $idJenisMember=$_POST['idJenisMember'];
    

    
    $result = mysqli_query($mysqli, "UPDATE member SET nama='$name',idCustomer=$idCustomer,idJenisMember=$idJenisMember WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location:daftar_member.php");
}

// Getting id from url
$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM member WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nama'];
    $idCustomer = $user_data['idCustomer'];
    $idJenisMember = $user_data['idJenisMember'];
    
    
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


    <h1 class="text-center">Ubah Data Member</h1>
    <form action="edit_member.php" method="post" >
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" value=<?php echo $name;?>>

    </div>
    <div class="form-group">
        <label for="idMember">ID Member</label>
        <input type="number" class="form-control" name="idCustomer" value=<?php echo $idCustomer;?>>

    </div>
    <div class="form-group">
        <label for="idJenisMember">Jenis Member</label>
        <input type="number" class="form-control" name="idJenisMember" value=<?php echo $idJenisMember;?>>

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
