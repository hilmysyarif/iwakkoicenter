<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('mdl_pengguna','mkn');
        $this->module='master';
        $this->cname='master/pengguna';
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

        $data['count'] = format_number($this->mkn->count_data());
        $data['sidebar_active']='master';
        $data['title']='Master - Pengguna';
        $data['content'] = $this->load->view('/data_pengguna',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['posisi'] = $this->mkn->get_posisi();
        $data['_opt_karyawan'] = $this->mkn->get_opt_karyawan();
        $data['count'] = format_number($this->mkn->count_data());
        if(!empty($id)){
            $data['karyawan'] = $this->mkn->get_karyawan($id);
            $data['karyawan'] = $data['karyawan'][0];
            // print_r($data['karyawan']);exit;
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Pengguna';
        $data['content'] = $this->load->view('/input_pengguna',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function save()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telp', 'No. Telp', 'trim|numeric|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('compliment', 'Compliment', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id', 'fieldlabel', 'trim|xss_clean');
        $this->form_validation->set_rules('uname', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('upass', 'Password', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('confirm-upass', 'Password Confirm', 'trim|required|xss_clean');
        $this->form_validation->set_rules('group', 'Jabatan', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            // if($param['upass']==$param['confirm-upass']){
               $id = $param['id'];
                unset($param['id']);
                unset($param['xxx']);
                $param['upass'] = paramEncrypt($param['upass']);
                $param['nik'] = $param['code'];
                unset($param['code']);

                if($id == NULL){
                    $where = array('no_ktp'=>$param['no_ktp']);
                    $exist = $this->mkn->total('atombizz_employee',$where);
                    if($exist<=0){
                        $where = array('uname'=>$param['uname']);
                        $exist = $this->mkn->total('atombizz_employee',$where);
                        if($exist<=0){
                            $save = $this->mkn->write('atombizz_employee',$param);
                            if($save == TRUE){
                                echo "1|".succ_msg("Pengguna berhasil ditambahkan");
                            } else {
                                echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                            }
                        } else {
                            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                        }
                    } else {
                        echo "0|".err_msg("Data sudah ada.");
                    }   
                } else {
                    $where = array('id' => $id);
                    $update = $this->mkn->replace('atombizz_employee',$param,$where);
                    if($update == TRUE){
                        echo "1|".succ_msg("Pengguna berhasil dirubah.");
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }
                } 
            // } else {
            //     echo '0|'.warn_msg('Password yang dimasukkan tidak sama.');
            // }
            
        }
    }

    public function detail()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->mkn->count_data());
        if(!empty($id)){
            $data['karyawan'] = $this->mkn->get_karyawan($id);
            $data['karyawan'] = $data['karyawan'][0]; 
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Detail Karyawan';
        $data['content'] = $this->load->view('/detail_pengguna',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function get_detail()
    {
        $detail = $this->mkn->get_detail_karyawan($this->input->post('id'));
        $detail = $detail[0];
        $printR = $detail->name.'|';
        $printR .= $detail->identification_number.'|';
        $printR .= $detail->born_date.'|';
        $printR .= $detail->address.'|';
        $printR .= $detail->phone.'|';
        $printR .= $detail->email;
        
        echo $printR;
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $delete = $this->mkn->delete('atombizz_employee',$where);
        if($delete){
            echo "1|".succ_msg("Pengguna berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */