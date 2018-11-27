<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="title-content">
      <a href="?show=surat-keluar">Surat Keluar</a> / <a href="#">Tambah Data</a>
    </div>

    <?php
      $id_mail_out = $_GET['id_mail_out'];
      $query = "SELECT * FROM mail_out WHERE id_mail_out='$id_mail_out'";
      $queryTypeSurat = "SELECT * FROM mail_type";
      include 'inc/fungsi.php';
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
      $resultTypeSurat = $fungsi->view($queryTypeSurat);
    ?>
 
    <?php foreach ($result as $key => $row) { ?>
    <div class="containers">
      <form class="" action="" enctype="multipart/form-data" autocomplete="off" method="post">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Kode Surat :</p>
              <div class="input-form-group">
                <input type="text" name="mail_code" value="<?php echo $row['mail_code'] ?>" placeholder="Nomor Surat"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tanggal Surat Dibuat :</p>
              <div class="input-form-group">
                <input type="date" name="mail_date" value="<?php echo $row['mail_date'] ?>"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tujuan Surat</p>
              <div class="input-form-group">
                <input type="text" name="mail_to" value="<?php echo $row['mail_to'] ?>" placeholder="Tujuan Surat"  >
              </div>
            </div>

            <div class="from-grup">
              <p class="label-form-grup">Type Surat :</p>
              <div class="input-form-group">
                <select class="" name="id_mail_type">
                <?php foreach ($resultTypeSurat as $key => $rows) { ?>
                  <option value="<?php echo $row['id_mail_type'] ?>"><?php echo $rows['mail_type'] ?></option>
                <?php } ?>
              </select>
              </div>
            </div>
          </span>

          <span class="col-6" style="float:right">
            <div class="from-grup">
              <p class="label-form-grup">Judul Surat :</p>
              <div class="input-form-group">
                <input type="text" name="subject" value="<?php echo $row['subject'] ?>" placeholder="Judul Surat"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Isi Surat :</p>
              <div class="input-form-group">
                <textarea name="dess" rows="8" cols="80" placeholder="Isi Surat" ><?php echo $row['dess'] ?></textarea>
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">File :</p>
              <div class="input-form-group">
                <input type="file" name="file" value="" placeholder="Undangan"  >
                <br>
                <label for=""><?php echo $row['file'] ?></label>
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
  $mail_code          = $_POST['mail_code'];
  $mail_date          = $_POST['mail_date'];
  $mail_to            = $_POST['mail_to'];
  $id_mail_type       = $_POST['id_mail_type'];
  $subject            = $_POST['subject'];
  $dess               = $_POST['dess'];
  $file               = $_FILES['file']['name'];

  //file lokasi
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="assets/file/";

  //inisialisasi variable Fungsi
  $table = "mail_out";

  $set = "mail_code='$mail_code',
          mail_date='$mail_date',
          mail_to='$mail_to',
          id_mail_type='$id_mail_type',
          subject='$subject',
          dess='$dess'
          ";

  $setFile = "mail_code='$mail_code',
              mail_date='$mail_date',
              mail_to='$mail_to',
              id_mail_type='$id_mail_type',
              subject='$subject',
              dess='$dess',
              file='$file'
              ";

  $chckFiles = "'$file'";

  $key = "id_mail_out='$id_mail_out'";

  $fileHapus = "assets/file/".$row['file'];

  $result = $fungsi->updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus);

  if ($result) {
    move_uploaded_file($lokasi, "$dir$file");
  ?>
  <script type="text/javascript">
    alert("Berhasil tambah Data");
    location.href="index.php?show=surat-keluar";
  </script>
  <?php
  }else {
  ?>
  <script type="text/javascript">
    alert("Gagal Update");
    location.href="index.php?show=u-surat-keluar"
  </script>
  <?php
    }
  }
  ?>
