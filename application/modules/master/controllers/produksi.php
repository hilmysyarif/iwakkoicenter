<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produksi extends MY_Controller {

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
		$this->cname = 'master/produksi';
		$this->load->model('mdl_produksi', 'mp');
	} 

	public function index()
	{
		// echo "hello pspell_save_wordlist(dictionary_link)";
		redirect($this->cname.'/data');
	}

    public function data()
    {
        $data['sidebar_active']='produksi';
        $data['title']='Master - Produksi';
        $data['content'] = $this->load->view('/data_produksi',$data,TRUE);
        $this->load->view('template',$data);
    }
    
    public function edit()
    {     
        $id = $this->uri->segment(4);
        $data['sidebar_active']='produksi';
        $data['title']='Master - Tambah Karyawan';
        $data['content'] = $this->load->view('/edit_produksi',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {     
        $id = $this->uri->segment(4);
        $data['sidebar_active']='produksi';
        $data['title']='Master - Tambah Karyawan';
        $data['content'] = $this->load->view('/input_produksi',$data,TRUE);
        $this->load->view('template',$data);
    }

	//fungsi logic
    public function simpan_tambah() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('produk', 'temp', 'required');
        $this->form_validation->set_rules('jumlah', 'temp', 'required');        
        $this->form_validation->set_rules('tanggal', 'temp', 'required');        
        

        if ($this->form_validation->run() == FALSE) {
            echo '<div class="alert alert-warning">Gagal tersimpan.</div>';
        } else {
            $data['id_product'] = $this->input->post("produk");
            $data['date'] = $this->input->post("tanggal");
            $data['in'] = $this->input->post("jumlah");        
            $data['status'] = 'produksi';        
            $this->db->insert("produksi", $data);

            $id_menu = $this->input->post("produk");
            $get_menu = $this->db->get_where('view_menu',array('id' => $id_menu));
            $hasil_get_menu = $get_menu->row();

            $kode_menu = $hasil_get_menu->code;
            $get = $this->db->get_where('atombizz_blended_product',array('barcode_blended' => $kode_menu));
            $hasil_get = $get->result_array();
            foreach ($hasil_get as $item) {
                $kode_product = $hasil_get_menu->barcode_product;
                $get_product = $this->db->get_where('atombizz_product',array('code' => $kode_product));
                $hasil_get_product = $get_product->row();
                               
                $data_produksi['date'] = $this->input->post("tanggal");  
                $data_produksi['status'] = 'produksi';                
                $data_produksi['rak_code'] = $hasil_get_product->gudang_code;
                $data_produksi['in'] = 0;
                $data_produksi['out'] = $item['qty_product'] * $this->input->post("jumlah"); 
                $data_produksi['product_code'] = $item['barcode_product']; 
                $this->db->insert("atombizz_warehouses_stok", $data_produksi);
            }            

            echo '<div class="alert alert-success">Sudah tersimpan.</div>';            
        }
    }   
    public function delete()
    {
        $key = $_REQUEST['id'];
        $this->db->delete('produksi', array('id' => $key));
        echo '<div class="alert alert-success">Berhasil dihapus.</div>';    
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
