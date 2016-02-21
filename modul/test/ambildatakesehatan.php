<?php
include "koneksi.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM tbl_aset WHERE jenis_fasilitas='kesehatan'";
}else{
    $query = "SELECT * FROM tbl_aset WHERE jenis_fasilitas='kesehatan'";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id":"'.$x['nomor'].'",
				"kd_desa":"'.htmlspecialchars($x['kd_desa']).'",
        		"nama":"'.htmlspecialchars($x['nama']).'",
	"jenis_fasilitas":"'.htmlspecialchars($x['jenis_fasilitas']).'",
	"nama_fasilitas":"'.htmlspecialchars ($x['nama_fasilitas']).'",
	"deskripsi":"'.htmlspecialchars($x['deskripsi']).'",
        "x":"'.$x['lat'].'",
        "y":"'.$x['lng'].'"
  
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}}';
echo $json;

?>
