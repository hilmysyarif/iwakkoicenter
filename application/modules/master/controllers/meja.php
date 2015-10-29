<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meja extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('mdl_meja','mkn');
        $this->module='master';
        $this->cname='master/meja';
	}

    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        redirect($this->cname.'/data');
    }

    public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = $this->mkn->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Meja';
        $data['content'] = $this->load->view('/data_meja',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = $this->mkn->count_data();
        if(!empty($id)){
            $data['c_meja'] = $this->mkn->get_meja($id);
            $data['c_meja'] = $data['c_meja'][0]; 
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Meja';
        $data['content'] = $this->load->view('/input_meja',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function save()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Kode', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty', 'Jumlah', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);
            $param['code'] = strtoupper($param['code']);

            if($id == NULL){
                $where = array('code'=>$param['code']);
                $exist = $this->mkn->total('meja',$where);
                if($exist<=0){
                    $where = array('nama'=>$param['nama']);
                    $exist = $this->mkn->total('meja',$where);
                    if($exist<=0){
                        $save = $this->mkn->write('meja',$param);
                        if($save == TRUE){
                            echo "1|".succ_msg("Meja berhasil ditambahkan");
                        } else {
                            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                        }
                    } else {
                        echo "0|".err_msg("Gagal, nama sudah ada.");
                    }
                } else {
                    echo "0|".err_msg("Gagal, code sudah ada.");
                }   
            } else {
                $where = array('id' => $id);
                $update = $this->mkn->replace('meja',$param,$where);
                if($update == TRUE){
                    echo "1|".succ_msg("Meja berhasil dirubah.");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                }
            }            
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $delete = $this->mkn->delete('meja',$where);
        if($delete){
            echo "1|".succ_msg("Kategori Meja berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */