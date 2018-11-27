<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Disposisi</title>
  </head>

  <style>

  @media screen {
    *{
      margin: 0;
      overflow-x: hidden;
    }
    .header{
      display: block;
      width: 100%;
      background-color: #448aff;
      padding: 15px 40px;
      margin-bottom: 30px;
    }
    .header a{
      color: white;
      text-decoration: none;
    }
    table{
      width: 97%;
      border-collapse: collapse;
      margin: 0 20px;
    }
    table tr{
      border: 1px solid black;
    }
    table tr td{
      padding: 10px 5px;
    }
    .tanda-tangan{
      float: right;
    }
    .tt-atas{
      margin: 30px 0 90px 0;
    }
    .dess{
      text-align: justify;
    }
  }

  @media print {
    .header{
      display: none;
    }
    table{
      width: 100%;
      border-collapse: collapse;
    }
    table tr{
      border: 1px solid black;
    }
    table tr td{
      padding: 10px 5px;
    }
    .tanda-tangan{
      float: right;
    }
    .tt-atas{
      margin: 30px 0 90px 0;
    }
    .dess{
      text-align: justify;
    }
  }

  </style>

  <body onload="window.print()">

    <?php
      include '../fungsi.php';
      $id_disposition = $_GET['id_disposition'];
      $id_instansi = "1";
      $query = "SELECT * FROM disposition WHERE id_disposition='$id_disposition'";
      $queryinstansi = "SELECT * FROM instansi";
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
      $resultinstansi = $fungsi->view($queryinstansi);
    ?>

    <div class="header">
      <a href="../../index.php?show=data-disposisi">KEMBALI</a>
    </div>

    <table>
      <?php foreach ($resultinstansi as $key => $row) { ?>
        <tr>
          <td>
            <img src="../../assets/file/<?php echo $row['file']; ?>" alt="" width="100px">
          </td>
          <td>
            <center>
              <?php echo $row['instansi_name']; ?><br>
              <?php echo $row['address']; ?>. Telp :<?php echo $row['telp']; ?>. Fax :<?php echo $row['fax']; ?><br>
              website :<?php echo $row['website']; ?>. Kontak :<?php echo $row['contact']; ?>
            </center>
          </td>
        </tr>
      <?php } ?>
    </table>

    <table>
      <?php foreach ($result as $key => $row) { ?>
      <tr>
        <td>Tujuan </td><td>:</td>
        <td><?php echo $row['disposition_at']; ?></td>
      </tr>
      <tr>
        <td>Tanggal </td><td>:</td>
        <td><?php echo $row['disposition_date']; ?></td>
      </tr>
      <tr>
        <td>Isi </td><td>:</td>
        <td class="dess"><?php echo $row['dess']; ?></td>
      </tr>
        <td>Sifat</td><td>:</td>
        <td><?php echo $row['notification']; ?></td>
      </tr>
    <?php } ?>
    </table>
    <div class="tanda-tangan">
      <div class="tt-atas">
        Tanggal, <?php echo date('d  F  Y'); ?>
      </div>
      <div class="tt-bawah">
        ............................................
      </div>
    </div>

  </body>
</html>
