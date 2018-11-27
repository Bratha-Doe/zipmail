<?php
  session_start();
  include '../fungsi.php';
  $mail_code            = $_POST['mail_code'];
  $mail_date            = $_POST['mail_date'];
  $mail_to              = $_POST['mail_to'];
  $mail_type            = $_POST['mail_type'];
  $subject              = $_POST['subject'];
  $dess                 = $_POST['dess'];
  $file                 = $_FILES['file']['name'];
  $id_user              = $_SESSION['id_user'];
 
  //file $lokasi
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="../../assets/file/";

  //inisialisasi table Fungsi
  $table = "mail_out";

  $field = "mail_code,
            mail_date,
            mail_to,
            id_mail_type,
            subject,
            dess,
            id_user,
            file
            ";

  $value = "'$mail_code',
            '$mail_date',
            '$mail_to',
            '$mail_type',
            '$subject',
            '$dess',
            '$id_user',
            ";

  $files = "'$file'";

  $fungsi = new Fungsi();
  $result = $fungsi->postWfile($table,$field,$value,$files);

  if ($result) {
    move_uploaded_file($lokasi, "$dir$file");
 ?>
 <script type="text/javascript">
   alert("Berhasil Tambah Data Surat Keluar");
   location.href="../../index.php?show=surat-keluar";
 </script>
 <?php }else { ?>
   <script type="text/javascript">
     alert("Gagal Tambah Data");
     location.href="../../index.php?show=td-surat-keluar";
   </script>
 <?php } ?>
