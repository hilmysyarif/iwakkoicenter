<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'finance';
		$this->cname = $this->module.'/payroll';
	}

	public function index()
	{
		redirect($this->cname.'/menu');
	}

	public function menu()
	{
		$data['sidebar_active']='keuangan';
        $data['title']='Klinik | Keuangan';
        $data['content'] = $this->load->view('/menu_payroll',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function debt($value='')
	{
		redirect($this->module.'/kasbon');
	}

	public function payment($value='')
	{
		redirect($this->module.'/gaji');
	}

}

/* End of file payroll.php */
/* Location: ./application/modules/finance/controllers/payroll.php */