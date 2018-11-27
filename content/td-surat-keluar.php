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

    <div class="containers">
      <form class="" action="inc/proses/p-surat-keluar.php" enctype="multipart/form-data" autocomplete="off" method="post">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Kode Surat :</p>
              <div class="input-form-group">
                <input type="text" name="mail_code" value="" placeholder="Nomor Surat" required >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tanggal Surat Dibuat :</p>
              <div class="input-form-group">
                <input type="date" name="mail_date" value="" required >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tujuan Surat</p>
              <div class="input-form-group">
                <input type="text" name="mail_to" value="" placeholder="Tujuan Surat" required >
              </div>
            </div>

            <?php
            include 'inc/fungsi.php';
            $query = "SELECT * FROM mail_type";
            $fungsi = new Fungsi();
            $result = $fungsi->view($query);
             ?>
            <div class="from-grup">
              <p class="label-form-grup">Type Surat :</p>
              <div class="input-form-group">
                <select class="" name="mail_type">
                <?php foreach ($result as $key => $row) { ?>
                  <option value="<?php echo $row['id_mail_type'] ?>"><?php echo $row['mail_type'] ?></option>
                <?php } ?>
              </select>
              </div>
            </div>
          </span>

          <span class="col-6" style="float:right">
            <div class="from-grup">
              <p class="label-form-grup">Judul Surat :</p>
              <div class="input-form-group">
                <input type="text" name="subject" value="" placeholder="Judul Surat" required >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Isi Surat :</p>
              <div class="input-form-group">
                <textarea name="dess" rows="8" cols="80" placeholder="Isi Surat" required></textarea>
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">File :</p>
              <div class="input-form-group">
                <input type="file" name="file" value="" placeholder=""  >
              </div>
            </div>
          </span>
        </table>

        <input type="submit" name="" value="Kirim" class="btn-blu btn-submit">
        <input type="reset" name="" value="Reset" class="btn-red btn-submit">

      </form>
    </div>

  </body>
</html>
