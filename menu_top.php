
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
              Assalamualaikum <a href="#" class="navbar-link"> <?php echo $_SESSION['user'];?> |  <a href="logout.php" class="btn-small btn-danger">Keluar</a></a>
            </p>
            <ul class="nav">
              <li class="active"><a href="media.php?mod=home">Beranda</a></li>
              <li><a href="mod.php?mod=pasien" >Pasien</a></li>
              <li><a href="mod.php?mod=obat" >Obat</a></li>
              <li><a href="mod.php?mod=riwayat">Riwayat Pasien</a></li>
              <li><a href="mod.php?mod=cari">Cari</a></li>
              <li><a href="mod.php?mod=cetak">Cetak</a></li>
              <li><a href="mod.php?mod=user" >Pengaturan</a></li>
<?php			  if($_SESSION["user"]=="admin"){ ?>
			  <li><a href="mod.php?mod=tambah">Tambah User</a></li>
<?php 			}?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
