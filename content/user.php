<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body class="col-12">
    <div class="title-content">
      <a href="#">Management User</a>
    </div>

    <div class="containers sm-up-containers">
      <span class="col-6"><input id="search-data" type="text" name="" value="" placeholder="Cari Data"></span>
      <div class="col-6"><a href="?show=td-user"><button type="button" name="button" class="btn-add-data">Tambah Data</button></a></div>
    </div>

    <div class="containertbl sm-dwn-containers">
      <table class="col-12 table-data">
        <thead class="header-table-data">
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
            <th style="width:130px;">Aksi</th>
          </tr>
        </thead>

        <?php
        include 'inc/fungsi.php';
        $query = "SELECT * FROM user";
        $no = 1;
        $fungsi = new Fungsi();
        $result= $fungsi->view($query);
        ?>
        <tbody  id="data-table">
          <?php foreach ($result as $key => $row) { ?>
          <tr>
            <td><center><?php echo $no++; ?></center></td>
            <td><center><?php echo $row['fullname']; ?></center></td>
            <td><center><?php echo $row['username']; ?></center></td>
            <td><center><?php echo $row['password']; ?></center></td>
            <td><center><?php echo $row['level'] ?></center></td>
            <td>
              <a class="btn-blu btn-aksi" href="index.php?show=u-user&id_user=<?php echo $row['id_user'] ?>">Edit</a>
              <a class="btn-red btn-aksi" href="inc/delete/d-user.php?id_user=<?php echo $row['id_user']; ?>">Delete</a>
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
