<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MAIL</title>
    <link rel="stylesheet" href="../assets/css/master.css">
  </head> 

  <style media="screen">
    body{
      background-color: #F2F1EF;
    }
  </style>

  <body class="login-body">

    <?php
    session_start();
      if(isset($_SESSION['username']) and isset($_SESSION['password'])){
        header('location:../index.php');
      }else{
     ?>

    <div class="login-top">

    </div>

    <div class="login-container">
      <center>
        <div class="login-container-isi">
          <img src="../assets/img/mail.png" class="login-logo" alt="">
          <h2><span>ZIP</span>Mail</h2>
          <form class="login" action="proses-login.php" method="post" autocomplete="off" onsubmit="validasi()">
            <!--  -->
            <div class="login-form">
              <p>Username</p>
              <input class="col-12" type="text" name="username" placeholder="Username" value="">
            </div>
            <!--  -->
            <div class="login-form">
              <p>Password</p>
              <input class="col-12" type="password" name="password" placeholder="Password" value="">
            </div>
            <!--  -->
            <div class="login-form login-form-submit">
              <input class="col-12" type="submit" name="submit" value="MASUK">
            </div>
          </form>
        </div>
      </center>
    </div>
<?php } ?>
  </body>
</html>
