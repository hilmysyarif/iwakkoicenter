<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rak_gudang extends MY_Controller {

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
		$this->cname = 'master/rak_gudang';
		$this->load->model('mdl_rak_gudang', 'mp');
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
		
		$data['cname'] = $this->cname;
		$data['title'] = "List Data Rak | Master ";
		$data['content'] = $this->load->view('/list_rak_gudang',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function cari(){
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
		$this->permission->check_permission($access);

		$data['cname'] = $this->cname;
		$data['title'] = "Cari Data Rak | Master ";
		$data['content'] = $this->load->view('/cari_rak_gudang',$data,TRUE);
		$this->load->view('/template', $data);
	}

	public function detail(){
		$uri = $this->uri->segment(4);
		$data['val'] = $this->mp->detail($uri);
		$data['cname'] = $this->cname;
		$data['title'] = "Detail Data Rak | Master ";
		$data['content'] = $this->load->view('/detail_rak_gudang',$data,TRUE);
		$this->load->view('/template', $data);
	}

	//fungsi logic
	public function tambah()
	{
		$access = strtolower($this->module.'.'.__class__.'.'.__function__);
		$this->permission->check_permission($access);

		$data['cname'] = $this->cname;
		$data['title'] = "Tambah Data Rak | Master";
		$data['content'] = $this->load->view('/tambah_rak_gudang',$data,TRUE);
		$this->load->view('/template', $data);
	}
	public function ins_rak($value='')
	{
		$param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
		
        if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo '0|'.warn_msg(validation_errors());
        } else {
            //save data
            $id = $this->input->post('id');
            if($param['jenis']=='GB'){
            	$param['status'] = 'bahan';
            } else if($param['jenis']=='GP'){
            	$param['status'] = 'produk';
            }
        	
    		if(is_numeric($id)){
            	unset($param['id']);
            	$where = array('id'=>$id);
            	$save = $this->mp->replace('atombizz_rack',$param,$where);
            } else {
            	$where = array('kode'=>$param['kode']);
            	$exist = $this->mp->total('atombizz_rack',$where);
            	if($exist<=0){
            		$max = $this->mp->max('atombizz_rack','urut',array('jenis'=>$param['jenis']));
					$total = (!empty($max[0]->urut)? $max[0]->urut+1 : 0+1);
					$param['urut'] = $total;
            		$save = $this->mp->write('atombizz_rack', $param);
            	} else {
            		$save = FALSE;
            		 echo '0|'.err_msg('Gagal, Kode sudah terpakai.');
            	}
            }
            if ($save == TRUE) {
               echo '1|'.succ_msg('Data berhasil ditambahkan.');
            } else {
                echo '0|'.err_msg('Gagal, coba ulangi sekali lagi.');
            }
        }
	}
	public function mencari(){
		$param = $this->input->post();

		$this->load->library('form_validation');
		// $this->form_validation->set_rules('category', 'Filter', 'trim|required|xss_clean');
		$this->form_validation->set_rules('keyword', 'Kata Kunci', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
            //tidak memenuhi validasi
            echo "0|".warn_msg(validation_errors());
        } else {
            //save data
            // $save = $this->mp->find('atombizz_customers',NULL,NULL,NULL,NULL,FALSE, $like = FALSE);
            $save = $this->mp->mencari($param['keyword']);
            if($save->num_rows() > 0){
            	$list = '';
	            foreach ($save->result() as $data) {
	            	$list .= '
	            		<a href="'.base_url().'master/rak_gudang/detail/'.$data->id.'" class="list-group-item" >
							<img src="'.base_url().'public/img/template/avatar2.jpg" alt="Avatar" class="media-object pull-left" width="50" height="50">
							<h4 class="list-group-item-heading" style="padding-left:60px; max-width:70%;">'.$data->nama.'</h4>
							<h5 class="list-group-item-heading" style="padding-left:60px; min-height: 22px;">'.$data->status.' '.$data->kode.'</h5>
						</a>
	            	';
	            }

	            echo '1|'.$list;
            } else {
            	$list = '
	            	<a href="javascript:void(0)" class="list-group-item" >
						<img src="'.base_url().'public/img/template/avatar2.jpg" alt="Avatar" class="media-object pull-left" width="50" height="50">
						<h4 class="list-group-item-heading" style="padding-left:60px; max-width:70%;">Tidak Ada Hasil Pencarian</h4>
						<h5 class="list-group-item-heading" style="padding-left:60px; min-height: 22px;">Silahkan Anda masukkankan kata kunci pada kolom search.</h5>
					</a>
	            ';
	            echo '1|'.$list;
            }
            
        }
	}

	public function delete_rak()
	{
		$param = $this->input->post();
		$delete = $this->mp->delete('atombizz_rack',$param);
		if($delete>0){
			echo "1|".succ_msg("Data rak berhasil dihapus. -delete");
		} else {
			echo "0|".err_msg("Gagal, data rak belum dihapus. -delete");
		}
	}

	public function get_code()
	{
		$param = $this->input->post();
		$max = $this->mp->max('atombizz_rack','urut',array('jenis'=>$param['jenis']));
		$total = (!empty($max[0]->urut)? $max[0]->urut+1 : 0+1);
		echo $param['jenis'].'-'.complete_zero($total,3);
	}

	public function get_data($value='')
	{
		$param = $this->input->post();
		$data = $this->mp->detail($param['id']);
		echo json_encode($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
