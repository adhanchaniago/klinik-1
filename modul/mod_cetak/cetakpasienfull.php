
<?php

require('fpdf17/fpdf.php');

class PDF extends FPDF
{ 

// membaca data dari database

function LoadData()
{   ob_start();
    $data=array();
    mysql_connect("localhost","root","");
    mysql_select_db("klinik");
    $query = "SELECT * FROM tbl_pasien ";
    $hasil = mysql_query($query);
    $i = 0;
    while ($fetchdata = mysql_fetch_row($hasil))
    {
	$i++; // membuat counter 1, 2, 3, ... untuk ditampilkan
      array_unshift($fetchdata,$i);
	$data[] = $fetchdata;	
    }
    return $data;
}


function Header() {


$this->Image('LOGO.jpg',15,5,15);
 
	$this->SetFont('Arial','B',18);
 
	$this->Cell(0,0.75,'Klinik dr. Nancy',0,0,'C');
 
	$this->Ln(5);
 
	$this->SetFont('Arial','B',14);
 
	$this->Cell(0,1,'KABUPATEN Bekasi',0,0,'C');
 
	$this->Ln(5);
 
	$this->SetFont('Arial','',10);
 
	$this->Cell(0,0.5,'Bekasi Timur Regency Blok L1 No.1 Telp.Fax. (021) ',0,0,'C');
	$this->Ln(4);
	$this->SetFont('Arial','',10);

	$this->Cell(0,0.5,'Tangerang - 16914',0,0,'C');
	$this->Cell(0, 10.8, " ", "B");
	$this->Ln(2);
	$this->Cell(0, 1.5, " ", "B");
	$this->Ln();
	$this->Cell(0, 0.8, " ", "B");
	$this->Ln();
	$this->SetFont('Arial','',14);
	$this->Ln(5);
	$this->cell(0,0.75,'Laporan Data Pasien',0,0,'C');
	$this->Ln(8);
}
 
// function untuk menampilkan tabel
function clear(){
	$this->cell(0,0,34,'a',0,0,'C');
}

function TabelWarna($header,$data)
{
    // setting lebar masing-masing kolom dalam mm
    $w=array(6,6,18,60,18,64,18,31,33,23);    

    // membuat kepala tabel
    for($i=0;$i<count($header);$i++)
    {
	// memberi warna latar merah pada kepala tabel
	$this->SetFillColor(47, 136, 203);    	
// setting huruf bold pada kepala tabel
	$this->SetFont('Arial','B',7);           
	// parameter L menunjukkan teks rata kiri pada setiap 
// sel kepala tabel 
$this->Cell($w[$i],7,$header[$i],1,0,'L',1);    
    }
    $this->Ln();
    // menampilkan data
    // setting jenis font pada data tabel
    $this->SetFont('Arial','',6);     
	
    $j = 0;
    foreach($data as $row)
    {
	// menampilkan perubahan warna latar putih dan biru muda 
// setiap ganti baris
	if ($j % 2 == 0) 
$this->SetFillCOlor(255,255,255,255,255,255,255,255); // setting warna putih
	else 
$this->SetFillCOlor(149,194,255); // setting warna biru muda
	
	// menampilkan data rata kiri	
	for($i=0;$i<=sizeof($w)-1;$i++)
		$this->Cell($w[$i],6,$row[$i],1,0,'L',1);							
      $this->Ln();
	$j++;
    }
    // penutup tabel
    $this->Cell(array_sum($w),0,'','T');
}

}

$pdf=new PDF();
$pdf->SetTitle($title);

// nama-nama kolom untuk kepala tabel
$header=array('No','ID','No Registrasi','Nama Pasien','Tanggal Lahir','Alamat','Jenis Kelamin','Pekerjaan','Nama KK','Tanggal Daftar');

// memanggil function untuk baca data
$data=$pdf->LoadData();
$pdf->addPage('L','A4');

// memanggil function untuk menampilkan tabel
$pdf->TabelWarna($header,$data);
$pdf->Output();
?>
