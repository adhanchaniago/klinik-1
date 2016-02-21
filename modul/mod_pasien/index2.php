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
<?php include("../koneksi.php");

include("../class_paging.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Modern Admin</title>
<link rel="stylesheet" type="text/css" href="../../css/960.css" />
<link rel="stylesheet" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../css/text.css" />
<link rel="stylesheet" type="text/css" href="../cssmod/blue.css"/>
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />
<link type="text/css" href="js/wysiwyg/jquery.wysiwyg.css" rel="stylesheet" />
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
<body>
<?php
   $conn =mysql_connect("localhost","root","");
   $db = mysql_select_db("klinik",$conn);
   $sql = "select * from tbl_pasien order by noreg";
   $hasil = mysql_query($sql,$conn);
?>
 <h1 class="content_edit">Data Pasien</h1>
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
		<div class="portlet-content nopadding">
        <form action="" method="post">
          <?php

    $aksi="aksi.php";

switch($_GET[act]){

  // Tampilkan pd tabel

  default:

    echo "

	<table border=1>
          <tr>
		  <th>No</th>
		  <th>No Registrasi</th>
		  <th>Nama Pasien</th>
		  <th>Tanggal Lahir</th>
		  <th>Pekerjaan</th>
		  <th>Alamat</th>
		  <th>Telpon</th>
		  <th>Jenis Kelamin</th>
		  <th>Nama Kepala Keluarga</th>
          <th>tanggal daftar</th>
          <th>Aksi</th>
		  </tr>";
		  
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $tampil=mysql_query("SELECT * FROM tbl_pasien ORDER BY noreg DESC LIMIT $posisi,$batas");
    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "
	  			<tr align=center>
				<td>$no</td>
                <td width=100>$r[noreg]</td>
                <td width=100>$r[namapasien]</td>
                <td width=100>$r[tgllhr]</td>
				<td width=100>$r[pekerjaan]</td>
				<td width=100>$r[alamat]</td>
				<td width=100>$r[telpon]</td>
				<td width=100>$r[jeniskel]</td>
				<td width=100>$r[namakk]</td>
				<td width=100>$r[tgldaftar]</td>
                <td><a href=edittransportasi.php?jenis=transportasi&act=edit_transportasi&kd_aset=$r[kd_aset]>Edit</a> | 

	                  <a href='$aksi?jenis=transportasi&act=hapus&kd_aset=$r[kd_aset]' onClick=\"return confirm('Apakah Anda akan menghapusnya?')\">Hapus</a>

		        </tr>";

      $no++;

    }

    echo "</table>";

    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tbl_pasien "));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);

    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "";

    echo "<div id=paging>Hal: $linkHalaman</div><br>";

    break;

  

  case "edit_transportasi":

    $edit = mysql_query("SELECT * FROM tbl_aset WHERE kd_aset='$_GET[kd_aset]'");

    $r    = mysql_fetch_array($edit);

	

    echo "<h2>Edit Fasilitas transportasi</h2>

          <form method=POST action=$aksi?jenis=transportasi&act=edit_transportasi>

          <input type=hidden name=kd_aset value=$r[kd_aset]>

           <table>

          <tr><td>Nama</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>

          <tr><td>Jenis Fasilitas</td><td>  : <input type=text name='jenis_fasilitas' size=30 value='$r[jenis_fasilitas]' disabled></td></tr>

          <tr><td>Nama Fasilitas</td><td>     : <input type=text name='nama_fasilitas' size=30 value='$r[nama_fasilitas]' ></td></tr>

          <tr><td>deskripsi</td><td>  : <input type=text name='deskripsi' size=38 value='$r[deskripsi]'></td></tr>

		  <tr><td>Latitude</td><td>     : <input type=text name='lat' size=30 value='$r[lat]'></td></tr>

		  <tr><td>Longitude</td><td>     : <input type=text name='lng' size=30 value='$r[lng]'></td></tr>";

    echo "<tr><td colspan=2><input type=submit value=Update>

                            <input type=button value=Batal onclick=self.history.back()></td></tr>

          </table>

		  </form>";

    break;  

}

?>

<a href="indexedit.php">Kembali</a>
               
              <tr class="footer">
                <td colspan="4"><a href="#" class="edit_inline">Edit all</a><a href="#" class="delete_inline">Delete all</a><a href="#" class="approve_inline">Approve all</a><a href="#" class="reject_inline">Reject all</a></td>
                <td align="right">&nbsp;</td>
                <td colspan="3" align="right">
				<!--  PAGINATION START  -->             
                    <div class="pagination">
                    <span class="previous-off">&laquo; Previous</span>
                    <span class="active">1</span>
                    <a href="query_41878854">2</a>
                    <a href="query_8A8058C2">3</a>
                    <a href="query_2823E521">4</a>
                    <a href="query_B322F5B7">5</a>
                    <a href="query_3A2A444D">6</a>
                    <a href="query_912D14DB">7</a>
                    <a href="query_41878854" class="next">Next &raquo;</a>
                    </div>  
                <!--  PAGINATION END  -->       
                </td>
              </tr>
            </tbody>
          </table>
        </form>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>