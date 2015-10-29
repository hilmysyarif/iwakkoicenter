<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hutang extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_hutang','mp');
        $this->module='finance';
        $this->cname=$this->module.'/hutang';
        
    }

    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        redirect($this->cname.'/menu');
    }

    public function menu()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        // $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Menu Hutang';
        $data['content'] = $this->load->view('/menu_hutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function daftar()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Hutang';
        $data['content'] = $this->load->view('/daftar_hutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function daftar_hutang()
    {
        $this->datatables->select('id,person,name,kredit,debit,saldo')
        ->add_column('Actions', get_bayar('$1'),'person')
        ->edit_currency('debit','$1','debit')
        ->edit_currency('kredit','$1','kredit')
        ->edit_currency('saldo','$1','saldo')
        ->from('view_hutang')
        ->where('saldo >', 0);
        
        echo $this->datatables->generate();
    }   

    public function catat()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['suplier'] = $this->mp->opt_suplier();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Tambah Hutang';
        $data['content'] = $this->load->view('/catat_hutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function bayar()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['suplier'] = $this->mp->opt_suplier();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Tambah Hutang';
        $data['content'] = $this->load->view('/bayar_hutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function gen_kode()
    {
        $param = $this->input->post();
        $data = $this->mp->gen_kode($param);
        echo json_encode($data);
    }

    public function saldo()
    {
        $param = $this->input->post();
        $data = $this->mp->saldo($param);
        if($data){
            $data->saldo_show = format_rupiah($data->saldo);
            echo json_encode($data);
        } else {
            echo FALSE;
        }
    }

    public function ambil_data()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data($param);
        echo json_encode($data);
    }

    public function input_hutang()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal', 'Tanggal Pencatatan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('suplier', 'Suplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Jumlah Hutang', 'trim|required|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $data = array(
                'kode'=>$param['kode'],
                'no_referensi'=>$param['no_referensi'],
                'tanggal'=>$param['tanggal'],
                'keterangan'=>'Catat hutang pada suplier '.$param['suplier'],
                'dept'=>$config['bas_code_dept'],
                'person'=>$param['suplier'],
                'valid'=>'yes'
            );

            //kas
            // $data['debit'] = 0;
            // $data['kredit'] = $param['nominal'];
            // $data['no_akun'] = '110000';
            // $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            //hutang
            $data['debit'] = 0;
            $data['kredit'] = $param['nominal'];
            $data['no_akun'] = '510000';
            $data['urut'] = $param['urut'];
            $data['faktur'] = $param['no_referensi'];
            $biaya_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            if($biaya_acc){
                $tempo = array(
                    'code'=>$param['no_referensi'],
                    'jatuh_tempo'=>$param['jatuh_tempo']
                );
                $tgl_tempo = $this->mp->write('atombizz_hutang',$tempo);
                if($tgl_tempo){
                    echo "1|".succ_msg("Transaksi berhasil ditambahkan");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                }
            } else {
                echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
            }
        }
    }

    public function input_hutang_bayar()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal', 'Tanggal Kasbon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('suplier', 'Suplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Jumlah Kasbon', 'trim|required|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $data = array(
                'kode'=>$param['kode'],
                'no_referensi'=>$param['no_referensi'],
                'tanggal'=>$param['tanggal'],
                'keterangan'=>'Bayar hutang ke '.$param['suplier'],
                'dept'=>$config['bas_code_dept'],
                'person'=>$param['suplier'],
                'valid'=>'yes'
            );

            //kas
            $data['debit'] = 0;
            $data['kredit'] = $param['nominal'];
            $data['no_akun'] = '110000';
            $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            //hutang
            $data['debit'] = $param['nominal'];
            $data['kredit'] = 0;
            $data['no_akun'] = '510000';
            $data['urut'] = $param['urut'];
            $data['faktur'] = $param['no_referensi'];
            $biaya_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            if($kas_acc && $biaya_acc){
                echo "1|".succ_msg("Transaksi berhasil ditambahkan");
            } else {
                echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
            }
        }
    }

    // iki hapuse durung pak broooooo.. cek en yoooo
    public function hapus_data()
    {
        $param = $this->input->post();
        $kasbon = $this->mp->delete('atombizz_kasbon',array('id'=>$param['id']));
        if ($kasbon) {
            $kasbon = $this->mp->delete('atombizz_accounting_journal',array('id'=>$param['id']));
        }
        if($delete){
            echo "1|".succ_msg("Kasbon berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal menghapus Transaksi.");
        }
    }


}

/* End of file Kasbon.php */
/* Location: ./application/modules/finance/controllers/Kasbon.php */