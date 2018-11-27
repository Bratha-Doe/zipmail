<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      $id_user = $_GET['id_user'];
      $query = "SELECT * FROM user WHERE id_user='$id_user'";
      include 'inc/fungsi.php';
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
    ?>

    <div class="title-content">
      <a href="?show=user">Managemen User</a> / <a href="#">Update User</a>
    </div>

    <?php foreach ($result as $key => $row) { ?>
    <div class="containers">
      <form class="" action="" enctype="multipart/form-data" method="post" autocomplete="off">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Nama Lengkap :</p>
              <div class="input-form-group">
                <input type="text" name="fullname" value="<?php echo $row['fullname'] ?>" placeholder="Nama Lengkap">
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Username :</p>
              <div class="input-form-group">
                <input type="text" name="username" value="<?php echo $row['username'] ?>" placeholder="Username" >
              </div>
            </div>
          </span>

          <span class="col-6" style="float:right">
            <div class="from-grup">
              <p class="label-form-grup">Password :</p>
              <div class="input-form-group">
                <input type="text" name="password" value="<?php echo $row['password'] ?>" placeholder="Password" >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Level :</p>
              <div class="input-form-group">
                <select class="" name="level">
                  <option value="admin">Admin</option>
                  <option value="kepala_kantor">kepala Kantor</option>
                  <option value="resepsionis">resepsionis</option>
                </select>
              </div>
            </div>
          </span>
        </table>

        <input type="submit" name="submit" value="Kirim" class="btn-blu btn-submit">
        <input type="reset" name="" value="Reset" class="btn-red btn-submit">

      </form>
    </div>
    <?php } ?>

  </body>
</html>

<?php
if (isset($_POST['submit'])) {
  $fullname           = $_POST['fullname'];
  $username           = $_POST['username'];
  $password           = $_POST['password'];
  $level              = $_POST['level'];



  //inisialisasi variable Fungsi
  $table = "user";

  $set = "fullname='$fullname',
          username='$username',
          password='$password',
          level='$level'
          ";

  $key = "id_user='$id_user'";

  $result = $fungsi->update($table,$set,$key);

  if ($result) {
  ?>
  <script type="text/javascript">
    alert("Berhasil Updete Data");
    location.href="?show=user";
  </script>
  <?php
  }else {
  ?>
  <script type="text/javascript">
    alert("Gagal Update");
    location.href="?show=u-user";
  </script>
  <?php
    }
  }
  ?>
