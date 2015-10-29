<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stok_bahan extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		//$this->load->model('M_sync','mdb');
        $this->module='stok_bahan';
	}
    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        redirect($this->module.'/menu');
    }

    public function menu()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $data['sidebar_active']='stok_bahan';
        $data['title']='Menu - stok_bahan';
        $data['content'] = $this->load->view('/menu',$data,TRUE);
        $this->load->view('template',$data);
    }
	
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */