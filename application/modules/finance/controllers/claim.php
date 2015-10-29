<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Claim extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = 'finance';
		$this->cname = $this->module.'/claim';
		$this->load->model('mdl_claim','mr');
	}

	public function index()
	{
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
		$data['sidebar_active']='keuangan';
        $data['title']='Keuangan - Klaim Debet';
        $data['content'] = $this->load->view('/claim_debet',$data,TRUE);
        $this->load->view('template',$data);
	}

	public function proses_claim()
    {
        $param = $this->input->post();
        $config = $this->config->item('astro');
        $operator = $this->session->userdata('astrosession');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tgl_awal', 'Tgl Awal', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tgl_akhir', 'Tgl Akhir', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "0|".warn_msg(validation_errors());
        } else {
            if($param['bank']!='all' && $param['bank']!=''){
                $where2 = 'AND note ='.$this->mr->protect($param['bank']);
            } else $where2 = '';
        	$where = "date BETWEEN ".$this->mr->protect($param['tgl_awal'])." AND ".$this->mr->protect($param['tgl_akhir']);
            $replace = $this->mr->replace('penjualan',array('debet-claimed'=>'yes'),$where);
            if($replace){
            	echo '1|'.succ_msg('Berhasil merubah status pembayaran debet');
            } else {
            	echo '1|'.err_msg('Gagal, melakukan perubahan');
            }
        }
    }

    public function table_debet(){
        $param = $this->input->post();
        $data = $this->mr->getDataDebet($param);
        $table = ''; $i = 1;
        foreach ($data->result() as $key => $value) {
            if ($value->claimed == 'no') {
                $claimed = '<span class="label label-sm label-danger">Unclaimed</span>';
            } else {
                $claimed = '<span class="label label-sm label-success">Claimed</span>';
            }
            $table .= '
            <tr>
                <td width="50px">'.$i.'</td>
                <td>'.$value->bank.'</td>
                <td style="text-align:right;">'.format_rupiah($value->jumlah).'</td>
                <td>'.$claimed.'</td>
            </tr>
            ';
            $i++;
        }
        $table_null = '
        <tr>
            <td colspan="10">Tidak ada data.</td>
        </tr>
        ';

        echo (isset($value)) ? $table : $table_null;
    }

}

/* End of file claim.php */
/* Location: ./application/modules/finance/controllers/claim.php */