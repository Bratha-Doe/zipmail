<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      $id_mail = $_GET['id_mail'];
      $id_disposition = $_GET['id_disposition'];
      $query = "SELECT * FROM disposition WHERE id_disposition='$id_disposition'";
      include 'inc/fungsi.php';
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
    ?>
 
    <div class="title-content">
      <a href="?show=surat-masuk">Surat Masuk</a> / <a href="?show=disposisi&id_mail=<?php echo $id_mail; ?>">Disposisi</a> / <a href="#">Update Disposisi</a>
    </div>

    <?php foreach ($result as $key => $row) { ?>
    <div class="containers">
      <form class="" action="" enctype="multipart/form-data" method="post" autocomplete="off">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Tanggal :</p>
              <div class="input-form-group">
                <input type="date" name="disposition_date" value="<?php echo $row['disposition_date'] ?>" >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Tujuan Disposisi :</p>
              <div class="input-form-group">
                <input type="text" name="disposition_at" value="<?php echo $row['disposition_at'] ?>" placeholder="Tujuan Disposisi" >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Sifat :</p>
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
                <textarea name="dess" rows="8" cols="80"><?php echo $row['dess'] ?></textarea>
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
  $disposition_date   = $_POST['disposition_date'];
  $disposition_at     = $_POST['disposition_at'];
  $notification       = $_POST['notification'];
  $dess               = $_POST['dess'];



  //inisialisasi variable Fungsi
  $table = "disposition";

  $set = "disposition_date='$disposition_date',
          disposition_at='$disposition_at',
          notification='$notification',
          dess='$dess'
          ";

  $key = "id_disposition='$id_disposition'";

  $result = $fungsi->update($table,$set,$key);

  if ($result) {
  ?>
  <script type="text/javascript">
    alert("Berhasil Updete Data");
    location.href="?show=disposisi&id_mail=<?php echo $id_mail; ?>";
  </script>
  <?php
  }else {
  ?>
  <script type="text/javascript">
    alert("Gagal Update");
    location.href="?show=disposisi&id_mail=<?php echo $id_mail; ?>";
  </script>
  <?php
    }
  }
  ?>
