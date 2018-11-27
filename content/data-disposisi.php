<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body class="col-12">
    <div class="title-content">
      <a href="#">Data Disposisi</a>
    </div>

    <div class="containers sm-up-containers">
      <span class="col-6"><input id="search-data" type="text" name="" value="" placeholder="Cari Data"></span>
      <div class="col-6">
        <a href="inc/print/print-all-disposisi.php"><button type="button" name="button" class="btn-print-data">Print</button></a>
      </div>
    </div>

    <div class="containertbl sm-dwn-containers">
      <table class="col-12 table-data">
        <thead class="header-table-data">
          <tr>
            <th>No</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th style="width:350px;">Isi  </th>
            <th>Sifat</th>
            <th>Kode Surat</th>
            <th style="width:100px;">Aksi</th>
          </tr>
        </thead>

        <?php
        include 'inc/fungsi.php';
        $query = "SELECT * FROM view_disposition";
        $no = 1;
        $fungsi = new Fungsi();
        $result= $fungsi->view($query);
        ?>
        <tbody  id="data-table">
          <?php foreach ($result as $key => $row) { ?>
          <tr>
            <td><center><?php echo $no++; ?></center></td>
            <td><center><?php echo $row['disposition_at']; ?></center></td>
            <td><center><?php echo $row['disposition_date']; ?></center></td>
            <td class="dess"><?php echo substr($row['dess'],0,200).".."; ?></td>
            <td><center><?php echo $row['notification'] ?></center></td>
            <td><center><?php echo $row['mail_code']; ?></center></td>
            <td>
              <?php
                $level = $_SESSION['level'];
                if ($level == "admin") {
              ?>
              <a class="btn-blu btn-aksi" href="index.php?show=u-data-disposisi&id_disposition=<?php echo $row['id_disposition']; ?>">Edit</a>
              <a class="btn-ylw btn-aksi" href="inc/print/print-data-disposisi.php?id_disposition=<?php echo $row['id_disposition']; ?>">Print</a>
              <a class="btn-red btn-aksi col-10" href="inc/delete/d-data-disposisi.php?id_disposition=<?php echo $row['id_disposition']; ?>">Delete</a>
              <?php
                }elseif ($level == "kepala_kantor") {
              ?>
              <a class="btn-blu btn-aksi col-10" href="index.php?show=u-data-disposisi&id_disposition=<?php echo $row['id_disposition']; ?>">Edit</a>
              <a class="btn-red btn-aksi col-10" href="inc/delete/d-data-disposisi.php?id_disposition=<?php echo $row['id_disposition']; ?>">Delete</a>
              <?php
                }elseif ($level == "resepsionis") {
              ?>
              <a class="btn-ylw btn-aksi col-10" href="inc/print/print-data-disposisi.php?id_disposition=<?php echo $row['id_disposition']; ?>">Print</a>
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
