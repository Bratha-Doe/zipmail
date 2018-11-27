<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include 'inc/fungsi.php';
    include 'inc/jumlah.php';

     ?>

    <div class="title-content">
      <a href="#">Dashboard</a>
    </div>
    <!-- update surat_masuk set status = '1' where id = new.id_surat -->
    <?php //echo substr($row['dess'],0,60).".."; ?>

    <!-- jumlah -->
    <div class="containers home-jml-data">
      <table class="col-12">
        <tr>
          <td class="home-isi-jumlah home-mail-in">
            <i class="fa fa-reply fa-2x"></i>
            <p>
              <?php
              $queryMailIn = $jumlah->get_data('mail_in');
              echo $queryMailIn;
              ?>
            </p>
            <h6>SURAT MASUK</h6>
          </td>
          <td class="home-isi-jumlah home-mail-out">
            <i class="fa fa-share fa-2x"></i>
            <p>
              <?php
              $queryMailOut = $jumlah->get_data('mail_out');
              echo $queryMailOut;
              ?>
            </p>
            <h6>SURAT KALUAR</h6>
          </td>
          <td class="home-isi-jumlah home-disposisi">
            <i class="fa fa-clipboard fa-2x"></i>
            <p>
              <?php
              $queryDisposisi = $jumlah->get_data('disposition');
              echo $queryDisposisi;
              ?>
            </p>
            <h6>DATA DISPOSISI</h6>
          </td>
        </tr>
      </table>
    </div>

    <!-- instansi -->
    <div class="containers home-instansi">
      <?php
      $queryInstansi = "SELECT * FROM instansi";
      $fungsi = new Fungsi();
      $result = $fungsi->view($queryInstansi);
      ?>
      <?php foreach ($result as $key => $row) { ?>
      <span class="home-instansi-logo col-2">
        <img src="assets/file/<?php echo $row['file']; ?>" style="width:170px;">
      </span>
      <span class="home-instansi-isi col-9">
        <table>
          <tr>
            <td style="width:150px;">Nama Instansi</td><td>:</td>
            <td><?php echo $row['instansi_name']; ?></td>
          </tr>
          <tr>
            <td>Alamat</td><td>:</td>
            <td><?php echo $row['address']; ?></td>
          </tr>
          <tr>
            <td>Telp</td><td>:</td>
            <td><?php echo $row['telp']; ?></td>
          </tr>
          <tr>
            <td>Fax</td><td>:</td>
            <td><?php echo $row['fax']; ?></td>
          </tr>
          <tr>
            <td>Website</td><td>:</td>
            <td><?php echo $row['website']; ?></td>
          </tr>
          <tr>
            <td>Kontak</td><td>:</td>
            <td><?php echo $row['contact']; ?></td>
          </tr>
        </table>
      </span>
      <?php } ?>
    </div>

    <div class="containers home-br">
      <table class="col-12">
        <tr>
          <td class="home-backup">
            <a href="inc/backup.php"><i class="fa fa-download"></i> </a>
            <p>BACKUP DATA</p>
          </td>
          <td>
            <a href="?show=restore"><i class="fa fa-upload"></i></a>
            <p>RESTORE DATA</p>
          </td>
        </tr>
      </table>
    </div>




    <!-- <a href="inc/backup.php">backup</a>


    <form class="" action="" method="post" enctype="multipart/form-data">
      <input type="file" name="res" value="Restore">
      <input type="submit" name="submit" value="Submit">
    </form> -->

  </body>
</html>
