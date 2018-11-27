<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data Surat Keluar</title>
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
    table tr td, th{
      border: 1px solid black;
      padding: 5px
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
    table tr td, th{
      border: 1px solid black;
      padding: 5px
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

    <table class="col-12 table-data">
        <tr>
          <th style="width:15px;">No</th>
          <th>Kode Surat</th>
          <th>Tujuan</th>
          <th style="width:350px;">Surat</th>
          <th>Tanggal</th>
        </tr>

      <?php
      include '../fungsi.php';
      $query = "SELECT * FROM mail_out";
      $no = 1;
      $fungsi = new Fungsi();
      $result= $fungsi->view($query);
      ?>
        <?php foreach ($result as $key => $row) { ?>
        <tr>
          <td><center><?php echo $no++; ?></center></td>
          <td> <?php echo $row['mail_code']; ?></td>
          <td><?php echo $row['mail_to']; ?></td>
          <td class="dess"><?php echo $row['subject']; ?> <hr><?php echo $row['dess']; ?> <hr>File : <?php echo $row['file']; ?></td>
          <td><center><?php echo $row['mail_date'] ?></center></td>
        </tr>
        <?php } ?>
    </table>
  </body>
</html>
