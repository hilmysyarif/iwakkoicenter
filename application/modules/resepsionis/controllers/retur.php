<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'resepsionis';
		$this->cname = $this->module.'/retur';
		$this->load->model('mdl_retur','mp');
	}

	public function index()
	{
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
		$data['sidebar_active']='resepsionis';
        $data['title']='Menu - Retur Konsumen';
        $data['content'] = $this->load->view('/menu_retur',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active'] = 'resepsionis';
        $data['title'] = 'Resepsionis - Pembelian Konsumen';
        // $data['suplier'] = $this->mp->get_suplier();
        $data['content'] = $this->load->view('/tambah_retur',$data,TRUE);
        $this->load->view('template',$data);
    }

	public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_total());
        $data['sidebar_active']='resepsionis';
        $data['title']='Resepsionis - Pembelian Konsumen';
        $data['content'] = $this->load->view('/data_retur',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail_retur($id){
        // $param=$this->input->post();
        $data['sidebar_active']='resepsionis';
        $data['title']='Resepsionis - Detail Retur';
        // print_r($param);exit;
        $data['content'] = $this->load->view('/detail_retur',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function cek_temp_retur_in()
    {
        $param = $this->input->post();
        $num = $this->mp->total('atombizz_retur_in_tmp');
        if($num>0){
            $data = $this->mp->cek_temp($param);
            $data['date_show'] = TanggalIndo($data['date']);
            echo json_encode($data);
        } else {
            echo 0;
        }
    }

    public function faktur_retur_in()
    {
        $param = $this->input->post();
        $where = array('invoice_no'=>$param['nota']);
        $cek_nota = $this->mp->find('atombizz_selling',$where);
        if($cek_nota<>NULL){
            $faktur = $this->mp->faktur_retur_in($param);
            $faktur['kd_status'] = 1;
        } else {
            $faktur['kd_status'] = 0;
            $faktur['keterangan'] = err_msg('Maaf, nota tidak ditemukan.');
        }
        echo json_encode($faktur);
    }

    public function mencari()
    {
        $param = $this->input->post();

        $data = $this->mp->mencari($param);
        foreach ($data->result_array() as $das) {
            # code...
        }
        // echo $this->db->last_query();exit;
        echo @json_encode($das);
    }

    public function retur_in_produk()
    {
        $param = $this->input->post();
        $basmalah = $this->config->item('astro');
        $param['branch_code'] = $basmalah['bas_branch_code'];
        $param['branch_name'] = $basmalah['bas_branch_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {
           $qty = $this->mp->get_qty($param);
           // print_r($qty);exit;
           if ($param['quantity']>$qty){
                echo "0|".err_msg("Gagal, jumlah barang melebihi barang yang telah dibeli.");
            } else {

                //save data
                $ident = $this->input->post('ident');
                unset($param['ident']);
                if(is_numeric($ident)){
                    $where = array('id'=>$ident);
                    $save = $this->mp->replace('atombizz_retur_in_tmp',$param,$where);
                } else {
                    $where = array(
                        'product_code'=>$param['product_code'], 
                        'reference'=>$param['reference']);
                    $exist = $this->mp->total('atombizz_retur_in_tmp',$where);
                    if($exist<=0){
                        $save = $this->mp->write('atombizz_retur_in_tmp',$param);
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
    }

    public function list_produk()
    {
        $reference = $this->input->post('reference');
        $list_produk = $this->mp->get_list_produk($reference);
        echo $list_produk;
    }

        public function detail_retur_in()
    {
        $uri = $this->input->post('id');
        $data = $this->mp->detail_retur_in($uri);
        // $data['nominal'] = format_rupiah($data['sub_total']);
        echo json_encode($data);
        // $data['id'].'|'.$data['product_id'].'|'.$data['product_code'].'|'.$data['product_name'].'|'.$data['quantity'].'|'.$data['unit_price'].'|'.$data['tax_amount'].'|'.$data['disc_reg']; 
    }

    public function delete_produk_retur_in()
    {
        $uri = $this->input->post('id');
        $where = array('id'=>$uri);
        $delete = $this->mp->delete('atombizz_retur_in_tmp',$where);
        if($delete>0){
            echo "1|".succ_msg("Berhasil, menghapus data retur masuk.");
        } else {
            echo "0|".err_msg("Gagal, menghapus data retur masuk.");
        }
    }

    public function proses()
    {
        $param = $this->input->post();
        $basmalah = $this->config->item('astro');
        // print_r($param);exit;
        $dept = $basmalah['bas_code_dept'];
        $userlog = date('Y-m-d H:i:s');
        $reference = $param['reference'];
        $where = array('reference'=>$reference);
        $total = 0;
        $data = $this->mp->find('atombizz_retur_in_tmp',$where);
        foreach ($data->result_array() as $das) {
            $arr_detail[]= array(
                'reference'=>$das['reference'],
                'product_code'=>$das['product_code'],
                'product_name'=>$das['product_name'],
                'quantity'=>$das['quantity'],
                'hpp'=>$das['hpp']
                );
            $arr_stok[]= array(
                'date'=>$das['date'],
                'status'=>'retur_in',
                'reference'=>$das['reference'],
                'in'=>$das['quantity'],
                'out'=>0,
                'description'=>'Retur masuk dengan nota '.$das['nota'],
                'userlog'=>$userlog,
                'operator'=>$das['operator'],
                'rak_code'=>'retur',
                'product_code'=>$das['product_code'],
                'dept'=>$dept
                );
            $arr_stok_out[]= array(
                'date'=>$das['date'],
                'status'=>'retur_in',
                'reference'=>$das['reference'],
                'in'=>0,
                'out'=>$das['quantity'],
                'description'=>'Retur masuk dengan nota '.$das['nota'],
                'userlog'=>$userlog,
                'operator'=>$das['operator'],
                'rak_code'=>$this->mp->get_gudang_code($das['product_code']),
                'product_code'=>$das['product_code'],
                'dept'=>$dept
                );
            $total += $das['quantity'] * $das['hpp'];
        }

        $arr_retur_in = array(
            'reference'=>$param['reference'],
            'nota'=>$param['nota'],
            'date'=>$param['date'],
            'total'=>$total,
            'userlog'=>$userlog,
            'operator'=>$param['operator'],
            'branch_code'=>$basmalah['bas_branch_code'],
            'branch_name'=>$basmalah['bas_branch_name'],
            'dept'=>$dept,
            'urut'=>$param['urut'],
            'updated_by'=>$param['operator']
            );

        $ins_stok_retur = $this->mp->write_batch('atombizz_warehouses_stok',$arr_stok);
        if ($ins_stok_retur){
            $ins_stok_retur = $this->mp->write_batch('atombizz_warehouses_stok',$arr_stok_out);
            if ($ins_stok_retur){
                $ins_retur = $this->mp->write('atombizz_retur_in',$arr_retur_in);
                if ($ins_retur){
                    $ins_detail = $this->mp->write_batch('atombizz_retur_in_detail',$arr_detail);
                    if ($ins_detail){
                        $del_tmp = $this->mp->delete('atombizz_retur_in_tmp',$where);
                        if ($del_tmp){
                            echo succ_msg('Proses retur in berhasil.');
                        } else {
                            echo err_msg('Gagal menghapus produk di temporary.');
                        }
                    } else {
                        echo err_msg('Gagal menyimpan data detail.');
                    }
                } else {
                    echo err_msg('Gagal menyimpan data retur.');
                }
            } else {
                echo err_msg('Gagal menyimpan data retur.');
            }
        } else {
            echo err_msg('Gagal menyimpan data stok.');
        }
    }


}

/* End of file retur.php */
/* Location: ./application/modules/resepsionis/controllers/retur.php */