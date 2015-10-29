<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "stok_produk";
		$this->cname = $this->module.'/stock';
		$this->load->model('mdl_stock','ms');
	}

	public function load_stok(){
        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Resto';
        $data['rak'] = $this->ms->get_rak();
        $data['content'] = $this->load->view('/data_stok',$data,TRUE);
        $this->load->view('template',$data);
    }

	public function load_min_stok(){
        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Resto';
        $data['rak'] = $this->ms->get_rak();
        $data['content'] = $this->load->view('/data_stok_min',$data,TRUE);
        $this->load->view('template',$data);
    }    

    public function produk(){
        $param = $this->input->post('rak');
        // print_r($param);exit;
        $opt = '<option value="">Semua</option>';
        $produk = $this->ms->produk($param);
        foreach ($produk as $key => $value) {
            // $opt = '<option value="">Semua</option>';
            $opt .= "<option value=".$value->code.">".$value->nama."</option>";
        }
        echo $opt;
    }

    public function table_stock(){
        $param = $this->input->post();
        $data = $this->ms->data_stock($param);
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="30px" style="text-align:center;">'.complete_zero($i,3).'</td>
                <td width="50px">'.$value->code.'</td>
                <td width="150px">'.$value->nama.'</td>
                <td width="80px">'.$value->rak_name.'</td>
                <td width="50px" style="text-align:center;">'.$value->saldo.'</td>
                <td width="80px">'.$value->status.'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }

    public function table_stock_minimum(){
        $data = $this->ms->min_stock();
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px" style="text-align:center;">'.complete_zero($i,3).'</td>
                <td width="100px">'.$value->product_code.'</td>
                <td width="100px">'.$value->product_name.'</td>
                <td width="100px">'.$value->rak_name.'</td>
                <td width="100px" style="text-align:right;">'.$value->saldo.'</td>
                <td width="100px" style="text-align:right;">'.$value->minimal.'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }
}