<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{

	function Header(){
		$this->SetY(1);
		$this->SetX(0);
		$this->SetFont('Arial','',12);
	    $this->Cell(140,5,'BPSPAMS TIRTA KENCANA JEBLOG',0,1,'C');
	    $this->Line(0,7,140,7);
	    $this->Ln(3);
	}

	function Footer(){
		$this->SetY(-6);
		$this->SetX(0);
	    $this->SetFont('Arial','',12);
	    $this->SetTextColor(255,0,0);
	    $this->Line(0,73,150,73);
	    $this->Cell(140,5,'Segera laporkan ! Jika terjadi ketidaksesuaian pencatatan meter air',0,0,'C');
	}
}

$pdf = new PDF('L','mm',array(140,80));
$pdf->AddPage();
$pdf->SetMargins(1,1,1);
$pdf->SetTitle($data['nama']);
$pdf->SetFont('Arial','',12);
$pdf->Image('images/ttd.jpg',90,40,40);

$pdf->SetX(1);
$pdf->Cell(25,7,'Rek. Bulan',0);
$pdf->Cell(115,7,': '.$bulan.' '.date("Y"),0,1);

$pdf->Cell(25,7,'Pelanggan',0);
$pdf->Cell(80,7,': '.$data['nama'],0);
$pdf->Cell(20,7,'No. Pel.',0);
$pdf->Cell(15,7,': '.str_pad($data['nopel'], 4, 0, STR_PAD_LEFT),0,1);

$pdf->Cell(25,7,'Alamat',0);
$pdf->Cell(80,7,': '.$data['alamat'],0);
$pdf->Cell(20,7,'Golongan',0);
$pdf->Cell(15,7,': '.$data['gol'],0,1);

$pdf->Cell(25,7,'Meter Awal',0);
$pdf->Cell(115,7,': '.$awal,0,1);

$pdf->Cell(25,7,'Meter Akhir',0);
$pdf->Cell(115,7,': '.$akhir,0,1);

$pdf->Cell(25,7,'Pemakaian',0);
$pdf->Cell(115,7,': '.$pakai,0,1);

$pdf->Cell(25,7,'Total Bayar',0);
$pdf->Cell(115,7,': Rp ' . number_format($bayar,0,'.','.'),0);

$pdf->Output();
?>