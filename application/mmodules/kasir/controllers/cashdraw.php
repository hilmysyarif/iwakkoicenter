<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cashdraw extends ASTRO_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "kasir";
		$this->cname = "kasir/cashdraw";
		$this->load->model('Mdl_cashdraw','mk');

		$access = strtolower($this->module);
		$this->permission->check_module_permission($access);
	}

	public function index()
	{
		redirect($this->cname.'/buka_kasir');
	}

	public function buka_kasir($value='')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

		$data['sidebar_active'] = "kasir";
		$data['resv_list'] = FALSE;
		$data['operator'] = $this->session->userdata('astrosession');
		$date = date('Y-m-d');
		$id = $data['operator'][0]->id;

		$cek = $this->mk->cek($id,$date);
		if ($cek>=1) {
			redirect($this->module.'/ruangan');
		} else {
			// $cektutup = $this->mk->cektutup($id,$date);
			// if ($cektutup>=1) {
			// 	redirect('dashboard/?status=tutup_kasir_sukses');
			// } else {
				$data['cashdraw'] = $this->mk->get_cashdraw();
				// $data['status'] = $this->mk->get_status();
				$data['transaksi'] = $this->mk->get_transaksi_status();
				$data['nav_active']='kasir';
		        $data['title']='Atombizz - Resto';
		        // $data['cook_food']=$this->ddb->get_cook_food();
		        $data['content'] = $this->load->view('/buka_kasir',$data,TRUE);
		        $this->load->view('template',$data);
			// }
		}
	}

	public function tutup_kasir($value='')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['sidebar_active'] = "kasir";
		$data['resv_list'] = FALSE;
		$data['operator'] = $this->session->userdata('astrosession');
		$date = date('Y-m-d');
		$id = $data['operator'][0]->id;
		$data['cashdraw'] = $this->mk->get_cash($id,$date)->code;
		$data['id_cashdraw'] = $this->mk->get_cash($id,$date)->id;
		$data['nav_active']='kasir';
	    $data['title']='Atombizz - Resto';
	    // $data['cook_food']=$this->ddb->get_cook_food();
	    $data['content'] = $this->load->view('/tutup_kasir',$data,TRUE);
	    $this->load->view('template',$data);
		
	}

	public function simpan_cashdraw($value='')
	{
		$param = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('start_cash', 'Modal', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
			$param['checkin'] = date('H:i:s');
			$param['status'] = 'temporary';

			$save = $this->mk->write('atombizz_cashdraw',$param);
			if($save){
				echo '1';
				// $this->session->userdata('astrosession');
			} else {
				echo '0';
			}
        }
	}

	public function tutup_cashdraw($value='')
	{
		$param = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('end_cash', 'Nominal Kas Ahir', 'trim|required|numeric|xss_clean');

		if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
			$checkout = date('H:i:s');
			// $param['status'] = 'no';
			$omset = $this->mk->get_omset($param['id']);
			$start_cash = $this->mk->get_start_cash($param['code']);
			$total_cash = $start_cash + $this->mk->get_kas($param['id']);;
			$update = array('checkout'=>$checkout,
				'end_cash'=>$param['end_cash'],
				'omset'=> $omset,
				'total_cash'=> $total_cash,
				'status'=>'no');

			$save = $this->mk->replace('atombizz_cashdraw',$update,array('code'=>$param['code']));
			// echo $this->db->last_query();exit;
			if($save){
				$this->print_setoran($param['code']);
				echo '1';
			} else {
				echo '0';
			}
        }
	}

	public function print_setoran($param='')
	{
		$setoran = $this->mk->get_cashdraw_list($param);

		$config = $this->config->item('astro');
		$cnt = 32;

		$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
		$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
		$handle = fopen($file, 'w');
		$Data  = align_center($cnt,$config['bas_branch_name'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_address'])."\n";
		$Data .= align_center($cnt,$config['bas_branch_phone'])."\n";
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_center($cnt,"RINCIAN SETORAN KASIR")."\n";
		$Data .= "\n";
		$Data .= align_left(28,"TANGGAL  : ".tanggalIndo($setoran->date))."\n";
		$Data .= align_left($cnt,"BUKA     : ".$setoran->checkin)."\n";
		$Data .= align_left($cnt,"TUTUP    : ".$setoran->checkout)."\n";
		$Data .= cetak_garis($cnt)."\n";
		$Data .= align_left($cnt/2,"BUKA KAS").align_right($cnt/2,format_harga($setoran->start_cash))."\n";
		$Data .= align_left($cnt/2,"OMSET").align_right($cnt/2,format_harga($setoran->omset))."\n";
		$Data .= align_left($cnt/2,"KAS AKHIR").align_right($cnt/2,format_harga($setoran->total_cash))."\n";
		$Data .= align_left($cnt/2,"SETOR").align_right($cnt/2,format_harga($setoran->end_cash))."\n";

		print_r($Data); exit();
		// $handle = printer_open('58 Printer'); 
		// printer_set_option($handle, PRINTER_MODE, "RAW");
		// printer_write($handle, $Data); 
		// printer_close($handle);
	}
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */