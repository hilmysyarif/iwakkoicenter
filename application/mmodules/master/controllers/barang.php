<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'master';
		$this->cname = $this->module.'/barang';
		$this->load->model('mdl_barang','mb');
	}

	public function index()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['sidebar_active']='master';
        $data['title']='Master - Master Barang';
        $data['content'] = $this->load->view('/barang',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function save($value='')
	{
		$param = $this->input->post();

		$id = $param['id'];
		unset($param['id']);
		if($id != NULL){
			$save = $this->mb->replace('atombizz_inventaris',$param,array('id'=>$id));
		} else {
			$total = $this->mb->total('atombizz_inventaris',array('code'=>$param['code']));
			if($total <= 0){
				$save = $this->mb->write('atombizz_inventaris',$param);
			} else {
				$save = FALSE;
				$data = 'stok';
			}
		}

		if($save){
			echo '1|'.succ_msg('Berhasil menambahkan data master.');
		} else {
			if($data=='stok'){
				echo '0|'.err_msg('Gagal, data sudah ada.');
			} else {
				echo '0|'.err_msg('Gagal, coba periksa kembali inputan anda.');
			}
		}
	}

	public function detail_barang($value='')
	{
		$param = $this->input->post();
		$data = $this->mb->detail_barang($param);
		if($data->num_rows() > 0){
			echo json_encode($data->row());
		} else {
			echo FALSE;
		}
	}

	public function delete($value='')
	{
		$param = $this->input->post();
		$delete = $this->mb->delete('atombizz_inventaris',array('id'=>$param['id']));
		if($delete){
			echo '1|'.succ_msg('Berhasil menghapus data.');
		} else {
			echo '0|'.err_msg('Gagal menghapus data.');
		}
	}
}

/* End of file barang.php */
/* Location: ./application/modules/master/controllers/barang.php */