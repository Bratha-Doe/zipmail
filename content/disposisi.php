<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="col-12">
    <div class="title-content">
      <a href="?show=surat-masuk">Surat Masuk</a> / <a href="#">Disposisi</a>
    </div>

    <?php
      include 'inc/fungsi.php';
      $fungsi = new Fungsi();
      $id_mail = $_GET['id_mail'];
      $dataSurat = "SELECT * FROM mail_in WHERE id_mail=$id_mail";
      $view = $fungsi->view($dataSurat);
    ?>

    <div class="containers">
      <div class="col-6"><a href="?show=td-disposisi&id_mail=<?php echo $id_mail ?>"><button type="button" name="button" class="btn-add-data">Tambah Disposisi</button></a></div>
      <hr class="hr-disposisi">

      <?php foreach ($view as $key => $row){ ?>
        <table>
          <tr>
            <td>Kode Surat</td>
            <td>:</td>
            <td><?php echo $row['mail_code'] ?></td>
          </tr>
          <tr>
            <td>Subjek</td>
            <td>:</td>
            <td><?php echo $row['subject'] ?></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php echo $row['mail_date'] ?></td>
          </tr>
          <tr>
            <td>Deskripsi</td>
            <td>:</td>
            <td class="dess"><?php echo $row['dess'] ?></td>
          </tr>
        </table>
      <?php } ?>
    </div>

    <div class="containertbl">
      <table class="col-12 table-data">
        <thead class="header-table-data">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Tujuan</th>
            <th style="width:420px;">Isi</th>
            <th>Sifat</th>
            <th style="width:100px;">Aksi</th>
          </tr>
        </thead>

        <?php
        $query = "SELECT * FROM disposition WHERE id_mail='$id_mail'";
        $no = 1;
        $result= $fungsi->view($query);
        ?>
        <tbody  id="data-table">
          <?php foreach ($result as $key => $row) { ?>
          <tr>
            <td><center><?php echo $no++; ?></center></td>
            <td><center><?php echo $row['disposition_date']; ?></center></td>
            <td><center><?php echo $row['disposition_at']; ?></center></td>
            <td class="dess"><?php echo $row['dess']; ?></td>
            <td><center><?php echo $row['notification'] ?></center></td>
            <td>
              <a class="btn-blu btn-aksi" href="index.php?show=u-disposisi&id_disposition=<?php echo $row['id_disposition']; ?>&id_mail=<?php echo $id_mail; ?>">Edit</a>
              <a class="btn-ylw btn-aksi" href="inc/print/print-disposisi.php?id_disposition=<?php echo $row['id_disposition']; ?>&id_mail=<?php echo $id_mail; ?>">Print</a>
              <a class="btn-red btn-aksi col-10" href="inc/delete/d-disposisi.php?id_disposition=<?php echo $row['id_disposition']; ?>&id_mail=<?php echo $id_mail; ?>">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


  </body>
</html>
