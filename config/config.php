<?php
$host= 'localhost';
$uid = 'root';
$pwd = '';
$db  = 'klinik';
$con = mysql_connect($host,$uid,$pwd);
 if (!$con)
 {
 echo "Gagal Konek database".mysql_error();
 }
mysql_select_db($db);
