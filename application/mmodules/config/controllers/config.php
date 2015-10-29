<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends ASTRO_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'config';
		$this->load->model('mdl_config','mc');
	}

	public function index()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['sidebar_active']='config';
        $data['title']='Pengaturan - Usaha';
        $data['content'] = $this->load->view('/config',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function get_branch()
	{
		$whack = $this->config->item('astro');
		echo json_encode($whack);
	}

	public function write_setup($value='')
	{
		$param = $this->input->post();
		$this->load->helper('file');

		// $this->config->load('basmalah', true);
		$whack = $this->config->item('astro');
		// $whack['bas_regency_code'] = $param['regency_code'];
  // 		$whack['bas_branch_code'] = $param['code'];
  // 		$whack['bas_apps_name'] = $param['name'];
  // 		$whack['bas_branch_name'] = $param['name'];
  // 		$whack['bas_branch_address'] = $param['address'];
  // 		$whack['bas_branch_phone'] = $param['telp'];
  // 		$whack['bas_branch_email'] = $param['email'];
  // 		$whack['bas_code_dept'] = $param['code'];

  		$whack['bas_code_dept'] = $param['kode_toko'];
	  	$whack['bas_branch_code'] = $param['kode_toko'];
	  	$whack['bas_branch_name'] = $param['nama_toko'];
	  	$whack['bas_branch_address'] = $param['alamat'];
	  	$whack['bas_branch_phone'] = $param['telepon'];
	  	$whack['bas_branch_email'] = $param['email'];
	  	$whack['bas_apps_name'] = $param['nama_toko'];
	  	$whack['bas_branch_domain'] = $param['domain'];

		$data = '<?php' . "\n" . 'if (!defined("BASEPATH")) exit("No direct script access allowed");' . "\n" . '$config["astro"] = ' . var_export($whack, true) . "\n" . '?>';

		if ( ! write_file(APPPATH . 'config/astro.php', $data))
		{
		    echo 'Gagal melakukan pengaturan!';
		}
		else
		{
			echo 'Pengaturan Berhasil!';
		}
	}

}

/* End of file config.php */
/* Location: ./application/modules/config/controllers/config.php */