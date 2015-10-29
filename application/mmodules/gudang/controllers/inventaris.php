<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'gudang';
		$this->cname = $this->module.'/inventaris';
		$this->load->model('mdl_inventaris','mi');
	}

	public function index()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['sidebar_active']='gudang';
        $data['title']='Gudang - Gudang Barang';
        $data['content'] = $this->load->view('/inventaris',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function get_opt_barang()
	{
		$param = $this->input->post();
		$data = $this->mi->get_opt_barang($param);
		echo $data;
	}

	public function save()
	{
		$user = $this->session->userdata('astrosession');
		$config = $this->config->item('astro');
		$param = $this->input->post();

		$masuk = $keluar = 0;
		if($param['status']=='in'){
			$masuk = $param['qty'];
		} else {
			$keluar = $param['qty'];
		}

		$stok = array(
			'date'=>date('Y-m-d'),
			'status'=>$param['status'],
			'in'=>$masuk,
			'out'=>$keluar,
			'description'=>$param['keterangan'],
			'userlog'=>date('Y-m-d H:i:s'),
			'operator'=>$user[0]->uname,
			'product_code'=>$param['product_code'],
			'dept'=>$config['bas_code_dept']
		);

		$save = $this->mi->write('atombizz_inventaris_stok',$stok);
		if($save){
			echo '1|'.succ_msg('Berhasil menyimpan pencatatan stok barang.');
		} else {
			echo '0|'.err_msg('Gagal menyimpan pencatatan stok barang.');
		}

	}

}

/* End of file inventaris.php */
/* Location: ./application/modules/gudang/controllers/inventaris.php */