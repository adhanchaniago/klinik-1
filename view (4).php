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
<link rel="stylesheet" type="text/css" href="css/themes/base/jquery.ui.dialog.css" />

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
	<script type="text/javascript">
        $(document).ready(function(){
  $('#eulaOpen').click(function() {
    openDialog('#eula');
  });
  $('#eula')
  .find('.ok, .cancel')
  .live('click', function() {
  	closeDialog(this);
  })
  .end()
  .find('.ok')
  .live( 'click', function(){
  	// Clicked Agree!
    console.log('clicked agree!');
  })
  .end()
  .find('.cancel')
  .live('click', function() {
  	// Clicked disagree!
    console.log('clicked disagree!');
  });
});

function openDialog(selector) {
	$(selector)
		.clone()
		.show()
		.appendTo('#overlay')
		.parent()
		.fadeIn('fast');
}
  
function closeDialog( selector ) {
$(selector)
	.parents('#overlay')
	.fadeOut('fast', function() {
		$(this)
			.find('.dialog')
			.remove();
	});
}
    </script>
 <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>
<style type="text/css">
.bungkus{
	width: 900px;
	margin-left: auto;
	margin-right: auto;	
	height: auto;
	}
#overlay {
	display:none;
	top: 0; right: 0; bottom: 0; left: 0;
	margin-right: auto;
	margin-left: auto;
	position: fixed;
	width: 100%;
	z-index: 100;
}
#blanket {
	background-color: #000000;	
	top: 0;
	bottom: 0;
	left: 0;
	display: block;
	opacity: 0.8;
	position: absolute;
	width: 100%;
}
.dialog {
	display: none;
	margin: 100px auto;
	position: relative;
  width: 500px;
  padding: 40px;
  background: white;
  -moz-border-radius: 10px;
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
      <div id="user_tools"><span><a href="#" class="mail">(1)</a> Assalamualaikum <a href="#">Admin Username</a>  | <a class="dropdown" href="#">Change Theme</a>  |  <a href="logout.php">Keluar</a></span></div>
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
		<li class="item last" id="eight"><a href="mod.php?mod=tambahuser" class="main"><span class="outer"><span class="inner settings">Tambah User</span></span></a></li> 
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
    	
<?
include("config/koneksi.php");
	$idpasien=$_GET['idpasien'];
	$noreg=$_GET['noreg'];
	$q=mysql_query("select * from tbl_pasien where noreg='$noreg'");
	$dataku=mysql_fetch_object($q);
?>

<form action="aksiriwayat.php" method="post" enctype="multipart/form-data" name="FKoreksi">
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#669900">
    <tr>
      <td><strong><font color="#4985B2">Riwayat Pasien</font></strong></td>
    </tr>
        <tr>
      <td>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td width="99">noreg</td>
            <td width="9">:</td>
            <td width="287"><input name="noreg" type="text" id="noreg" size="10" maxlength="10" value="<?php echo $dataku->noreg?>" readonly=""></td>
      
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input name="namapasien" type="text" id="namapasien" size="30" maxlength="30" value="<?php echo $dataku->namapasien?>" readonly></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><select name="tanggal" size="1" id="tgl" readonly>
                <?
		     for ($i=1;$i<=31;$i++)
			 {
				if($tanggal==$i) {
					echo "<option value=".$i." selected>".$i."</option>";
				} else {
					echo "<option value=".$i.">".$i."</option>";
				}
			 }
		  ?>
              </select>
              <select name="bln" size="1" id="bln" readonly>
                <?
		     $namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		     for ($i=1;$i<=12;$i++)
			 {
				if($bulan==$i) {
					echo "<option value=".$i." selected>".$namabulan[$i]."</option>";
				} else {
					echo "<option value=".$i.">".$namabulan[$i]."</option>";
				}
			 }
		  ?>
              </select>
              <select name="thn" size="1" id="thn" readonly>
                <?
			  echo "<option value=".$tahun.">".$tahun."</option>";
		     for ($i=0000;$i<=9999;$i++)
			 {
				if($tahun==$i) {
					echo "<option value=".$i." selected>".$i."</option>";
				} else {
					echo "<option value=".$i.">".$i."</option>";
				}
			 }
		  ?>
              </select></td>
          </tr>
 
          <tr>
            <td>alamat</td>
            <td>:</td>
            <td><input style="width:500px;height:30px;" type="alamat" name="alamat" id="alamat" value="<?php echo $dataku->alamat?>" readonly></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input name="jeniskel" id="jeniskel" type="radio" value="laki-laki" <?php if($dataku->jeniskel=='laki-laki') echo "checked";?> readonly>
              Laki-laki
              <input name="jeniskel" id="jeniskel" type="radio" value="perempuan" <?php if($dataku->jeniskel=='perempuan') echo "checked";?> readonly>
              Perempuan </td>
          </tr>
          <tr>
            <td>pekerjaan</td>
            <td>:</td>
            <td><input type="pekerjaan" name="pekerjaan" id="pekerjaan" value="<?php echo $dataku->pekerjaan?>" readonly></td>
          </tr>
                  <tr>
            <td>nama kk</td>
            <td>:</td>
            <td><input type="namakk" name="namakk" id="namakk" value="<?php echo $dataku->namakk?> "readonly></td>
          </tr>
        
          
      </table></td>
    </tr>
  </table>
</form>
<div id="overlay">
        <div id="blanket"></div>
      </div>
      <!-- the dialog contents -->
      <div id="eula" class="dialog">

        <h4>Tambah Riwayat Pasien <?php echo"$_GET[namapasien]";?></h4>
              <?php
      	$idpasien=$_GET['idpasien'];
      	$riwayat=$_GET['riwayat'];
      	$keterangan=$_GET['keterangan'];
      	$qd=mysql_query("select * from tbl_riwayat where idriwayat='$riwayat' ");
      	$hasil=mysql_fetch_object($qd); ?>
      	<form method="get" action="aksiriwayat.php">
				<table summary="" >
				
				<tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Dokter</p>
            </font></td>
            <td>:</td>
                        <td>
            	<select class="smallInput" name="dokter">
                <option> --Dokter-- </option>
        	<option>dr. Nancy Norita Sy.</option>
        	<option>dr. Rizka Farhani</option>
			<option>dr. Caroline</option>
			<option>dr. Editia</option>
			<option>dr. Widia</option>


         
        </select>
            </td>
        </tr>
						<tr>
							<td>Riwayat</td>
							<td>:</td>
							<td width="700"><textarea width=500 ></textarea></td>						
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td><textarea style="width=1000px;"></textarea></td>
					
						
						
						</tr>
				</table> 
				<div class="buttons">
          <a href="#" class="ok">Agree</a>
          <a href="#" class="cancel">Disagree</a>
        </div>     	
      	</form>
        
      </div>
<?
    $aksi="aksiriwayat.php";
switch($_GET[act]){
  // Tampilkan pd tabel
  default:
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

$query = "SELECT  tbl_pasien.noreg,tbl_pasien.idpasien, tbl_riwayat.idriwayat, tbl_riwayat.riwayat, tbl_riwayat.keterangan from tbl_pasien,tbl_riwayat where tbl_pasien.idpasien='$idpasien' and tbl_riwayat.idpasien='$idpasien' LIMIT $offset, $dataPerPage";

$result = mysql_query($query) or die('Error');

// menampilkan data 

echo "<table border='1'>";
echo"<input type=submit name=tambah value='Tambah Riwayat' id='eulaOpen'>";

echo "<th scope='col'>dokter</th><th scope='col'>riwayat</th><th scope='col'>keterangan</th><th scope='col'>aksi</th>";
while($data = mysql_fetch_array($result))
{
   echo "<tr><td width=410>".$data['riwayat']."</td><td width=410>".$data['keterangan']."</td><td width=70 align=center><a href='#' id='eulaOpen'>Edit</a> | 
	           <a href='$aksi?idriwayat=$data[idriwayat]&idpasien=$data[idpasien]&noreg=$data[noreg]&act=hapus' onClick=\"return confirm('Apakah Anda akan menghapusnya?')\">Hapus</a></td></tr>";
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
break;

  case "edit":
  $edit = mysql_query("SELECT * FROM tbl_pasien WHERE noreg='$_GET[noreg]'");
    $r    = mysql_fetch_array($edit);
	
    echo "<h2 >Edit pasien</h2>
          <form style='margin-left:30px;' method='POST' action='modul/mod_pasien/aksi.php?mod=pasien&act=edit'>
          <input type=hidden name=noreg value=$r[noreg]>
           <table>
          <tr><td>Nama pasien</td><td>     :</td><td> <input type=text name='namapasien' size=40 value='$r[namapasien]'></td></tr>
          <tr><td>Tanggal lahir</td><td>  :</td><td> <input type=text name='tgllhr' size=30 value='$r[tgllhr]'></td></tr>
        
          <tr><td>alamat</td><td>  : </td><td><input type=text name='alamat' size=40 value='$r[alamat] '></td></tr>
   <tr><td>Telpon</td><td>     :</td><td> <input type=text name='telpon' size=40 value='$r[telpon]'></td></tr>
		  <tr><td>Jenis Kelamin</td><td>     : </td><td><input type=text name='jeniskel' size=30 value='$r[jeniskel]'></td></tr>
  <tr><td>Pekerjaan</td><td>     :</td><td> <input type=text name='pekerjaan' size=30 value='$r[pekerjaan]' ></td></tr>
		  <tr><td>Nama KK</td><td>     : </td><td><input type=text name='namakk' size=30 value='$r[namakk]'></td></tr>
		  <tr><td>tanggal daftar</td><td>     : </td><td><input type=text name='tgldaftar' size='30' value='$r[tgldaftar]' readonly></td></tr>";
    echo "<tr><td></td><td><td colspan='2'><input type='submit' value='update' name=ubah>
                            <input type='button' value='Batal' onclick='self.history.back()'></td></tr>
          </table>
		  </form>";
    break;  
}
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
