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


<link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/template.css" rel="stylesheet">
    <link href="../../js/google-code-prettify/prettify.css" rel="stylesheet">
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
 <?php
    $aksi="aksi.php";
switch($_GET[act]){
  // Tampilkan pd tabel
  default:
    echo "
	<div class='navbar'>
    <div class='navbar-inner'>
    
    <ul class='nav'>
    <li class='active'><a href='mod.php?mod=input_obat'>Tambah Obat</a></li>

    </ul>
    </div>
    </div>
	<table class='table table-striped'>

          <tr>
		  <td>No</td>
		  <td>ID Obat</td>
		  <td>Nama Obat</td>
		  <td>Jenis Obat</td>
		  <td>Aksi</td>
		  </tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $tampil=mysql_query("SELECT * FROM tbl_obat ORDER BY idobt DESC LIMIT $posisi,$batas");
    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "
	  			<tr align=center>
				<td width=30>$no</td>
                <td width=160>$r[idobt]</td>
                <td width=400>$r[namaobt]</td>
                <td width=205>$r[jenisobt]</td>
                <td width=80>
                <div class='btn-group'>
                <a href=mod.php?mod=obat&act=edit&idobt=$r[idobt] class='btn' >Edit</a>
	           <a class='btn' href='modul/mod_obat/aksi.php?mod=obat&act=hapus&idobt=$r[idobt]' onClick=\"return confirm('Apakah Anda akan menghapusnya?')\">Hapus</a>
			  
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM tbl_obat "));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
	echo "";
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break;
  
  case "edit":
    $edit = mysql_query("SELECT * FROM tbl_obat WHERE idobt='$_GET[idobt]'");
    $r    = mysql_fetch_array($edit);
	
    echo "<h2>Edit pasien</h2>
          <form method=POST action=modul/mod_obat/aksi.php?mod=obat&act=edit>
          <input type=hidden name=idobt value=$r[idobt]>
           <table>
          <tr><td>nama obat</td><td>     : </td><td><input type=text name='namaobt' size=40 value='$r[namaobt]'></td></tr>
          <tr><td>jenis obat</td><td>  : </td><td><input type=text name='jenisobt' size=40 value='$r[jenisobt]'></td></tr>
		";
    echo "<tr></td><td><td colspan=2><input type=submit value=Update name=ubah>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
		  </form>";
    break;  
}
?>



</body>
</html>