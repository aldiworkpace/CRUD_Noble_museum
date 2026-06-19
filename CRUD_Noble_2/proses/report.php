<?php
include '../koneksi.php';
require '../fpdf/fpdf.php';

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(277, 10, 'Laporan Data Senjata Bersejarah', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(277, 10, 'Dicetak pada: ' . date('d-m-Y'), 0, 1, 'C');
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(10, 10, 'No', 1, 0, 'C');
$pdf->Cell(20, 10, 'Gambar', 1, 0, 'C');
$pdf->Cell(35, 10, 'Nama Senjata', 1, 0, 'C');
$pdf->Cell(35, 10, 'Julukan', 1, 0, 'C');
$pdf->Cell(30, 10, 'Pemilik', 1, 0, 'C');
$pdf->Cell(35, 10, 'Asal Mitologi', 1, 0, 'C');
$pdf->Cell(15, 10, 'Rank', 1, 0, 'C');
$pdf->Cell(25, 10, 'Tipe', 1, 0, 'C');
$pdf->Cell(72, 10, 'Sejarah Asli', 1, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$query = mysqli_query($koneksi, "SELECT * FROM tb_senjata");
$no = 1;

while ($row = mysqli_fetch_array($query)) {
    $tinggi_baris = 20;
    $pdf->Cell(10, $tinggi_baris, $no++, 1, 0, 'C');

    $x_gambar = $pdf->GetX();
    $y_gambar = $pdf->GetY();

    $pdf->Cell(20, $tinggi_baris, '', 1, 0, 'C');
    $path_gambar = '../uploads/' . $row['gambar'];
    if (file_exists($path_gambar) && !empty($row['gambar'])) {
        $pdf->Image($path_gambar, $x_gambar + 2, $y_gambar + 2, 16, 16);
    } else {
        $pdf->Text($x_gambar + 8, $y_gambar + 11, '-');
    }

    $pdf->Cell(35, $tinggi_baris, substr($row['nama_senjata'], 0, 18), 1, 0);
    $pdf->Cell(35, $tinggi_baris, substr($row['julukan_senjata'], 0, 18), 1, 0);
    $pdf->Cell(30, $tinggi_baris, substr($row['nama_pemilik'], 0, 15), 1, 0);
    $pdf->Cell(35, $tinggi_baris, substr($row['asal_mitologi'], 0, 18), 1, 0);
    $pdf->Cell(15, $tinggi_baris, $row['rank_senjata'], 1, 0, 'C');
    $pdf->Cell(25, $tinggi_baris, substr($row['tipe_senjata'], 0, 12), 1, 0);
    $pdf->Cell(72, $tinggi_baris, substr($row['sejarah_asli'], 0, 35) . '...', 1, 1);
}

$pdf->Output('I', 'Laporan_Noble_Phantasm.pdf');
