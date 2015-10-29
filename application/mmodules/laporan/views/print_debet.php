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


// $title_surat = 'SLIP GAJI';


$this->thoni_fpdf->FPDF("P","cm","A4");

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
$this->thoni_fpdf->SetFont('helvetica','B',12);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_name'].' - '.$config['bas_code_dept'],0,0,'L');
$this->thoni_fpdf->Ln(0.4);
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_address'],0,0,'L');
$this->thoni_fpdf->Cell(-19);
$this->thoni_fpdf->SetFont('helvetica','B',14);
$this->thoni_fpdf->Cell(19,1,'ATOMBIZZ',0,0,'R');
$this->thoni_fpdf->Ln(0.4);
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_phone'],0,0,'L');
$this->thoni_fpdf->Ln(0.4);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_email'].' / '.$config['bas_branch_domain'],0,0,'L');

/* Fungsi Line untuk membuat garis */
$this->thoni_fpdf->Line(1,2.8,20,2.8);
$this->thoni_fpdf->Line(1,2.85,20,2.85);

$this->thoni_fpdf->Ln(1);
$this->thoni_fpdf->SetFont('helvetica','B',12);
$this->thoni_fpdf->Cell(19,0.5,'DAFTAR DEBET PERIODE '.tanggalIndo($setup['tgl_awal']).' s/d '.tanggalIndo($setup['tgl_akhir']),0,0,'C');

/* -------------- Header Halaman selesai ------------------------------------------------*/
// print_r($pembelian);exit;

// foreach ($pembelian->result() as $key => $value) {

// $this->thoni_fpdf->Ln(1);
// $this->thoni_fpdf->SetFont('helvetica','B',9);
// $this->thoni_fpdf->Cell(19,1,'Kode Suplier',0,0,'L');
// $this->thoni_fpdf->SetFont('helvetica','',9);
// $this->thoni_fpdf->Cell(-15.5);
// $this->thoni_fpdf->Cell(19,1,':',0,0,'L');
// $this->thoni_fpdf->Cell(-18.5);
// $this->thoni_fpdf->Cell(19,1,$value->vendor_code,0,0,'L');

// $this->thoni_fpdf->Ln(0.5);
// $this->thoni_fpdf->SetFont('helvetica','B',9);
// $this->thoni_fpdf->Cell(19,1,'Nama Suplier',0,0,'L');
// $this->thoni_fpdf->SetFont('helvetica','',9);
// $this->thoni_fpdf->Cell(-15.5);
// $this->thoni_fpdf->Cell(19,1,':',0,0,'L');
// $this->thoni_fpdf->Cell(-18.5);
// $this->thoni_fpdf->Cell(19,1,$value->vendor_name,0,0,'L');

// $this->thoni_fpdf->Ln(0.5);
// $this->thoni_fpdf->SetFont('helvetica','B',9);
// $this->thoni_fpdf->Cell(19,1,'Kode Pembelian',0,0,'L');
// $this->thoni_fpdf->SetFont('helvetica','',9);
// $this->thoni_fpdf->Cell(-15.5);
// $this->thoni_fpdf->Cell(19,1,':',0,0,'L');
// $this->thoni_fpdf->Cell(-18.5);
// $this->thoni_fpdf->Cell(19,1,$value->code,0,0,'L');

// $this->thoni_fpdf->Ln(0.5);
// $this->thoni_fpdf->SetFont('helvetica','B',9);
// $this->thoni_fpdf->Cell(19,1,'Tanggal Pembelian',0,0,'L');
// $this->thoni_fpdf->SetFont('helvetica','',9);
// $this->thoni_fpdf->Cell(-15.5);
// $this->thoni_fpdf->Cell(19,1,':',0,0,'L');
// $this->thoni_fpdf->Cell(-18.5);
// $this->thoni_fpdf->Cell(19,1,tanggalIndo($value->date),0,0,'L');


$x = $this->thoni_fpdf->GetX();
$y = $this->thoni_fpdf->GetY()+0.1;
  
$this->thoni_fpdf->SetFont('helvetica', 'B', 11);

$this->thoni_fpdf->SetXY(1, $y+0.7);
$this->thoni_fpdf->SetWidths(array(2, 5.5, 5, 6.5));
$this->thoni_fpdf->SetAligns(array('C','C','C','C'));
$this->thoni_fpdf->Row(array('No.', 'Nama Bank', 'Jumlah', 'Status'));
$no = 1;
$i = 0;
$total = 0;
$this->thoni_fpdf->SetFont('helvetica', '', 9);

// $sql = "SELECT * FROM view_purchase_items WHERE purchase_code = ?";
// $query = $this->db->query($sql,$value->code);

foreach ($data as $key2 => $value2) {
   // $subtotal = $value2->qty * $value2->unit_price;
   $this->thoni_fpdf->SetAligns(array('C','L','R','C'));
   $this->thoni_fpdf->Row(array($no, $value2->bank, format_rupiah($value2->jumlah), ($value2->claimed == 'yes') ? 'Claimed' : 'Unclaimed' ));
   // $total += $value2->subtotal;
   $no++;
}

// $diskon = ($value->discount == 0) ? format_rupiah($value->nominal_discount) : $value->discount;

// $this->thoni_fpdf->SetWidths(array(24, 3));
// $this->thoni_fpdf->SetAligns(array('C','C'));
// $this->thoni_fpdf->Row(array('TOTAL ',format_rupiah($total)));

// $this->thoni_fpdf->SetWidths(array(15, 4));
// $this->thoni_fpdf->SetAligns(array('C','R'));
// $this->thoni_fpdf->Row(array('DISKON ',$diskon));

// $this->thoni_fpdf->SetWidths(array(15, 4));
// $this->thoni_fpdf->SetAligns(array('C','R'));
// $this->thoni_fpdf->Row(array('GRAND TOTAL ',format_rupiah($value->total)));

// }

//The first param should be the width of text area
//0 value will make the FPDF automate the width
//The second param is the line spacing for this paragraph
//The third param is the text
// $this->thoni_fpdf->WriteTag(19,0.7, $text, 1, "J", 0, 7);

/* setting posisi footer 3 cm dari bawah */
$this->thoni_fpdf->SetY(-3);

/* setting font untuk footer */
$this->thoni_fpdf->SetFont('helvetica','',9);

/* setting cell untuk waktu pencetakan */ 
$this->thoni_fpdf->Cell(19, 0.5, 'Printed on : '.tanggalIndo(date('Y-m-d')).' | '.date('H:i:s'),0,'LR','L');
$this->thoni_fpdf->Cell(-6);
$this->thoni_fpdf->Cell(19, 0.5, 'Created by : ATOMBIZZ',0,'LR','L');
/* setting cell untuk page number */
// $this->thoni_fpdf->Cell(24.5, 0.5, 'Page '.$this->thoni_fpdf->PageNo().'/{nb}',0,0,'R');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->thoni_fpdf->Output("laporan_debet.pdf","I");
?>