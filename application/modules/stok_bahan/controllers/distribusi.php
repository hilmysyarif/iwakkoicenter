<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribusi extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "stok_bahan";
		$this->cname = $this->module.'/distribusi';
		$this->load->model('mdl_mutasi','mp');
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
        $data['sidebar_active']='stok_bahan';
        $data['title']='stok_bahan - Distribusi';
        $data['content'] = $this->load->view('/data_distribusi',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail($id){
        // $param=$this->input->post();
        $data['sidebar_active']='stok_bahan';
        $data['title']='stok_bahan - Distribusi';
        // print_r($param);exit;
        $data['content'] = $this->load->view('/detail_distribusi',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail_distribusi($value='')
    {
        $param = $this->input->post();
        $data = $this->mp->detail_distribusi($param);
        echo json_encode($data);
    }

    public function tambah()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $data['opt_supplier'] = $this->mp->opt_supplier();
        $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active'] = 'stok_bahan';
        $data['title'] = 'stok_bahan - Distribusi';
        $data['content'] = $this->load->view('/tambah_distribusi',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function proses($value='')
    {
        // $data['opt_supplier'] = $this->mp->opt_supplier();
        // $data['count'] = format_number($this->mp->count_total());
        $data['menu'] = $this->mp->_opt_produk();
        $data['distribusi'] = $this->mp->get_distribusi($value);
        $data['detail'] = $this->mp->get_distribusi_detail($data['distribusi']->reference_no);
        $data['sidebar_active'] = 'stok_bahan';
        $data['title'] = 'stok_bahan - Distribusi';
        $data['content'] = $this->load->view('/proses_distribusi',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function proses_distribusi($value='')
    {
        $basmalah = $this->config->item('astro');
        $user = $this->session->userdata('astrosession');
        $userlog = date('Y-m-d H:i:s');
        $param = $this->input->post();

        $reference = $this->input->post('reference');
        $where = array('reference_no'=>$reference);
        
        $replace = $this->mp->replace('atombizz_distribution',array('updated_by'=>'pusat','status'=>'valid'),$where);
        if($replace==TRUE){
            echo '1|'.succ_msg('Sukses');
        } else {
            echo '0|'.err_msg('Gagal');
        }
    }

    public function cek_temp_retur_out()
    {
        $param = $this->input->post();
        $num = $this->mp->total('atombizz_distribution_tmp',array('operator'=>$param['operator']));
        if($num>0){
            $data = $this->mp->cek_temp($param);
            $data['date_show'] = TanggalIndo($data['date']);
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    public function faktur_retur_out()
    {
        $param = $this->input->post();
        $faktur = $this->mp->faktur_retur_out($param);
        echo json_encode($faktur);
    }

    public function list_produk()
    {
        $reference = $this->input->post('reference');
        $list_produk = $this->mp->get_list_produk($reference);
        // $total = $this->mp->get_total_retur_out($reference);
        // $supplier = '';
        echo $list_produk;
    }

    public function total_nominal()
    {
        $param = $this->input->post();
        echo format_rupiah($param['total']);
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
        // echo $this->db->last_query();exit;
        echo @json_encode($das);
    }

    public function retur_out_produk()
    {
        $param = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('qty_dikirim', 'Quantity', 'trim|required|numeric|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {
            $replace = $this->mp->replace('atombizz_distribution_items',array('quantity'=>$param['qty_dikirim'],'unit'=>$param['unit']),array('id'=>$param['ident']));
            if($replace==TRUE){
                echo '1|'.succ_msg('Berhasil merubah qty');
            } else {
                echo '0|'.err_msg('Gagal merubah qty');
            }
        }
    }

    public function detail_retur_out()
    {
        $uri = $this->input->post('id');
        $data = $this->mp->detail_retur_out($uri);
        $data['nominal'] = format_rupiah($data['sub_total']);
        echo json_encode($data);
        // $data['id'].'|'.$data['product_id'].'|'.$data['product_code'].'|'.$data['product_name'].'|'.$data['quantity'].'|'.$data['unit_price'].'|'.$data['tax_amount'].'|'.$data['disc_reg']; 
    }

    public function delete_produk_retur_out()
    {
        $uri = $this->input->post('id');
        $where = array('id'=>$uri);
        $delete = $this->mp->delete('atombizz_distribution_tmp',$where);
        if($delete>0){
            echo "1|".succ_msg("Berhasil, menghapus data retur keluar.");
        } else {
            echo "0|".err_msg("Gagal, menghapus data retur keluar.");
        }
    }

    public function proses_retur_out()
    {
        $basmalah = $this->config->item('astro');
        $userlog = date('Y-m-d H:i:s');
        $param = $this->input->post();

        $reference = $this->input->post('reference');
        $where = array('reference'=>$reference);
        $keterangan = 'Distribusi dengan referensi no '.$reference;
        $data = $this->mp->find('atombizz_distribution_tmp',$where);
        $nominal_retur_out = 0;
        foreach ($data->result_array() as $das) {
            $arr_detail[] = array(
                'reference_no'=>$reference,
                'product_id'=>$das['product_id'],
                'product_code'=>$das['product_code'],
                'product_name'=>$das['product_name'],
                'quantity'=>$das['qty_dikirim'],
                'unit'=>$das['unit']);
            $arr_stok[] = array(
                'date'=>$param['date'],
                'status'=>'distribusi',
                'reference'=>$reference,
                'in'=>0,
                'out'=>$das['qty_dikirim'],
                'description'=>$keterangan,
                'userlog'=>$userlog,
                'operator'=>$param['operator'],
                'rak_code'=>'G-001',
                'product_code'=>$das['product_code'],
                'dept'=>$basmalah['bas_code_dept']);
        }
        $arr_retur_out = array(
            'reference_no'=>$reference,
            'penerima'=>$param['penerima'],
            'date'=>$param['date'],
            'operator'=>$param['operator'],
            'urut'=>$param['urut'],
            'dept'=>$basmalah['bas_code_dept'],
            'status'=>'pengajuan'
        );

        $save_items = $this->mp->write_batch('atombizz_distribution_items',$arr_detail);
        if($save_items==TRUE){
            $save_stok = $this->mp->write_batch('atombizz_warehouses_stok',$arr_stok);
            if($save_stok == TRUE){
                $save_beli = $this->mp->write('atombizz_distribution',$arr_retur_out);
                // echo $this->db->last_query();exit;
                if($save_beli == TRUE){
                    $where = array('reference'=>$reference);
                    $delete = $this->mp->delete('atombizz_distribution_tmp',$where);
                    if($delete>0){
                    	echo "1|".succ_msg("Berhasil, menambahkan data retur keluar.");
                        // $kode = 'FRO';
                        // $data = array(
                        //     'kode'=>$kode,
                        //     'no_referensi'=>$reference,
                        //     'tanggal'=>$param['date'],
                        //     'keterangan'=>$keterangan,                             
                        //     'dept'=>$basmalah['bas_code_dept'],
                        //     'person'=>$param['supplier_code'],
                        //     'valid'=>'yes'
                        // );

                        // //retur
                        // $data['debit'] = 0;
                        // $data['kredit'] = $param['total_akhir'];
                        // $data['no_akun'] = '330000';
                        // $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

                        // //hutang
                        // $data['kredit'] = 0;
                        // $data['debit'] = $param['total_akhir'];
                        // $data['no_akun'] = '510000';
                        // $data['faktur'] = $reference;
                        // $data['kode'] = 'HTG';
                        // $save_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

                        // if ($save_acc==TRUE) {
                        //     echo "1|".succ_msg("Berhasil, menambahkan data retur keluar.");
                        // } else {
                        //     echo "0|".err_msg("Gagal, menambahkan data accounting persediaan.");
                        // }
                    }
                } else {
                    echo "0|".err_msg("Gagal, menambahkan data distribusi.");
                }
            } else {
                echo "0|".err_msg("Gagal, mengurangi data stok bahan.");
            }
        } else {
            echo "0|".err_msg("Gagal, menambahkan data distribusi detail.");
        }
    }

    public function get_satuan()
    {
        $param = $this->input->post();
        $data = $this->mp->get_satuan($param['bahan']);
        echo $data;
    }

}

/* End of file mutasi.php */
/* Location: ./application/modules/stok_bahan/controllers/mutasi.php */