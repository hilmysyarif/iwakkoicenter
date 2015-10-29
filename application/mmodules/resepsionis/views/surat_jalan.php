<?php

/* setting zona waktu */ 
date_default_timezone_set('Asia/Jakarta');

/* konstruktor halaman pdf sbb :    
   P  = Orientasinya "Potrait"
   cm = ukuran halaman dalam satuan centimeter
   A4 = Format Halaman
   
   jika ingin mensetting sendiri format halamannya, gunakan array(width, height)  
   contoh : $this->thoni_fpdf->FPDF("P","cm", array(20, 20));  
*/


$title_surat = 'SLIP GAJI';


$this->thoni_fpdf->FPDF("P","cm","A5");

// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
// $this->thoni_fpdf->SetMargins(1,1,1);

/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->thoni_fpdf->AliasNbPages();

// AddPage merupakan fungsi untuk membuat halaman baru
$this->thoni_fpdf->AddPage();

// Setting Font : String Family, String Style, Font size 
// $this->thoni_fpdf->SetFont('helvetica','B',10);

/* Kita akan membuat header dari halaman pdf yang kita buat 
   -------------- Header Halaman dimulai dari baris ini -----------------------------
*/
// $this->thoni_fpdf->Image( 'assets/logo/ga_logo.jpg' ,9 ,0.5 ,3 ,1.5);
// fungsi Ln untuk membuat baris baru
// $this->thoni_fpdf->Ln();
// $this->thoni_fpdf->Cell(19,0.7,'TERAKREDITASI "B" BAN PT',0,0,'C');

/* Setting ulang Font : String Family, String Style, Font size
   kenapa disetting ulang ???
   jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
   tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
   maka kita harus mensetting ulang Font nya.
   jika diatas settingannya : helvetica, 'B', '12'
   khusus untuk penulisan alamat, kita setting : helvetica, '', 10
   yang artinya string stylenya normal / tidak Bold dan ukurannya 10 
*/
$this->thoni_fpdf->SetFont('helvetica','B',11);
$this->thoni_fpdf->Cell(13.8,0.5,$config['bas_branch_name'],0,0,'L');
$this->thoni_fpdf->Ln(0.4);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(13.8,0.5,$config['bas_branch_address'],0,0,'L');
$this->thoni_fpdf->Cell(-14.7);
$this->thoni_fpdf->SetFont('helvetica','B',9);
$this->thoni_fpdf->Cell(13.8,1,'ATOMBIZZ FOR WAREHOUSE APPLICATION',0,0,'R');
$this->thoni_fpdf->Ln(0.4);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_phone'],0,0,'L');
$this->thoni_fpdf->Ln(0.4);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_email'],0,0,'L');

$this->thoni_fpdf->Line(1,2.8,13.8,2.8);
$this->thoni_fpdf->Line(1,2.85,13.8,2.85);

$this->thoni_fpdf->Ln(1);
$this->thoni_fpdf->SetFont('helvetica','BI',14);
$this->thoni_fpdf->Cell(0,0.5,'SURAT JALAN',0,0,'C');

$this->thoni_fpdf->Ln(1);
$this->thoni_fpdf->SetFont('helvetica','B',12);
$this->thoni_fpdf->Cell(0,0.5,'Data Pembelian',0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,1,'No. Invoice',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,$data->invoice_no,0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,1,'Pelanggan',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,$data->customer_name,0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,1,'Tanggal Pemesanan',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,tanggalIndo($data->date),0,0,'L');

// $this->thoni_fpdf->Ln(0.5);
// $this->thoni_fpdf->SetFont('helvetica','',9);
// $this->thoni_fpdf->Cell(19,1,'Tujuan',0,0,'L');
// $this->thoni_fpdf->SetFont('helvetica','',9);
// $this->thoni_fpdf->Cell(-15.5);
// $this->thoni_fpdf->Cell(19,1,':',0,0,'L');
// $this->thoni_fpdf->Cell(-18.5);
// $this->thoni_fpdf->Cell(19,1,$data->tujuan,0,0,'L');

$this->thoni_fpdf->Ln(1);
$this->thoni_fpdf->SetFont('helvetica','B',12);
$this->thoni_fpdf->Cell(0,0.5,'Data Pengiriman',0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,1,'No. Telp',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,$data->phone,0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,1,'Alamat',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,$data->address,0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(19,1,'Tgl Pengiriman',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',9);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,tanggalIndo($data->pengiriman),0,0,'L');

$this->thoni_fpdf->SetXY(1, 9.3);
$this->thoni_fpdf->SetWidths(array(1, 3, 1.3, 3, 1.5, 3));
$this->thoni_fpdf->SetAligns(array('C','C','C','C','C','C'));
$this->thoni_fpdf->Row(array('No.', 'Produk', 'Qty', 'Harga', 'Diskon', 'SubTotal'));
$no = 1;
foreach ($detail as $key => $value) {
   $this->thoni_fpdf->SetAligns(array('C','L','C','R','R','R'));
   $this->thoni_fpdf->Row(array($no, $value->product_code.' '.$value->product_name, $value->qty, format_rupiah($value->price), $value->discount, format_rupiah($value->subtotal)));   
}



// $this->thoni_fpdf->SetY(-3);

// /* setting font untuk footer */
// $this->thoni_fpdf->SetFont('helvetica','',8);

// /* setting cell untuk waktu pencetakan */ 
// $this->thoni_fpdf->Cell(13.8, 0.5, 'Printed on : '.tanggalIndo(date('Y-m-d')).' | '.date('H:i:s'),0,'LR','L');
// $this->thoni_fpdf->Cell(-14.8);
// $this->thoni_fpdf->Cell(13.8, 0.5, 'Created by : Atombizz For Hotel.',0,'LR','R');
/* setting cell untuk page number */
// $this->thoni_fpdf->Cell(24.5, 0.5, 'Page '.$this->thoni_fpdf->PageNo().'/{nb}',0,0,'R');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->thoni_fpdf->Output("faktur.pdf","I");
?>