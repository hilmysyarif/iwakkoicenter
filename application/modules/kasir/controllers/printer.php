<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printer extends ASTRO_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "kasir";
		$this->cname = "kasir/printer";
		$this->load->model('Mdl_kasir','ksr');

		$access = strtolower($this->module);
		$this->permission->check_module_permission($access);
	}

	function spacer($unit)
	{
		$loop = 40 - $unit;
		$space = ' ';
		for ($i=1; $i <$loop ; $i++) { 
			$space .= ' ';
		}
		return $space;
	}

	public function print_invoice()
	{
		$id = $this->input->post('id');
		$list = $this->ksr->get_order_list($id, true);
		$total = $this->ksr->get_total_harga($id);
		$config = $this->config->item('astro');

		$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
		$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
		$handle = fopen($file, 'w');
		//ata  = "1234567890123456789012345678901234567890\n";

		$cnt = 32;

		$Data  = align_center($cnt,$config['bas_branch_name'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_address'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_phone'])."\n";
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_center($cnt,"GUEST BILL")."\n";
		$Data .= "\n";
		$Data .= "TANGGAL : ".tanggalIndo($list[0]->date)."\n";
		$Data .= "MEJA    : ".$list[0]->meja."\n";
		$Data .= cetak_garis($cnt)."\n";
		foreach ($list as $key => $value) {
			$Data .= $value->nama."\n";
			$Data .= "X ".align_left(3,$value->qty)."   ".align_left(($cnt/2)-8,format_harga($value->harga)).align_right($cnt/2,format_harga($value->total))."\n";
		}
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_left($cnt/2,"TOTAL").align_right($cnt/2,format_harga($total))."\n\n";
		$Data .= align_center($cnt,"*belum termasuk discount jika ada.");

		print_r($Data);//exit();
		$handle = @printer_open('58 Printer'); 
		@printer_set_option($handle, PRINTER_MODE, "RAW");
		@printer_write($handle, $Data); 
		@printer_close($handle);
	}

	public function print_order_list()
	{
		$id = $this->input->post('id');
		$list = $this->ksr->get_order_list($id, false);
		$this->ksr->set_printed($id);
		if (empty($list)) {
			echo "kosong"; exit();
		}
		$config = $this->config->item('astro');
		$cnt = 32;

		$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
		$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
		$handle = fopen($file, 'w');
		//ata  = "1234567890123456789012345678901234567890\n";
		$Data  = align_center($cnt,$config['bas_branch_name'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_address'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_phone'])."\n";
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_center($cnt,"ORDER LIST")."\n";
		$Data .= "\n";
		$Data .= "TANGGAL  : ".tanggalIndo($list[0]->date)."\n";
		$Data .= "MEJA     : ".$list[0]->meja."\n";
		$Data .= cetak_garis($cnt)."\n";
		foreach ($list as $key => $value) {
			$Data .= align_left($cnt-5,$value->nama).align_right(5,'X '.$value->qty)."\n";
		}
		$Data .= cetak_garis($cnt)."\n";

		print_r($Data);//exit();
		$handle = @printer_open('58 Printer'); 
		@printer_set_option($handle, PRINTER_MODE, "RAW");
		@printer_write($handle, $Data); 
		@printer_close($handle);
	}

	public function print_struck()
	{
		$id = $this->input->post('id');
		$bayar = $this->input->post('bayar');
		$discount = $this->input->post('disc');
		$list = $this->ksr->get_order_payed($id);
		$struck = $this->ksr->get_struk($id);
		$disc = $struck->tagihan * $discount / 100;
		$tagihan = $struck->tagihan - $disc;
		// $tax = $tagihan/10;
		$total_tag = $tagihan;// + $tax;
		$kembalian = $bayar - $total_tag;

		$config = $this->config->item('astro');
		$cnt = 32;

		$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
		$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
		$handle = fopen($file, 'w');
		$Data  = align_center($cnt,$config['bas_branch_name'])."\n";
		
		$alamat = explode(",",$config['bas_branch_address']);
		$Data .= align_center($cnt,$alamat[0])."\n";
		$Data .= align_center($cnt,$alamat[1])."\n";
		//$Data .= align_center($cnt,$config['bas_branch_address'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_phone'])."\n";
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_center($cnt,"NOTA PEMBAYARAN")."\n";
		$Data .= "\n";
		$Data .= align_left(28,"TANGGAL  : ".tanggalIndo($struck->date))."\n";
		$Data .= align_left($cnt,"NO. NOTA : ".$struck->invoice)."\n";
		$namakasir =  $this->session->userdata('astrosession')[0]->nama;
		$Data .= align_left($cnt,"KASIR : ".$namakasir)."\n";
		$Data .= cetak_garis($cnt)."\n";
		foreach ($list as $key => $value) {
			$Data .= $value->nama."\n";
			$Data .= "X ".align_left(3,$value->qty)."   ".align_left(($cnt/2)-8,format_harga($value->harga)).align_right($cnt/2,format_harga($value->total))."\n";
		}
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_left($cnt/2,"TOTAL").align_right($cnt/2,format_harga($struck->tagihan))."\n";
		$Data .= align_left($cnt/2,"DISCOUNT(".$discount."%)").align_right($cnt/2,format_harga($disc))."\n";
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_left($cnt/2,"TAGIHAN").align_right($cnt/2,format_harga($total_tag))."\n";

		if ($struck->cash == 1) {
			$Data .= align_left($cnt/2,"BAYAR").align_right($cnt/2,format_harga($bayar))."\n";
			$Data .= align_left($cnt/2,"KEMBALIAN").align_right($cnt/2,format_harga($kembalian))."\n";
		} elseif ($struck->cash == 0) {
			$Data .= align_center($cnt,"**Pembayaran dengan Kartu Debet**")."\n";
			$Data .= align_center($cnt,"Bank ".$struck->note);
		} else {
			$Data .= align_center($cnt,"COMPLIMENT");
		}

		$Data .= cetak_garis($cnt);
		$Data .= align_center($cnt,"\n*Terima Kasih Atas Kunjungannya*")."\n\n\n\n\n\n\n\n\n\n\n";

		$this->ksr->delete_tmp_personal($id);
		print_r($Data);//exit();
		$handle = @printer_open('wien'); 
		@printer_set_option($handle, PRINTER_MODE, "RAW");
		@printer_write($handle, $Data); 
		@printer_close($handle);
	}	
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */