<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->module='laporan';
        // $this->cname='laporan';
        // $this->load->model('mdl_pembelian','mp');
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

        $data['sidebar_active']='laporan';
        $data['title']='Laporan';
        $data['content'] = $this->load->view('/menu',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data grafik
    public function grafik(){
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['sidebar_active']='laporan';
        $data['title']='Laporan';
        $data['content'] = $this->load->view('/menu_grafik',$data,TRUE);
        $this->load->view('template',$data);
    }

    // halaman menu untuk data pdf
    public function data(){
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $data['sidebar_active']='laporan';
        $data['title']='Laporan';
        $data['content'] = $this->load->view('/menu_data',$data,TRUE);
        $this->load->view('template',$data);
    }
}

/* End of file laporan.php */
/* Location: ./application/modules/laporan/controllers/laporan.php */