<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validasi extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->module='validasi';
        $this->cname='validasi';
        
        $this->load->model('mdl_accounting_journal','adb');
        $this->load->model('mdl_cashdraw','cdb');
        $this->load->model('mdl_validasi','mv');
	}

    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $thips->permission->check_permission($access);
        redirect($this->module.'/menu');
    }

     public function menu()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $data['sidebar_active']='validasi';
        $data['title']='Validasi - Resto';
        $data['content'] = $this->load->view('/menu',$data,TRUE);
        $this->load->view('template',$data);
    }

    //menampilkan menu kasir
    public function kasir(){
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $data['sidebar_active']='validasi';
        $data['title']='Validasi - Kasir';
        $data['content'] = $this->load->view('/menu_kasir',$data,TRUE);
        $this->load->view('template',$data);
    }

    //menampilkan menu akunting
    public function accounting(){
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        
        $data['sidebar_active']='validasi';
        $data['title']='Validasi - Resto';
        $data['content'] = $this->load->view('/validasi_transaksional',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function opname()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        
        $data['sidebar_active']='validasi';
        $data['title']='Validasi Opname - Resto';
        $data['content'] = $this->load->view('/detail_opname',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail_accounting($id){
        // $param=$this->input->post();
        $data['sidebar_active']='validasi';
        $data['title']='Validasi - Resto';
        $data['akunting'] = $this->adb->get_accounting($id);
        // print_r($param);exit;
        $data['content'] = $this->load->view('/detail_accounting',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail_kasir($id){
        // $param=$this->input->post();
        $data['sidebar_active']='validasi';
        $data['title']='Validasi - Resto';
        $data['kasir'] = $this->cdb->get_kasir($id);
        // print_r($param);exit;
        $data['content'] = $this->load->view('/detail_kasir',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function validasi_accounting(){
        $param=$this->input->post();
        $sesi = $this->session->userdata('astrosession');
        $user = $sesi[0]->id;
        $param['by'] = $user;
        
        $update=$this->adb->validasi_accounting($param);
        if($update == true){
            echo "1|".succ_msg("Data berhasil di validasi.");
        } else {
            echo "0|".err_msg("Gagal, memvalidasi");
        }
    }

    public function validasi_transaksional()
    {
        $param = $this->input->post();
        $data = $this->mv->validasi_transaksional($param);
        if($data){
            $referensi = $data->no_referensi;
            $update = $this->mv->replace('atombizz_accounting_buku_besar',array('valid'=>'yes'),array('no_referensi'=>$referensi));
            if($update){
                echo '1|'.succ_msg('Berhasil melakukan validasi');
            } else {
                echo '0|'.err_msg('Gagal melakukan validasi');
            }
        } else {
            echo '0|'.err_msg('Gagal melakukan validasi.');
        }
    }

    public function validasi_kasir(){
        $param=$this->input->post();
        $sesi = $this->session->userdata('astrosession');
        $user = $sesi[0]->id;
        $param['by'] = $user;
        
        $update=$this->cdb->validasi_kasir($param);
        if($update == true){
            echo "1|".succ_msg("Data berhasil di validasi.");
        } else {
            echo "0|".err_msg("Gagal, memvalidasi");
        }
    }

    public function get_valid_opname_data()
    {
        $data = $this->mv->get_valid_opname_data();
        $where = array('approved_by'=>null);
        $total = $this->mv->total('atombizz_stock_opname',$where);
        echo $data.'|'.$total;
    }


    /////////
    public function opname_dont_adjust()
    {
        $param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Keterangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('approved_by', 'Supervisor', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo '0|'.warn_msg(validation_errors());
        } else {
            // print_r($param);exit;
            $reference = $param['reference'];
            unset($param['reference']);
            $where = array('reference'=>$reference);
            $param['rule'] = 'confirmed';
            $update = $this->mv->replace('atombizz_stock_opname',$param,$where);
            if($update == TRUE){
                echo '1|'.succ_msg('Berhasil, menyimpan data opname. (stok tidak disesuaikan)');
            } else {
                echo '0|'.err_msg('Gagal, update data approve.');
            }
        }
    }

    public function opname_adjust()
    {
        $param = $this->input->post();
        $basmalah = $this->config->item('astro');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Keterangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('approved_by', 'Supervisor', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|'.warn_msg(validation_errors());
        } else {
            //save data
            $reference = $param['reference'];
            unset($param['reference']);
            $where = array('reference'=>$reference);
            $param['rule'] = 'confirmed';
            $update = $this->mv->replace('atombizz_stock_opname',$param,$where);
            $date = date('Y-m-d H:i:s');
            if($update == TRUE){
                $data = $this->mv->find('view_stock_opname',$where);
                foreach ($data->result_array() as $das) {
                    if($das['status']=='kurang'){
                        $keluar = $das['difference'];
                        $masuk = 0;
                    } elseif ($das['status']=='lebih') {
                        $keluar = 0;
                        $masuk = $das['difference'];
                    } elseif ($das['status']=='cocok') {
                        $keluar = $masuk = 0;
                    }
                    $arr_stok[] = array(
                        // 'date'=>date('Y-m-d'),
                        'status'=>'opname',
                        // 'reference'=>$das['reference'],
                        // 'in'=>$masuk,
                        // 'out'=>$keluar,
                        // 'description'=>'Opname confirmation : '.$param['description'],
                        'userlog'=>$date,
                        // 'operator'=>$param['approved_by'],
                        // 'rak_code'=>$das['rak_code'],
                        // 'product_code'=>$das['product_code'],
                        // 'outlet_code'=>$basmalah['bas_code_dept']

                        'reference'=>$das['reference'],
                        'date'=>date('Y-m-d'),
                        'in'=>$masuk,
                        'out'=>$keluar,
                        'description'=>'Opname confirmation : '.$param['description'],
                        'operator'=>$param['approved_by'],
                        'rak_code'=>$das['rak_code'],
                        'product_code'=>$das['product_code']
                    );
                }
                $save = $this->mv->write_batch('atombizz_warehouses_stok',$arr_stok);
                if($save == TRUE){
                    echo "1|".succ_msg("Berhasil, menyesuaikan stok opname.");
                } else {
                    echo '0|'.err_msg('Gagal, menyesuaikan stok opname.');
                }
            } else {
                echo '0|'.err_msg('Gagal, update data approve.');
            }
        }
    }



}

/* End of file validasi.php */
/* Location: ./application/modules/validasi/controllers/validasi.php */