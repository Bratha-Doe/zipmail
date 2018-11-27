<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body class="col-12">
    <div class="title-content">
      <a href="#">Surat Masuk</a>
    </div>

    <div class="containers sm-up-containers">
      <span class="col-6"><input id="search-data" type="text" name="" value="" placeholder="Cari Data"></span>
      <div class="col-3">
        <?php
          $level = $_SESSION['level'];
          if ($level == "admin") {
        ?>
        <a href="inc/print/print-all-surat-masuk.php"><button type="button" name="button" class="btn-print-data">Print</button></a>
        <a href="?show=td-surat-masuk"><button type="button" name="button" class="btn-add-data">Tambah Data</button></a>
        <?php
          }elseif ($level == "kepala_kantor") {
        ?>

        <?php
          }elseif ($level == "resepsionis") {
        ?>
        <a href="inc/print/print-all-surat-masuk.php"><button type="button" name="button" class="btn-print-data">Print</button></a>
        <a href="?show=td-surat-masuk"><button type="button" name="button" class="btn-add-data">Tambah Data</button></a>
        <?php
          }
        ?>
      </div>
    </div>

    <div class="containertbl sm-dwn-containers">
      <table class="col-12 table-data">
        <thead class="header-table-data">
          <tr>
            <th>No</th>
            <th style="width:200px">Kode Surat</th>
            <th style="width:140px">Dari-Ke</th>
            <th style="width:480px;">Surat</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th style="width:100px;">Aksi</th>
          </tr>
        </thead>

        <?php
        include 'inc/fungsi.php';
        $query = "SELECT * FROM mail_in";
        $no = 1;
        $fungsi = new Fungsi();
        $result= $fungsi->view($query);
        ?>
        <tbody  id="data-table">
          <?php foreach ($result as $key => $row) { ?>
          <tr>
            <td><center><?php echo $no++; ?></center></td>
            <td> <?php echo $row['mail_code']; ?></td>
            <td><?php echo $row['mail_from']; ?> <hr><?php echo $row['mail_to']; ?></td>
            <td class="dess"><?php echo $row['subject']; ?> <hr><?php echo substr($row['dess'],0,200).".."; ?> <hr>File : <a class="link-file" target="_blank" href="inc/file/lihat-file.php?file=<?php echo $row['file']; ?>"> <?php echo $row['file']; ?></a> </td>
            <td><center><?php echo $row['mail_date'] ?></center></td>
            <td>
              <center>
                <?php
                if ($row['status']==1) {
                  ?>
                  <i class="fa fa-check btn-status-sdh"></i>
                  <?php
                }else {
                  ?>
                  <i class="fa fa-times btn-status-blm"></i>
                  <?php
                }
                 ?>
              </center>
            </td>
            <td>
              <?php
                $level = $_SESSION['level'];
                if ($level == "admin") {
              ?>
                <a class="btn-blu btn-aksi" href="index.php?show=u-surat-masuk&id_mail=<?php echo $row['id_mail'] ?>">Edit</a>
                <a class="btn-ylw btn-aksi" href="inc/print/print-surat-masuk.php?id_mail=<?php echo $row['id_mail']; ?>">Print</a>
                <a class="btn-red btn-aksi col-10" href="inc/delete/d-surat-masuk.php?id_mail=<?php echo $row['id_mail']; ?>">Delete</a>
                <a class="btn-grn btn-aksi col-10" href="?show=disposisi&id_mail=<?php echo $row['id_mail'] ?>">Disposisi</a>
              <?php
                }elseif ($level == "kepala_kantor") {
              ?>
                <a class="btn-grn btn-aksi col-10" href="?show=disposisi&id_mail=<?php echo $row['id_mail'] ?>">Disposisi</a>
              <?php
                }elseif ($level == "resepsionis") {
              ?>
                <a class="btn-blu btn-aksi" href="index.php?show=u-surat-masuk&id_mail=<?php echo $row['id_mail'] ?>">Edit</a>
                <a class="btn-ylw btn-aksi" href="inc/print/print-surat-masuk.php?id_mail=<?php echo $row['id_mail']; ?>">Print</a>
                <a class="btn-red btn-aksi col-10" href="inc/delete/d-surat-masuk.php?id_mail=<?php echo $row['id_mail']; ?>">Delete</a>
              <?php
                }
              ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </body>
</html>

<script type="text/javascript">
  document.getElementById('search-data').onkeyup = function () {
    var filter,table,tr,i;
    filter = document.getElementById('search-data').value.toLowerCase();
    table = document.getElementById('data-table');
    tr = table.getElementsByTagName('tr');
    for (var i = 0; i < tr.length; i++){
      if(tr[i].innerHTML.toLowerCase().indexOf(filter) > -1){
        tr[i].style.display = "";
      }else {
        tr[i].style.display = "none";
      }
    }
  }
</script>
