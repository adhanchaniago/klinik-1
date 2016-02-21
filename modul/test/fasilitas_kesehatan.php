<?php
session_start()
?>
<html>
<head>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
var peta;
var pertama = 0;
var jenis = "kesehatan";
var nmx = new Array();
var namafasx = new Array();
var jenisfasx = new Array();
var desx = new Array();
var latx =new Array();
var lngx = new Array();
var i;
var url;
var gambar_tanda;
function peta_awal(){
    var jakarta = new google.maps.LatLng(-6.469079097979444, 106.84358825781248);
    var petaoption = {
        zoom: 11,
        center: jakarta,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
}

$(document).ready(function(){
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});
function simpan(){
		  var x = $("#x").val();
        var y = $("#y").val();
        var desa=$("#desa").val();
        var nama = $("#nama").val();
		  var jenis_fas =$("#jenis_fas").val();
	     var namafs= $("#namafs").val();
	     var des = $("#des").val();
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&desa="+desa+"&nama="+nama+"&jenis_fas="+jenis_fas+"&namafs="+namafs+"&des="+des,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
                $("#desa").val("");
                $("#nama").val("");
		        $("#namafs").val("");
                $("#des").val("");
                ambildatabase('akhir');
            }
        });
    };
    
function setinfo(petak, kd_aset){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksnama").html(nmx[kd_aset]);
	 $("#teksnamafas").html(namafasx[kd_aset]);
	 $("#teksjenisfas").html(jenisfasx[kd_aset]);
        $("#teksdes").html(desx[kd_aset]);
		$("#tekslat").html(latx[kd_aset]);
		  $("#tekslng").html(lngx[kd_aset]);
    });
}
function cekForm() {
        if (document.fValidate.nama.value == "") {
            alert("Nama tidak boleh kosong");
            document.forms['fValidate'].nama.focus();
            return false;
        } else if (document.fValidate.namafs.value == "") {
            alert("nama jenis fasilitas tidak boleh kosong");
            document.forms['fValidate'].namafs.focus();
            return false;
       } else if (document.fValidate.des.value == "") {
            alert("deskripsi tidak boleh kosong");
            document.forms['fValidate'].des.focus();
            return false;
        } else {
            simpan()
        }
    }

function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}

function set_icon(jenisnya){
    switch(jenisnya){
        case "kesehatan":
            gambar_tanda = 'icon/kesehatan.png';
            break;
        case "airport":
            gambar_tanda = 'icon/airport.png';
            break;
        case  "masjid":
            gambar_tanda = 'icon/mosque.png';
            break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildatakesehatan.php?akhir=1";
    }else{
        url = "ambildatakesehatan.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                nmx[i] = msg.wilayah.petak[i].nama;
				namafasx[i] = msg.wilayah.petak[i].nama_fasilitas;
                jenisfasx[i] = msg.wilayah.petak[i].jenis_fasilitas;
				desx[i] = msg.wilayah.petak[i].deskripsi;
				latx[i]= msg.wilayah.petak[i].x;
				lngx[i]= msg.wilayah.petak[i].y

                set_icon(msg.wilayah.petak[i].jenis_fasilitas);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setjenis(jns){
    jenis_fasilitas= jns;
}

</script>

<style>
#jendelainfo{
	position:fixed;
	z-index:100;
	top:400px;
	left:1000px;
	background-color:#009900;
	display:none;
}
#petaku {
	float: right;
}
#bungkus {
	width: auto;
	background-color: #FFFFFF;
}
#input_kes {
	float: left;
	width: 300px;
}
</style>


</head>
<body onLoad="peta_awal()">

<table id="jendelainfo" border="1" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#006600" bgcolor="#00FF66" width="300" height="136">
  <tr>
    <td width="248" bgcolor="#009900" height="19"><font color="#FFFFFF" size="+1"><center><span id="teksnama"></center></span></font></td>
    <td width="30" bgcolor="#009900" height="19">
   <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td width="100" bgcolor="#FFFFFF" height="auto" valign="top" colspan="2">
    <p align="center"><font color="#000000" size="2">Deskripsi : <span id="teksdes"></span></font></td>
     
  </tr>
  <tr>
  	<td width="100" bgcolor="#FFFFFF" height="20" valign="top" colspan="2">
    <p align="center"><font color="#000000" size="2">Jenis Fasilitas : <span id="teksjenisfas"></span></font></td>
  </tr>
  <tr>
  	<td width="100" bgcolor="#FFFFFF" height="20" valign="top" colspan="2">
    <p align="center"><font color="#000000" size="2">Nama Fasilitas : <span id="teksnamafas"></span></font></td>
  </tr>
  <tr>
  	<td width="100" bgcolor="#FFFFFF" height="20" valign="top" colspan="2">
    <p align="center"><font color="#000000" size="2">latitude : <span id="tekslat"></span></font></td>
  </tr>
  <tr>
  	<td width="100" bgcolor="#FFFFFF" height="20" valign="top" colspan="2">
    <p align="center"><font color="#000000" size="2">longitude : <span id="tekslng"></span></font></td>
  
  </tr>
</table>
<div id="bungkus">
	<div id="input_kes">
<FORM name="fValidate">
<table>
    <h6>Tambah Fasilitas Kesehatan</h6>
		<input type=radio checked name=jenis value="kesehatan" onClick="setjenis(this.value)"><img src="icon/kesehatan.png">Fasilitas Kesehatan<br>
X :<br> <input type=text id=x size="22"><p>
	Y :<br> <input type=text id=y size="22"></p>
	Pilih Kecamatan: <br>
        <?php
		include "combobox.php";
	?>	
	<p>
	Nama:<br> <input type="text" name="nama" id="nama" size="30"><p>
	Jenis Fasilitas:<br><input type=text id="jenis_fas" value="kesehatan" disabled><p>
   Nama jenis fasilitas:<br> <input type=text id="namafs" name="namafs" size=30><p>
  	deskripsi:<br> <textarea name="des" id="des" cols="30" rows="5""></textarea></p>
        <td colspan="2"><input type="button" name="button-ok" value="Simpan" onClick="cekForm()"></td>
        <img src="ajax-loader.gif" style="display:none" id="loading">
    </tr>
</table>
</FORM>
    </p></div>
		<div id="petaku" style="width:1100px; height:675px"></div></td>
  
</div>
</body>
</html>
