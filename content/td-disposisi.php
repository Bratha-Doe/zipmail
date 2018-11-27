<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    $id_mail = $_GET['id_mail']
     ?>

    <div class="title-content">
      <a href="?show=surat-masuk">Surat Masuk</a> / <a href="?show=disposisi&id_mail=<?php echo $id_mail; ?>">Disposisi</a> / <a href="#">Tambah Data Disposisi</a>
    </div>

    <div class="containers">
      <form class="" action="inc/proses/p-disposisi.php?id_mail=<?php echo $id_mail; ?>" enctype="multipart/form-data" method="post" autocomplete="off">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Tanggal :</p>
              <div class="input-form-group">
                <input type="date" name="disposition_date" value="" required>
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tujuan Disposisi :</p>
              <div class="input-form-group">
                <input type="text" name="disposition_at" value="" placeholder="Tujuan Disposisi" required>
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">sifat :</p>
              <div class="input-form-group">
                <select class="" name="notification">
                  <option value="biasa">Biasa</option>
                  <option value="penting">Penting</option>
                  <option value="rahasia">Rahasia</option>
                </select>
              </div>
            </div>
          </span>

          <span class="col-6" style="float:right">
            <div class="from-grup">
              <p class="label-form-grup">Isi Disposisi :</p>
              <div class="input-form-group">
                <textarea name="dess" rows="8" cols="80" required></textarea>
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
