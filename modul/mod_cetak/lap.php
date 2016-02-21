<?php
session_start();

include "../koneksi.php";
//include "../Configurasi/fungsi_indotgl.php";
//include "../Configurasi/library.php";

include "fpdf17/fpdf.php";


//$tgl = tgl_indo(date('Y m d'));
$pdf = new FPDF();
$pdf->Open();
//Poisi Kertas
$pdf->addPage('L','A4');
$pdf->setAutoPageBreak(false);

//mengatur posisi tabel yang ditampilkan
$a = 10; //posisi field record atas / bawah
$b = 16; //posisi isi record atas / bawah
$pdf->setFont('Arial','',10);
$pdf->text(10 /*nilai kiri / kanan*/ ,8,'BIDAN ADE SRI RUHMIYATI');
$pdf->setFont('Arial','',5);
$pdf->text(10 /*nilai kiri / kanan*/ ,11,'jln. sepatan no.768 tangerang');
$pdf->setFont('Arial','',8);
$pdf->text(41 /*nilai kiri / kanan*/ ,15,'Kartu Berobat');

//Field yang ada pada database

//query baca data MySQL

$sql = mysql_query("select *from tbl_pasien where idpasien='$_GET[idpasien]'");
   
//looping penbacaan record

while($data = mysql_fetch_array($sql)){
	$SQL="SELECT * FROM tbl_pasien where idpasien='$_GET[idpasien]' ";
	$bacakategori = mysql_query($SQL);
	$ex=mysql_fetch_array($bacakategori);
       $pdf->setXY(10/*nilai untuk mengatur posisi isi record kiri / kanan*/,$b);
       $pdf->setFont('arial','',7);
       $pdf->setFillColor(255,255,255);
      
       
      // $pdf->cell(30,6,'id pasien',1,0,'L',1);
       //$pdf->cell(5,6,':',1,0,'C',1);
      // $pdf->cell(60,6,$data['idpasien'],1,0,'L',1);
      // $pdf->Ln(5);
       $pdf->cell(20,3,'No Registrasi',0,0,'L',1);
       $pdf->cell(5,3,':',0,0,'C',1);
       $pdf->cell(60,3,$data['noreg'],0,0,'L',1);
       $pdf->Ln(3);
       $pdf->cell(20,3,'Nama Pasien',0,0,'L',1);
       $pdf->cell(5,3,':',0,0,'C',1);
       $pdf->cell(60,3,$data['namapasien'],0,0,'L',1);
       $pdf->Ln(3);
		 $pdf->cell(20,3,'Tanggal Lahir',0,0,'L',1);
		 $pdf->cell(5,3,':',0,0,'C',1);
		 $pdf->cell(60,3,$data['tgllhr'],0,0,'L',1);
		 $pdf->Ln(3);
      
	    $pdf->CELL(20,3,'Jenis Kelamin',0,0,'L',1);
	    $pdf->cell(5,3,':',0,0,'C',1);
	    $pdf->CELL(60,3,$data['jeniskel'],0,0,'L',1);
	    $pdf->Ln(3);
	    $pdf->cell(20,3,'Pekerjaan',0,0,'L',1);
		 $pdf->cell(5,3,':',0,0,'C',1);	    
	    $pdf->cell(60,3,$data['pekerjaan'],0,0,'L',1);
	    $pdf->Ln(3);
       $pdf->cell(20,3,'Nama KK',0,0,'L',1);
       $pdf->cell(5,3,':',0,0,'C',1);	    
       $pdf->cell(60,3,$data['namakk'],0,0,'L',1);
       $pdf->Ln(3);
	    $pdf->cell(20,3,'Tanggal Daftar',0,0,'L',1);
	     $pdf->cell(5,3,':',0,0,'C',1);	  
	    $pdf->cell(60,3,$data['tgldaftar'],0,0,'L',1);
	     $pdf->Ln(3);
        $pdf->Cell(20,4,'Alamat',0,0,'L',1);
       $pdf->Cell(5,3,':',0,0,'C',1);
       $pdf->MultiCell(60,6,$data['alamat'],0,1);
       
}
  // Go to 1.5 cm from bottom


$pdf->output();
?>
