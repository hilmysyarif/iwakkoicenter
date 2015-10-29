<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->module = 'master';
		$this->cname = 'master/karyawan';
		$this->load->model('mdl_karyawan', 'mp');
	} 

	public function index()
	{
		// echo "hello pspell_save_wordlist(dictionary_link)";
		redirect($this->cname.'/data');
	}

    public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = format_number($this->mp->count_data());
        $data['_opt_karyawan'] = $this->mp->get_karyawan();
        $data['sidebar_active']='master';
        $data['title']='Master - Karyawan';
        $data['content'] = $this->load->view('/data_karyawan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function gaji()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $data['count'] = format_number($this->mp->count_data());
        $data['sidebar_active']='master';
        $data['title']='Master - Karyawan';
        $data['content'] = $this->load->view('/data_penggajian',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function detail()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->mp->count_data());
        if(!empty($id)){
            $data['paramedik'] = $this->mp->get_paramedik($id);
            $data['paramedik'] = $data['paramedik'][0]; 
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Detail Karyawan';
        $data['content'] = $this->load->view('/detail_karyawan',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['count'] = format_number($this->mp->count_data());
        if(!empty($id)){
            $data['paramedik'] = $this->mp->get_paramedik($id);
            $data['paramedik'] = $data['paramedik'][0];
        } else {
        	$str = $this->gen_code();
        	$data['paramedik'] = (object)array('code'=>$str['code'],'no_urut'=>$str['no']) ;
        }
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Karyawan';
        $data['content'] = $this->load->view('/input_karyawan',$data,TRUE);
        $this->load->view('template',$data);
    }

	//fungsi logic
	public function save()
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
		// $this->permission->check_permission($access);

        $param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Kode', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('registered', 'Tanggal Registrasi', 'trim|required|xss_clean');
		$this->form_validation->set_rules('identification_number', 'Nomor KTP', 'trim|xss_clean');
		$this->form_validation->set_rules('no_urut', 'Nomor urut', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('born_date', 'Tanggal Lahir', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|xss_clean');
        $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email');
        $this->form_validation->set_rules('gaji', 'Gaji', 'trim|required|xss_clean');
        $this->form_validation->set_rules('category', 'Kategori', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('expired', 'Tanggal Expired', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo "0|".warn_msg(validation_errors());
        } else {
            //save data
            $id = $this->input->post('id');
            unset($param['id']);
            
	        if(is_numeric($id)){
	        	$where = array('id'=>$id);
	        	$save = $this->mp->replace('atombizz_karyawan',$param,$where);
                $param['nik']=$param['code'];
                unset($param['code']);
                $param['nama']=$param['name'];
                unset($param['name']);
                $param['tgl_lahir']=$param['born_date'];
                unset($param['born_date']);
                $param['alamat']=$param['address'];
                unset($param['address']);
                $param['telp']=$param['phone'];
                unset($param['phone']);
                unset($param['identification_number']);
                unset($param['registered']);
                unset($param['no_urut']);
                unset($param['jabatan']);
                $where2 = array('nik'=>$param['nik']);
                @$this->mp->replace('atombizz_employee',$param,$where2);
	        } else {
	        	$where = array('code'=>$param['code']);
	        	$exist = $this->mp->total('atombizz_karyawan',$where,$like=null,$field=null);
	        	if($exist<=0){
	        		$save = $this->mp->write('atombizz_karyawan', $param);
	        	} else {
	        		$save = FALSE;
	        	}
	        }
            if ($save == TRUE) {
            	echo "1|".succ_msg("Data Karyawan berhasil disimpan");
            } else {
            	echo "0|".err_msg("Gagal, coba ulangi sekali lagi.");
            }
        }
	}

    public function delete()
    {
        $id = $this->input->post('id');
        $nik = $this->mp->get_code($id);
        $where = array('id' => $id);
        $where2 = array('nik' => $nik);
        $delete = $this->mp->delete('atombizz_karyawan',$where);
        @$this->mp->delete('atombizz_employee',$where2);
        if($delete){
            echo "1|".succ_msg("Karyawan berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }
	public function gen_code(){
		$no = $this->mp->gen_kode();
		if($no<10)$no = '0000'.$no;
        else if($no<100)$no = '000'.$no;
        else if($no<1000)$no = '00'.$no;
        else if($no<10000)$no = '0'.$no;
        else if($no<100000)$no = $no;
        $code = 'E-'.date('Y').$no;
        $result = array('code' => $code, 'no'=>$no);
        return $result;
	}

    public function get_det_gaji(){
        $karyawan = $this->mp->get_paramedik($this->input->post('id'));
        if (count($karyawan)>0) {
            $karyawan = $karyawan[0];
            $result = $karyawan->id.'|'.$karyawan->jabatan.'|'.$karyawan->gaji.'|'.$karyawan->name;
        } else {
            $result = "n/a|n/a|n/a|n/a";
        }
        echo $result;
    }

    public function add_penggajian()
    {
        $param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_karyawan', 'Nama Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gaji', 'Gaji', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bonus', 'Bonus', 'trim|required|xss_clean');
        $this->form_validation->set_rules('casbon', 'Cashbon', 'trim|xss_clean');
        $this->form_validation->set_rules('total', 'Total', 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo "0|".warn_msg(validation_errors());
        } else {
            $exist = $this->mp->total('atombizz_penggajian',array('id_karyawan'=>$param['id_karyawan'],'MONTH(tanggal)'=>date('n')));
            if($exist <= 0){
                $no = $this->mp->total('atombizz_penggajian');
                $param['no_slip'] = 'NS-'.date('ymd').'-'.$no;
                $param['tanggal'] = date('Y-m-d');
                $save = $this->mp->write('atombizz_penggajian', $param);

                if ($save == TRUE) { 

                    $jurnal = array(
                        'no_referensi'=>$param['no_slip'],
                        'tanggal'=>$param['tanggal'],
                        'person'=>$param['id_karyawan'],
                        'valid'=>'yes'
                    );    

                    //kas
                    $jurnal['keterangan'] = "Pembayaran gaji pada karyawan ".$param['id_karyawan'];
                    $jurnal['kode'] = 'GAJI';
                    $jurnal['no_akun'] = '110000';
                    $debit = 0;
                    $kredit = $param['total'];
                    $faktur = '';
                    $kas = $this->mp->insert_acc($jurnal,$debit,$kredit,$faktur);


                    //penggajian
                    $jurnal['keterangan'] = "Pembayaran gaji pada karyawan ".$param['id_karyawan'];
                    $jurnal['kode'] = 'GAJI';
                    $jurnal['no_akun'] = '615000';
                    $debit = $param['total'];
                    $kredit = 0;
                    $faktur = '';
                    $penggajian = $this->mp->insert_acc($jurnal,$debit,$kredit,$faktur);


                    //kasbon
                    if(is_numeric($param['casbon']) && $param['casbon'] > 0){
                        $jurnal['keterangan'] = "Pembayaran kasbon untuk karyawan ".$param['id_karyawan'];
                        $jurnal['kode'] = 'KASBON';
                        $jurnal['no_akun'] = '180000';
                        $debit = 0;
                        $kredit = $param['casbon'];
                        $faktur = $param['no_slip'];
                        $kasbon = $this->mp->insert_acc($jurnal,$debit,$kredit,$faktur);
                    }

                    if($kas && $penggajian){
                        echo "1|".succ_msg("Data penggajian berhasil disimpan")."|";
                        $this->print_slip($param);
                    } else {
                        echo "0|".err_msg("Gagal, coba ulangi sekali lagi.");
                    }
                } else {
                    echo "0|".err_msg("Gagal, coba ulangi sekali lagi.");
                }
            } else {
                echo "0|".err_msg("Gaji sudah dibayarkan.");
            } 
        }
    }

    function print_slip($param)
    {
        $karyawan = $this->mp->get_paramedik($param['id_karyawan']);
        $karyawan = $karyawan[0];

        $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
        $file =  tempnam($tmpdir, 'cetak-slip');  # nama file temporary yang akan dicetak
        $handle = fopen($file, 'w');

        $config = $this->config->item('astro');
        $cnt = 40;
        //ata  = "1234567890123456789012345678901234567890\n";
        $Data  = align_center($cnt,$config['bas_branch_name'])."\n";
        $Data .= align_center($cnt,$config['bas_branch_address'])."\n";
        $Data .= align_center($cnt,$config['bas_branch_phone'])."\n";
        $Data .= cetak_garis($cnt)."\n";
        $Data .= "Tanggal : ".tanggalIndo(date('Y-m-d'))."\n";
        $Data .= "Nomor   : ".$param['no_slip']."\n";
        $Data .= cetak_garis($cnt)."\n";   
        $Data .= align_left($cnt/2,"Nama").align_right($cnt/2,$karyawan->name)."\n"; 
        $Data .= align_left($cnt/2,"NIK").align_right($cnt/2,$karyawan->code)."\n";        
        $Data .= align_left($cnt/2,"Gaji Pokok").align_right($cnt/2,format_rupiah($param['gaji']))."\n"; 
        $Data .= align_left($cnt/2,"Bonus").align_right($cnt/2,format_rupiah($param['bonus']))."\n";
        $Data .= align_left($cnt/2,"Kasbon").align_right($cnt/2,format_rupiah($param['casbon']))."\n";              
        $Data .= cetak_garis($cnt)."\n"; 
        $Data .= align_left($cnt/2,"Total").align_right($cnt/2,format_rupiah($param['total']))."\n";         

        print_r($Data);//exit();
        $handle = printer_open('Canon_iP2700_series'); 
        // $handle = printer_open('Microsoft XPS Document Writer');
        printer_set_option($handle, PRINTER_MODE, "TEXT");
        printer_write($handle, $Data); 
        printer_close($handle);
    }

    function spacer($unit)
    {
        $loop = 40 - $unit;
        $space = ' ';
        for ($i=1; $i <$loop ; $i++) { 
            $space .= ' ';
        }
        return $space;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
