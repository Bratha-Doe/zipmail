<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="title-content">
      <a href="?show=instansi">Instansi</a> / <a href="#">Update Instansi</a>
    </div>

    <?php
      $id_instansi = $_GET['id_instansi'];
      $query = "SELECT * FROM instansi WHERE id_instansi='$id_instansi'";
      include 'inc/fungsi.php';
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
    ?>
 
    <?php foreach ($result as $key => $row) { ?>
    <div class="containers">
      <form class="" action="" enctype="multipart/form-data" autocomplete="off" method="post">
        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Nama Instansi :</p>
              <div class="input-form-group">
                <input type="text" name="instansi_name" value="<?php echo $row['instansi_name'] ?>" placeholder="Nama Instansi"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Alamat :</p>
              <div class="input-form-group">
                <input type="text" name="address" value="<?php echo $row['address'] ?>" placeholder="Alamat" >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Telp :</p>
              <div class="input-form-group">
                <input type="text" name="telp" value="<?php echo $row['telp'] ?>" placeholder="Telp"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Fax :</p>
              <div class="input-form-group">
                <input type="text" name="fax" value="<?php echo $row['fax'] ?>" placeholder="Fax"  >
              </div>
            </div>
          </span>

          <span class="col-6" style="float:right">
            <div class="from-grup">
              <p class="label-form-grup">Website :</p>
              <div class="input-form-group">
                <input type="text" name="website" value="<?php echo $row['website'] ?>" placeholder="Website"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Kontak :</p>
              <div class="input-form-group">
                <input type="text" name="contact" value="<?php echo $row['contact'] ?>" placeholder="Contact"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Logo :</p>
              <div class="input-form-group">
                <input type="file" name="file" value="">
                <br>
                <label for=""><?php echo $row['file'] ?></label>
              </div>
            </div>
          </span>
        </table>

        <input type="submit" name="submit" value="Edit" class="btn-blu btn-submit">
        <input type="reset" name="" value="Reset" class="btn-red btn-submit">

      </form>
    </div>
    <?php } ?>

  </body>
</html>

<?php
if (isset($_POST['submit'])) {
  $instansi_name      = $_POST['instansi_name'];
  $address            = $_POST['address'];
  $telp               = $_POST['telp'];
  $fax                = $_POST['fax'];
  $website            = $_POST['website'];
  $contact            = $_POST['contact'];
  $file               = $_FILES['file']['name'];

  //file lokasi
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="assets/file/";

  //inisialisasi variable Fungsi
  $table = "instansi";

  $set = "instansi_name='$instansi_name',
          address='$address',
          telp='$telp',
          fax='$fax',
          website='$website',
          contact='$contact'
          ";

  $setFile = "instansi_name='$instansi_name',
              address='$address',
              telp='$telp',
              fax='$fax',
              website='$website',
              contact='$contact',
              file='$file'
              ";

  $chckFiles = "'$file'";

  $key = "id_instansi='$id_instansi'";

  $fileHapus = "assets/file/".$row['file'];

  $result = $fungsi->updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus);

  if ($result) {
    move_uploaded_file($lokasi, "$dir$file");
  ?>
  <script type="text/javascript">
    alert("Berhasil tambah Data");
    location.href="index.php?show=instansi";
  </script>
  <?php
  }else {
  ?>
  <script type="text/javascript">
    alert("Gagal Update");
    location.href="index.php?show=u-instansi";
  </script>
  <?php
    }
  }
  ?>
