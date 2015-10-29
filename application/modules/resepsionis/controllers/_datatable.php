<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends ASTRO_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'resepsionis';
	}

	public function index()
	{
		redirect($this->module);
	}

	public function daftar_retur($value='')
	{
		$this->datatables->select('id,reference,nota,date,operator')
		->add_column('Actions',  get_detail_ajax('$1'),'id')
		->edit_date('date','$1','date')
        ->from('atombizz_retur_in');
        
        echo $this->datatables->generate();
	}

	public function daftar_retur_detail($value='')
	{
		$param = $this->input->post();
		$this->datatables->select('id,product_code,product_name,quantity,hpp')
		->add_column('tes', '$1' ,'total(quantity,hpp)')
		->edit_currency('tes','$1','tes')
		->edit_currency('hpp','$1','hpp')
        ->from('view_retur_internal')
        ->where('id',$param['id']);
        
        echo $this->datatables->generate();
	}

	public function data_transaksi($value='')
	{
		$this->datatables->select('id,cashdraw_code,guest_code,guest_name')
		->add_column('Actions', get_transaksi('$1'),'guest_code')
        ->from('view_data_transaksi');
        
        echo $this->datatables->generate();
	}

	public function jadwal_pengiriman($value='')
	{
		$this->datatables->select('id,pengiriman,invoice_no,address,phone,total')
		->add_column('Actions', get_berangkat('$1'),'id')
		->edit_currency('total','$1','total')
		->edit_date('pengiriman','$1','pengiriman')
		->where('pengiriman <=',date('Y-m-d',strtotime('+3 days')))
        ->from('view_pengiriman');
        
        echo $this->datatables->generate();
	}
}

/* End of file _datatable.php */
/* Location: ./application/modules/resepsionis/controllers/_datatable.php */