<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opname extends ASTRO_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "gudang";
		$this->cname = "gudang/opname";
		$this->load->model('mdl_opname','mak');
		$this->load->library('excel');
		// $this->load->plugin('to_excel');
	}

	public function index()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);

		// $data['cname'] = $this->cname;
		$data['sidebar_active'] = 'gudang';
		$data['title'] = "Menu Opname | Gudang";
		$data['content'] = $this->load->view('/menu_opname',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function print_product()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
		$this->permission->check_permission($access);

		// echo "string";
		$data['sidebar_active'] = 'gudang';
		$data['keyword'] = $this->mak->opt_keyword();
		$data['title'] = "Print Opname | Gudang";
		$data['content'] = $this->load->view('/print_opname',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function print_all()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$this->load->library('thoni_fpdf');
      	define('FPDF_FONTPATH',$this->config->item('fonts_path'));

      	// $where = "`rak_code` != '' OR NOT ISNULL(`rak_code`)";
      	// $orderby = 'rak_code';
      	$faktur = $this->mak->get_all_products();
      	$data['faktur'] = $faktur->result();

      	// print_r($data['faktur']);exit;

      	// $where2 = array('reference'=>$data['faktur'][0]->reference);
      	// $detail = $this->mak->find('view_retur_in',$where2);
      	// $data['detail'] = @$detail->result();
		$this->load->view('/print_all',$data);
	}

	public function print_several()
	{
		$this->load->library('thoni_fpdf');
      	define('FPDF_FONTPATH',$this->config->item('fonts_path'));

      	$param = $this->input->post();
      	$where = array('reference'=>$param['reference_form']);
      	// print_r($param);exit;
      	$faktur = $this->mak->find('atombizz_tmp_print',$where);
      	$data['faktur'] = @$faktur->result();
      	$delete = $this->mak->delete('atombizz_tmp_print',$where);
      	// print_r($data['faktur']);exit;

		$this->load->view('/print_several',$data);

  //     	// generate to excel
		// $this->mak->excel($param['reference_form']);
	}

	public function stok($value='')
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
		$this->permission->check_permission($access);
		$data['sidebar_active'] = 'gudang';
		$data['keyword'] = $this->mak->opt_keyword();
		$data['title'] = "Stok Opname | Gudang";
		$data['content'] = $this->load->view('/stok_opname',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function cek_temp()
	{
		$param = $this->input->post();

		$data = $this->mak->find('atombizz_tmp_print',$param);
		if(empty($data)){
			$faktur = $this->mak->faktur($param);
		} else {
			$result = $data->result();
			$faktur = $result[0]->reference;
		}
		echo $faktur;
	}

	public function cek_temp_opname()
	{
		$param = $this->input->post();
		$num = $this->mak->total('atombizz_fast_stock_opname',array('operator'=>$param['operator']));
		if($num>0){
			$data = $this->mak->cek_temp($param);
		} else {
			$data = $this->mak->faktur_opname($param);
		}
		$data['date_show'] = TanggalIndo($data['tanggal']);
		echo json_encode($data);
	}

	public function mencari($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->mencari($param['keyword']);
		$das = $data->result_array();
		// echo $this->db->last_query();exit;
		echo json_encode($das);
	}

	public function mencari_rak($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->mencari_rak($param['code']);
		// foreach ($data->result_array() as $das) {
		// 	# code...
		// }
		echo $data;
		// // echo $this->db->last_query();exit;
		// echo json_encode($das);
	}

	public function rak($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->rak($param['rak']);
		foreach ($data->result_array() as $das) {
			# code...
		}
		// echo $this->db->last_query();exit;
		echo json_encode($das);
	}

	public function tambah_produk($value='')
	{
		$param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product_code', 'Kode Produk', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('product_name', 'Nama Produk', 'trim|required|xss_clean'); 
        // $this->form_validation->set_rules('rak_code', 'Rak Produk', 'trim|required|xss_clean'); 
        // $this->form_validation->set_rules('rak_name', 'Nama Rak', 'trim|required|xss_clean'); 

        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|'.warn_msg(validation_errors());
        } else {
        	unset($param['search']);
        	$where = array('reference'=>$param['reference'],'product_code'=>$param['product_code'],'rak_code'=>$param['rak_code']);
        	$exist = $this->mak->total('atombizz_tmp_print',$where);
        	if($exist<=0){
        		$save = $this->mak->write('atombizz_tmp_print', $param);
        	} else {
        		$save = FALSE;
        		$data = 'exist';
        	}
			
            if ($save == TRUE) {
            	echo '1|'.succ_msg('Produk berhasil ditambahkan.');
            } else {
            	if($data=='exist'){
            		echo '0|'.err_msg('Gagal, data sudah ada.');
            	} else {
            		echo '0|'.err_msg('Gagal, data produk tidak dapat ditambahkan.');
            	}
            }
        }
	}

	public function list_produk($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->get_list_produk($param['reference']);
		// print_r($data);exit;
		echo $data;
	}

	public function list_produk_opname($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->get_list_produk_opname($param['reference']);
		$total = $this->mak->total('atombizz_fast_stock_opname',$param);
		echo $data.'|'.$total;
	}

	public function delete_produk($value='')
	{
		$param = $this->input->post();
		$delete = $this->mak->delete('atombizz_tmp_print',$param);
		if($delete){
			echo '1|'.succ_msg('Berhasil menghapus produk dari list.');
		} else {
			echo '0|'.err_msg('Gagal menghapus produk dari list.');
		}
	}

	public function get_data_produk($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->detail($param['code']);
		echo json_encode($data);
	}

	public function get_stok($value='')
	{
		$param = $this->input->post();
		$data = $this->mak->get_stok($param);
		echo json_encode($data);
	}

	public function get_opt_rak()
	{
		$param = $this->input->post();
		$rak = $this->mak->opt_rak($param['kode']);
		$opt = '<option value="">-Pilih Rak-</option>';
		foreach ($rak->result() as $key => $value) {
			$opt .= '<option value="'.$value->rak_code.'">'.$value->rak_name.'</option>';
		}
		echo $opt;
	}

	public function opname_insert()
	{
		$param = $this->input->post();

		// print_r($param);exit;
		

		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_code', 'Kode Produk', 'trim|required|xss_clean');
		$this->form_validation->set_rules('checking_qty', 'Quantity', 'trim|required|numeric|xss_clean');

		if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|'.warn_msg(validation_errors());
        } else {
            //save data
        	$difference = $param['stock_qty'] - $param['checking_qty'];

        	if($difference == 0){
        		$status = 'cocok';
        	} elseif ($difference > 0) {
        		$status = 'kurang';
        	} else {
        		$status = 'lebih';
        	}

            $param['difference'] = abs($difference);
            $param['status'] = $status;

            $id = $param['ident'];
            unset($param['ident']);
            if(is_numeric($id)){
            	$where = array('id'=>$id);
	           	$update = $this->mak->replace('atombizz_fast_stock_opname',$param,$where);
	           	if($update == TRUE){
	           		echo '1|'.succ_msg('Berhasil merubah data stok opname.');
	           	} else {
	           		echo '0|'.err_msg('Gagal, merubah data stok opname.');
	           	}
            } else {
            	$where = array('reference'=>$param['reference'],'product_code'=>$param['product_code']);
	            $exist = $this->mak->total('atombizz_fast_stock_opname',$where,$like=null,$field=null);
	            if ($exist<=0) {
		           	$save = $this->mak->write('atombizz_fast_stock_opname',$param);
		           	if($save == TRUE){
		           		echo '1|'.succ_msg('Berhasil menambah daftar stok opname.');
		           	} else {
		           		echo '0|'.err_msg('Gagal, menambah daftar stok opname.');
		           	}
	            } else {
	            	echo '0|'.err_msg('Data sudah ada.');
	            }
            }
        }
	}

	public function detail_opname()
	{
		$uri = $this->input->post('id');
		$data = $this->mak->detail_opname($uri);
		echo json_encode($data);	
	}

	public function delete_produk_opname()
	{
		$uri = $this->input->post('id');
		$where = array('id'=>$uri);
		$delete = $this->mak->delete('atombizz_fast_stock_opname',$where);
		if($delete>0){
			echo "1|".succ_msg("Berhasil, menghapus data opname.");
		} else {
			echo "0|".err_msg("Gagal, menghapus data opname.");
		}
	}

	public function save_opname($value='')
	{
		$param = $this->input->post();
		$reference = $param['reference'];
		$basmalah = $this->config->item('astro');
		$where = array('reference'=>$param['reference']);
		$data = $this->mak->find('atombizz_fast_stock_opname',$where);
		foreach ($data->result() as $das) {
			$arrDetail[] = array(
				'reference'=>$reference,
				'rak_code'=>$das->rak_code,
				'rak_name'=>$das->rak_name,
				'product_code'=>$das->product_code,
				'product_name'=>$das->product_name,
				'checking_qty'=>$das->checking_qty,
				'stock_qty'=>$das->stock_qty,
				'difference'=>$das->difference,
				'status'=>$das->status
			);
		}
		$arr = array(
			'reference'=>$reference,
			'date'=>$param['date'],
			'operator'=>$param['operator'],
			'urut'=>$param['urut'],
			'dept'=>$basmalah['bas_code_dept'],
			'rule'=>'confirm'
		);
		$save_opname = $this->mak->write('atombizz_stock_opname',$arr);
		if($save_opname){
			$save_detail = $this->mak->write_batch('atombizz_stock_opname_detail',$arrDetail);
			if($save_detail){
				$delete = $this->mak->delete('atombizz_fast_stock_opname',$where);
				if($delete){
					echo "1|".succ_msg('Berhasil, menyimpan data stok opname');
				} else {
					echo '0|'.err_msg('Gagal, menyimpan stok opname');		
				}
			} else {
				echo '0|'.err_msg('Gagal, menyimpan stok opname');	
			}
		} else {
			echo '0|'.err_msg('Gagal, menyimpan stok opname');
		}
	}

	public function validasi_opname()
    {
    	$access = strtolower($this->module.'.'.__class__.'.'.__function__);
		$this->permission->check_permission($access);
		
        $data['sidebar_active']='validasi';
        $data['title']='Validasi Opname';
        $data['content'] = $this->load->view('/detail_opname',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function get_valid_opname_data()
    {
        $data = $this->mak->get_valid_opname_data();
        $where = array('approved_by'=>null);
        $total = $this->mak->total('atombizz_stock_opname',$where);
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
            $update = $this->mak->replace('atombizz_stock_opname',$param,$where);
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
            $update = $this->mak->replace('atombizz_stock_opname',$param,$where);
            $date = date('Y-m-d H:i:s');
            if($update == TRUE){
                $data = $this->mak->find('view_stock_opname',$where);
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
                $save = $this->mak->write_batch('atombizz_warehouses_stok',$arr_stok);
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

/* End of file opname.php */
/* Location: ./application/modules/gudang/controllers/opname.php */