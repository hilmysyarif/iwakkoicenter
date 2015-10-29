<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekening extends MY_Controller {

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
		$this->cname = 'master/rekening';
		$this->load->model('mdl_master_akun', 'mma');
	} 

	public function index()
	{
		// echo "string";
		redirect($this->cname.'/data');
	}

	public function data()
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
		// $this->permission->check_permission($access);
		// $data['akun'] = $this->mma->opt_akun();
		$data['sidebar_active']='master';
		$data['cname'] = $this->cname;
		$data['title'] = "Master Akun | Master Data";
		$data['content'] = $this->load->view('/data_master_akun',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function tambah()
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
		// $this->permission->check_permission($access);
		$data['sidebar_active']='master';
		$data['cname'] = $this->cname;
		$data['title'] = "Master Akun | Master Data";
		$data['content'] = $this->load->view('/tambah_master_akun',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function detail()
	{
		$where = array('id'=>$this->uri->segment(4));
		$val = $this->mma->find('view_master_akun',$where);
		$result = $val->result_array();
		$data['sidebar_active']='master';
		$data['val'] = $result[0];
		$data['cname'] = $this->cname;
		$data['title'] = "Master Akun | Master Data";
		$data['content'] = $this->load->view('/detail_master_akun',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function ins_rekening($value='')
	{
		$param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('parent', 'Parent Rekening', 'trim|xss_clean'); 
        $this->form_validation->set_rules('position', 'Jenis', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('code', 'Kode Rekening', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('name', 'Nama Rekening', 'trim|required|xss_clean'); 
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean'); 

        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|'.warn_msg(validation_errors());
        } else {
        	$id = $param['id'];
        	unset($param['id']);
        	if(is_numeric($id)){
        		$where = array('id'=>$id);
        		$save = $this->mma->replace('atombizz_accounting_master_akun',$param,$where);
        	} else {
        		$save = $this->mma->write('atombizz_accounting_master_akun', $param);
        	}
			
            if ($save == TRUE) {
            	echo '1|'.succ_msg('Rekening berhasil disimpan.');
            } else {
                echo '0|'.err_msg('Rekening gagal disimpan.');
            }
        }
	}

	public function get_data()
	{
		$param = $this->input->post();
		$data = $this->mma->detail($param['id']);
		echo json_encode($data);
	}

	public function get_opt_rekening()
	{
		$query = $this->mma->_opt_rekening();
		$opt = '<option value="">Pilih Rekening</option>';
		foreach ($query->result() as $key => $value) {

			$opt .= '<option value="'.$value->code.'">'.space($value->space).' '.$value->code.' '.$value->name.'</option>';
		}
		echo $opt;
	}

	public function gen_code()
	{
		$param = $this->input->post();
		$query = $this->mma->find('atombizz_accounting_master_akun', $param);
		$parent = $query->result();

		$max = $this->mma->max('atombizz_accounting_master_akun','urut',array('parent'=>$param['code']));
		$total = (!empty($max[0]->urut)? $max[0]->urut+1 : 0+1);
		$code = complete_zero_after($parent[0]->code_ref.$total,6);
		$urut = $total;
		$code_ref = $parent[0]->code_ref.$total;
		$space = (!empty($parent[0]->space)? $parent[0]->space+1 : 0+1);
		$result = array('code'=>$code,'urut'=>$urut,'code_ref'=>$code_ref,'space'=>$space);
		echo json_encode($result);
	}

	public function head_code()
	{
		$where = "parent = '' OR ISNULL(parent)";
		$orderby = "id DESC";
		$limit = "1";
		// $max = $this->mma->max('atombizz_accounting_master_akun','urut',$where);
		$max = $this->mma->find('atombizz_accounting_master_akun', $where, $field = NULL, $limit, $orderby, $join = FALSE, $like = FALSE);
		$res = @$max->result();
		$total = (!empty($res[0]->code_ref)? $res[0]->code_ref+1 : 10+1);
		$code = complete_zero_after($total,6);
		$urut = @$res[0]->urut+1;
		$code_ref = $total;
		$space = 0;
		$result = array('code'=>$code,'urut'=>$urut,'code_ref'=>$code_ref,'space'=>$space);
		echo json_encode($result);
	}

	public function custom_code()
	{
		$param = $this->input->post();
		$code = $param['code'];
		$code_ref  = str_replace('0', '', $code);
		$urut = substr($code_ref, -1, 1);
		$space = 0;
		$result = array('code'=>$code,'urut'=>$urut,'code_ref'=>$code_ref,'space'=>$space);
		echo json_encode($result);
	}

	public function delete_rekening()
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
		// $this->permission->check_permission($access);

		$param = $this->input->post();
		$delete = $this->mma->delete('atombizz_accounting_master_akun',$param);
		if($delete>0){
			echo "1|".succ_msg("Data rekekning berhasil dihapus. -delete");
		} else {
			echo "0|".err_msg("Gagal, data rekekning belum dihapus. -delete");
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
