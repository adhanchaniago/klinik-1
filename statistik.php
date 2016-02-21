<?php
include "config/koneksi.php";
$ip=$_SERVER['REMOTE_ADDR'];
$tanggal=date("Ymd");
$waktu=time();
$bln=date("m");
$tgl=date("d");
$blan=date("Y-m");
$thn=date("Y");
$tglk=$tgl-1;

$s=mysql_query("select * from counter where ip='$ip' and tanggal='$tanggal'");
if(mysql_num_rows($s)==0){
mysql_query("insert into counter (ip, tanggal,hits,online) values ('$ip','$tanggal','1','$waktu')");
}else{
	mysql_query("update counter set hits=hits+1, online='$waktu' where ip='$ip' and tanggal='$tanggal'");
	}	
	if($tglk=='1' | $tglk=='2' | $tglk=='3' | $tglk=='4' | $tglk=='5' | $tglk=='6' | $tglk=='7' | $tglk=='8' | $tglk=='9'){
		$kemarin=mysql_query("select * from counter where tanggal='$thn-$bln-0$tglk'");		
		}else{
			$kemarin=mysql_query("select * from counter where tanggal='$thn-$bln-$tglk'");			
			}
		$bulan=mysql_query("select * from counter where tanggal LIKE '%$bln%'");
		$bulan1=mysql_num_rows($bulan);
		$tahunini=mysql_query("select * from counter where tanggal LIKE '%$thn%'");
		$tahunini1=mysql_num_rows($tahunini);
		$pengunjung=mysql_num_rows(mysql_query("select * from counter where tanggal='$tanggal' GROUP BY ip"));
		$totalpengunjung=mysql_result(mysql_query("select COUNT (hits) from counter"),0);
		$hits=mysql_fetch_assoc(mysql_query("select SUM(hits) as hitstoday from counter where tanggal='$tanggal' GROUP BY tanggal"));
		$totalhits=mysql_result(mysql_query("select sum(hits) from counter"),0);
		$bataswaktu=time()-300;
		$pengunjungonline=mysql_num_rows(mysql_query("select * from counter where online > '$bataswaktu'"));
		$kemarin1=mysql_num_rows($kemarin);
		
		echo "<table width='100%' border='0'>
			<tbody><tr>
						<td width='32' align='right' valign='middle'><img src='images/icons/user.gif' width='16' height='16'></td>
						<td width='98' align='left' valign='middle'>Hari ini</td>
						<td width='138' align='left' valign='middle'> : $pengunjung</td>
					</tr>
					<tr>
						<td align='right' valign='middle'><img src='images/icons/user.gif' width='16' height='16'></td>
						<td align='left' valign='middle'>Bulan ini</td>
						<td align='left' valign='middle'> : $bulan1</td>
					</tr>
					<tr>
						<td align='right' valign='middle'><img src='images/icons/calendar.gif' width='16' heigh='16'></td>
						<td align='left' valign='middle'> Tahun ini </td>
						<td align='left' valign='middle'> : $tahunini1</td>
					</tr>
					<tr>
						<td align='right' valign='middle'><img src='images/icons/chart_bar.gif' height='16' width='16'></td>
						<td width='98' align='left' valign='middle'>Total</td>
						<td width='138' align='left' valign='middle'> : $totalhits</td>
					</tr> 
					<tr>
						<td align='right' valign='middle'><img src='images/icons/user.gif' height='16' width='16'></td>
						<td width='98' align='left' valign='middle'>Hits count</td>
						<td width='138' align='left' valign='middle'> : $hits[hitstoday]</td>
					</tr>
					<tr>
						<td align='right' valign='middle'><img src='images/icons/user.gif' height='16' width='16'></td>
						<td width='98' align='left' valign='middle'>Now Online</td>
						<td width='138' align='left' valign='middle'> : $pengunjungonline User</td>
					</tr>  
					</tbody></table>";
?>