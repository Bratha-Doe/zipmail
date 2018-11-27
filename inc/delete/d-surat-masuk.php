<?php
  include '../fungsi.php';

  $id_mail = $_GET['id_mail'];

  $table = "mail_in";
  $key = "id_mail='$id_mail'";

  $fungsi = new Fungsi();
  $result = $fungsi->delete($table,$key);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Hapus');
      location.href="../../index.php?show=surat-masuk";
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Hapus Data');
      location.href="../../index.php?show=surat-masuk";
    </script>
    <?php
  }
   ?>
