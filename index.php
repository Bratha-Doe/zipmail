<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MAIL</title>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
  </head>
  <?php
    session_start();
    if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
      header('location:login/login.php');
    }
  ?>

  <style media="screen">
    body{
      background-color: #f5f5f5;
    }
  </style>

  <body>
    <div class="index-container col-12">

      <div class="index-top-bar col-12" id="openmodal">
        <div class="index-logout">
          <a href="login/logout.php"><i class="fa fa-power-off"></i> logout</a>
        </div>
      </div>


<!-- ======================================================================= -->
      <div class="index-conten">
        <div class="index-nav">
          <a href="index.php" style="text-decoration:none;"><p><img src="assets/img/mail.png" alt=""> <span> ZIP</span>Mail</p></a>
          <div class="index-user">
            <img src="assets/img/user.png" alt="">
            <h5>Welcome,
              <?php
                $name = $_SESSION['fullname'];
                echo "$name";
              ?>
            </h5>
            <h6>
              <?php
                $level = $_SESSION['level'];
                echo "$level";
              ?>
            </h6>
          </div><hr>
           <ul class="menu-ul">
             <?php
                $type = $_SESSION['level'];
                if ($type == "admin") {
             ?>
             <a href="?show=home"><li><i class="fa fa-tachometer"></i> Dashboard</li></a>
             <a onclick="dropdownbtn()" class="dropdown-btn"><li><i class="fa fa-envelope"></i> Surat <span class="fa fa-chevron-down"></span></li></a>
             <div class="dropdown-menu" id="dropdown-menu">
               <a href="?show=surat-masuk"><li><i class="fa fa-reply"></i> Surat Masuk</li></a>
               <a href="?show=surat-keluar"><li><i class="fa fa-share"></i> Surat Keluar</li></a>
             </div>
             <a href="?show=data-disposisi"><li><i class="fa fa-clipboard"></i> Data Disposisi</li></a>
             <a href="?show=user"><li><i class="fa fa-users"></i> Managemen User</li></a>
             <a href="?show=instansi"><li><i class="fa fa-university"></i> Instansi</li></a>
           <?php
            }elseif ($type == "resepsionis") {
           ?>
            <a href="?show=home"><li><i class="fa fa-tachometer"></i> Dashboard</li></a>
            <a onclick="dropdownbtn()" class="dropdown-btn"><li><i class="fa fa-envelope"></i> Surat <span class="fa fa-chevron-down"></span></li></a>
            <div class="dropdown-menu" id="dropdown-menu">
              <a href="?show=surat-masuk"><li><i class="fa fa-reply"></i> Surat Masuk</li></a>
              <a href="?show=surat-keluar"><li><i class="fa fa-share"></i> Surat Keluar</li></a>
            </div>
            <a href="?show=data-disposisi"><li><i class="fa fa-clipboard"></i> Data Disposisi</li></a>
           <?php
            }elseif ($type == "kepala_kantor") {
           ?>
            <a href="?show=home"><li><i class="fa fa-tachometer"></i> Dashboard</li></a>
            <a onclick="dropdownbtn()" class="dropdown-btn"><li><i class="fa fa-envelope"></i> Surat <span class="fa fa-chevron-down"></span></li></a>
            <div class="dropdown-menu" id="dropdown-menu">
              <a href="?show=surat-masuk"><li><i class="fa fa-reply"></i> Surat Masuk</li></a>
              <a href="?show=surat-keluar"><li><i class="fa fa-share"></i> Surat Keluar</li></a>
            </div>
            <a href="?show=data-disposisi"><li><i class="fa fa-clipboard"></i> Data Disposisi</li></a>
           <?php
            }
           ?>

           </ul>
        </div>

        <div class="index-isi">
          <br><br><br>
          <?php
          include 'content/content.php';
           ?>
        </div>
      </div>

    </div>

  </body>

  <script type="text/javascript">
    function dropdownbtn() {
      var x = document.getElementById("dropdown-menu");
      if (x.style.display == "block") {
          x.style.display = "none";
      }else {
          x.style.display = "block";
      }
    }
  </script>

</html>
