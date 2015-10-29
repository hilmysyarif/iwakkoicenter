<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->module='stok_produk';
        $this->cname=$this->module.'/input';
        $this->load->model('mdl_input','mp');
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

        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Pembelian Suplier';
        $data['content'] = $this->load->view('/data_stok',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['sidebar_active'] = 'stok_produk';
        $data['product'] = $this->mp->opt_product();
        $data['title'] = 'stok_produk - Pembelian Suplier';
        $data['content'] = $this->load->view('/tambah_stok',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah_stok()
    {
        $param = $this->input->post();
        $user = $this->session->userdata('astrosession');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('product_code', 'Produk', 'trim|required|xss_clean');
        $this->form_validation->set_rules('in', 'Qty', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $produk = $this->mp->get_detail_product($param['product_code']);
            $param['date'] = date('Y-m-d');
            $param['status'] = 'input';
            $param['reference'] = '';
            $param['out'] = 0;
            $param['description'] = 'Penambahan Stok'.$produk['name'];
            $param['userlog'] = date('Y-m-d H:i:s');
            $param['operator'] = $user[0]->uname;
            $param['rak_code'] = $produk['gudang_code'];

            $save = $this->mp->write('atombizz_warehouses_stok',$param);
            if ($save == TRUE) {
                echo "1|".succ_msg("Stok Produk berhasil ditambahkan.");
            } else {
                echo "0|".err_msg("Gagal menambahkan stok produk, periksa kembali masukan Anda");
            }

        }
    }
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */