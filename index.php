<?php
  //Ambil data dari form login
    if(isset($_POST['Submit'])) {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $salted = $username."cienyaripassword".$password;
        $encrypted = md5($salted);

        // include database connection file
        include_once("config.php");

      
        $result = mysqli_query($mysqli, "SELECT * FROM accounts WHERE password='$encrypted'");
        $cek = mysqli_num_rows($result);
        
        if ($cek == 1){
            $_SESSION['username']=$username;
            header('Location:order.php');
        }else{
            echo "User dan Password Salah";
        }
        
        
    }
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="bg-dark text-white">
<h1 class="text-center">Login Aplikasi Persewaan Alat Kemah</h1>
<form action="index.php" method="post" name="form1">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">

    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
        <!--<a class = "form-text text-info" href="daftar.php">Daftar Pengguna Baru</a>-->
    </div>
    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
</form>


<footer class="page-footer bg-secondary text-white">
    <div class="container">
      <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
          <h2 class="mb-1">Praktikum RPL</h2>
        </li>
      </ul>
    </div>
    <div class="footer-copyright text-center py-3">2021 Copyright: Kelompok 13
    </div>
  </footer>
  </div>

</html>