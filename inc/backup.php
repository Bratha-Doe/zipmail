<?php
  include 'fungsi.php';

  $backup = new Backup();
  ob_start();
  $do = $backup->do_();
 
 ?>
