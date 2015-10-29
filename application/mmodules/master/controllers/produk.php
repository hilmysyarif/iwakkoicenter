<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('mdl_produk','mp');
        $this->module='master';
        $this->cname = $this->module.'/produk';
	}

    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        redirect($this->cname.'/data');
    }

    public function menu()
    {
        $data['count'] = $this->mp->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Bahan';
        $data['content'] = $this->load->view('/menu_produk',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = $this->mp->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Data Bahan';
        $data['content'] = $this->load->view('/data_produk',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['satuan'] = $this->mp->opt_satuan();
        $data['gudang'] = $this->mp->opt_gudang();
        $data['count'] = $this->mp->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Bahan';
        $data['content'] = $this->load->view('/input_produk',$data,TRUE);
        $this->load->view('template',$data);
    }

    //BEGIN script for controller product
    //input product
    public function ambil_data_produk()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data_produk($param);
        echo json_encode($data);
    }

    public function input_produk()
    {
        $param = $this->input->post();
        
        $this->load->library('form_validation');
 
        $this->form_validation->set_rules('code', 'Kode', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('name', 'Nama Bahan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('unit', 'Kategori Satuan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('min', 'Stok Minimum', 'trim|required|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);

            if($id == NULL){
                $where = array('code'=>$param['code']);
                $exist = $this->mp->total('atombizz_product',$where);
                if($exist<=0){
                    $param['gudang_code'] = 'G-001';
                    $save = $this->mp->write('atombizz_product',$param);
                    if($save == TRUE){
                        echo "1|".succ_msg("Bahan berhasil ditambahkan");
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }
                } else {
                    echo "0|".err_msg("Gagal, data sudah ada.");
                }
            } else {
                $where = array('id' => $id);
                $update = $this->mp->replace('atombizz_product',$param,$where);
                if($update >= 0){
                    echo "1|".succ_msg("Bahan berhasil dirubah. -update");
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
                echo "1|".succ_msg("Bahan berhasil dihapus.");
            } else {
                echo "0|".err_msg("Gagal menghapus bahan.");
            }
        } else {
            echo "0|".err_msg("Gagal menghapus spesifikasi bahan.");
        }
        
    }

    public function harga()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['sidebar_active']='master';
        $data['title']='Master - Data Harga';
        $data['content'] = $this->load->view('/data_harga',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah_harga()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['produk'] = $this->mp->_opt_produk();
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Harga';
        $data['content'] = $this->load->view('/tambah_harga',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function input_harga()
    {
        $param = $this->input->post();
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('code', 'Bahan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('price1', 'Harga Satuan', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {

            $id = $param['id'];
            unset($param['id']);

            $price = $param['price'];
            unset($param['price']);
            $arr = array(
                    'date'=> date('Y-m-d'),
                    'price'=> $price
                );
            $where = array('code'=>$param['code']);
            $exist = $this->mp->total('atombizz_product_price',$where);
            if($exist<=0) {
                $save_price = $this->mp->write('atombizz_product_price',$arr);
            } else {
                $save_price = $this->mp->replace('atombizz_product_price',$arr,$where);
            }

            if ($save_price) {
                    $save = $this->mp->replace('atombizz_product_specification',$param,$where);
                if($save == TRUE){
                    echo "1|".succ_msg("Bahan berhasil ditambahkan");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                }
            } else {
                echo "0|".err_msg("Gagal menyimpan hpp.");
            }
    
            
        }
    }

    public function get_data()
    {
        $param = $this->input->post();
        $data = $this->mp->get_data($param);
        echo json_encode($data);
    }

    public function stat_satuan($value='')
    {
        $param = $this->input->post('unit');
        $data = $this->mp->stat_satuan($param);
        if($data){
            echo json_encode($data);
        }
    }

}

/* End of file your_module.php */
/* Location: ./application/modules/master/controllers/product.php */