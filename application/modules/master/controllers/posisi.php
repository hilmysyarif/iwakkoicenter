<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posisi extends MY_Controller {

	public function __construct()
	{

		parent::__construct();
		//$this->load->model('M_sync','mdb');
        $this->module='master';
        $this->cname=$this->module.'/posisi';
        $this->load->model('mdl_posisi','mp');
	}

    public function index()
    {
        // $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        // $this->permission->check_permission($access);

        redirect($this->cname.'/data');
    }

    public function data()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $data['count'] = $this->mp->count_data();
        $data['sidebar_active']='master';
        $data['title']='Master - Posisi';
        $data['content'] = $this->load->view('/data_posisi',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function tambah()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $id = $this->uri->segment(4);
        if($this->input->post() == NULL)//jika baru daftar
        {
            if($this->session->flashdata('post_item')) {
                $data['val'] = $this->session->flashdata('post_item');
            } else if(is_numeric($id)){
                $data['val'] = $this->mp->detail($id);
                $access = $this->mp->get_access($id);
                $data['access'] = json_decode(@$access[0]->access);
                $data['module_access'] = json_decode(@$access[0]->module);
            }
            // $data['opt_module'] = $this->mp->opt_module();
            $data['count'] = $this->mp->count_data();
            $data['module'] = $this->mp->get_module();
            $data['module_list'] = $this->mp->get_module_list();
            $data['cname'] = $this->cname;
            $data['sidebar_active']='master';
            $data['title']='Master - Tambah Posisi';
            $data['content'] = $this->load->view('/input_posisi',$data,TRUE);
            $this->load->view('template',$data);
        } else {
            $param = $this->input->post();
            // print_r($param);exit;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('group', 'Group', 'trim|required|xss_clean');
            $this->form_validation->set_rules('information', 'Information', 'trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                //tidak memenuhi validasi
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                $this->session->set_flashdata('post_item', $param);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                //save data
                $id = $this->input->post('id');
                //strtolower
                $checkbox = $this->input->post('produk');
                $check_module = $this->input->post('module');

                // var_dump($checkbox);exit;
                unset($param['produk']);
                unset($param['module']);
                $perm = json_encode($checkbox);
                $mod = json_encode($check_module);
                unset($param['id']);

                if(is_numeric($id)){//edit
                    $where = array('id'=>$id);
                    $save = $this->mp->replace('atombizz_employee_position',$param,$where);
                    if ($save == TRUE) {
                        $where = array('position_id'=>$id);
                        $exist = $this->mp->total('atombizz_employee_access',$where,$like=null,$field=null);
                        if($exist>0){
                            $ins = array('access'=>$perm,'module'=>$mod);
                             // print_r($check_module);exit;
                            $save = $this->mp->replace('atombizz_employee_access',$ins,$where);
                        } else {
                            $ins = array('position_id'=>$id,'access'=>$perm,'module'=>$mod);
                            $save = $this->mp->write('atombizz_employee_access',$ins); 
                        }
                        if($save==TRUE){
                            $this->session->set_flashdata('flash_message', succ_msg('Posisi berhasil ditambahkan.'));
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg('Gagal, coba ulangi sekali lagi.'));
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg('Gagal, coba ulangi sekali lagi.'));
                        // echo "string1";
                    }
                } else {
                    $where = array('group'=>$param['group']);
                    $exist = $this->mp->total('atombizz_employee_position',$where,$like=null,$field=null);
                    // print_r($param);print_r($exist);exit;
                    if($exist<=0){
                        $save = $this->mp->write_id('atombizz_employee_position', $param);
                        // print_r($param);print_r($save);exit;
                        if (is_numeric($save)) {
                            $ins = array('position_id'=>$save,'access'=>$perm, 'module'=>$mod);
                            $save = $this->mp->write('atombizz_employee_access',$ins); 
                            if($save==TRUE){
                                $this->session->set_flashdata('flash_message', succ_msg('Posisi berhasil ditambahkan.'));
                            } else {
                                $this->session->set_flashdata('flash_message', err_msg('Gagal, coba ulangi sekali lagi.'));
                            }
                        } else {
                            $this->session->set_flashdata('flash_message', err_msg('Gagal, coba ulangi sekali lagi.'));
                            // echo "string1";
                        }
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg('Gagal, data sudah ada.'));
                    }
                }
                redirect($this->cname.'/tambah');
            }
        }
    }

    public function hapus_data()
    {
        $param = $this->input->post();
        $delete = $this->mp->delete('atombizz_employee_position',array('id'=>$param['id']));
        if($delete){
            $delete_acc = $this->mp->delete('atombizz_employee_access',array('position_id'=>$param['id']));
            if($delete_acc){
                echo '1|'.succ_msg('Berhasil menghapus Posisi.');
            } else {
                echo '0|'.err_msg('Gagal menghapus Posisi.');
            }
        } else {
            echo '0|'.err_msg('Gagal menghapus Posisi.');
        }
    }
	
}

/* End of file your_module.php */
/* Location: ./application/modules/your_module/controllers/your_module.php */