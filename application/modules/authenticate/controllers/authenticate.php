<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->module = 'authenticate';
		$this->cname = 'authenticate';
		$this->load->model('Mdl_login');
	}

	public function index()
	{
		$data['cname'] = $this->module;
		$data['title'] = "Halaman Login";
		$this->load->view('/login', $data);
	}

	public function dashboard()
	{
		$data['cname'] = $this->module;
		$data['title'] = "Dashboard";
		$this->load->view('/dashboard', $data);
	}

	public function login()
	{
		$param = $this->input->post();
		$exist = $this->Mdl_login->login($param);
		// echo $this->db->last_query();exit;
		if (!empty($exist)) {
			$module = json_decode($exist[0]->module);
			$this->session->set_userdata('astrosession',$exist);
			$redirect = 'dashboard';
		}else{
			$redirect = $this->cname;
		}
		redirect($redirect);
	}

	public function edit_password()
	{
		$data['cname'] = $this->module;
		$data['title'] = "My Profile";
		$data['karyawan'] = $this->session->userdata('astrosession');
		$data['karyawan'] = $data['karyawan'][0];
		$data['content'] = $this->load->view($this->module.'/edit_profile',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function edit()
	{
		$param = $this->input->post();
		$exist = $this->Mdl_login->login(array('login_password' => $param['upass'], 'login_email' => $param['uname'] ));
		$user = @$this->session->userdata('astrosession');
		// echo $this->db->last_query();exit;
		if (!is_null($exist)) {
			$where = array('id'=>$user[0]->id);
			
			$save = $this->Mdl_login->replace('karyawan',$param,$where);
			// echo $this->db->last_query();exit;
			if ($save) {
				$redirect = 'dashboard';
			}
		}else{
			$redirect = $this->cname.'/edit_password';
		}
		redirect($redirect);
	}

	public function logout()
	{
		$this->session->unset_userdata('astrosession');
		redirect($this->cname);
	}

	public function decode($value='')
	{
		echo paramDecrypt($value);
	}
}

/* End of file signin.php */
/* Location: ./application/modules/authenticate/controllers/authenticate.php */