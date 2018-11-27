<?php
  include '../fungsi.php';

  $id_mail_out = $_GET['id_mail_out'];

  $table = "mail_out";
  $key ="id_mail_out='$id_mail_out'";

  $fungsi = new Fungsi();
  $result = $fungsi->delete($table,$key);
 
  if ($result) {
  ?>
  <script type="text/javascript">
    alert("Berhasil Hapus Data");
    location.href="../../index.php?show=surat-keluar";
  </script>
  <?php }else {?>
  <script type="text/javascript">
    alert("Gagal Hapus Data");
    location.href="../../index.php?show=surat-keluar";
  </script>
  <?php } ?>
