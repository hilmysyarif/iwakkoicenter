<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kasir extends ASTRO_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "kasir";
		$this->cname = "kasir";
		$this->load->model('Mdl_kasir','ksr');
		$this->load->model('Mdl_cashdraw','mk');

		$access = strtolower($this->module);
		$this->permission->check_module_permission($access);
	}

	public function index()
	{
		redirect(base_url('kasir/meja'));
	}

	public function meja($code='')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
		$this->permission->check_permission($access);

		$data['operator'] = $this->session->userdata('astrosession');
		$date = date('Y-m-d');
		$id = $data['operator'][0]->id;

		$cek = $this->mk->cek($id,$date);
		if ($cek>=1) {
			$data['title'] = "Kasir";
			$data['sidebar_active'] = "kasir";
			$data['resv_list'] = $this->ksr->get_resv_list();

			$data['stats'] = $this->ksr->get_statistik();
			$data['meja'] = $this->ksr->get_meja($code);
			$data['meja_isi'] = $this->ksr->get_meja_isi();
			$data['meja_tergabung'] = $this->ksr->get_meja_tergabung();
			// foreach ($data['meja_tergabung'] as $key => $value) 
			// 	array_push($data['meja_isi'], $value);

			// print_r($data['meja_isi']);exit();
			$data['reservasi'] = $this->ksr->get_reserved();
			$data['code_meja'] = $this->ksr->code_meja();

			$data['content'] = $this->load->view($this->module.'/pilih-meja',$data,TRUE);
			$this->load->view('/template', $data);
		} else {
			redirect(base_url('kasir/cashdraw/'));
		}
	}

	public function pesan($meja = '')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['title'] = "Kasir";
		$data['sidebar_active'] = "kasir";
		$data['resv_list'] = $this->ksr->get_resv_list();
		$data['meja'] = $meja;
		$data['_meja'] = $this->ksr->get_meja();
		$data['_meja_isi'] = $this->ksr->get_meja_isi();
		$data['_meja_tergabung'] = $this->ksr->get_meja_tergabung($meja);
		$data['_menu'] = $this->ksr->get_opt_menu();
		$data['validator'] = $this->ksr->get_validator();

		$isi = $this->ksr->get_pesanan($meja);
		// print_r($data['_meja_isi']);exit();
		if(!$isi)
		{
			// print_r($isi);exit();
			$data['status'] = "pesan-baru";
			$user = $this->session->userdata('astrosession');
			$invoice['invoice'] = 'TR'.$user[0]->id.date('ymd').'-'.$this->ksr->no_invoice();
			$invoice['meja'] = $meja;
			$data['id_penjualan'] = $this->ksr->set_pesanan($invoice);
		}
		else 
		{
			$data['status'] = "edit-pesan";
			$data['id_penjualan'] = $isi[0]->id;
		}

		if (!empty($this->input->get('member'))) {
			$this->ksr->set_member($data['id_penjualan'], $this->input->get('member'));
			$data['nama_cust'] = json_decode($this->ksr->get_member(array('id'=>$this->input->get('member'))));
		}

		$data['content'] = $this->load->view('/aksi-meja',$data,TRUE);
		$this->load->view('template', $data);
	}

	public function add()
	{
		$param = $this->input->post();

    	$this->load->library('form_validation');
        $this->form_validation->set_rules('qty', 'Jumlah', 'trim|required|xss_clean');
        $this->form_validation->set_rules('menu', 'Menu', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|'.warn_msg(validation_errors());
        } else {
        	$menu = explode('|', $param['menu']);
        	$param['id_menu'] = $menu[0];
        	$param['harga'] = $menu[1];
        	$param['hpp'] = $menu[2];

        	// print_r($param);exit();

            $result = $this->ksr->add_pesanan($param);
            if ($result > 0) {
            	echo "1|".succ_msg("Data berhasil ditambahkan");
            } else {
            	echo "0|".err_msg("Gagal, coba ulangi sekali lagi.");
            }          
        }
	}

	public function reservasi()
	{
		$param = $this->input->post();

    	$this->load->library('form_validation');
        $this->form_validation->set_rules('m-meja', 'm-meja', 'trim|required|xss_clean');
        $this->form_validation->set_rules('m-jam', 'm-jam', 'trim|required|xss_clean');
        $this->form_validation->set_rules('m-nama', 'm-nama', 'trim|required|xss_clean');
        if ($param['mode'] == 'R' && $this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0';
        } else {
        	if ($param['mode'] == 'TA') {
        		$param['m-meja'] = 'Take away';
        	}
            $result = $this->ksr->add_tamu($param);
            if ($result > 0) {
            	echo $param['mode'];
            } else {
            	echo "0";
            }          
        }
	}

	public function get_tagihan()
	{
		$id = $this->input->post('id');
		echo $this->ksr->get_total_harga($id);
	}

	public function get_member()
	{
		echo $this->ksr->get_member($this->input->post());
	}

	public function revs_attend()
	{
		$meja = $this->input->post('meja');
		$save = $this->ksr->set_revs_yes($meja);
		if ($save>0) {			
			echo $meja;
		}
	}

	public function bayar()
	{
		$param = $this->input->post();
		$data['operator'] = $this->session->userdata('astrosession');
		$dept = $this->config->item('astro');
		$param['id_operator'] = $data['operator'][0]->id;
		if ($param['m-cash'] == '2') {
			$orang = explode('|', $param['m-valid']);
			$param['m-bank'] = $orang[1];
		}

		$user = $this->session->userdata('astrosession');
		$param['invoice'] = 'TR'.$user[0]->id.date('ymd').'-'.$this->ksr->no_invoice();
		$param['no'] = $this->ksr->no_invoice();
		$save = $this->ksr->set_bayar($param);
		if ($save) {
			$this->ksr->take_stock($param['id'], $param['invoice'], $data['operator'][0]->nama, $dept['bas_branch_code']);
			echo json_encode($param);
		} else {
			echo '0';
		}
	}

	public function update_meja()
	{
		$param = $this->input->post();
		if ($this->ksr->update_meja($param)) {
			echo "1";
		} else {
			echo "0";
		}
	}

	public function gabung_meja()
	{
		$param['lama'] = $this->input->post('mg-skr');
		$param['baru'] = json_encode($this->input->post('mg-tjn'));
		$isi = $this->ksr->get_pesanan($param['lama']);
		if($isi)
		{
			if ($this->ksr->gabung_meja($param)) {
				echo "1";
			} else {
				echo "0";
			}
		} else {
			echo "0";
		}
	}

	public function cek_compliment()
	{
		$param = $this->input->post();
		if ($this->ksr->valid_compliment($param)) {
			echo "1";
		} else {
			echo "0";
		}
	}

	public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $delete = $this->ksr->delete('detil-penjualan',$where);
        if($delete){
            echo "1|".succ_msg("Pesanan berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }

    public function member()
	{
		$param = $this->input->post();

    	$this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Nama', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('twitter', 'Twitter', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|mohon isi dengan benar.';
        } else {
        	unset($param['id'], $param['mode'], $param['visit']);

            echo "1|".$this->ksr->add_member($param);      
        }
	}

	public function add_personal()
	{
		$id = $this->input->post('id');
		echo $this->ksr->add_bayar_personal($id,1);
	}

	public function remove_personal()
	{
		$id = $this->input->post('id');
		$this->ksr->remove_bayar_personal($id);
	}

	public function update_to_member()
	{
		$param = $this->input->post();
		$this->ksr->update_to_member($param);
	}
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */