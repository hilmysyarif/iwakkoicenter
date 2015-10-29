<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finance extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'finance';
	}

	public function index()
	{
		redirect($this->module.'/menu');
	}

	public function menu()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['sidebar_active']='keuangan';
        $data['title']='Menu - Keuangan';
        $data['content'] = $this->load->view('/menu',$data,TRUE);
        $this->load->view('template',$data);
	}

}

/* End of file finance.php */
/* Location: ./application/modules/finance/controllers/finance.php */