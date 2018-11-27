<?php
class Jumlah extends Koneksi
{

  public function __construct(){
      parent::__construct();
  }

  //jumlah data
  function get_data($table)
  {
    $query = "SELECT COUNT(*) as total from $table";
    $eksekusi = $this->connect->query($query);
    $data = $eksekusi->fetch_assoc();
    return $data['total'];
  }

}
$jumlah = new Jumlah();
?>
