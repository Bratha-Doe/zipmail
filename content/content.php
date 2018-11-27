<?php

if(isset($_GET['show'])){
  $show=$_GET['show'];
}else {
  $show = "home";
}

if ($show == "home") {
  include ('content/home.php');
}elseif ($show == "surat-masuk") {
  include ('content/surat-masuk.php');
}elseif ($show == "surat-keluar") {
  include ('content/surat-keluar.php');
}elseif ($show == "disposisi") {
  include ('content/disposisi.php');
}elseif ($show == "user") {
  include ('content/user.php');
}elseif ($show == "instansi") {
  include ('content/instansi.php');
}elseif ($show == "restore") {
  include ("content/restore.php");
}

//disposisi
elseif ($show == "disposisi") {
  include ('content/disposisi.php');
}elseif ($show == "data-disposisi") {
  include ('content/data-disposisi.php');
}

// tambah Data
elseif ($show == "td-surat-masuk") {
  include ('content/td-surat-masuk.php');
}elseif ($show == "td-disposisi") {
  include ('content/td-disposisi.php');
}elseif ($show == "td-surat-keluar") {
  include ('content/td-surat-keluar.php');
}elseif ($show == "td-user") {
  include ('content/td-user.php');
}

//update
elseif ($show == "u-surat-masuk") {
  include ('inc/update/u-surat-masuk.php');
}elseif ($show == "u-surat-keluar") {
  include ('inc/update/u-surat-keluar.php');
}elseif ($show == "u-disposisi") {
  include ('inc/update/u-disposisi.php');
}elseif ($show == "u-data-disposisi") {
  include ('inc/update/u-data-disposisi.php');
}elseif ($show == "u-user") {
  include ('inc/update/u-user.php');
}elseif ($show == "u-instansi") {
  include ('inc/update/u-instansi.php');
}
 ?>
