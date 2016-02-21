
<?php
include "../koneksi.php";
error_reporting(E_ALL);
if($_POST){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	if(!empty($username) and !empty($password)){
		
		$sql = "insert into tbl_user values('','$username','$password')";
		$query = mysql_query($sql);
		
		if($query){
			echo "Data berhasil di input ";
		}
		else{
			echo "Data gagal di input";
		}
	}
	else{
		die("Password dan username tidak boleh kosong <a href='mod.php?mod=tambah'>Kembali</a>");
		}
	}

else{
	?>
	<form method="post" enctype="form-data/multipart">
	<input type="text" name="username" placeholder="Masukkan Username" /><br/>
	<input type="password" name="password" placeholder="Masukkan Password" /><br/>
	<input type="submit" name="submit" value="Tambah" /><br/>
	</form>
<?php }




?>