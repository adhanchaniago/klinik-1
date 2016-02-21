<?php
session_start();
error_reporting(0);
include "timeout.php";
include "config/koneksi.php";
if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Klinik dr. Nancy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="rocklinux" >

    <!-- Le styles -->
	<link href=”compress.php” rel=”stylesheet” type=”text/css” />
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/template.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">
          	<script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>

    <script src="js/holder/holder.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script type="text/javascript" src="../../js/ui.dialog.js"></script>
    <script type="text/javascript" src="../../js/effects.js"></script>
	<link rel="stylesheet" href="../../css/themes/base/jquery.ui.all.css">
	<script src="../../js/jquery-1.8.2.js"></script>
	<script src="../../js/ui/jquery.ui.core.js"></script>
	<script src="../../js/ui/jquery.ui.widget.js"></script>
	<script src="../../js/ui/jquery.ui.datepicker.js"></script>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
<script type="text/javascript" src="js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="js/ui.sortable.js"></script>    
    <script type="text/javascript" src="js/ui.dialog.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
<link rel="stylesheet" href="css/themes/base/jquery.ui.all.css" />

<link rel="stylesheet" href="css/themes/base/jquery.ui.all.css" />
	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.datepicker.js"></script>
	<script language="javascript" type="text/javascript">
        $(document).ready(function () {
            setDatePicker('date-picker');
            setupDialogBox('dialog', 'opener');
        });
    </script>

</head>

<body>
<!-- WRAPPER START -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Aplikasi Klinik dr. Nancy</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Assalamualaikum  <?php echo $_SESSION['user'];?> |  <a href="logout.php" class="btn-small btn-danger">Keluar</a>
            </p>
            <ul class="nav">
              <li><a href="media.php?mod=home">Beranda</a></li>
              <li><a href="mod.php?mod=pasien" >Pasien</a></li>
              <li><a href="mod.php?mod=obat" >Obat</a></li>
              <li><a href="mod.php?mod=riwayat">Riwayat Pasien</a></li>
              <li><a href="mod.php?mod=cari">Cari</a></li>
              <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cetak<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                      
                        	<li class="nav-header">Cetak</li>
                       <li><a href="mod.php?mod=kartupasien">Kartu Pasien</a> </li>
      <li><a href="mod.php?mod=riwayatpasien">Riwayat Pasien</a> </li>

                        </ul>
                      </li>
              <li><a href="mod.php?mod=user" >Pengaturan</a></li>
<?php			  if($_SESSION["user"]=="admin"){ ?>
			  <li><a href="mod.php?mod=tambah">Tambah User</a></li>
<?php 			}?>	
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>




<div class="modisi"><?php include "isi.php";?></div>

   
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<footer class="footer">
      <div class="container">
        <p>Copy Right by <a href="http://twitter.com/rezapraman4" target="_blank">@rezapraman4</a>.</p>
        <p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">CC BY 3.0</a>.</p>
        <p><a href="http://tipsreza.blogspot.com" target="_blank">Glyphicons Free</a> licensed under <a href="http://creativecommons.org/licenses/by/3.0/" target="_blank">CC BY 3.0</a>.</p>
        <ul class="footer-links">
          <li><a href="http://tipsreza.blogspot.com" target="_blank">Blog</a></li>
          <li class="muted">&middot;</li>
          <li><a href="http://facebook.com/r324h" target="_blank">Facebook</a></li>
          <li class="muted">&middot;</li>
          <li><a href="http://trikomputer.com" target="_blank">Community</a></li>
        </ul>
      </div>
    </footer>
<!-- FOOTER END -->
</body>
</html>
