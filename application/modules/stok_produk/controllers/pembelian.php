<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->module='stok_produk';
        $this->cname=$this->module.'/pembelian';
        $this->load->model('mdl_pembelian','mp');
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

        $data['count'] = format_rupiah($this->mp->count_total());
        $data['sidebar_active']='pembelian';
        $data['title']='stok_produk - Pembelian Suplier';
        $data['content'] = $this->load->view('/data_pembelian',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = format_rupiah($this->mp->count_total());
        $data['sidebar_active'] = 'stok_produk';
        $data['title'] = 'stok_produk - Pembelian Suplier';
        $data['opt_supplier'] = $this->mp->opt_supplier();
        $data['content'] = $this->load->view('/tambah_pembelian',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail($id='')
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $data['count'] = format_rupiah($this->mp->count_total());
        $data['sidebar_active'] = 'stok_produk';
        $data['title'] = 'stok_produk - Detail Suplier';
        $data['purchase'] = $this->mp->get_purchase($id);
        // print_r($data['purchase']);exit;
        $data['content'] = $this->load->view('/detail_pembelian',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function faktur_pembelian()
    {
        $id_supplier = $this->input->get('kode');
        $faktur = $this->mp->faktur_pembelian($id_supplier);
        // print_r($faktur);exit;
        echo json_encode($faktur);
    }

    public function opt_produk()
    {
        $data = $this->mp->_opt_produk();
        echo $data;
    }

     public function mencari()
    {
        $key = $this->input->post();

        $data = $this->mp->mencari($key);
        foreach ($data->result_array() as $das) {
            # code...
        }
        echo @json_encode($das);
    }

    public function pembelian_produk()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('unit_price', 'Harga Suplier', 'trim|required|numeric|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {
            $quantity = $this->input->post('quantity');

            $param['warehouse_id'] = $this->mp->get_gudang($param['product_code']);
            $sub_total = $param['unit_price']*$quantity;
            $param['sub_total'] = $sub_total;
            // $param['brand_code'] = $param['brand'];

            $ident = $this->input->post('ident');
            unset($param['ident']);
            if(is_numeric($ident)){
                // print_r($param);exit;
                $where = array('id'=>$ident);
                $save = $this->mp->replace('atombizz_tmp_detail_purchases',$param,$where);
            } else {
                // print_r($param);exit;
                $where = array('product_code'=>$param['product_code'], 'reference_no'=>$param['reference_no'], 'warehouse_id'=>$param['warehouse_id']);
                $exist = $this->mp->total('atombizz_tmp_detail_purchases',$where);
                if($exist<=0){
                    $save = $this->mp->write('atombizz_tmp_detail_purchases',$param);
                } else {
                    $save = FALSE;
                    $data = 'exist';
                }
            }
            
            if($save == TRUE){
                echo "1|".succ_msg("Produk berhasil ditambahkan");
            } else {
                if($data=='exist'){
                    echo "0|".err_msg("Gagal, data produk sudah ada.");
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
        $total = $this->mp->get_total_pembelian($reference);
        $supplier = $this->mp->get_supplier($reference);
        echo $list_produk.'|'.$total.'|'.$supplier['id'].'|'.$supplier['name'].'|'.format_rupiah($total);
    }

    public function cek_temp_pembelian()
    {
        $param = $this->input->post();
        $num = $this->mp->total('atombizz_tmp_detail_purchases',$where=null,$like=null,$field=null);
        if($num>0){
            // $date = date('Y-m-d');
            $data = $this->mp->cek_temp($param);
            // print_r($data);exit;
            $data['date_show'] = TanggalIndo($data['date']);
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    public function detail_pembelian()
    {
        $uri = $this->input->post('id');
        $data = $this->mp->detail_pembelian($uri);
        echo json_encode($data);    
    }

    public function delete_produk_pembelian()
    {
        $uri = $this->input->post('id');
        $where = array('id'=>$uri);
        $delete = $this->mp->delete('atombizz_tmp_detail_purchases',$where);
        if($delete>0){
            echo "1|".succ_msg("Berhasil, menghapus data pembelian.");
        } else {
            echo "0|".err_msg("Gagal, menghapus data pembelian.");
        }
    }

    public function rupiah()
    {
        $nom = $this->input->post('total');
        $hasil = format_rupiah($nom);
        echo $hasil;
    }

    public function proses_pembelian()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        if($param['cara']=='credit') {
            $this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'trim|required|xss_clean');
        } else {
            $this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'trim|xss_clean');
        }
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {

            $basmalah = $this->config->item('astro');
            $userlog = date('Y-m-d H:i:s');
            $reference = $param['reference_no'];
            $where = array('reference_no'=>$reference);
            $keterangan = 'Pembelian dengan referensi no '.$reference;
            $data = $this->mp->find('atombizz_tmp_detail_purchases', $where);
            
            foreach ($data->result_array() as $das) {
                $total = $das['sub_total'] - ($das['sub_total'] * $param['disc_reg_1'] / 100) ;
                $arr_detail[] = array(
                    'reference_no'=>$reference,
                    'product_id'=>$das['product_id'],
                    'product_code'=>$das['product_code'],
                    'product_name'=>$das['product_name'],
                    'quantity'=>$das['quantity'],
                    'unit_price'=>$das['unit_price'],
                    'gross_total'=>$total,
                    'disc_reg'=>$param['disc_reg_1'],
                    'unit'=>$das['unit'],
                    'brand_code'=>$das['brand_code']);

                $qty = $das['quantity'];
                $unit = $das['unit'];

                //brand konversi stok
                if($das['brand_code']!=''){
                    $query = $this->mp->find('atombizz_brand_converter',array('product_code'=>$das['product_code'],'code'=>$das['brand_code']));
                    $konv_brand = $query->row();
                    $qty = $das['quantity'] * $konv_brand->qty_convertion;
                    $unit = $konv_brand->satuan_convertion;
                }

                //konversi satuan terkecil
                $konv_unit = unit_converter($qty,$unit);
                $data_konv = json_decode($konv_unit);

                $qty = $data_konv->qty;
                $unit = $data_konv->satuan;

                $hpp = $das['sub_total']/$qty;
                
                $arr_stok[] = array(
                    'date'=>$param['date'],
                    'status'=>'pembelian',
                    'reference'=>$reference,
                    'in'=>$qty,
                    'out'=>0,
                    'description'=>$keterangan,
                    'userlog'=>$userlog,
                    'operator'=>$param['operator'],
                    'rak_code'=>$das['warehouse_id'],
                    'product_code'=>$das['product_code'],
                    'dept'=>$basmalah['bas_code_dept']);

                $arr_hpp[] = array(
                    'code'=>$das['product_code'],
                    'cost'=>$hpp);
            }

            // print_r($arr_hpp);exit;

            if ($param['cara']== 'cash') {
                $arr_kas = array(
                    'kode'=> 'PB',
                    'no_referensi'=>$reference,
                    'tanggal'=>$param['date'],
                    'keterangan'=>$keterangan,                              
                    'person'=>$param['supplier_code'],
                    'dept'=>$basmalah['bas_code_dept'],
                    'valid'=>'yes');

                //kas
                $arr_kas['debit'] = 0;
                $arr_kas['kredit'] = $param['total'];
                $arr_kas['no_akun'] = '110000';
                $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_kas);

                //potongan
                $arr_kas['debit'] = 0;
                $arr_kas['kredit'] = $param['nom_reg_1'];
                $arr_kas['no_akun'] = '340000';
                $potongan_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_kas);

                //pembelian
                $arr_kas['debit'] = $param['subtotal'];
                $arr_kas['kredit'] = 0;
                $arr_kas['no_akun'] = '130000';
                $save_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_kas);

            } else if ($param['cara']== 'credit') {
                $htg = array('code'=>$reference,
                        'jatuh_tempo'=>$param['jatuh_tempo'],
                        'status'=>0);
                $save_htg = $this->mp->write('atombizz_hutang',$htg);
                if ($save_htg==TRUE) {
                    $arr_htg = array(
                        'kode'=> 'PB',
                        'no_referensi'=>$reference,
                        'tanggal'=>$param['date'],
                        'keterangan'=>$keterangan,                              
                        'person'=>$param['supplier_code'],
                        'dept'=>$basmalah['bas_code_dept'],
                        'valid'=>'yes'
                    );

                    //kas
                    $arr_htg['debit'] = 0;
                    $arr_htg['kredit'] = $param['dp'];
                    $arr_htg['no_akun'] = '110000';
                    $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_htg);

                    //potongan
                    $arr_htg['debit'] = 0;
                    $arr_htg['kredit'] = $param['nom_reg_1'];
                    $arr_htg['no_akun'] = '340000';
                    $potongan_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_htg);

                    //pembelian
                    $arr_htg['debit'] = $param['subtotal'];
                    $arr_htg['kredit'] = 0;
                    $arr_htg['no_akun'] = '130000';
                    $pembelian_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_htg);

                    //hutang
                    $arr_htg['debit'] = 0;
                    $arr_htg['kredit'] = $param['total']-$param['dp'];
                    $arr_htg['no_akun'] = '510000';
                    $arr_htg['faktur'] = $reference;
                    $arr_htg['kode'] = 'HTG';
                    $save_acc = $this->mp->write('atombizz_accounting_buku_besar',$arr_htg);
                } else {
                    echo "0|".err_msg("Error, hubungi teknisi.");
                }
            }
            
            if ($save_acc){
                $save_items = $this->mp->write_batch('atombizz_purchase_items',$arr_detail);
                if($save_items==TRUE) {
                    $save_stok = $this->mp->write_batch('atombizz_warehouses_stok',$arr_stok);
                    if ($save_stok==TRUE) {
                        $save_hpp = $this->mp->replace_batch('atombizz_product',$arr_hpp,'code');
                        // echo $this->db->last_query();exit;
                        if($save_hpp == TRUE){
                            unset($param['jatuh_tempo']);
                            unset($param['cara']);
                            unset($param['dp']);
                            $param['dept'] = $basmalah['bas_code_dept'];
                            $save_beli = $this->mp->write('atombizz_purchases',$param);
                            if($save_beli == TRUE){
                                $where = array('reference_no'=>$reference);
                                $delete = $this->mp->delete('atombizz_tmp_detail_purchases',$where);
                                if($delete>0) {
                                    $where = array('code'=>$param['supplier_code']);
                                    $sql_ins['last_active'] = $param['date'];
                                    $sql_ins['last_num'] = $this->mp->get_last_num($param['supplier_code']);
                                    $insert = $this->mp->replace('atombizz_suppliers',$sql_ins,$where);
                                    if($insert == TRUE) {
                                        echo "1|".succ_msg("Berhasil, menambahkan data pembelian.");
                                    } else {
                                        echo "0|".err_msg("Error, hubungi teknisi.");
                                    }
                                } else {
                                    echo "0|".err_msg("Error, hubungi teknisi.");
                                }
                            } else {
                                echo "0|".err_msg("Error, hubungi teknisi.");
                            }
                        } else {
                            echo "0|".err_msg("Error, hubungi teknisi. -hpp");
                        }  
                    } else {
                        echo "0|".err_msg("Error, hubungi teknisi.");
                    }
                } else {
                    echo "0|".err_msg("Error, hubungi teknisi.");
                }
            } else {
                echo "0|".err_msg("Error, hubungi teknisi.");
            }

        }
        
    }

    public function daftar_produk()
    {
        $param = $this->input->post();
        $data = $this->mp->daftar_produk($param);
        $subtotal = $this->mp->get_subtotal($param['purchase_code']);
        echo $data.'||||'.$subtotal;
    }

    public function get_satuan()
    {
        $param = $this->input->post();
        $data = $this->mp->get_satuan($param['bahan']);
        echo $data;
    }

    public function get_satuan_brand()
    {
        $param = $this->input->post();
        $data = $this->mp->get_satuan_brand($param['bahan']);
        echo $data;
    }

    public function get_merk()
    {
        $param = $this->input->post();
        $data = $this->mp->get_merk($param['bahan']);
        echo $data;
    }

}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */