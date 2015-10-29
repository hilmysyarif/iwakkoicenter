<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengiriman extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'resepsionis';
		$this->cname = $this->module.'/pengiriman';
		$this->load->model('mdl_pengiriman','mp');
	}

	public function index()
	{
		$data['sidebar_active']='resepsionis';
        $data['title']='Jadwal Pengiriman';
        $data['content'] = $this->load->view('/jadwal_pengiriman',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function kirim_barang()
	{
		$param = $this->input->post();
		$replace = $this->mp->replace('atombizz_selling',array('status_pengiriman'=>'1'),array('id'=>$param['id']));
		if($replace){
			echo '1|'.succ_msg('Berhasil merubah status pengiriman barang.');
		} else {
			echo '0|'.err_msg('Gagal merubah data.');
		}
	}

	public function surat_jalan()
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
        $param = paramDecrypt($this->input->get('kode'));
        $data['config'] = $this->config->item('astro');
        $data['data'] = $this->mp->get_selling($param);
        $data['detail'] = $this->mp->get_selling_items($param);
        // $data['data'] = $this->mc->get_visited($param);
        // $data['room'] = $this->mc->get_visited_room($param);

        $this->load->view('/surat_jalan',$data);
    }

    public function get_surat()
    {
    	$param = $this->input->post();
    	$data = $this->mp->get_surat($param);
    	echo $data;
    }

}

/* End of file pengiriman.php */
/* Location: ./application/modules/resepsionis/controllers/pengiriman.php */