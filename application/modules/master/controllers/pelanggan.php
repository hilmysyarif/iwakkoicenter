<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->module = 'master';
		$this->cname = 'master/pelanggan';
		$this->load->model('mdl_pelanggan', 'mp');
	} 

	public function index()
	{
		// echo "hello pspell_save_wordlist(dictionary_link)";
		redirect($this->cname.'/data');
	}

    public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='master';
        $data['title']='Master - Pelanggan';
        $data['content'] = $this->load->view('/data_pelanggan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->mp->count_data());
        if(!empty($id)){
            $data['paramedik'] = $this->mp->get_paramedik($id);
            $data['paramedik'] = $data['paramedik'][0]; 
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Detail Pelanggan';
        $data['content'] = $this->load->view('/detail_pelanggan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->mp->count_data());
        if(!empty($id)){
            $data['paramedik'] = $this->mp->get_paramedik($id);
            $data['paramedik'] = $data['paramedik'][0];
        } else {
        	$str = $this->gen_code();
        	$data['paramedik'] = (object)array('code'=>$str['code'],'no_urut'=>$str['no']) ;
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Pelanggan';
        $data['content'] = $this->load->view('/input_pelanggan',$data,TRUE);
        $this->load->view('template',$data);
    }
	//fungsi logic
	public function save()
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
		// $this->permission->check_permission($access);

        $param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Kode', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('registered', 'Tanggal Registrasi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('identification_number', 'Nomor KTP', 'trim|xss_clean');
		$this->form_validation->set_rules('no_urut', 'Nomor urut', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('born_date', 'Tanggal Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
		$this->form_validation->set_rules('phone', 'Telepon', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email');
		// $this->form_validation->set_rules('expired', 'Tanggal Expired', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo "0|".warn_msg(validation_errors());
        } else {
            //save data
            $id = $this->input->post('id');
            unset($param['id']);

            
	        if(is_numeric($id)){
	        	$where = array('id'=>$id);
	        	$save = $this->mp->replace('atombizz_customers',$param,$where);
	        } else {
	        	$where = array('code'=>$param['code']);
	        	$exist = $this->mp->total('atombizz_customers',$where,$like=null,$field=null);
	        	if($exist<=0){
	        		$save = $this->mp->write('atombizz_customers', $param);
	        	} else {
	        		$save = FALSE;
	        	}
	        }
            if ($save == TRUE) {
            	echo "1|".succ_msg("Data Pelanggan berhasil disimpan");
            } else {
            	echo "0|".err_msg("Gagal, coba ulangi sekali lagi.");
            }
        }
	}

    public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $delete = $this->mp->delete('atombizz_customers',$where);
        if($delete){
            echo "1|".succ_msg("Pelanggan berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }
	public function gen_code(){
		$no = $this->mp->gen_kode();
		if($no<10)$no = '0000'.$no;
        else if($no<100)$no = '000'.$no;
        else if($no<1000)$no = '00'.$no;
        else if($no<10000)$no = '0'.$no;
        else if($no<100000)$no = $no;
        $code = 'C-'.date('Y').$no;
        $result = array('code' => $code, 'no'=>$no);
        return $result;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
