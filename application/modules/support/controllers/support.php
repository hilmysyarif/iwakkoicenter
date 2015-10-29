<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->module = 'support';
		// $this->cname = 'dashboard';
		// $this->load->model('Mdl_login');
	}

	public function index()
	{
		// $data['cname'] = $this->module;
		// $data['title'] = "Dashboard";
		// $this->load->view('/dashboard', $data);
		$data['config'] = $this->config->item('astro');
		$data['sidebar_active']='support';
        $data['title']='Technical Support';
        $data['content'] = $this->load->view('/support',$data,TRUE);
        $this->load->view('template',$data);
	}

}