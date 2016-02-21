<?php
session_start();
error_reporting(0);
include "../../timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:../../logout.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include "koneksi.php";
include"class_paging.php";
?>



<script src="js/jquery-1.8.2.js"></script>
	<script src="js/ui.core.js"></script>
	<script src="js/ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker1" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		$("#datepicker1").datepicker("option","dateFormat","dd-mm-yy");
	});
	</script>

<?php
session_start();
error_reporting(0);
include "../../timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:../../logout.php');
}

?>

<link rel="stylesheet" type="text/css" href="../../css/960.css" />
<link rel="stylesheet" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../css/text.css" />
<link rel="stylesheet" type="text/css" href="../cssmod/blue.css"/>
<link type="text/css" href="../../css/smoothness/ui.css" rel="stylesheet" />
<link type="text/css" href="../../js/wysiwyg/jquery.wysiwyg.css" rel="stylesheet" />
    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/wysiwyg/jquery.wysiwyg.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#wysiwyg').wysiwyg();
	});
    </script>    
    <script type="text/javascript" src="../../js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="../../js/ui.core.js"></script>
	<script type="text/javascript" src="../../js/ui.sortable.js"></script>    
    <script type="text/javascript" src="../../js/ui.dialog.js"></script>
    <script type="text/javascript" src="../../js/effects.js"></script>
    <!--[if IE6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
    <![endif]-->
    <!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>    
    <![endif]-->
</head>   
</head><body>
 
 <form name="form1" method="get" action="">
Cari berdasarkan Nama pasien : <input type="text" name="q" id="q"/> <input type="submit" value="Cari" />
<a href='mod.php?mod=riwayat' class='button_grey' name="q" id="q"><span>Cari</span></a>
</form><td></td><p>
<!-- menampilkan hasil pencarian -->
 <?php

if(isset($_GET['q']) && $_GET['q']){
	$q = $_GET['q'];
	$sql = "select * from tbl_pasien where noreg like '%$q%' or 
	namapasien like '%$q%' or alamat like '%$q%' or namakk like '%$q%'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0){
		?>
		<table>
			<tr>
				<td><center>no reg</center> </font></td>
				<td>nama pasien</td>
				<td>tanggal lahir</td>
				<td>pekerjaan</td>
				<td>alamat</td>
				<td>telpon</td>
				<td>jenis kelamin</td>
				<td>nama kk</td>
				<td>tanggal daftar</td>
            <td>Aksi</td>
			</tr>
			<?php
			while($aset = mysql_fetch_array($result)){?>
			<tr>
				<td><?php echo $aset['noreg'];?></td>
				<td><?php echo $aset['namapasien'];?></td>
				<td><?php echo $aset['tgllhr'];?></td>
				<td><?php echo $aset['pekerjaan'];?></td>
				<td><?php echo $aset['alamat'];?></td>
				<td><?php echo $aset['telpon'];?></td>
				<td><?php echo $aset['jeniskel'];?></td>
				<td><?php echo $aset['namakk'];?></td>
				<td><?php echo $aset['berat'];?></td>
				<td><?php echo $aset['tinggi'];?></td>
				<td><?php echo $aset['tgldaftar'];?></td>   
                <td>         <button id="opener">
                                    <a onClick="window.open('view2.php?mod=view&kd_aset=<?php echo $aset['kd_aset'] ;?>','mywindow','width=466px,height=580px,top=70px,left=400px')"  >view</a></button></td>
			</tr>
			<?php }?>
		</table>
		<?php
	}else{
		echo 'Data yang anda cari tidak ada!!!';
	}
}
?></td>
       
</body>
</html>