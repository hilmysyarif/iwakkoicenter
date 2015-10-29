<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {

	public function daftar_kasir(){	
		$this->datatables->select('id,cashdraw_no,date,start_cash,omset,total_cash,end_cash,(total_cash-end_cash) as selisih,operator')
		// ->edit_column('name', space_data('$1,$2'),'name,space')
		// ->unset_column('space')
		->edit_currency('start_cash','$1','start_cash')
		->edit_currency('omset','$1','omset')
		->edit_currency('total_cash','$1','total_cash')
		->edit_currency('end_cash','$1','end_cash')
		->edit_currency('selisih','$1','selisih')	
		->edit_date('date','$1','date')
		->add_column('Actions',  get_detail_validasi_ajax('$1'),'id')
		->where('status','no')
		// ->where('status','closed')
        ->from('view_selling_cashdraw');

        echo $this->datatables->generate();
	}

	public function daftar_accounting(){	
		$this->datatables->select('id,no_referensi,tanggal,keterangan,debit,kredit,nama')
		->edit_date('tanggal','$1','tanggal')
		->edit_currency('debit','$1','debit')
		->edit_currency('kredit','$1','kredit')
        ->edit_column('keterangan', '$1', 'wrap(keterangan)')
		->add_column('Actions',  get_detail_validasi_ajax('$1'),'id')
		->where('valid = "no" AND (kode = "OPR" OR kode = "PLL" OR kode = "PDL" OR kode = "HTG" OR kode = "PTG")')
        ->from('view_accounting');
        echo $this->datatables->generate();
	}

	public function stok_opname_detail_l()
	{	
		$param = $this->input->post();
		$this->datatables->select('id,product_code,product_name,rak_name,checking_qty,stock_qty,difference,status')
		// ->add_column('Actions', get_detail_only('$1'),'code')
        ->from('atombizz_stock_opname_detail')
        // ->where('status', 'rak')
        ->where('reference', $param['reference']);
        
        echo $this->datatables->generate();
	}


	public function daftar_transaksional()
	{
		$this->datatables->select('id,tanggal,nama_akun,keterangan,debit')
		->edit_date('tanggal','$1','tanggal')
		->edit_currency('debit','$1','debit')
		->add_column('Actions',  get_validasi('$1'),'id')
        ->from('view_transaksional');
        echo $this->datatables->generate();
	}
}