<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="title-content">
      <a href="?show=surat-masuk">Surat Masuk</a> / <a href="#">Update Data</a>
    </div>

    <?php
      $id_mail = $_GET['id_mail'];
      $query = "SELECT * FROM mail_in WHERE id_mail='$id_mail'";
      $queryTypeSurat = "SELECT * FROM mail_type";
      $no = 1;
      include 'inc/fungsi.php';
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
      $resultTypeSurat = $fungsi->view($queryTypeSurat);
    ?>
 
    <?php foreach ($result as $key => $row) { ?>
    <div class="containers">
      <form class="" action="" enctype="multipart/form-data" method="post" autocomplete="off">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Kode Surat :</p>
              <div class="input-form-group">
                <input type="text" name="mail_code" value="<?php echo $row['mail_code']; ?>" placeholder="Kode Surat"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tanggal Surat Masuk :</p>
              <div class="input-form-group">
                <input type="date" name="incoming_at" value="<?php echo $row['incoming_at'] ?>" >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tanggal Surat Dibuat :</p>
              <div class="input-form-group">
                <input type="date" name="mail_date" value="<?php echo $row['mail_date'] ?>"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Pengirim Surat :</p>
              <div class="input-form-group">
                <input type="text" name="mail_from" value="<?php echo $row['mail_from'] ?>" placeholder="Pengirim Surat"  >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tujuan Surat</p>
              <div class="input-form-group">
                <input type="text" name="mail_to" value="<?php echo $row['mail_to'] ?>" placeholder="Tujuan Surat"  >
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
                <textarea name="dess" rows="8" cols="80" placeholder="Isi Surat"><?php echo $row['dess'] ?></textarea>
              </div>
            </div>

            <div class="from-grup">
              <p class="label-form-group">Type Surat :</p>
              <div class="input-form-group">
                <select name="id_mail_type">
                  <?php foreach ($resultTypeSurat as $key => $row) {?>
                  <option value="<?php echo $row['id_mail_type'] ?>"><?php echo $row['mail_type']; ?></option>
                 <?php } ?>
                </select>
              </div>
            </div>

            <div class="from-grup">
              <p class="label-form-grup">File :</p>
              <div class="input-form-group">
                <input type="file" name="file" value="">
                <br>
                <?php foreach ($result as $key => $row) { ?>
                <label for=""><?php echo $row['file'] ?></label>
                <?php } ?>
              </div>
            </div>
          </span>
        </table>

        <input type="submit" name="submit" value="Kirim" class="btn-submit btn-blu">
        <input type="reset" name="" value="Reset" class="btn-submit btn-red">

      </form>
    </div>
  <?php } ?>
  </body>
</html>


  <?php
  if (isset($_POST['submit'])) {
    $mail_code          = $_POST['mail_code'];
    $incoming_at        = $_POST['incoming_at'];
    $mail_date          = $_POST['mail_date'];
    $mail_from          = $_POST['mail_from'];
    $mail_to            = $_POST['mail_to'];
    $subject            = $_POST['subject'];
    $dess               = $_POST['dess'];
    $id_mail_type       = $_POST['id_mail_type'];
    $file               = $_FILES['file']['name'];

    // file lokasi
    $lokasi=$_FILES['file']['tmp_name'];
    $dir="assets/file/";

    // inisialisasi variable Fungsi
    $table = "mail_in";

    $set = "mail_code='$mail_code',
            incoming_at='$incoming_at',
            mail_date='$mail_date',
            mail_from='$mail_from',
            mail_to='$mail_to',
            subject='$subject',
            dess='$dess',
            id_mail_type='$id_mail_type'
            ";

    $setFile = "mail_code='$mail_code',
                incoming_at='$incoming_at',
                mail_date='$mail_date',
                mail_from='$mail_from',
                mail_to='$mail_to',
                subject='$subject',
                dess='$dess',
                id_mail_type='$id_mail_type',
                file='$file'
                ";

    $chckFiles = "'$file'";

    $key = "id_mail='$id_mail'";

    $fileHapus = "assets/file/".$row['file'];

    $fungsi = new Fungsi();
    $result = $fungsi->updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus);

    if ($result) {
      move_uploaded_file($lokasi,"$dir$file");
    ?>
    <script type="text/javascript">
      alert("Berhasil Update");
      location.href="index.php?show=surat-masuk";
    </script>
    <?php
    }else {
    ?>
    <script type="text/javascript">
      alert("Gagal Update");
      location.href="index.php?show=surat-masuk";
    </script>
    <?php
      }
    }
    ?>
