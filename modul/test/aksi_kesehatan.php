<?php
include "koneksi.php";
$act=$_GET[act];
$jenis=$_GET[jenis];

// =======================================================================================

//hapus Perum
if ($jenis=='kesehatan' AND $act=='hapus'){
  mysql_query("DELETE FROM tbl_aset WHERE kd_aset='$_GET[kd_aset]'");
  header('location:editkesehatan.php');
}

// Update Perum
elseif ($jenis=='kesehatan' AND $act=='edit_kesehatan'){
  mysql_query("UPDATE tbl_aset SET kd_aset ='$_POST[kd_aset]',
				nama 	   = '$_POST[nama]',   
                                   nama_fasilitas  = '$_POST[nama_fasilitas]', 
                                   deskripsi       = '$_POST[deskripsi]',
                                   lat             = '$_POST[lat]', 
                                   lng             = '$_POST[lng]'
			WHERE kd_aset  = '$_POST[kd_aset]'");
	header('location:editkesehatan.php');
}
?>
