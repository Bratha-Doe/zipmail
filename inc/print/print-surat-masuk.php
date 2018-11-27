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
    table tr{
      border: 1px solid black;
    }
    table tr td{
      padding: 10px 5px;
    }
    .tanda-tangan{
      float: right;
      margin-top: 40px;
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
      margin-top: 40px;
    }
    .dess{
      text-align: justify;
    }
  }

  </style>

  <body onload="window.print()">

    <div class="header">
      <a href="../../index.php?show=surat-masuk">KEMBALI</a>
    </div>

    <?php
      include '../fungsi.php';
      $id_mail = $_GET['id_mail'];
      $query = "SELECT * FROM mail_in WHERE id_mail='$id_mail'";
      $fungsi = new Fungsi();
      $result = $fungsi->view($query);
    ?>

    <table>
      <?php foreach ($result as $key => $row) { ?>
      <tr>
        <td style="width:180px">Kode Surat</td><td>:</td>
        <td><?php echo $row['mail_code']; ?></td>
      </tr>
      <tr>
        <td style="width:180px">Tanggal Surat Datang</td><td>:</td>
        <td><?php echo $row['incoming_at']; ?></td>
      </tr>
      <tr>
        <td style="width:180px">Tanggal Surat</td><td>:</td>
        <td><?php echo $row['mail_date']; ?></td>
      </tr>
      <tr>
        <td style="width:180px">Surat Dari</td><td>:</td>
        <td><?php echo $row['mail_from']; ?></td>
      </tr>
      <tr>
        <td style="width:180px">Surat Untuk</td><td>:</td>
        <td><?php echo $row['mail_to']; ?></td>
      </tr>
      <tr>
        <td style="width:180px">Subjek</td><td>:</td>
        <td><?php echo $row['subject']; ?></td>
      </tr>
      <td style="width:180px">Isi Surat</td><td>:</td>
      <td class="dess"><?php echo $row['dess']; ?></td>
    <?php } ?>
    </table>
    <div class="tanda-tangan">
      <div class="tt-atas">
        Tanggal, <?php echo date('d  F  Y'); ?>
      </div>
      <br><br><br><br>
      <div class="tt-bawah">
        ............................................
      </div>
    </div>

  </body>
</html>
