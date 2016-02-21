
<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Klinik dr. Nancy</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="js/ui.sortable.js"></script>    
    <script type="text/javascript" src="js/ui.dialog.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
<link rel="stylesheet" href="css/themes/base/jquery.ui.all.css" />
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.datepicker.js"></script>
	<script language="javascript" type="text/javascript">
        $(document).ready(function () {
            setDatePicker('date-picker');
            setupDialogBox('dialog', 'opener');
        });
    </script>
 <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>
<style type="text/css">
.bungkus{
	width: 700px;
	margin-left: auto;
	margin-right: auto;	
	height: auto;
	}
</style>
<style>
 th{
	color: #FFFFFF;
	font-size: 8pt;
	text-transform: uppercase;
	text-align: center;
	padding: 0.5em;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
	background-color: #4985B2;
	width:auto;
}

td{
	padding: 0.3em;
	font-size: 11px;
	vertical-align: top;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;

}
</style>
</head>

<body>
<title>Riwayat Pasien</title>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo">Klinik dr. Nancy</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="#" class="mail">(1)</a> Assalamualaikum <a href="#">Admin Username</a>  |  <a class="dropdown" href="#">Change Theme</a>  |  <a href="logout.php">Keluar</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="media.php?mod=home" class="main"><span class="outer"><span class="inner dashboard">Beranda</span></span></a></li>
        <li class="item middle" id="two"><a href="mod.php?mod=pasien" class="main"><span class="outer"><span class="inner content">Pasien</span></span></a></li>
        <li class="item middle" id="three"><a href="mod.php?mod=obat" class="main"><span class="outer"><span class="inner reports png">Obat</span></span></a></li>
        <li class="item middle" id="four"><a href="mod.php?mod=riwayat" class="main"><span class="outer"><span class="inner users">Riwayat Pasien</span></span></a></li>
		<li class="item middle" id="five"><a href="mod.php?mod=cari" class="main"><span class="outer"><span class="inner media_library">Cari</span></span></a></li>        
		<li class="item middle" id="six"><a href="mod.php?mod=cetak" class="main"><span class="outer"><span class="inner event_manager">Cetak</span></span></a></li>        
		<li class="item middle" id="seven"><a href="mod.php?mod=Pengguna" class="main"><span class="outer"><span class="inner newsletter">Pengguna</span></span></a></li>        
		<li class="item last" id="eight"><a href="mod.php?mod=pengaturan" class="main"><span class="outer"><span class="inner settings">Pengaturan</span></span></a></li>        
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->
	<div class="grid_16" id="hidden_submenu">
	  <ul class="more_menu">
		<li><a href="#">More link 1</a></li>
		<li><a href="#">More link 2</a></li>  
	    <li><a href="#">More link 3</a></li>    
        <li><a href="#">More link 4</a></li>                               
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 5</a></li>
		<li><a href="#">More link 6</a></li>  
	    <li><a href="#">More link 7</a></li> 
        <li><a href="#">More link 8</a></li>                                  
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 9</a></li>
		<li><a href="#">More link 10</a></li>  
	    <li><a href="#">More link 11</a></li>  
        <li><a href="#">More link 12</a></li>                                 
      </ul>            
  </div>
<!-- HIDDEN SUBMENU END -->  

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    	<div class="bungkus">
<?php
 include "config/koneksi.php";
 $idpasien=$_GET['idpasien'];
 $noreg=$_GET['noreg'];
 $dataPerPage = 5;

// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.

if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;

// perhitungan offset

$offset = ($noPage - 1) * $dataPerPage;

// query SQL untuk menampilkan data perhalaman sesuai offset

$query = "SELECT * FROM tbl_riwayat where idpasien='$idpasien' LIMIT $offset, $dataPerPage";

$result = mysql_query($query) or die('Error');

// menampilkan data 

echo "<table border='1'>";
echo "<th scope='col'>no</th><th scope='col'>riwayat</th><th scope='col'>riwayat</th><th scope='col'>keterangan</th>";
while($data = mysql_fetch_array($result))
{
   echo "<tr><td>$no</td><td>".$data['idriwayat']."</td><td>".$data['dokter']."</td><td>".$data['riwayat']."</td><td>".$data['keterangan']."</td></tr>";
}

echo "</table>";

// mencari jumlah semua data dalam tabel guestbook

$query   = "SELECT COUNT(*) AS jumData FROM tbl_riwayat where idpasien='$idpasien'";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);

$jumData = $data['jumData'];

// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

$jumPage = ceil($jumData/$dataPerPage);

// menampilkan link previous

if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?idpasien=$idpasien&noreg=$noreg&page=".($noPage-1)."'>&lt;&lt; Prev</a>";

// memunculkan nomor halaman dan linknya

for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "..."; 
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?idpasien=$idpasien&noreg=$noreg&page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}

// menampilkan link next

if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?idpasien=$idpasien&noreg=$noreg&page=".($noPage+1)."'>Next &gt;&gt;</a>";

?>


</div>
  <div class="clear"> </div>

  </div>

<div class="clear"> </div>

		<!-- This contains the hidden content for inline calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			
			</div>
		</div>
        <!--Second hidden element called from the tip message right of the title-->
        <div class='hidden'>
			<div id='inline_example2' title="This is a modal" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from the second hidden element on this page.</strong></p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
	Application Created by <a href="../index.htm">Reza Pramana
</a></div>
<!-- FOOTER END -->
</body>
</html>

</body>
</html>