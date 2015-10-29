<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suplier extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('mdl_suplier','msp');
        $this->module='master';
        $this->cname=$this->module.'/suplier';
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

        $data['count'] = format_number($this->msp->count_data());
        $data['sidebar_active']='master';
        $data['title']='Master - Suplier';
        $data['content'] = $this->load->view('/data_suplier',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->msp->count_data());
        if(!empty($id)){
            $data['suplier'] = $this->msp->get_suplier($id);
            $data['suplier'] = $data['suplier'][0]; 
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Suplier';
        $data['content'] = $this->load->view('/input_suplier',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->msp->count_data());
        if(!empty($id)){
            $data['suplier'] = $this->msp->get_suplier($id);
            $data['suplier'] = $data['suplier'][0]; 
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Detail Suplier';
        $data['content'] = $this->load->view('/detail_suplier',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function save()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('classification', 'Klasifikasi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('code', 'Kode', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Telephone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pic_phone', 'Telephone PIC', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pic_position', 'Posisi PIC', 'trim|xss_clean');
        $this->form_validation->set_rules('pic_name', 'Nama PIC', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('registered', 'Waktu Pendaftaran', 'trim|required|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|xss_clean');
        $this->form_validation->set_rules('bank_account', 'Akun Bank', 'trim|xss_clean');
        $this->form_validation->set_rules('bank_name', 'Nama Bank', 'trim|xss_clean');
        // $this->form_validation->set_rules('orders', '', 'trim|required|xss_clean');
        $this->form_validation->set_rules('payment', 'Payment', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);

            if($id == NULL){
                $where = array('code'=>$param['code']);
                $exist = $this->msp->total('atombizz_suppliers',$where);
                if($exist<=0){
                    $save = $this->msp->write('atombizz_suppliers',$param);
                    if($save == TRUE){
                        echo "1|".succ_msg("Suplier berhasil ditambahkan");
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }
                } else {
                    echo "0|".err_msg("Data sudah ada.");
                }   
            } else {
                $where = array('id' => $id);
                $update = $this->msp->replace('atombizz_suppliers',$param,$where);
                if($update == TRUE){
                    echo "1|".succ_msg("Suplier berhasil dirubah.");
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
        $delete = $this->msp->delete('atombizz_suppliers',$where);
        if($delete == TRUE){
            echo "1|".succ_msg("Suplier berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }

    public function get_code() 
    {
        $post = $this->input->post();
        if (empty($post['classification'])) {
            echo "0|";
            exit();
        }
        $order = $this->msp->get_order($post['classification']);
        if(empty($order[0]->urut)){
            echo '1|S'.$post['classification'].'-'.complete_zero(1,3);
        }
        else{
            $newOrder = $order[0]->urut+1;
            echo $newOrder.'|S'.$post['classification'].'-'.complete_zero($newOrder,3);
        }
    }
}

/* End of file suplier.php */
/* Location: ./application/modules/master/controllers/suplier.php */