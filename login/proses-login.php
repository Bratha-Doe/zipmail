<?php
include '../inc/fungsi.php';
$fungsi = new Fungsi();
 
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username='$username' and password='$password'";

$result = $fungsi->execute($query);

$row = mysqli_num_rows($result);

if ($row > 0){
  $data = mysqli_fetch_array($result);
  session_start();
  $_SESSION['fullname']      = $data['fullname'];
  $_SESSION['username']      = $data['username'];
  $_SESSION['password']      = $data['password'];
  $_SESSION['level']         = $data['level'];
  $_SESSION['id_user']       = $data['id_user'];
  ?>
  <script type="text/javascript">
    location.href="../index.php";
  </script>
  <?php

}else {
 ?>
 <script type="text/javascript">
   alert("password Atau Username Salah !")
   location.href="../index.php"
 </script>
<?php
  }
 ?>
