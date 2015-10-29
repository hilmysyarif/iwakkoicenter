<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->module = "master";
        $this->cname = $this->module."/brand";
        $this->load->model('mdl_brand','mb');
    }

    public function index()
    {
        // $data['count'] = $this->mb->count_data();
        $data['bahan'] = $this->mb->get_opt_bahan();
        $data['satuan'] = $this->mb->get_opt_satuan();
        $data['sidebar_active']='master';
        $data['title']='Master - Konversi Stok';
        $data['content'] = $this->load->view('/brand',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function get_satuan()
    {
        $param = $this->input->post();
        $data = $this->mb->get_satuan($param['bahan']);
        echo $data;
    }

    public function save_konversi($value='')
    {
        $param = $this->input->post();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('product_code', 'Bahan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('code', 'Kode Brand', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Nama Brand', 'trim|required|xss_clean');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty_convertion', 'Isi Konversi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('satuan_convertion', 'Satuan Konversi', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);

            if($id == NULL){
                $where = array('code'=>$param['code']);
                $exist = $this->mb->total('atombizz_brand_converter',$where);
                if($exist<=0){
                    $save = $this->mb->write('atombizz_brand_converter',$param);
                    if ($save == TRUE) {
                        echo "1|".succ_msg("Master Konversi berhasil ditambahkan.");
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }                    
                } else {
                    echo "0|".err_msg("Gagal, data sudah ada.");
                }
            } else {
                $where = array('id' => $id);
                $update = $this->mb->replace('atombizz_brand_converter',$param,$where);
                if($update >= 0){
                    echo "1|".succ_msg("Master Konversi berhasil dirubah. -update");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda. -update");
                }
            }
        }
    }

    public function detail_konversi()
    {
        $param = $this->input->post();
        $data = $this->mb->detail_konversi($param);
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);

        $delete = $this->mb->delete('atombizz_brand_converter',$where);
        if($delete){
            echo "1|".succ_msg("Master Konversi berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }

}

/* End of file brand.php */
/* Location: ./application/modules/master/controllers/brand.php */