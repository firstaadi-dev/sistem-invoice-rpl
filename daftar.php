<?php
  // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $salted = $username."cienyaripassword".$password;
        $encrypted = md5($salted);

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO accounts(username,password) VALUES('$username','$encrypted')");

        
    }
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="bg-dark text-white">
<h1 >Daftar Pengguna Baru Aplikasi Persewaan Alat Kemah</h1>
<form action="daftar.php" method="post" name="form1">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">

    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
        <a class = "form-text text-info" href="index.php">Sudah memiliki akun? Login disini</a>
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
    <div class="footer-copyright text-center py-3">2021 Copyright: Kelompok 13</div>
  </footer>
  
</div>
</html>