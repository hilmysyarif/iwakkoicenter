<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendapatan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_pendapatan','mp');
        $this->module='finance';
        $this->cname=$this->module.'/pendapatan';
		
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

        $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Pendapatan';
        $data['content'] = $this->load->view('/data_pendapatan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function daftar_transaksi()
    {
        $param = $this->input->post();
        $this->datatables->select('id,tanggal,no_referensi,akun_name,keterangan,kredit')
        // ->add_column('Actions', get_delete_ajax('$1'),'id')
		->edit_date('tanggal','$1','tanggal')
		->edit_currency('kredit','$1','kredit')
        ->from('view_accounting_validation')
        ->where('kode',$param['filter']);
        
        echo $this->datatables->generate();
    }	

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Tambah Pendapatan';
        $data['content'] = $this->load->view('/input_pendapatan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function ambil_data()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data($param);
        if ($data->debit == 0) {
        	$data->nominal = $data->kredit;
        } else if ($data->kredit == 0) {
        	$data->nominal = $data->debit;
        }
        echo json_encode($data);
    }

    public function gen_kode()
    {
        $param = $this->input->post();
        $data = $this->mp->gen_kode($param);
        echo json_encode($data);
    }

    public function opt_akun_biaya()
    {
        $param = $this->input->post();
        $data = $this->mp->opt_akun_biaya($param);
        echo $data;
    }

    public function input_transaksi()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tanggal', 'Tanggal Pembayaran', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('akun_kas', 'Akun Kas', 'trim|required|xss_clean'); 
        // $this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'trim|required|xss_clean'); 
        // $this->form_validation->set_rules('akun_biaya', 'Akun Biaya', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|numeric|xss_clean'); 

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $data = array(
                'kode'=>$param['kode'],
                'no_referensi'=>$param['no_referensi'],
                'tanggal'=>$param['tanggal'],
                'keterangan'=>$param['keterangan'],
                'dept'=>$config['bas_code_dept'],
                'person'=>$operator[0]->uname,
                'valid'=>'yes'
            );

            //kas
            $data['debit'] = $param['nominal'];
            $data['kredit'] = 0;
            $data['no_akun'] = $param['akun_kas'];
            $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            //akun_biaya
            $data['debit'] = 0;
            $data['kredit'] = $param['nominal'];
            $data['no_akun'] = '220000';
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

    public function hapus_data()
    {
        $param = $this->input->post();
        $data = $this->mp->find('atombizz_accounting_buku_besar',array('id'=>$param['id']));
        $result = $data->row();

        $delete = $this->mp->delete('atombizz_accounting_buku_besar',array('no_referensi'=>$result->no_referensi));
        if($delete){
            echo "1|".succ_msg("Transaksi berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal menghapus Transaksi.");
        }
    }


}

/* End of file accounting.php */
/* Location: ./application/modules/finance/controllers/accounting.php */