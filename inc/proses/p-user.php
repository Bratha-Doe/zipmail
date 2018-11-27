<?php
  session_start();
  include '../fungsi.php';
  $fullname           = $_POST['fullname'];
  $username           = $_POST['username'];
  $password           = $_POST['password'];
  $level              = $_POST['level'];
 
  $table = "user";

  $field = "fullname,
            username,
            password,
            level
            ";

  $value = "'$fullname',
            '$username',
            '$password',
            '$level'
            ";

  $fungsi = new Fungsi();
  $result = $fungsi->post($table,$field,$value);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Tambah Surat Masuk');
      location.href="../../index.php?show=user";
    </script>
    <?php
    }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Tambah Data');
      location.href="../../index.php?show=td-user";
    </script>
    <?php } ?>
