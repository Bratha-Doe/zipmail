<?php
class Restore
{

	function __construct()
	{
		$this->connection = mysqli_connect('localhost','root','','mail');
	}

	function restore($fileku)
	{
		$koneksi = mysqli_connect('localhost','root','','test');
		$dir='db/';

		$nama_file = $fileku['name'];
		$tmp_file = $fileku['tmp_name'];
		if($nama_file == "")
		{
			echo "Error !";
		}
		else
		{
			$alamat_file = $dir.$nama_file;
			$templine = array();
			$eks = array('sql');
			$x = explode(".", $nama_file);
			$ekstensi = end($x);
			if(in_array($ekstensi, $eks))
			{
			if(move_uploaded_file($tmp_file, $alamat_file))
			{
				$templine = '';
				$lines = file($alamat_file);
				foreach ($lines as $line)
				{
					if(substr($line, 0, 2) == '--' || $line == '')
						continue;
					$templine .= $line;
					if(substr(trim($line), -1, 1) == ';')
					{
						mysqli_query($koneksi,$templine);
						$templine = '';
					}
				}
        ?>
        <script type="text/javascript">
          alert("Berhasil Restore");
					localtion.href="../index.php?show=home";
        </script>
      <?php
			}
			else
			{
      ?>
			<script type="text/javascript">
        alert("Gagal Restore");
      </script>
      <?php
			}
			}
			else
			{
      ?>
			<script type="text/javascript">
        alert("Format Salah");
      </script>
      <?php
			}
		}
 
	}
}
$setting = new Restore();
?>
