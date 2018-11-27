<?php
  class Koneksi
  {
  public function __construct(){
    $this->connect = new mysqli('localhost','root','','mail');
  }
  }
 
  class Backup extends Koneksi
  {
    public function do_(){
      $date = date('Y-m-d');
      $cmd = "C:/xampp/mysql/bin/mysqldump -h localhost -u root mail > backup_".$date.".sql";
      exec($cmd);
      readfile('backup_'.$date.'.sql');
      header("Content-disposition: attachment; filename='backup_".$date.".sql'");
    }
  }


  class Fungsi extends Koneksi
  {
    public function __construct()
    {
      parent::__construct();
    }

  // KONEKSI DB
  public function execute($query){
		$result = $this->connect->query($query);
    return $result;
	}
  // POST
  public function post($table,$field,$value){
    $query = "INSERT INTO $table($field) VALUES($value)";
    $result = $this->execute($query);

    if ($result == false) {
      echo mysqli_error($this->connect);
      return false;
    }else {
      return true;
    }
  }

  // POST WITH FILE
  public function postWfile($table,$field,$value,$files){
    // FILE ADA = VALUE + FILE
    $allVal = $value.$files;
    // FILE KOSONG = VALUE + "-"
    $filesKosong = "'-'";
    $allValKos = $value.$filesKosong;

    if ($files=="''") {
      // echo $allValKos;
      $query = "INSERT INTO $table($field) VALUES($allValKos)";
    }else {
      // echo $allVal;
      $query = "INSERT INTO $table($field) VALUES($allVal)";
    }

    $result = $this->execute($query);

    if ($result == false) {
      echo mysqli_error($this->connect);
      return false;
    }else {
      return true;
    }
  }

// UPDATE
  public function update($table,$set,$key){
    $query = "UPDATE $table SET $set WHERE $key";

    $result = $this->execute($query);

    if ($result == false) {
      echo mysqli_error($this->connect);
      return false;
    }else {
      return true;
    }
  }

// UPDATE W File
  public function updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus){
    // $set = set tanpa file  -> setFile = setW/File

    if ($chckFiles == "''") {
      $query = "UPDATE $table SET $set WHERE $key";
    }else {
      $query = "UPDATE $table SET $setFile WHERE $key";
      if (file_exists($fileHapus)) {
        unlink($fileHapus);
      }
    }

    $result = $this->execute($query);

    if ($result == false) {
      echo mysqli_error($this->connect);
      return false;
    }else {
      return true;
    }
  }

// DELETE
  public function delete($table, $key){
    $query = "DELETE FROM $table WHERE $key";

    $result = $this->execute($query);

    if ($result == false) {
      echo mysqli_error($this->connect);
      return false;
    }else {
      return true;
    }
  }

// VIEW DATA
  public function view($query){
    $result = $this->connect->query($query);

    if ($result == false) {
      return false;
    }

    $rows = array();

    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }

    return $rows;
  }
}
?>
