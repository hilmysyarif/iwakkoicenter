<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mdl_menu','mm');
		$this->module = 'master';
		$this->cname = $this->module.'/menu';
	}

	public function index()
	{
		redirect($this->cname.'/data');
	}

	public function data($value='')
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
  //       $this->permission->check_permission($access);

        $data['count'] = $this->mm->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Produk';
        $data['content'] = $this->load->view('/data_menu',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function tambah($value='')
	{
		// $access = strtolower($this->module.'.'.__class__.'.'.__function__);
  //       $this->permission->check_permission($access);

        $id = $this->uri->segment(4);
        $data['kategori'] = $this->mm->find('kategori-menu');
        $data['bahan'] = $this->mm->find('atombizz_product',array('type'=>'reguler'));
        $data['satuan'] = $this->mm->find('atombizz_converter',array('kategori'=>'satuan'));
        $data['count'] = $this->mm->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Tambah Produk';
        $data['content'] = $this->load->view('/input_menu',$data,TRUE);
        $this->load->view('template',$data);
	}

    public function save_menu($value='')
    {
        $param = $this->input->post();

        $id = $param['id'];
        unset($param['id']);
        if(is_numeric($id)){
            $save = $this->mm->replace('menu',$param,array('id'=>$id));
            if($save==TRUE){
                echo '1|'.succ_msg('Berhasil merubah data komposisi.');
            } else {
                echo '0|'.err_msg('Gagal merubah data komposisi.');
            }
        } else {
            $total = $this->mm->total('menu',array('id'=>$param['id']));
            if($total <= 0){
                $save = $this->mm->write('menu',array('code'=> 'P_'.$param['code'],'nama'=>$param['nama'],'harga'=>$param['harga'],'hpp'=>$param['hpp'],'kategori'=>$param['kategori'],'rak_code'=>$param['rak_code']));
                if($save==TRUE){
                    echo '1|'.succ_msg('Berhasil menambahkan data komposisi.');
                } else {
                    echo '0|'.err_msg('Gagal menambahakn data komposisi.');
                }
            } else {
                echo '0|'.err_msg('Data sudah ada.');
            }
        }
    }

    public function save_mix($value='')
    {
        $param = $this->input->post();
        $replace = $this->mm->replace('atombizz_product',array(''));
    }

	public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);

        $query = $this->mm->find('menu',$where);
        $data = $query->row();

        $delete = $this->mm->delete('menu',$where);
        if($delete){
            $total = $this->mm->total('atombizz_blended_product',array('barcode_blended'=>$data->code));
            if($total > 0){
                $this->mm->delete('atombizz_blended_product',array('barcode_blended'=>$data->code));
            }
            echo "1|".succ_msg("Produk berhasil dihapus.");
        } else {
            echo "0|".err_msg("Gagal, coba periksa lagi inputan anda.");
        }
    }

    public function get_satuan()
    {
        $param = $this->input->post();
        $data = $this->mm->get_satuan($param['bahan']);
        echo $data;
    }

    public function cek_kode_menu($value='')
    {
        if(!empty($this->input->post('kode_menu')))
        {
            $kode = $this->input->post('kode_menu');
            $cek = $this->mm->cek_kode($kode);
            if($cek) 
            {
                $data_ret['status'] = 1;
                $data_ret['data'] = json_encode($cek);
                $data_ret['message'] = 'Data ditemukan';
            }
            else
            {
                $data_ret['status'] = 0;
                $data_ret['message'] = 'Data tidak ditemukan';
            }
        }
        else
        {
            $data_ret['status'] = 0;
            $data_ret['message'] = 'Data tidak ditemukan';
        }
        print_r(json_encode($data_ret));
    }

    public function add_bahan()
    {
        $param = $this->input->post();
   
        $id = $param['id'];
        unset($param['id']);
        if(is_numeric($id)){
            $save = $this->mm->replace('atombizz_blended_product',$param,array('id'=>$id));
            if($save==TRUE){
                echo '1|'.succ_msg('Berhasil merubah data komposisi.');
            } else {
                echo '0|'.err_msg('Gagal merubah data komposisi.');
            }
        } else {
            $total = $this->mm->total('atombizz_blended_product',array('barcode_blended'=>$param['barcode_blended'],'barcode_product'=>$param['barcode_product']));
            if($total <= 0){
                $save = $this->mm->write('atombizz_blended_product',$param);
                if($save==TRUE){
                    echo '1|'.succ_msg('Berhasil menambahkan data komposisi.');
                } else {
                    echo '0|'.err_msg('Gagal menambahakn data komposisi.');
                }
            } else {
                echo '0|'.err_msg('Data sudah ada.');
            }
        }
    }

    public function add_mix_bahan()
    {
        $param = $this->input->post();
   
        $id = $param['id'];
        unset($param['id']);
        if(is_numeric($id)){
            $replace = $this->mm->replace('atombizz_product',array('name'=>$param['name']),array('code'=>$param['code']));
            if($replace){
                $rep_blend = $this->mm->replace('atombizz_blended_product',array('qty_product'=>$param['qty_product'],'id_satuan'=>$param['id_satuan']),array('id'=>$id));
                if($rep_blend){
                   echo '1|'.succ_msg('Berhasil merubah data komposisi.'); 
                } else {
                    echo '0|'.err_msg('Gagal merubah data komposisi.');
                }
            } else {
                echo '0|'.err_msg('Gagal merubah data komposisi.');
            }
        } else {
            $total = $this->mm->total('atombizz_product',array('code'=>$param['code']));
            if($total <= 0){
                $save = $this->mm->write('atombizz_product',array('code'=>$param['code'],'name'=>$param['name'],'unit'=>'satuan','status'=>1,'type'=>'blended'));
                if($save==TRUE){
                    $save_blend = $this->mm->write('atombizz_blended_product',array('barcode_blended'=>'P_'.$param['barcode_blended'],'barcode_product'=>$param['code'],'qty_product'=>$param['qty_product'],'status'=>$param['status'],'id_satuan'=>$param['id_satuan'],'category_bahan'=>$param['category_bahan']));
                    if($save_blend==TRUE){
                        echo '1|'.succ_msg('Berhasil menambahkan data komposisi.');
                    } else {
                        echo '0|'.err_msg('Gagal menambahkan data komposisi.');
                    }
                } else {
                    echo '0|'.err_msg('Gagal menambahkan data komposisi.');
                }
            } else {
                echo '0|'.err_msg('Data sudah ada.');
            }
        }
    }

    public function list_bahan()
    {
        $param = $this->input->post();
        $data = $this->mm->list_bahan($param);
        // echo $this->db->last_query();exit;
        echo json_encode($data);
    }

    public function list_mix()
    {
        $param = $this->input->post();
        $data = $this->mm->list_mix($param);
        echo $data;
    }

    public function detail_bahan($value='')
    {
        $param = $this->input->post();
        $data = $this->mm->detail_bahan($param['id']);
        echo json_encode($data);
    }

    public function get_mix_bahan()
    {
        $param = $this->input->post();
        $data = $this->mm->get_mix_bahan($param);
        if($data){
            echo json_encode($data);    
        }
    }

    public function save_mix_bahan()
    {
        $param = $this->input->post();
        $id = $param['ident'];
        if(is_numeric($id)){
            $replace = $this->mm->replace('atombizz_mix_product',array('qty'=>$param['qty_product'],'id_satuan'=>$param['id_satuan']),array('id'=>$id));
            if($rep_blend){
               echo '1|'.succ_msg('Berhasil merubah data mix komposisi.'); 
            } else {
                echo '0|'.err_msg('Gagal merubah data mix komposisi.');
            }
        } else {
            $total = $this->mm->total('atombizz_mix_product',array('barcode_blended'=>$param['barcode_blended'],'barcode_product'=>$param['barcode_product']));
            if($total <= 0){
                $save = $this->mm->write('atombizz_mix_product',array('barcode_blended'=>$param['barcode_blended'],'barcode_product'=>$param['barcode_product'],'qty_product'=>$param['qty_product'],'id_satuan'=>$param['id_satuan']));
                if($save==TRUE){
                    echo '1|'.succ_msg('Berhasil menambahkan data mix komposisi.');
                } else {
                    echo '0|'.err_msg('Gagal menambahkan data mix komposisi.');
                }
            } else {
                echo '0|'.err_msg('Data sudah ada.');
            }
        }
    }

    public function del_mix_bahan()
    {
        $param = $this->input->post();
        $delete = $this->mm->delete('atombizz_mix_product',array('id'=>$param['id']));
        if($delete){
            echo '1|'.succ_msg('Berhasil menghapus data mix komposisi.');
        } else {
            echo '0|'.err_msg('Gagal menghapus data mix komposisi.');
        }
    }

    public function get_id()
    {
        $param = $this->input->post();
        $query = $this->mm->find('menu',array('id'=>$param['id']));
        $data = $query->row();
        echo json_encode($data);
    }

}

/* End of file menu.php */
/* Location: ./application/modules/master/controllers/menu.php */