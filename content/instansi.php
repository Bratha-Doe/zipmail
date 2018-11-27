<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body class="col-12">
    <div class="title-content">
      <a href="#">Instansi</a>
    </div>
 
    <div class="containers">

        <?php
          include 'inc/fungsi.php';
          $query ="SELECT * FROM instansi";
          $fungsi = new Fungsi();
          $result = $fungsi->view($query);
        ?>


        <?php foreach ($result as $key => $row) { ?>
          <div class="instansi-container">
          <table>
            <tr>
              <td class="instansi-logo">
                <div><img src="assets/file/<?php echo $row['file']; ?>" alt="" width="150px"></div>
              </td>
              <td class="instansi-isi">
                <table>
                  <tr>
                    <td>Nama Instansi</td><td>:</td>
                    <td><?php echo $row['instansi_name'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td><td>:</td>
                    <td><?php echo $row['address'] ?></td>
                  </tr>
                  <tr>
                    <td>Telp</td><td>:</td>
                    <td><?php echo $row['telp'] ?></td>
                  </tr>
                  <tr>
                    <td>Fax</td><td>:</td>
                    <td><?php echo $row['fax'] ?></td>
                  </tr>
                  <tr>
                    <td>Website</td><td>:</td>
                    <td><?php echo $row['website'] ?></td>
                  </tr>
                  <tr>
                    <td>kontak</td><td>:</td>
                    <td><?php echo $row['contact'] ?></td>
                  </tr>
                </table>
              </td>
              <td class="instansi-edit">
                <a href="index.php?show=u-instansi&id_instansi=<?php echo $row['id_instansi'] ?>"><i class=" fa fa-cog fa-2x"></i> </a>
              </td>
            </tr>
          </table>
          </div>
        <?php } ?>
    </div>

  </body>
</html>
