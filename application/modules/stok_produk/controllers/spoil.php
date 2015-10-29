<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spoil extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "stok_produk";
		$this->cname = $this->module.'/spoil';
		$this->load->model('mdl_spoil','mp');
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

        $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Spoil';
        $data['content'] = $this->load->view('/data_spoil',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail($id){
        // $param=$this->input->post();
        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Detail Spoil';
        // print_r($param);exit;
        $data['content'] = $this->load->view('/detail_spoil',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['opt_supplier'] = $this->mp->opt_supplier();
        $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active'] = 'stok_produk';
        $data['title'] = 'stok_produk - Spoil';
        // $data['suplier'] = $this->mm->get_suplier();
        $data['content'] = $this->load->view('/tambah_spoil',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function opt_produk()
    {
        $data = $this->mp->_opt_produk();
        echo $data;
    }

    public function cek_temp_spoil()
    {
        $num = $this->mp->total('atombizz_spoil_tmp');
        if($num>0){
            $data = $this->mp->cek_temp();
            $data['date_show'] = TanggalIndo($data['tgl']);
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    public function faktur_spoil()
    {
        $param = $this->input->post();
        $faktur = $this->mp->faktur_retur_out($param);
        echo json_encode($faktur);
    }

    public function list_produk()
    {
        $reference = $this->input->post('reference');
        $list_produk = $this->mp->get_list_produk($reference);
        $total = $this->mp->get_total_retur_out($reference);
        $supplier = $this->mp->get_supplier($reference);
        echo $list_produk.'|'.$total.'|'.@$supplier['code'].'|'.@$supplier['name'].'|'.format_rupiah($total);
    }

    public function total_nominal()
    {
        $param = $this->input->post();
        echo format_rupiah($param['total']);
    }

    public function mencari()
    {
        $key = $this->input->post();

        $data = $this->mp->mencari($key);
        $das = $data->row();
        $das->hpp = $this->mp->get_hpp($das->code);
        echo json_encode($das).'|'.$this->mp->_opt_satuan();
    }

    public function spoil_produk()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('qty', 'Quantity', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {
            $quantity = $this->input->post('qty');
            $qty_real = $this->mp->get_real_stok($param);
            if($qty_real>=$quantity){
                $hpp = $this->mp->get_hpp($param['kode']);
                $sub_total = $hpp*$quantity;
                $param['total'] = $sub_total;
                $param['hpp'] = $hpp;
                $param['status'] = 'produk';
                //save data
                $ident = $this->input->post('ident');
                unset($param['ident']);
                if(is_numeric($ident)){
                    $where = array('id'=>$ident);
                    $save = $this->mp->replace('atombizz_spoil_tmp',$param,$where);
                } else {
                    $where = array(
                        'kode'=>$param['kode'], 
                        'reference'=>$param['reference']);
                    $exist = $this->mp->total('atombizz_spoil_tmp',$where);
                    if($exist<=0){
                        $save = $this->mp->write('atombizz_spoil_tmp',$param);
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
                echo "1|".succ_msg("Bahan berhasil ditambahkan");
            } else {
                if($data=='exist'){
                    echo "0|".err_msg("Gagal, data bahan sudah ada.");
                } else if($data=='stok'){
                    echo "0|".err_msg("Gagal, stok di rak retur tidak mencukupi.");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                }
            }
        }
    }

        public function detail_spoil()
    {
        $uri = $this->input->post('id');
        $data = $this->mp->detail_retur_out($uri);
        $data['nominal'] = format_rupiah($data['total']);
        echo json_encode($data);
        // $data['id'].'|'.$data['product_id'].'|'.$data['product_code'].'|'.$data['product_name'].'|'.$data['quantity'].'|'.$data['unit_price'].'|'.$data['tax_amount'].'|'.$data['disc_reg']; 
    }

        public function delete_produk_spoil()
    {
        $uri = $this->input->post('id');
        $where = array('id'=>$uri);
        $delete = $this->mp->delete('atombizz_spoil_tmp',$where);
        if($delete>0){
            echo "1|".succ_msg("Berhasil, menghapus data spoil.");
        } else {
            echo "0|".err_msg("Gagal, menghapus data spoil.");
        }
    }

    public function proses_spoil()
    {
        $user = $this->session->userdata('astrosession');
        $basmalah = $this->config->item('astro');
        $userlog = date('Y-m-d H:i:s');
        $param = $this->input->post();

        $reference = $this->input->post('reference');
        echo $reference;
        $where = array('reference'=>$reference);
        $keterangan = 'Spoil dengan referensi no '.$reference;
        $data = $this->mp->find('view_tmp_spoil',$where);
        $nominal_retur_out = 0;
        foreach ($data->result_array() as $das) {
            $arr_detail[] = array(
                'reference'=>$reference,
                'kode'=>$das['kode'],
                'nama'=>$das['nama'],
                'qty'=>$das['qty'],
                'hpp'=>$das['hpp'],
                'total'=>$das['total'],
                'tgl'=>$das['tgl'],
                'status'=>'produk',
                'keterangan'=>$das['keterangan']);
            $nominal_retur_out += $das['total'];
            $arr_stok[] = array(
                'date'=>$param['tgl'],
                'status'=>'spoil',
                'reference'=>$reference,
                'in'=>0,
                'out'=>$das['qty'],
                'description'=>$keterangan,
                'userlog'=>$userlog,
                'operator'=>$user[0]->uname,
                'rak_code'=>$das['gudang_code'],
                'product_code'=>$das['kode'],
                'dept'=>$basmalah['bas_code_dept']
            );
            $arr_stok[] = array(
                'date'=>$param['tgl'],
                'status'=>'spoil',
                'reference'=>$reference,
                'in'=>$das['qty'],
                'out'=>0,
                'description'=>$keterangan,
                'userlog'=>$userlog,
                'operator'=>$user[0]->uname,
                'rak_code'=>'spoil',
                'product_code'=>$das['kode'],
                'dept'=>$basmalah['bas_code_dept']
            );
        }
        $arr_retur_out = array(
            'reference'=>$reference,
            'tgl'=>$param['tgl'],
            'total'=>$nominal_retur_out,
            'urut'=>$param['urut']);

        $save_items = $this->mp->write_batch('atombizz_spoil_detail',$arr_detail);
        if($save_items==TRUE){
            $save_stok = $this->mp->write_batch('atombizz_warehouses_stok',$arr_stok);
            if($save_stok == TRUE){
                $save_beli = $this->mp->write('atombizz_spoil',$arr_retur_out);
                if($save_beli == TRUE){
                    $where = array('reference'=>$reference);
                    $delete = $this->mp->delete('atombizz_spoil_tmp',$where);
                    if($delete>0){
                        //persediaan
                        $jurnal = array(
                            'kode'=>'spoil',
                            'no_referensi'=>$reference,
                            'tanggal'=>$param['tgl'],
                            'keterangan'=>'Spoil stok stok_produk dengan referensi '.$reference,
                            'no_akun'=>'130000',
                            'debit'=>0,
                            'kredit'=>$nominal_retur_out,
                            'person'=>$user[0]->uname,
                            'valid'=>'yes'
                        );
                        $save_acc = $this->mp->write('atombizz_accounting_buku_besar',$jurnal);
                        if($save_acc){
                            echo "1|".succ_msg("Berhasil, menambahkan data spoil.");
                        } else {
                            echo "0|".err_msg("Gagal, menambahkan data spoil.");
                        }
                    }
                } else {
                    echo "0|".err_msg("Gagal, menambahkan data spoil.");
                }
            } else {
                echo "0|".err_msg("Gagal, mengurangi data stok bahan.");
            }
        } else {
            echo "0|".err_msg("Gagal, menambahkan data spoil detail.");
        }
    }

}

/* End of file mutasi.php */
/* Location: ./application/modules/stok_produk/controllers/mutasi.php */