<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kas extends ASTRO_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "resepsionis";
		$this->cname = $this->module.'/kas';
		$this->load->model('mdl_kas','mk');
	}

	public function index()
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
  //       $this->permission->check_permission($access);
		redirect($this->cname.'/menu');
	}

	public function menu($value='')
	{
		$data['sidebar_active']='resepsionis';
        $data['title']='Menu - Resepsionis';
        $data['content'] = $this->load->view('/menu_kas',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function buka($value='')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

		$data['cashdraw'] = $this->mk->get_cashdraw();
		$data['operator'] = $this->session->userdata('astrosession');
		$data['status'] = $this->mk->get_status();
		$data['transaksi'] = $this->mk->get_transaksi_status();
		// print_r($data);exit;
		$data['sidebar_active']='resepsionis';
        $data['title']='Menu - Resepsionis';
        $data['content'] = $this->load->view('/buka_kasir',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function tutup($value='')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['cashdraw'] = $this->mk->get_cashdraw();
		$data['operator'] = $this->session->userdata('astrosession');
		$data['status'] = $this->mk->get_status();
		$data['transaksi'] = $this->mk->get_transaksi_status();
		// print_r($data);exit;
		$data['sidebar_active']='resepsionis';
        $data['title']='Menu - Resepsionis';
        $data['content'] = $this->load->view('/tutup_kasir',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function cashdraw()
    {
        $value = $this->input->get('cashdraw');
        $data['outlet']=$this->config->item('astro');
        $data['cashdraw']=$this->mk->get_data($value);
       // print_r($data['cashdraw']);exit;
        // $data['selling_items']=$this->mk->get_selling_detail($value);
        $data['sidebar_active']='resepsionis';
        $data['title']='Menu - Resepsionis';
        $data['content'] = $this->load->view('/cashdraw',$data);
        // $this->load->view('template',$data);
    }

	public function nominal_rupiah($value='')
	{
		$param = $this->input->post();
		$data = format_rupiah($param['nominal']);
		echo $data;
	}

	public function simpan_cashdraw($value='')
	{
		$param = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('start_cash', 'Modal', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
			$param['check_in'] = date('H:i:s');
			$param['status'] = 'temporary';

			$save = $this->mk->write('atombizz_selling_cashdraw',$param);
			if($save){
				echo '1';
			} else {
				echo '0';
			}
        }
	}

	public function close_cashdraw($value='')
	{
		$param = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('end_cash', 'Modal', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
			$param['check_out'] = date('H:i:s');
			$param['status'] = 'valid';

			$param['end_cash'] = $param['end_cash'];
			$param['omset'] = $this->mk->get_omset($param['cashdraw_no']);
			$param['total_cash'] = $param['start_cash'] + $param['omset'];

			$save = $this->mk->replace('atombizz_selling_cashdraw',$param,array('cashdraw_no'=>$param['cashdraw_no']));
			// echo $this->db->last_query();exit;
			if($save){
				echo '1';
			} else {
				echo '0';
			}
        }
	}

}

/* End of file kas.php */
/* Location: ./application/modules/resepsionis/controllers/kas.php */