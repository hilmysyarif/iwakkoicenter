<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gaji extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_gaji','mp');
        $this->module='finance';
        $this->cname=$this->module.'/gaji';
		
	}

	public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);
        redirect($this->cname.'/menu');
    }

    public function menu()
    {
        // $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Menu Kasbon';
        $data['content'] = $this->load->view('/menu_gaji',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function data()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Data Kasbon';
        $data['content'] = $this->load->view('/data_gaji',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function daftar_gaji()
    {
        $this->datatables->select('id,bulan,tahun,employee_code,employee_name,penerimaan,potongan,total')
        ->add_column('Actions', get_edit_print('$1'),'id')
        ->edit_column('bulan','$1','bulanIndo(bulan)')
		->edit_currency('penerimaan','$1','penerimaan')
        ->edit_currency('potongan','$1','potongan')
        ->edit_currency('total','$1','total')
        ->from('view_salary');
        
        echo $this->datatables->generate();
    }	

    public function tambah()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        // $data['count'] = format_number($this->mp->count_data());
        $data['opt_karyawan'] = $this->mp->opt_karyawan();
        $data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Tambah Kasbon';
        $data['content'] = $this->load->view('/input_gaji',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function print_salary($value='')
    {
        $this->load->library('thoni_fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        // $key = paramDecrypt($value);
        $where = array('id'=>$value);
        $faktur = $this->mp->find('view_salary',$where);
        $data['faktur'] = @$faktur->row();
        $data['config'] = $this->config->item('astro');

        $this->load->view('/print_salary',$data);
    }

    public function gen_kode()
    {
        $param = $this->input->post();
        $data = $this->mp->gen_kode();
        // echo $this->db->last_query();exit;
        echo $data;
    }

    public function ambil_data()
    {
        $param = $this->input->post();
        $data = $this->mp->ambil_data($param);
        // print_r($data);exit;
        $data->date_show = tanggalIndo($data->date);
        echo json_encode($data);
    }

    public function input_kasbon()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('person', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id']);
            $param['date'] = date('Y-m-d');
            $param['status'] = 'belum lunas';

            $jurnal['code'] = 'KASBON';
            $jurnal['reference_no'] = $param['code'];
            $jurnal['date'] = date('Y-m-d');
            $jurnal['description'] = 'Kasbon Karyawan dengan id'.$param['person'];
            $jurnal['debit'] = 0;
            $jurnal['credit'] = $param['nominal'];
            $jurnal['outlet_code'] = $config['bas_code_dept'];
            $jurnal['person'] = $param['person'];
            $jurnal['valid'] = 'no';
            $jurnal['operator'] = $operator[0]->uid;

            if($id == NULL){
                $where = array('code'=>$param['code']);
                $exist = $this->mp->total('atombizz_kasbon',$where);
                if($exist<=0){
                    $kasbon = $this->mp->write('atombizz_kasbon',$param);
                    if ($kasbon) {
                        $where2 = array('reference_no'=>$param['code']);
                        $exist2 = $this->mp->total('atombizz_accounting_journal',$where2);
                        if($exist2<=0) {
                            $save = $this->mp->write('atombizz_accounting_journal',$jurnal);
                        } if($save == TRUE){
                                echo "1|".succ_msg("Kasbon berhasil ditambahkan");
                            } else {
                                echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                            }
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }
                    
                } else {
                    echo "0|".err_msg("Data sudah ada.");
                }   
            } else {
                $where = array('id' => $id);
                $kasbon = $this->mp->replace('atombizz_kasbon',$param,$where);
                if ($kasbon) {
                    $where2 = array('reference_no' => $param['code']);
                    $update = $this->mp->replace('atombizz_accounting_journal',$jurnal,$where2);
                    if($update == TRUE){
                            echo "1|".succ_msg("Kasbon berhasil dirubah.");
                        } else {
                            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                        }
                    } else {
                        echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
                    }
                
            }
        }
    }

    public function input_gaji()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        // print_r($operator);exit;
        $this->load->library('form_validation');

        $this->form_validation->set_rules('employee_code', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gaji_pokok', 'fieldlabel', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('bonus', 'fieldlabel', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('tunjangan_lain', 'fieldlabel', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('hutang', 'fieldlabel', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('potongan_lain', 'fieldlabel', 'trim|numeric|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            $id = $param['id'];
            unset($param['id'],$param['date_show']);

            $total_gaji = ($param['gaji_pokok']+$param['bonus']+$param['tunjangan_lain']) - $param['potongan_lain'];

            if(empty($id)){
                $where = array('code'=>$param['code']);
                $exist = $this->mp->total('atombizz_salary',$where);
                if($exist > 0){
                    $save = false;
                    $data = 'exist';
                } else {
                    $write = $this->mp->write('atombizz_salary',$param);
                    if($write){
                        $jurnal['kode'] = 'GAJI';
                        $jurnal['no_referensi'] = $param['code'];
                        $jurnal['tanggal'] = $param['date'];
                        $jurnal['keterangan'] = 'Penggajian Kepada Karyawan dengan id '.$param['employee_code'];
                        $jurnal['debit'] = 0;
                        $jurnal['kredit'] = $total_gaji;
                        $jurnal['dept'] = '';
                        $jurnal['person'] = $param['employee_code'];
                        $jurnal['valid'] = 'yes';
                        // $jurnal['operator'] = $operator[0]->no_ktp;
                        $save = $this->mp->write('atombizz_accounting_buku_besar',$jurnal);

                        $jurnal_piutang['kode'] = 'KASBON';
                        $jurnal_piutang['no_referensi'] = $param['code'];
                        $jurnal_piutang['tanggal'] = $param['date'];
                        $jurnal_piutang['keterangan'] = 'Pembayaran kasbon karyawan dengan id '.$param['employee_code'];
                        $jurnal_piutang['debit'] = $param['hutang'];
                        $jurnal_piutang['kredit'] = 0;
                        $jurnal_piutang['dept'] = '';
                        $jurnal_piutang['person'] = $param['employee_code'];
                        $jurnal_piutang['valid'] = 'yes';
                        // $jurnal_piutang['operator'] = $operator[0]->no_ktp;
                        $save = $this->mp->write('atombizz_accounting_buku_besar',$jurnal_piutang);
                    } else {
                        $save = false;
                    }
                }
            } else {
                $where = array('id'=>$id);
                $replace = $this->mp->replace('atombizz_salary',$param,$where);
                if($replace){
                    $jurnal['debit'] = 0;
                    $jurnal['credit'] = $total_gaji;
                    $where = array('reference_no'=>$param['code'],'code'=>'GAJI');
                    $save = $this->mp->replace('atombizz_accounting_buku_besar',$jurnal,$where);

                    $jurnal_piutang['debit'] = $param['hutang'];
                    $jurnal_piutang['credit'] = 0;
                    $where2 = array('reference_no'=>$param['code'],'code'=>'KASBON');
                    $save = $this->mp->replace('atombizz_accounting_buku_besar',$jurnal_piutang,$where2);
                } else {
                    $save = false;
                }
            }
            // echo $this->db->last_query();exit;

            if($save){
                echo "1|".succ_msg('Penggajian berhasil dicatat.');
            } else {
                if($data=='exist'){
                    echo "0|".err_msg('Data sudah ada. Gunakan fitur edit untuk merubah data.');
                } else {
                    echo "0|".err_msg('Penggajian gagal dicatat. Silahkan cek inputan anda.');
                }   
            }
        }
    }

    public function get_data_employee($value='')
    {
        $param = $this->input->post();
        $data['code'] = $param['code'].'.'.date('ym');
        $data_employee = $this->mp->get_data_employee($param);
        $data['gaji_pokok'] = $data_employee->gaji;
        $data['hutang'] = $this->mp->get_kasbon_info($param);
        echo json_encode($data);
    }
}

/* End of file Kasbon.php */
/* Location: ./application/modules/finance/controllers/Kasbon.php */