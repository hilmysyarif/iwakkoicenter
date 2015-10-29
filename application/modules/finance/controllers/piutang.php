<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piutang extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
        $this->load->model('mdl_piutang','mp');
		$this->module = 'finance';
		$this->cname = $this->module.'/piutang';
	}

	public function index()
	{
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
		redirect($this->cname.'/daftar');
	}
    
	public function catat()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['sup'] = $this->mp->get_customer();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Piutang';
        $data['content'] = $this->load->view('/catat_piutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function gen_kode()
    {
        $data = $this->mp->gen_kode();
        // echo $this->db->last_query();exit;
        echo json_encode($data);
    }

    public function gen_kode_bayar()
    {
        $param = $this->input->post();
        $data = $this->mp->gen_kode_bayar($param);
        // echo $this->db->last_query();exit;
        echo json_encode($data);
    }

    public function ambil_data()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data($param);
        
        echo json_encode($data);
    }

    public function bayar()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['sup'] = $this->mp->get_customer();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Piutang';
        $data['content'] = $this->load->view('/bayar_piutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function daftar()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Piutang';
        $data['content'] = $this->load->view('/daftar_piutang',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function table()
    {   
        $this->datatables->select('person,no_referensi,name,saldo,jatuh_tempo')
        ->add_column('Actions', get_edit_delete_hutang('$1'),'no_referensi')
        ->edit_currency('saldo','$1','saldo')
        ->edit_date('jatuh_tempo','$1','jatuh_tempo')
        ->from('view_piutang');
        
        echo $this->datatables->generate();
    }

    public function input_transaksi()
    {
        $param = $this->input->post();
        // print_r($param);exit;
        $config = $this->config->item('astro');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('no_referensi', 'No. Referensi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kode', 'Jenis Transaksi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|xss_clean');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('person', 'Supplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
        $this->form_validation->set_rules('faktur', 'Faktur', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);

            $nominal = $param['nominal'];
            unset($param['nominal']);

            $param['kredit'] = $nominal;
            $param['debit'] = 0;

            $param['dept'] = $config['bas_code_dept'];
            $param['valid'] = 'yes';

            if($id == NULL){
                $where = array('no_referensi'=>$param['no_referensi']);
                $exist = $this->mp->total('atombizz_accounting_buku_besar',$where);
                if($exist<=0){
                    $save = $this->mp->write('atombizz_accounting_buku_besar',$param);
                    if($save == TRUE){
                        echo "1|".succ_msg("Transaksi berhasil ditambahkan");
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }
                } else {
                    echo "0|".err_msg("Data sudah ada.");
                }   
            } else {
                $where = array('id' => $id);
                $update = $this->mp->replace('atombizz_accounting_buku_besar',$param,$where);
                if($update == TRUE){
                    echo "1|".succ_msg("Transaksi berhasil dirubah.");
                } else {
                    echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                }
            }
        }
    }

    public function faktur()
    {
        $param = $this->input->post();
        $data = $this->mp->get_faktur($param['person']);
        $opt = '<option value=""></option>';
        foreach ($data->result() as $das) {
            $opt .= '<option value="'.$das->faktur.'">'.$das->faktur.'</option>';
        }
        echo $opt;
    }

    public function get_data($value='')
    {
        $param = $this->input->post();
        $query = $this->mp->get_data($param);
        if($query->num_rows() > 0){
            $data = $query->row();
            echo json_encode($data);
        } else {
            echo FALSE;
        }
    }

    public function saldo()
    {
        $param = $this->input->post();
        $data = $this->mp->get_saldo($param['faktur']);
        
        echo format_rupiah($data);
    }

    public function input_transaksi_bayar()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tanggal', 'Tanggal Pembayaran', 'trim|required|xss_clean');
        $this->form_validation->set_rules('person', 'Pelanggan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('faktur', 'Faktur', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Jumlah di Bayar', 'trim|required|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $data = array(
                'kode'=>$param['kode'],
                'no_referensi'=>$param['no_referensi'],
                'tanggal'=>$param['tanggal'],
                'keterangan'=>'Pembayaran Piutang pada faktur '.$param['faktur'],
                'dept'=>$config['bas_code_dept'],
                'person'=>$param['person'],
                'valid'=>'yes'
            );

            //kas
            $data['debit'] = $param['nominal'];
            $data['kredit'] = 0;
            $data['no_akun'] = '110000';
            $kas_acc = $this->mp->write('atombizz_accounting_buku_besar',$data);

            //piutang
            $data['debit'] = 0;
            $data['kredit'] = $param['nominal'];
            $data['no_akun'] = '140000';
            $data['urut'] = $param['urut'];
            $data['faktur'] = $param['faktur'];
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
        $delete = $this->mp->delete('atombizz_accounting_buku_besar',array('id'=>$param['id']));
        if($delete){
            echo "1|".succ_msg("Transaksi berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal menghapus Transaksi.");
        }
    }

}

/* End of file piutang.php */
/* Location: ./application/modules/finance/controllers/piutang.php */
