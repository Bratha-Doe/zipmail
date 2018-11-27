<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="title-content">
      <a href="?show=user">Managemen User</a> / <a href="#">Tambah Data</a>
    </div>

    <div class="containers">
      <form class="" action="inc/proses/p-user.php" enctype="multipart/form-data" autocomplete="off" method="post">

        <table class="col-12">
          <span class="col-6" style="float:left;">
            <div class="from-grup">
              <p class="label-form-grup">Nama Lengkap :</p>
              <div class="input-form-group">
                <input type="text" name="fullname" value="" placeholder="Nama Lengkap" >
              </div>
            </div>
            <div class="from-grup">
              <p class="label-form-grup">Username :</p>
              <div class="input-form-group">
                <input type="text" name="username" value="" placeholder="Username" >
              </div>
            </div>
          </span>

          <span class="col-6" style="float:right">
            <div class="from-grup">
              <p class="label-form-grup">Password :</p>
              <div class="input-form-group">
                <input type="text" name="password" value="" placeholder="Password" >
              </div>
            </div>

            <div class="from-grup">
              <p class="label-form-grup">Level :</p>
              <div class="input-form-group">
                <select class="" name="level">
                  <option value="kepala_kantor">Kepala Kantor</option>
                  <option value="resepsionis">Resepsionis</option>
                </select>
              </div>
            </div>
          </span>
        </table>

        <input type="submit" name="" value="Kirim" class="btn-blu btn-submit">
        <input type="reset" name="" value="Reset" class="btn-red btn-submit">

      </form>
    </div>

  </body>
</html>
