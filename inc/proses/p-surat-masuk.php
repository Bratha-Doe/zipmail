<!-- proses -->
<?php
  session_start();
  include '../fungsi.php';
  $mail_code          = $_POST['mail_code'];
  $incoming_at        = $_POST['incoming_at'];
  $mail_date          = $_POST['mail_date'];
  $mail_from          = $_POST['mail_from'];
  $mail_to            = $_POST['mail_to'];
  $subject            = $_POST['subject'];
  $dess               = $_POST['dess'];
  $mail_type          = $_POST['mail_type'];
  $file               = $_FILES['file']['name'];
  $id_user            = $_SESSION['id_user'];
 
  // file lokasi
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="../../assets/file/";

  // inisialisasi table fungsi
  $table = "mail_in";

  $field = "mail_code,
            incoming_at,
            mail_date,
            mail_from,
            mail_to,
            subject,
            dess,
            id_mail_type,
            id_user,
            status,
            file
            ";

  $value = "'$mail_code',
            '$incoming_at',
            '$mail_date',
            '$mail_from',
            '$mail_to',
            '$subject',
            '$dess',
            '$mail_type',
            '$id_user',
            '0',
            ";

  $files = "'$file'";

  $fungsi = new Fungsi();
  $result = $fungsi->postWfile($table,$field,$value,$files);

  if ($result) {
    move_uploaded_file($lokasi,"$dir$file");
    ?>
    <script type="text/javascript">
      alert('Berhasil Tambah Surat Masuk');
      location.href="../../index.php?show=surat-masuk";
    </script>
    <?php
    }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Tambah Data');
      location.href="../../index.php?show=td-surat-masuk";
    </script>
    <?php } ?>
