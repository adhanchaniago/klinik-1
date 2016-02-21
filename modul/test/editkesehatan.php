

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("koneksi.php");
include("class_paging.php");
?>
<title>Edit Fasilitas Kesehatan</title>
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="js/jquery-ui-1.8.1.custom.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Halaman Administrator</title>
    <link rel="stylesheet" type="text/css" href="../../css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="../../css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
    <!--Jquery UI CSS-->
    <link href="../../css/themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="../../js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../../js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="../../js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
   $(".delete").click(function(){
	  var request = $(this).attr("href");
      var record = $(this).parents("tr");
      
      $("#dialog").dialog({
         resizable: false,
         modal: true,
         draggable: false,
         width: 500,
         height: 210,
         buttons: {
            "Ya, Hapus": function(){                
                $.ajax({
					url: request,
					success: function(){
						$(record).remove();
						$("#dialog").dialog("close");
					}
                });
            },
            "Tidak, Batalkan": function(){
               $(this).dialog("close");
            }
         }
      });
      return false;
   });
});
</script>
    <!--Fancy Button-->
    <script src="../../js/fancy-button/fancy-button.js" type="text/javascript"></script>
    <script src="../../js/setup.js" type="text/javascript"></script>
</style>
<style>
 th{
	color: #FFFFFF;
	font-size: 12pt;
	text-transform: uppercase;
	text-align: center;
	padding: 0.5em;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
	background-color: #006600;
	width:auto;
}

td{
	padding: 0.5em;
	vertical-align: top;
	border-width: 1px;
	border-style: solid;
	border-color: #969BA5;
	border-collapse: collapse;
	width:250px;
}
</style>
<script type="text/javascript">
$(function() {
   $(".delete").click(function(){
	  var request = $(this).attr("href");
      var record = $(this).parents("tr");
      
      $("#dialog").dialog({
         resizable: false,
         modal: true,
         draggable: false,
         width: 500,
         height: 210,
         buttons: {
            "Ya, Hapus": function(){                
                $.ajax({
					url: request,
					success: function(){
						$(record).remove();
						$("#dialog").dialog("close");
					}
                });
            },
            "Tidak, Batalkan": function(){
               $(this).dialog("close");
            }
         }
      });
      return false;
   });
});
</script>      
</head><body >
<div class="container_12">
<div class="grid_12 header-repeat">
<div id="branding">
<div class="floatleft"><img src="../../../images/logo1.png" height="110" width="90" /></div>
<div class="floatleft judul"> <img src="../../../images/judul.png" height="30" width="499" />
<p><img src="../../../images/JUDUL22.png" height="30" width="640" /> <br />
<img src="../../../images/jl.png" height="20" width="320" /> </p>
</div>
<div class="floatright">
<div class="floatleft marginleft10"> <img src="../../img/img-profile.jpg" alt="Profile Pic" /></div>
<div class="floatleft marginleft10">
<ul class="inline-ul floatleft">
  <li>Hello Admin</li>
  <li><a href="../mod_users">Config</a></li>
  <li><a href="../../logout.php">Logout</a></li>
</ul>
<br />
<span class="small grey"></span> </div>
</div>
<span class="floatleft">
<div class="clear"> </div>
</span></div>
</div>
<div class="grid_12">
<ul class="nav main">
  <li class="ic-dashboard"><a href="index.php"><span>Home</span></a> </li>
<li class="ic-form-style"><a href="javascript:"><span>Aset</span></a>
    <ul>
     <li><a href="index.php">Input Aset</a> </li>
      <li><a href="indexedit.php">Edit Aset</a> </li>
      <li><a href="indexedit.php">Hapus Aset</a> </li>
    </ul>
  </li>
<li class="ic-grid-tables"><a href="javascript:"><span>View</span></a>
    <ul>
      <li><a href="../mod_kecamatan/">Kecamatan</a> </li>
      <li><a href="../mod_desa/">Desa</a> </li>
    </ul>
  </li>
<li class="ic-gallery dd"><a href="javascript:"><span>Cari</span></a>
    <ul>
      <li><a href="cari_nama.php">Berdasarkan Nama Aset</a> </li>
    </ul>
  </li>
<li class="ic-notifications"><a href="#"><span>Cetak</span></a>
   <ul>
          <li><a onClick="window.open('report_fasilitaspendidikan.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas pendidikan</a></li>
      <li><a onClick="window.open('report_fasilitaskesehatan.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Kesehatan</a></li>
	  <li><a onClick="window.open('report_fasilitasperibadatan.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Peribadatan</a></li>
      <li><a onClick="window.open('report_fasilitasolahraga.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Olahraga</a></li>
      <li><a onClick="window.open('report_fasilitaskesenian.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Kesenian</a></li>
      <li><a onClick="window.open('report_fasilitaspariwisata.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Pariwisata</a></li>
      <li><a onClick="window.open('report_fasilitaspelayanan.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Pelayanan Pemerintahan</a></li>
      <li><a onClick="window.open('report_fasilitasperbelanjaan.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Perbelanjaan</a></li>  
      <li><a onClick="window.open('report_fasilitastransportasi.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Transportasi</a></li>  
      <li><a onClick="window.open('report_fasilitaspemakaman.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Fasilitas Pemakaman</a></li>  
      <li><a onClick="window.open('report_fasilitasruangterbuka.php','mywindow','width=1000px,height=600px,top=70px,left=200px')">Ruang terbuka hijau</a></li>  
</ul>
</div>

<div class="clear"> </div>
		<div class="bungkus">
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
           					 <li><a class="menuitem">Edit Jenis Fasilitas</a>
                            <ul class="submenu">
                                <li><a href="editpendidikan.php"><img src="icon/pendidikan.png" />Fasilitas Pendidikan</a></li>
                                <li><a href="editkesehatan.php"><img src="icon/kesehatan.png" />Fasilitas Kesehatan</a> </li>
                                <li><a href="editperibadatan.php"><img src="icon/peribadatan.png" />Fasilitas Peribadatan</a> </li>
                                <li><a href="editolahraga.php"><img src="icon/olahraga.png"/>Fasilitas Olahraga dan lapangan terbuka</a> </li>
                                <li><a href="editkesenian.php"><img src="icon/kesenian.png"/>Fasilitas Kesenian dan Kebudayaan</a> </li>
                                <li><a href="editpariwisata.php"><img src="icon/pariwisata.png" />Fasilitas Pariwisata</a> </li>
                                <li><a href="editpelayanan.php"><img src="icon/pelayanan.png "/>Fasilitas Pelayan Pemerintahan</a> </li>
                                <li><a href="editperbelanjaan.php"><img src="icon/perbelanjaan.png"/>Fasilitas Perbelanjaan dan Niaga</a> </li>
                                <li><a href="edittransportasi.php"><img src="icon/transportasi.png"/>Fasilitas Transportasi</a> </li>
                                <li><a href="editpemakaman.php"><img src="icon/pemakaman.png"/> Fasilitas Pemakaman</a> </li>
                                <li><a href="editruangterbuka.php"><img src="icon/ruangterbuka.png"/>Ruang Terbuka Hijau</a> </li>
                            </ul>
                        </li>
                        	
                  </ul>
				</div>
                </div>
                </div>
         <div class="grid_10">
			<div class="box round first">

    <?php
    $aksi="aksi_kesehatan.php";
switch($_GET[act]){
  // Tampilkan pd tabel
  default:
    echo "

	<table border=1>
          <tr>
		  <th>No</th>
		  <th>Nama Aset</th>
		  <th>Jenis Fasilitas</th>
		  <th>Nama Fasilitas</th>
		  <th>Deskripsi</th>
		  
		  <th>Latitude</th>
		  <th>Longitude</th>
		  <th>Aksi</th>
		  </tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM tbl_aset WHERE jenis_fasilitas='kesehatan' ORDER BY kd_aset DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "
	  			<tr align=center>
				<td>$no</td>
                <td width=100>$r[nama]</td>
                <td width=100>$r[jenis_fasilitas]</td>
                <td width=100>$r[nama_fasilitas]</td>
				<td width=100>$r[deskripsi]</td>
              
				<td>$r[lat]</td>
				<td>$r[lng]</td>
                <td><a href=editkesehatan.php?jenis=kesehatan&act=edit_kesehatan&kd_aset=$r[kd_aset] >Edit</a> | 
	           <a href='$aksi?jenis=kesehatan&act=hapus&kd_aset=$r[kd_aset]' onClick=\"return confirm('Apakah Anda akan menghapusnya?')\">Hapus</a>
			  
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tbl_aset WHERE jenis_fasilitas='kesehatan' "));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "";
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "edit_kesehatan":
    $edit = mysql_query("SELECT * FROM tbl_aset WHERE kd_aset='$_GET[kd_aset]'");
    $r    = mysql_fetch_array($edit);
	
    echo "<h2>Edit Fasilitas Kesehatan</h2>
          <form method=POST action=$aksi?jenis=kesehatan&act=edit_kesehatan>
          <input type=hidden name=kd_aset value=$r[kd_aset]>
           <table>
          <tr><td>Nama</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>
          <tr><td>Jenis Fasilitas</td><td>  : <input type=text name='jenis_fasilitas' size=30 value='$r[jenis_fasilitas]' disabled></td></tr>
          <tr><td>Nama Fasilitas</td><td>     : <input type=text name='nama_fasilitas' size=30 value='$r[nama_fasilitas]' ></td></tr>
          <tr><td>deskripsi</td><td>  : <input type=text name='deskripsi' size=30 value='$r[deskripsi]'></td></tr>
		  <tr><td>Latitude</td><td>     : <input type=text name='lat' size=30 value='$r[lat]'></td></tr>
		  <tr><td>Longitude</td><td>     : <input type=text name='lng' size=30 value='$r[lng]'></td></tr>";
    echo "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
		  </form>";
    break;  
}
?>

<a href="../halaman_utama.php">Kembali</a>
    </div>
  </div>
</div>

	
</div>
</div>
                </div>
       </div>
        
<div class="clear"> </div>

<div class="clear"> </div>

<div id="site_info">
<p> Copyright <a href="#">Kabupaten Bogor - STMIK Pranata Indonesia</a>.
All Rights Reserved. </p>
</div>


</body>
</html>
