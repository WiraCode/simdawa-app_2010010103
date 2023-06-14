<?php
$pdf = new FPDF("P", "cm", "A4"); //orientasi kertas (P/L), satuan kertas(cm/mm), ukuran kertas
$pdf->AddPage();
$pdf->SetTitle("Laporan Data Beasiswa");
//$gambarlogo = base_url('assets/images/logouniska.png');
//$pdf->Image($gambarlogo, 1.5, 0.8, 2, 2);
$pdf->SetFont("Arial", "B", 16); //setfont(jenis font, style (8), ukuran font) setfont berlaku sampai ada setfont berikutnya
$pdf->Cell(19, 1, "KEMAHASISWAAN UNISKA BANJARMASIN", 0, 1, "C");
//Cell - Textbox (lebar, tinggi, teks, border(0,1), posisi cell selanjutnya (8,1), perataan teks(C,R,L,J))
$pdf->SetFont("Arial", "", 11);
$pdf->Cell(19, 1, "Alamat: Jl. Adhyaksa No.2 Kel. Sungai Miai Kec. Banjarmasin Utara", 6, 1, "C");
$pdf->Line(1, 3, 28, 3); //Line untuk membuat garis dengan 4 parameter(x1, yl, x2, y2)
$pdf->ln();
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(19, 1, "Laporan Data Beasiswa", 9, 1, "C");
$pdf->ln();
$pdf->SetFont("Arial", "B", 11);
$pdf->SetFillColor(0, 255, 0); //mengatur background cell
$pdf->Cell(1, 1, "No", 1, 0, "C", true); //nilai true pada cell untuk mengaktifkan background dari celfl
$pdf->Cell(6, 1, "Nama Beasiswa", 1, 0, "C", true);
$pdf->Cell(4, 1, "Tanggal Mulai", 1, 0, "C", true);
$pdf->Cell(4, 1, "Tanggal Selesai", 1, 0, "C", true);
$pdf->Cell(4, 1, "Jenis Beaslswa", 1, 1, "C", true);
$pdf->SetFont("Arial", "", 11);
$no = 1;
foreach ($beasiswa as $a) {
    $pdf->Cell(1, 1, $no++, 1, 0, "C");
    $pdf->Cell(6, 1, $a->nama_beasiswa, 1, 0, "C");
    $pdf->Cell(4, 1, $a->tanggal_mulai, 1, 0, "C");
    $pdf->Cell(4, 1, $a->tanggal_selesai, 1, 0, "C");
    $pdf->Cell(4, 1, $a->nama_jenis, 1, 1, "C");
}
$pdf->Output();
