<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stok_produk extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		//$this->load->model('M_sync','mdb');
        $this->module='stok_produk';
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
        
        $data['sidebar_active']='stok_produk';
        $data['title']='Menu - stok_produk';
        $data['content'] = $this->load->view('/menu',$data,TRUE);
        $this->load->view('template',$data);
    }
	
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */