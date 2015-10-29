<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_menu extends ASTRO_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mdl_master_menu','mdb');
		$this->cname = 'master';
		$this->module = "master_menu";
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
  		// $this->permission->check_permission($access);
	}

	public function index()
	{
		$data['sidebar_active']='master_menu';
        $data['title']='Master - Menu';
        $data['kategori_menu']=$this->mdb->get_kategori();
        $data['content'] = $this->load->view('/v_master_menu',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function tabel_menu($value='')
	{
		// if(!is_direct())
  		// {
	    	// PAGINATION
	    	$tanggal='';
	    	$offset= 0;
	        $uri = $this->uri->segment(4);
	        if(!empty($uri))$offset = $uri;
	        $limit= 10;
	        $total = $this->mdb->count_menu();
	        // $total = count($all_data);
	        $data_menu = $this->mdb->get_menu($limit,$offset);
	        $url = base_url().$this->cname.'/master_menu/tabel_menu';
	        $data['offset']=$offset;
	        $data['no']=(int)$offset+1;
	        $data['kategori_menu']=$this->mdb->get_kategori();
	        $data['pagination'] = paging($url, $total, $limit, 4, 2);
	    	//-- END PAGINATION
			$data['menu'] = $data_menu;
			$this->load->view('v_master_menu_tabel',$data);
		// }
	}

	public function cek_kode_menu($value='')
	{
    	if(!empty($this->input->post('kode_menu')))
    	{
	    	$kode = $this->input->post('kode_menu');
	    	$cek = $this->mdb->cek_kode($kode);
	    	if($cek) 
	    	{
	    		$data_ret['status'] = 1;
	    		$data_ret['data'] = json_encode($cek);
	    		$data_ret['message'] = 'Data ditemukan';
	    	}
	    	else
	    	{
	    		$data_ret['status'] = 0;
	    		$data_ret['message'] = 'Data tidak ditemukan';
	    	}
	    }
	    else
	    {
	    	$data_ret['status'] = 0;
	    	$data_ret['message'] = 'Data tidak ditemukan';
	    }
	    print_r(json_encode($data_ret));
	}

	private function _add_menu($post='')
	{
		$array_menu = array(
			'code' => $post['kode'],
			'nama' => $post['nama'],
			'hpp' => $post['hpp'],
			'harga' => $post['harga_jual'],
			'kategori' => $post['kategori']
		);
		if(!empty($array_menu))
			$this->mdb->insert_menu($array_menu);
	}

	private function _edit_menu($post='')
	{
		$array_menu = array(
			'nama' => $post['nama'],
			'hpp' => $post['hpp'],
			'harga' => $post['harga_jual'],
			'kategori' => $post['kategori']
		);
		if(!empty($array_menu))
			$this->mdb->update_menu($post['kode'], $array_menu);
	}

	public function submit_menu()
	{
		$post = $this->input->post();
		$cek = $this->mdb->cek_kode($post['kode']);
		if($cek) $this->_edit_menu($post);
		else $this->_add_menu($post);
	}


}

/* End of file master_menu.php */
/* Location: ./application/modules/master_menu/controllers/master_menu.php */