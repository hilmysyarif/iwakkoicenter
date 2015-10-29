<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends MY_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('mdl_gudang','mp');
        $this->module='master';
        $this->cname = $this->module.'/gudang';
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

        $data['count'] = $this->mp->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Data Gudang';
        $data['content'] = $this->load->view('/data_rak',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $data['count'] = $this->mp->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Gudang';
        $data['content'] = $this->load->view('/input_rak',$data,TRUE);
        $this->load->view('template',$data);
    }


    public function tambah_rak()
    {
        $param = $this->input->post();
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode', 'Kode Rak', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('nama', 'Nama Rak', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);

            $param['status'] = 'gudang';
            $param['jenis'] = 'G';

            if($id == NULL){
                $where = array('kode'=>$param['kode']);
                $exist = $this->mp->total('atombizz_rack',$where);
                if($exist<=0){
                    $save = $this->mp->write('atombizz_rack',$param);
                    if ($save == TRUE) {
                        echo "1|".succ_msg("Rak Gudang berhasil ditambahkan.");
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }                    
                } else {
                    echo "0|".err_msg("Gagal, data sudah ada.");
                }
            } else {
                $where = array('id' => $id);
                $update = $this->mp->replace('atombizz_rack',$param,$where);
                if($update >= 0){
                    echo "1|".succ_msg("Rak Gudang berhasil dirubah. -update");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda. -update");
                }
            }
        }

    }

    public function ambil_data()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data($param);
        echo json_encode($data);
    }

    //data product
    public function hapus_data()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data($param);
        $delete_spec = $this->mp->delete('atombizz_product_specification',array('code'=>$data->code));
        if ($delete_spec) {
            $delete = $this->mp->delete('atombizz_product',array('id'=>$param['id']));
            if($delete){
                echo "1|".succ_msg("Produk/Layanan berhasil dihapus.");
            } else {
                echo "0|".err_msg("Gagal menghapus produk/layanan.");
            }
        } else {
            echo "0|".err_msg("Gagal menghapus spesifikasi produk.");
        }
        
    }
}

/* End of file your_module.php */
/* Location: ./application/modules/master/controllers/product.php */