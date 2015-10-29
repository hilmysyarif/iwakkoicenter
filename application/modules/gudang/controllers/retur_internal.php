<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur_internal extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->module = "gudang";
        $this->cname = $this->module.'/retur_internal';
        $this->load->model('mdl_retur_internal','mp');
    }

    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        redirect($this->cname.'/data');
    }

    public function data()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active']='gudang';
        $data['title']='Gudang - Retur Internal';
        $data['content'] = $this->load->view('/data_retur_internal',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail_retur($id){
        // $param=$this->input->post();
        $data['sidebar_active']='gudang';
        $data['title']='Gudang - Detail Retur';
        // print_r($param);exit;
        $data['content'] = $this->load->view('/detail_retur_internal',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        // $data['opt_supplier'] = $this->mp->opt_supplier();
        $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active'] = 'gudang';
        $data['title'] = 'Gudang - Retur Internal';
        // $data['suplier'] = $this->mm->get_suplier();
        $data['content'] = $this->load->view('/tambah_retur_internal',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function faktur_distribusi()
    {
        $param['date'] = date('Y-m-d');
        $faktur = $this->mp->faktur_distribusi($param);
        echo json_encode($faktur);
    }

    public function cek_temp_retur_in()
    {
        $param = $this->input->post();
        $num = $this->mp->total('atombizz_retur_internal_tmp');
        if($num>0){
            $data = $this->mp->cek_temp($param);
            $data['date_show'] = TanggalIndo($data['date']);
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    public function mencari()
    {
        $key = $this->input->post();

        $data = $this->mp->mencari($key);
        foreach ($data->result_array() as $das) {
            # code...
        }
        // echo $this->db->last_query();exit;
        echo @json_encode($das);
    }

    public function retur_in_produk()
    {
        $param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {
            $quantity = $this->input->post('quantity');
            $qty_real = $this->mp->get_real_stok($param);
            // print_r($qty_real);exit;
            if($qty_real>=$quantity) {
                $hpp = $this->mp->get_hpp($param['product_code']);
                $sub_total = $hpp*$quantity;
                $param['sub_total'] = $sub_total;
                $param['hpp'] = $hpp;
                //save data
                $ident = $this->input->post('ident');
                unset($param['ident']);
                if(is_numeric($ident)){
                    $where = array('id'=>$ident);
                    $save = $this->mp->replace('atombizz_retur_internal_tmp',$param,$where);
                } else {
                    $where = array(
                        'product_code'=>$param['product_code'], 
                        'reference'=>$param['reference']);
                    $exist = $this->mp->total('atombizz_retur_internal_tmp',$where);
                    if($exist<=0){
                        $save = $this->mp->write('atombizz_retur_internal_tmp',$param);
                    } else {
                        $save = FALSE;
                        $data = 'exist';
                    }
                }
            } else {
                $save = FALSE;
                $data = 'stok';
            }

            if($save == TRUE){
                echo "1|".succ_msg("Produk berhasil ditambahkan");
            } else {
                if($data=='exist'){
                    echo "0|".err_msg("Gagal, data produk sudah ada.");
                } else if($data=='stok'){
                    echo "0|".err_msg("Gagal, stok di rak retur tidak mencukupi.");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                }
            }
        }
    }

    public function list_produk()
    {
        $reference = $this->input->post('reference');
        $list_produk = $this->mp->get_list_produk($reference);
        $total = $this->mp->get_total_retur_in($reference);
        // $branch = $this->mp->get_branch($reference);
        echo $list_produk.'|'.$total.'|'.@$branch['code'].'|'.@$branch['name'].'|'.format_rupiah($total);
    }

    public function total_nominal()
    {
        $param = $this->input->post();
        echo format_rupiah($param['total']);
    }

    public function detail_retur_in()
    {
        $uri = $this->input->post('id');
        $data = $this->mp->detail_retur_in($uri);
        $data['nominal'] = format_rupiah($data['sub_total']);
        echo json_encode($data);
        // $data['id'].'|'.$data['product_id'].'|'.$data['product_code'].'|'.$data['product_name'].'|'.$data['quantity'].'|'.$data['unit_price'].'|'.$data['tax_amount'].'|'.$data['disc_reg']; 
    }

    public function delete_produk_retur_in()
    {
        $uri = $this->input->post('id');
        $where = array('id'=>$uri);
        $delete = $this->mp->delete('atombizz_retur_internal_tmp',$where);
        if($delete>0){
            echo "1|".succ_msg("Berhasil, menghapus data retur internal.");
        } else {
            echo "0|".err_msg("Gagal, menghapus data retur internal.");
        }
    }

    public function proses_retur_in()
    {
        $basmalah = $this->config->item('astro');
        $userlog = date('Y-m-d H:i:s');
        $param = $this->input->post();

        $reference = $this->input->post('reference');
        $where = array('reference'=>$reference);
        $keterangan = 'Retur Masuk dengan referensi no '.$reference;
        $data = $this->mp->find('atombizz_retur_internal_tmp',$where);
        $nominal_retur_in = 0;
        foreach ($data->result_array() as $das) {
            $arr_detail[] = array(
                'reference'=>$reference,
                'product_id'=>$das['product_id'],
                'product_code'=>$das['product_code'],
                'product_name'=>$das['product_name'],
                'quantity'=>$das['quantity'],
                'hpp'=>$das['hpp']);
            $nominal_retur_in += $das['sub_total'];
            $arr_stok[] = array(
                'date'=>$param['date'],
                'status'=>'retur in',
                'reference'=>$reference,
                'in'=>$das['quantity'],
                'out'=>0,
                'description'=>$keterangan,
                'userlog'=>$userlog,
                'operator'=>$param['operator'],
                'rak_code'=>'retur',
                'product_code'=>$das['product_code'],
                'dept'=>$basmalah['bas_code_dept']);
        }
        $arr_retur_in = array(
            'reference'=>$reference,
            'date'=>$param['date'],
            'operator'=>$param['operator'],
            'total'=>$param['total_akhir'],
            'urut'=>$param['urut'],
            'dept'=>$basmalah['bas_code_dept'],
            'userlog'=>$userlog);

        $save_items = $this->mp->write_batch('atombizz_retur_internal_detail',$arr_detail);
        if($save_items==TRUE){
            $save_stok = $this->mp->write_batch('atombizz_warehouses_stok',$arr_stok);
            if($save_stok == TRUE){
                $save_beli = $this->mp->write('atombizz_retur_internal',$arr_retur_in);
                // echo $this->db->last_query();exit;
                if($save_beli == TRUE){
                    $where = array('reference'=>$reference);
                    $delete = $this->mp->delete('atombizz_retur_internal_tmp',$where);
                    if($delete>0){
                        echo "1|".succ_msg("Berhasil menambahkan data retur internal.");
                    }
                } else {
                    echo "0|".err_msg("Gagal menambahkan data retur internal.");
                }
            } else {
                echo "0|".err_msg("Gagal mengurangi data stok produk.");
            }
        } else {
            echo "0|".err_msg("Gagal menambahkan data retur internal detail.");
        }
    }

    
}

/* End of file mutasi.php */
/* Location: ./application/modules/gudang/controllers/mutasi.php */