<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	} 

	public function daftar_bayar_personal($value='')
	{
		$this->datatables->select('id,nama,qty,harga,total')
		->add_column('Actions', get_remove_ajax('$1'),'id')
		->where('meja',$value)
        ->from('view_bayar_personal');
        
        echo $this->datatables->generate();
	}

	public function daftar_pesanan($value='')
	{
		$this->datatables->select('id,nama,qty,harga,total')
		// ->add_column('Actions', get_personal_delete_ajax('$1'),'id')
		->add_column('Actions', get_delete_ajax('$1'),'id')
		//->where('meja',$value)
        ->from('view_pesanan');
        
        echo $this->datatables->generate();
	}
	public function daftar_employee($value='')
	{
		$this->datatables->select('id,us_name,reg_date,activation')
		->add_column('Actions', get_edit_delete_ajax('$1'),'id')
        ->from('atombizz_employee');
        
        echo $this->datatables->generate();
	}
	public function daftar_room($value='')
	{
		$this->datatables->select('id,nama,alias,qty')
		->add_column('Actions', get_edit_delete_ajax('$1'),'id')
        ->from('atombizz_ruang');
        
        echo $this->datatables->generate();
	}
	public function daftar_menu($value='')
	{
		$this->datatables->select('id,nama,alias,harga,kategori,kategori_menu,type')
		->add_column('Actions', get_edit_delete_ajax('$1'),'id')
		->edit_currency('harga','$1','harga')
        ->from('atombizz_menu');
        
        echo $this->datatables->generate();
	}
}