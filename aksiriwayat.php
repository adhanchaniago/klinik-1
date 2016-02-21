<?php
error_reporting(E_ALL);
$act=$_GET['act'];
include "config/koneksi.php";
$noreg=$_POST['noreg'];
$idpasien=$_POST['idpasien'];
$dokter=$_POST['dokter'];
$riwayat=$_POST['riwayat'];
$idriwayat=$_POST['idriwayat'];
$keterangan=$_POST['keterangan'];
if($act=='input'){
	mysql_query("insert into tbl_riwayat values('$idpasien','$idriwayat','$dokter','$riwayat','$keterangan')") or die (mysql_error());	
	}elseif($act=='edit') {
	$q="update tbl_riwayat set riwayat='$dokter','$riwayat', keterangan='$keterangan' where idriwayat	='$idriwayat'";
	mysql_query($q)or die(mysql_error());
	}elseif($act=='hapus'){
	mysql_query("delete from tbl_riwayat where idriwayat='$_GET[idriwayat]'");	
	}

header("location:view.php?idpasien=$_GET[idpasien]&noreg=$_GET[noreg]");

?>

