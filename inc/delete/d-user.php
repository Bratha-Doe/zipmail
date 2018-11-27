<?php
  include '../fungsi.php';

  $id_user = $_GET['id_user'];

  $table = "user";
  $key = "id_user='$id_user'";

  $fungsi = new Fungsi();
  $result = $fungsi->delete($table,$key);
 
  if ($result) {
  ?>
  <script type="text/javascript">
    alert("Berhasil Hapus Data");
    location.href="../../index.php?show=user"
  </script>
  <?php }else { ?>
  <script type="text/javascript">
    alert("Gagal Hapus Data");
  </script>
  <?php } ?>
