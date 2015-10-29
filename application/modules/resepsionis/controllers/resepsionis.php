<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resepsionis extends ASTRO_Controller {

	public function __construct()
	{

		parent::__construct();
		//$this->load->model('M_sync','mdb');
        $this->module='resepsionis';
        $this->load->model('mdl_resepsionis','mr');
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

        $data['sidebar_active']='resepsionis';
        $data['title']='Menu - Resepsionis';
        $data['content'] = $this->load->view('/menu',$data,TRUE);
        $this->load->view('template',$data);
    }

    //menampilkan view pendaftaran user
    // public function pendaftaran(){
    //     $data['sidebar_active']='resepsionis';
    //     $data['title']='Menu - Resepsionis';
    //     $data['content'] = $this->load->view('/pendaftaran',$data,TRUE);
    //     $this->load->view('template',$data);
    // }

    //menampilkan view pendaftaran user
    public function dashboard(){
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $data['room_category'] = $this->mr->get_room_category();
        $data['sidebar_active']='resepsionis';
        $data['title']='Menu - Resepsionis';
        $data['content'] = $this->load->view('/dashboard_room',$data,TRUE);
        $this->load->view('template',$data);
    }	

    public function list_antrian()
    {
        $param = $this->input->post();
        $data = $this->mr->get_list_antrian($param['category']);
        echo $data;
    }

    public function list_room()
    {
        $data = $this->mr->get_list_room();
        echo $data;
    }

    public function checkin_guest()
    {
        $param = $this->input->post();
        $data = array('room_number'=>$param['cek_room'],'status'=>'checkin');
        $where = array('id'=>$param['cek_id']);
        $update = $this->mr->replace('atombizz_tmp_use_facilities',$data,$where);
        if($update){
            echo succ_msg('Pelanggan berhasil cek in.');
        } else {
            echo err_msg('Pelanggan tidak dapat cek in.');
        }
    }

    public function opt_room_tersedia()
    {
        $param = $this->input->post();
        $data = $this->mr->opt_room_tersedia($param);
        // echo $this->db->last_query();exit;
        echo $data;
    }

    public function checkout()
    {
        $param = $this->input->post();
        $data = $this->mr->checkout($param);
        echo $data;
    }
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */