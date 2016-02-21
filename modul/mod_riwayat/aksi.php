<?php
session_start();

$act=$_GET[act];
include "../koneksi.php";
$noreg=$_POST[noreg];
$namapasien=$_POST[namapasien];
$tgllhr=$_POST[tgllhr];
$pekerjaan=$_POST[pekerjaan];
$alamat=$_POST[alamat];
$telpon=$_POST[telpon];
$jeniskel=$_POST[jeniskel];
$namakk=$_POST[namakk];
$tgldaftar=$_POST[tgldaftar];
if($_POST[simpan]){
	mysql_query("insert into tbl_pasien values('$noreg','$namapasien','$tgllhr','$pekerjaan','$alamat','$telpon','$jeniskel','$namakk','$tgldaftar')") or die (mysql_error());	
	}elseif($_POST[ubah]) {
	$q="update tbl_pasien set noreg='$noreg', namapasien='$namapasien', tgllhr='$tgllhr', pekerjaan='$pekerjaan', alamat='$alamat',telpon='$telpon', jeniskel='$jeniskel', namakk='$namakk', tgldaftar='$tgldaftar' where noreg	='$noreg'";
	mysql_query($q)or die(mysql_error());
	}elseif($act=='hapus'){
	mysql_query("delete from tbl_pasien where noreg='$_GET[noreg]'");	
	}

header("location:../../mod.php?mod=pasien");

?>