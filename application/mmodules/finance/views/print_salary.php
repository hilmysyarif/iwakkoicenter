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
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_name'].' - '.$config['bas_code_dept'],0,0,'L');
$this->thoni_fpdf->Ln(0.3);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_address'],0,0,'L');
$this->thoni_fpdf->Cell(-19);
$this->thoni_fpdf->SetFont('helvetica','B',16);
$this->thoni_fpdf->Cell(19,0.75,'Atombizz For Clinic',0,0,'R');
$this->thoni_fpdf->Ln(0.3);
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_phone'],0,0,'L');
$this->thoni_fpdf->Ln(0.3);
$this->thoni_fpdf->Cell(19,0.5,$config['bas_branch_email'].' / '.$config['bas_branch_domain'],0,0,'L');

/* Fungsi Line untuk membuat garis */
$this->thoni_fpdf->Line(1,2.5,20,2.5);
$this->thoni_fpdf->Line(1,2.55,20,2.55);

/* -------------- Header Halaman selesai ------------------------------------------------*/

$this->thoni_fpdf->Ln(0.75);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Kode Karyawan',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,$faktur->employee_code,0,0,'L');
$this->thoni_fpdf->Cell(-23);
$this->thoni_fpdf->Cell(19,1,'Diberikan Tanggal : '.tanggalIndo($faktur->date),0,0,'R');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Nama Karyawan',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,$faktur->employee_name,0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Penggajian Periode',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,bulanIndo($faktur->bulan).' '.$faktur->tahun,0,0,'L');

$this->thoni_fpdf->Line(1,4.8,20,4.8);

$this->thoni_fpdf->Ln(1.3);
$this->thoni_fpdf->SetFont('helvetica','B',12);
$this->thoni_fpdf->Cell(19,1,'PENERIMAAN',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','B',12);
$this->thoni_fpdf->Cell(-9);
$this->thoni_fpdf->Cell(19,1,'POTONGAN',0,0,'L');

$this->thoni_fpdf->Ln(0.75);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Gaji Pokok',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->gaji_pokok),0,0,'L');

$this->thoni_fpdf->Cell(-13);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Hutang (Kasbon)',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->hutang),0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Bonus',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->bonus),0,0,'L');

$this->thoni_fpdf->Cell(-13);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Potongan Lain',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->potongan_lain),0,0,'L');

$this->thoni_fpdf->Ln(0.5);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Tunjangan Lain',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->tunjangan_lain),0,0,'L');

$this->thoni_fpdf->Line(1,7.8,20,7.8);

$this->thoni_fpdf->Ln(1.2);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Total Penerimaan',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->penerimaan),0,0,'L');

$this->thoni_fpdf->Cell(-13);
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(19,1,'Total Potongan',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','B',10);
$this->thoni_fpdf->Cell(-15.5);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->potongan),0,0,'L');

$this->thoni_fpdf->Ln(1.2);
$this->thoni_fpdf->SetFont('helvetica','B',14);
$this->thoni_fpdf->Cell(19,1,'TOTAL GAJI DITERIMA',0,0,'L');
$this->thoni_fpdf->SetFont('helvetica','B',14);
$this->thoni_fpdf->Cell(-13);
$this->thoni_fpdf->Cell(19,1,':',0,0,'L');
$this->thoni_fpdf->Cell(-18.5);
$this->thoni_fpdf->Cell(19,1,format_rupiah($faktur->total),0,0,'L');

$this->thoni_fpdf->Ln(2);


//The first param should be the width of text area
//0 value will make the FPDF automate the width
//The second param is the line spacing for this paragraph
//The third param is the text
// $this->thoni_fpdf->WriteTag(19,0.7, $text, 1, "J", 0, 7);

/* setting posisi footer 3 cm dari bawah */
// $this->thoni_fpdf->SetY(-1);

/* setting font untuk footer */
$this->thoni_fpdf->SetFont('helvetica','',9);

/* setting cell untuk waktu pencetakan */ 
$this->thoni_fpdf->Cell(19, 0.5, 'Printed on : '.tanggalIndo(date('Y-m-d')).' | '.date('H:i:s'),0,'LR','L');
$this->thoni_fpdf->Cell(-4.7);
$this->thoni_fpdf->Cell(19, 0.5, 'Created by : Atombizz For Clinic.',0,'LR','L');
/* setting cell untuk page number */
// $this->thoni_fpdf->Cell(24.5, 0.5, 'Page '.$this->thoni_fpdf->PageNo().'/{nb}',0,0,'R');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->thoni_fpdf->Output("Slip_penggajian.pdf","I");
?>