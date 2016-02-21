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
	
	 <script>
   
   function cekForm() {

        if (document.fValidate.namaobt.value == "") {

            alert("Nama obat tidak boleh kosong");

            document.forms['fValidate'].namaobt.focus();

            return false;

        } else {

            simpan()

        }

    }


   
   </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Pasien</title>
</head>

<body>
<h1 class="content_edit">Tambah Pasien</h1>
<span class="content">
<?php
mysql_connect("localhost", "root", "toor");
mysql_select_db("klinik");

$query = "SELECT max(idobt) as maxID FROM tbl_obat";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$idMax = $data['maxID'];
$noUrut = (int) substr($idMax, 7, 7);

$noUrut++;
$char = "OBT";
$newID = $char . sprintf("%07s", $noUrut);

?>
</span>
<form action="modul/mod_obat/aksi.php" method="post" name="fValidate">
        
  <table class="datatable" style="padding-left:30px">
        
		 <tr>
         <td width="10%"></td>
            <td width="29%"><font size="2" face="verdana"><p>ID Obat</p></font></td>
            <td>:</td>
            <td><input type="text" class="text" name="idobt" size="45" readonly="" value="<?php echo $newID; ?>"></td>
        </tr>
      <tr>
      
      <td></td>
            <td width="29%"><font size="2" face="verdana"><p>Nama Obat</p></font></td>
            <td>:</td>
            <td><input type="text" class="text" name="namaobt" size="45" maxlength="45"/></td>
 

        <tr><td></td>
            <td width="29%" valign="middle"><font size="2" face="verdana">
            <p>Jenis Obat</p>
            </font></td>
            <td>:</td>
            <td>
            	<select class="smallInput" name="jenisobt">
                <option> --jenis Obat-- </option>
        	<option>Kapsul</option>
        	<option>Tablet</option>
        	<option>Cair</option>
         
        </select>
            
            </td>
        </tr>
 
       
        <tr><td></td>
            <td>&nbsp;</td>
			<td></td>
			<input type="submit" name="simpan" value="simpan"/>
            <td width="71%"><span><input name="submit" class="buttonblue"  value="simpan" type="button" onClick="cekForm()"/></span>&nbsp;<input name="reset" class="buttonblue" type="reset" value="Reset" /></span></td>
        </tr>
        </table>
        </form>
</body>
</html>
