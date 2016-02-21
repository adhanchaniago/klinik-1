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
 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<?php include "koneksi.php";
include"class_paging.php";
?>
<link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/template.css" rel="stylesheet">
    <link href="../../js/google-code-prettify/prettify.css" rel="stylesheet">

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
<div class="dalam" id="dalam">

<?php

    echo "<h3><center>Ganti Password</center></h3>
          <form method=POST action=modul/mod_user/aksi.php>
          <table style='width:500px;margin-left:auto;margin-right:auto;' class='table table-striped'>
          <tr><td>Masukkan Password Lama</td><td> :</td><td> <input type=text name='pass_lama'></td></tr>
          <tr><td>Masukkan Password Baru</td><td> :</td><td> <input type=text name='pass_baru'></td></tr>
          <tr><td>Masukkan Lagi Password Baru</td><td> :</td><td> <input type=text name='pass_ulangi'></td></tr>
          <tr><td></td><td colspan=2><input type=submit class='tombol' value=Proses>
                            <input type=button class='tombol' value=Batalkan onclick=self.history.back()></td></tr>
          </table></form>";
?>

</div>
</body>
</html>
