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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../../css/bootstrap.css" rel="stylesheet">
    <link href="../../css/template.css" rel="stylesheet">
    <link href="../../js/google-code-prettify/prettify.css" rel="stylesheet">
  
    <script type="text/javascript" src="../../js/ui.dialog.js"></script>
    <script type="text/javascript" src="../../js/effects.js"></script>
	<link rel="stylesheet" href="../../css/themes/base/jquery.ui.all.css">
	<script src="../../js/jquery-1.8.2.js"></script>
	<script src="../../js/ui/jquery.ui.core.js"></script>
	<script src="../../js/ui/jquery.ui.widget.js"></script>
	<script src="../../js/ui/jquery.ui.datepicker.js"></script>
    <link rel="stylesheet" href="../../css/demos.css">
<script src="js/jquery-1.8.2.js"></script>
	<script src="js/ui.core.js"></script>
	<script src="js/ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker1" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+0"
		});
		$("#datepicker1").datepicker("option","dateFormat","yy-mm-dd");
	});
	</script>

	<script type="text/javascript" src="../../js/wysiwyg/jquery.wysiwyg.js"></script>
    <script type="text/javascript">
	var $konf = jQuery.noConflict();
	$konf(document).ready(function() {
		$konf('#wysiwyg').wysiwyg();
		 
	});
    </script>    
   <script>
   function cekForm(){
        if (document.fValidate.namapasien.value == "") {
            alert("Nama tidak boleh kosong");
            document.forms['fValidate'].namapasien.focus();
            return true;
        } else if (document.fValidate.tgllhr.value == "") {
            alert("tanggal lahir tidak boleh kosong");
            document.forms['fValidate'].tgllhr.focus();
            return false;
        } else if (document.fValidate.pekerjaan.value == "") {
            alert("nama pekerjaan tidak boleh kosong");
            document.forms['fValidate'].pekerjaan.focus();
            return false;
       } else if (document.fValidate.alamat.value == "") {
            alert("nama pekerjaan tidak boleh kosong");
            document.forms['fValidate'].alamat.focus();
            return false;
       } else if (document.fValidate.tgldaftar.value == "") {
            alert("tanggal tidak boleh kosong");
           document.forms['fValidate'].tgldaftar.focus();
            return false;
        } else {
				simpan();
        }

    }


   
   </script>

    <script type="text/javascript" src="../../js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="../../js/ui.core.js"></script>
	<script type="text/javascript" src="../../js/ui.sortable.js"></script>    
    <script type="text/javascript" src="../../js/ui.dialog.js"></script>
    <script type="text/javascript" src="../../js/effects.js"></script>
	<link rel="stylesheet" href="../../css/themes/base/jquery.ui.all.css">
	<script src="../../js/jquery-1.8.2.js"></script>
	<script src="../../js/ui/jquery.ui.core.js"></script>
	<script src="../../js/ui/jquery.ui.widget.js"></script>
	<script src="../../js/ui/jquery.ui.datepicker.js"></script>
    <link rel="stylesheet" href="../../css/demos.css">
	<script>
	var $konf=jQuery.noConflict();
	$konf(function() {
		$konf( "#datepicker" ).datepicker();
	});
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Input Pasien</title>
</head>

<body>
<div class='navbar'>
    <div class='navbar-inner'>
    
    <ul class='nav'>
    <li class='active'><a href='mod.php?mod=input_pasien'>Tambah Pasien</a></li>
    <li class='active' style="margin-left:10px;"><a onclick='self.history.back()'>Back</a></li>
    </ul>
    </div>
    </div>
<h3><center><i  class="icon-plus-sign"></i>Tambah Pasien</center></h3>
<span class="content">
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("klinik");

$query = "SELECT max(noreg) as maxID FROM tbl_pasien";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$noUrut = (int) substr($idMax, 7, 7);

$noUrut++;
$char = "KDN";
$newID = $char . sprintf("%07s", $noUrut);

?>
</span>

<form action="modul/mod_pasien/aksi.php" method="post" name="fValidate">

        <table class="datatable" style="padding-left:30px">
        
		 <tr>
         <td width="10%"></td>
            <td width="29%"><font size="2" face="verdana"><p>No Registrasi</p></font></td>
            <td>:</td>
            <td><input type="text" class="text" name="noreg" size="45" readonly="" value="<?php echo $newID; ?>"></td>
        </tr>
      <tr>
      
      <td></td>
            <td width="29%"><font size="2" face="verdana"><p>Nama</p></font></td>
            <td>:</td>
            <td><input type="text" class="text" name="namapasien" size="45" maxlength="45"/></td>
        </tr>
    <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Tanggal Lahir</p>
            </font></td>
            <td>:</td>
            <td><input type="text" name="tgllhr" id="datepicker1" class="text" />  <td>
        </tr>
        
        <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p align="justify">Alamat</p>
          </font></td>
          <td>:</td>
          
            <td><textarea name="alamat" class="smallInput" style="height:70px; width:360px" ></textarea></td>
        </tr>
		
		<tr>
      
      <td></td>
            <td width="29%"><font size="2" face="verdana"><p>Telpon</p></font></td>
            <td>:</td>
            <td><input type="number" class="int" name="telpon" size="45" maxlength="45"/></td>
        </tr>
		

        <tr><td></td></tr>
        <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Jenis Kelamin</p>
            </font></td>
            <td>:</td>
            <td>
            	<input type="radio" name="jeniskel"
				<?php if (isset($jeniskel) && $jeniskel=="perempuan") echo "checked";?>
				value="perempuan">PEREMPUAN
				<input type="radio" name="jeniskel"
				<?php if (isset($jeniskel) && $jeniskel=="laki-laki") echo "checked";?>
				value="laki-laki">LAKI-LAKI
         
            </td>
        </tr>
<tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Pekerjaan</p>
            </font></td>
            <td>:</td>
            <td>
            	<select class="smallInput" name="pekerjaan">
                <option> --Pekerjaan-- </option>
        	<option>Karyawan</option>
        	<option>Wiraswasta</option>
			<option>Pelajar</option>
			<option>Ibu Rumah Tangga</option>


         
        </select>
            </td>
        </tr>
        <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Nama Kepala Keluarga</p>
            </font></td>
            <td>:</td>
            <td><input type="text" name="namakk" class="text" size="45" maxlength="45"/>  <td>
        </tr>
        <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Berat Badan</p> 
            </font></td>
            <td>:</td>
            <td><input type="text" name="berat" class="text" style="width:40px;" maxlength="3" />  Kg<td>
			
        </tr>
         <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Tinggi Badan</p> 
            </font></td>
            <td>:</td>
            <td><input type="text" name="tinggi" class="text" style="width:40px;" maxlength="3"/> Cm <td>
			
        </tr>
        <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Tanggal Daftar</p>
            </font></td>
            <td>:</td>
            <td><input type="text" name="tgldaftar" readonly="readonly" value="<?php
		echo date("d-m-Y H:i:s");?>" />			
			</td>
        </tr>
        <tr><td></td>
            <td>&nbsp;</td>
			<td></td>
            <td width="71%"><span><input name="simpan" value="simpan" type="submit" onClick="cekForm()"/></span>&nbsp;<input name="reset" class="buttonblue" type="reset" value="Reset" /></span></td>
        </tr>
        </table>
        </form>
       

</body>
</html>
