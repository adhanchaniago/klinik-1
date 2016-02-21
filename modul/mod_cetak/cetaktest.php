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


$pdf->Image('LOGO.jpg',10/*width*/,3/*height*/,25/*up*/,25/*down*/);
$pdf->setFont('Arial','B',30);
$pdf->text(75/*nilai kiri / kanan*/ ,15 /*nilai atas / bawah*/,'STMIK PRANATA INDONESIA');
$pdf->setFont('Arial','I',16);
$pdf->text(85 /*nilai kiri / kanan*/ ,22,'Sekolah Tinggi Menejemen Informatika & Kmputer');
$pdf->setFont('Arial','',10);
$pdf->text(74 /*nilai kiri / kanan*/ ,27,'Kampus E : Jln. Bina Putra Mandiri No.1  Kecamatan Parungpanjang - Bogor Tlp (021) 70794658');

$pdf->setFont('Arial','',13);
$pdf->text(115,48,'LAPORAN HASIL UJIAN SISWA');

$pdf->Cell(0, 19.8, " ", "B");
$pdf->Ln(10);
$pdf->Cell(0, 10.5, " ", "B");
$pdf->Ln(10);
$pdf->Cell(0, 0.8, " ", "B");
$pdf->Ln(10);


$pdf->setFont('Arial','',8);

//mengatur posisi tabel yang ditampilkan
$a = 70; //posisi field record atas / bawah
$b = 65; //posisi isi record atas / bawah


//Field yang ada pada database
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10/*nilai untuk mengatur posisi filed kiri / kanan*/,$b);
$pdf->CELL(8,6,'No.',1,0,'C',1);
$pdf->CELL(30,6,'No Reg',1,0,'C',1);
$pdf->CELL(50,6,'Nama Pasien',1,0,'C',1);
$pdf->CELL(20,6,'Tanggal Lahir',1,0,'C',1);
$pdf->CELL(84,6,'Alamat',1,0,'C',1);
$pdf->CELL(20,6,'jenis Kelamin',1,0,'C',1);
$pdf->CELL(20,6,'Pekerjaan',1,0,'C',1);
$pdf->CELL(25,6,'Nama KK',1,0,'C',1);
$pdf->CELL(25,6,'Tanggal Daftar',1,0,'C',1);
$row = 0;
$b = $a + $row;
//query baca data MySQL

$sql = mysql_query("select *from tbl_pasien");
       $i = 1;
       $no = 1;
       $max = 31;
	   $row = 6;
//looping penbacaan record

while($data = mysql_fetch_array($sql)){
	
	$SQL="SELECT * FROM tbl_pasien ";
	$bacakategori = mysql_query($SQL);
	$ex=mysql_fetch_array($bacakategori);
	
       $pdf->setXY(10/*nilai untuk mengatur posisi isi record kiri / kanan*/,$b);
       $pdf->setFont('arial','',7);
       $pdf->setFillColor(255,255,255);
       $pdf->cell(8,6,$no,1,0,'C',1);
       $pdf->cell(30,6,$data['noreg'],1,0,'C',1);
       $pdf->cell(50,6,$data['namapasien'],1,0,'L',1);
	$pdf->cell(20,6,$data['tgllhr'],1,0,'C',1);
       $pdf->cell(84,6,$data['alamat'],1,0,'C',1);
	   $pdf->CELL(20,6,$data['jeniskel'],1,0,'C',1);
	$pdf->cell(20,6,$data['pekerjaan'],1,0,'L',1);
       $pdf->cell(25,6,$data['namakk'],1,0,'L',1);
	$pdf->cell(25,6,$data['tgldaftar'],1,0,'L',1);
	$b = $b+$row;
       $no++;
       $i++;
}
  // Go to 1.5 cm from bottom
    $pdf->SetY(-15);
    // Select Arial italic 8
    $pdf->SetFont('Arial','I',7);
    // Print centered page number
    $pdf->Cell(0,-37,'Catatan  : ',0,0,'L');
	$pdf->Line(80/*posisi awal garis */,179 /*nilai x1*/,11/*panjang*/,179/*nilai x2*/);
    $pdf->Ln(5);
	$pdf->SetFont('Arial','',7);
    // Print centered page number
    $pdf->Cell(0,-27,'By : Ophuz dHunter @ nGOpre-X CR3W',0,0,'L');

$pdf->output();
?>
