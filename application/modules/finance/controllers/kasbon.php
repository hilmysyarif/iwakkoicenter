<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasbon extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_kasbon','mp');
        $this->module='finance';
        $this->cname=$this->module.'/kasbon';
		
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
        $data['title']='Keuangan - Menu Kasbon';
        $data['content'] = $this->load->view('/menu_kasbon',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Kasbon';
        $data['content'] = $this->load->view('/data_kasbon',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function daftar_kasbon()
    {
        $this->datatables->select('id,no_ktp,nama,debit,kredit,saldo,person')
        ->add_column('Actions', get_bayar('$1'),'person')
        ->unset_column('person')
        ->edit_currency('debit','$1','debit')
		->edit_currency('kredit','$1','kredit')
        ->edit_currency('saldo','$1','saldo')
        ->from('view_kasbon')
        ->where('saldo >', 0);
        
        echo $this->datatables->generate();
    }	

    public function catat()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['karyawan'] = $this->mp->opt_karyawan();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Tambah Kasbon';
        $data['content'] = $this->load->view('/input_kasbon',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function bayar()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['karyawan'] = $this->mp->opt_karyawan();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Tambah Kasbon';
        $data['content'] = $this->load->view('/bayar_kasbon',$data,TRUE);
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

    public function input_kasbon()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal', 'Tanggal Kasbon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('karyawan', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Jumlah Kasbon', 'trim|required|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $data = array(
                'kode'=>$param['kode'],
                'no_referensi'=>$param['no_referensi'],
                'tanggal'=>$param['tanggal'],
                'keterangan'=>'Kasbon karyawan dengan nomor kasbon '.$param['no_referensi'],
                'dept'=>$config['bas_code_dept'],
                'person'=>$param['karyawan'],
                'valid'=>'yes'
            );

            //kas
            $data['debit'] = 0;
            $data['kredit'] = $param['nominal'];
            $data['no_akun'] = '110000';
            $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            //kasbon
            $data['debit'] = $param['nominal'];
            $data['kredit'] = 0;
            $data['no_akun'] = '180000';
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

    public function input_kasbon_bayar()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal', 'Tanggal Kasbon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('karyawan', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Jumlah Kasbon', 'trim|required|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $data = array(
                'kode'=>$param['kode'],
                'no_referensi'=>$param['no_referensi'],
                'tanggal'=>$param['tanggal'],
                'keterangan'=>'Kasbon karyawan dengan nomor kasbon '.$param['no_referensi'],
                'dept'=>$config['bas_code_dept'],
                'person'=>$param['karyawan'],
                'valid'=>'yes'
            );

            //kas
            $data['debit'] = $param['nominal'];
            $data['kredit'] = 0;
            $data['no_akun'] = '110000';
            $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            //kasbon
            $data['debit'] = 0;
            $data['kredit'] = $param['nominal'];
            $data['no_akun'] = '180000';
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