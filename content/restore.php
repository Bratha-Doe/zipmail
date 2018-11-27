<style media="screen">
  h3{
    text-align: justify;
    font-weight: normal;
    padding: 10px 10px 30px 10px;
    font-size: 16px;
    width: 500px
  }
</style>

<body>
  <div class="title-content">
    <a href="?show=home">Dashboard</a> / <a href="#">Restore</a>
  </div>
  <br>

  <?php
    include 'inc/fungsi.php';
    include 'inc/restore.php';

    $fungsi = new Fungsi();
    if (isset($_POST['submit'])) {
      $fileku = $_FILES['res'];
      $setting->restore($fileku);
    }
  ?>

  <div class="containers">
    <h3>*)  Hati-hati dalam merestore basisdata. Pastikan anda merestore basisdata yang terbaru. Backup basisdata secara berkala untuk mencegah hilanggnya data akibat kerusakan program. Perhatikan sekali lagi sebelum menekan tombol Restore </h3>

    <form class="" action="" method="post" enctype="multipart/form-data">
      <input type="file" name="res" value="Restore">
      <input type="submit" name="submit" value="Restore">
    </form>
  </div>
</body>
