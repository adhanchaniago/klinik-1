<?php

include "config/config.php";

function anti_injection($data){

  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));

  return $filter;

}

$user = anti_injection($_POST['user']);

$password = anti_injection(md5($_POST['password']));



// pastikan username dan password merupakan gabungan antara huruf atau angka.

if (!ctype_alnum($user) OR !ctype_alnum($password)){

  echo "Maaf anda tidak dapat melakukan injection"
  ;

}

else{

$login=mysql_query("SELECT * FROM tbl_user WHERE user='$user' AND password='$password'");

$ketemu=mysql_num_rows($login);

$r=mysql_fetch_array($login);



// Apabila username dan password telah cocok atau ditemukan

if ($ketemu > 0){

  session_start();

  include "timeout.php";


  $_SESSION[user]     = $r[user];

  $_SESSION[password]     = $r[password];

  

  // session melakukan timeout

  $_SESSION[login] = 1;

  timer();

  header('location:media.php?mod=home');

}

else{

  echo "<center>MAAF LOGIN GAGAL :( <br> 

        Username atau Password Anda tidak benar.<br>

        Silahkan Hubungi Bapak Reza untuk info Pendaftaran .<br>";

  echo "<a href=index.php><b>SILAHKAN ULANGI LAGI :)</b></a></center>";

}

}

?>