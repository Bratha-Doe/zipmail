<?php
  include '../fungsi.php';

  $id_disposition = $_GET['id_disposition'];

  $table = "disposition";
  $key = "id_disposition='$id_disposition'";
 
  $fungsi = new Fungsi();
  $result = $fungsi->delete($table,$key);

  if ($result) {
  ?>
  <script type="text/javascript">
    alert("Berhasil Hapus Data");
    location.href="../../index.php?show=data-disposisi"
  </script>
  <?php }else { ?>
  <script type="text/javascript">
    alert("Gagal Hapus Data");
  </script>
  <?php } ?>
