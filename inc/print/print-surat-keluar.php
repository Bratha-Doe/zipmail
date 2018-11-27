<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Surat Masuk</title>
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
    table tr td{
      padding: 10px 5px;
    }
    hr{

      border: 2px solid black;
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
    table tr td{
      padding: 10px 5px;
    }
    hr{

      border: 2px solid black;
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

    <div class="header">
      <a href="../../index.php?show=surat-keluar">KEMBALI</a>
    </div>

    <?php
      include '../fungsi.php';
      $id_mail_out = $_GET['id_mail_out'];
      $id_instansi = "1";
      $query = "SELECT * FROM mail_out WHERE id_mail_out='$id_mail_out'";
      $queryinstani = "SELECT * FROM instansi";
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
      $resultinstansi = $fungsi->view($queryinstani);
    ?>

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

    <hr>

    <table>
      <?php foreach ($result as $key => $row) { ?>
      <tr>
        <td style="width:100px;">Nomor</td><td>:</td>
        <td><?php echo $row['mail_code']; ?></td>
      </tr>
      <tr>
        <td style="width:100px">Hal</td><td>:</td>
        <td>
          <?php
          if ($row['id_mail_type']==1) {
            echo "Pemberitahuan";
          }else {
            echo "Undangan";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td style="width:100px;">Tanggal</td><td>:</td>
        <td><?php echo $row['mail_date']; ?></td>
      </tr>
      <tr>
        <td style="width:100px;">Kepada</td><td>:</td>
        <td><?php echo $row['mail_to']; ?></td>
      </tr>
      <tr>
        <td style="width:100px;">Subjek</td><td>:</td>
        <td><?php echo $row['subject']; ?></td>
      </tr>
      <tr>
        <td style="width:100px;"></td><td></td>
        <td class="dess"><?php echo $row['dess']; ?></td>
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
