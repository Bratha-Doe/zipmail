<?php
  $id_mail = $_GET['id_mail'];
  session_start();
  include '../fungsi.php';
  $disposition_date = $_POST['disposition_date'];
  $disposition_at   = $_POST['disposition_at'];
  $notification     = $_POST['notification'];
  $dess             = $_POST['dess'];
  $id_user          = $_SESSION['id_user'];
 
  $table = "disposition";

  $field = "disposition_date,
            disposition_at,
            notification,
            dess,
            id_user,
            id_mail
            ";

  $value = "'$disposition_date',
            '$disposition_at',
            '$notification',
            '$dess',
            '$id_user',
            '$id_mail'
            ";

  $fungsi = new Fungsi();
  $result = $fungsi->post($table,$field,$value);

  if ($result) {
  ?>
  <script type="text/javascript">
    alert("Berhasil Tambah Disposisi");
    location.href="../../index.php?show=disposisi&id_mail=<?php echo $id_mail; ?>";
  </script>
  <?php }else { ?>
    <script type="text/javascript">
      alert("Gagal Tambah Disposisi");
      location.href="../../index.php?show=td-disposisi&id_mail=<?php echo $id_mail; ?>";
    </script>
  <?php } ?>
