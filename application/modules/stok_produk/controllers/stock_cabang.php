<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_cabang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->module = "stok_produk";
		$this->cname = $this->module.'/stock_cabang';
		$this->load->model('mdl_stock_cabang','ms');
	}

	public function load_stok(){
        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Resto';
        $data['rak'] = $this->ms->get_rak();
        $data['cabang'] = $this->ms->get_cabang();
        $data['content'] = $this->load->view('/data_stok_cabang',$data,TRUE);
        $this->load->view('template',$data);
    }

	public function load_min_stok(){
        $data['sidebar_active']='stok_produk';
        $data['title']='stok_produk - Resto';
        $data['rak'] = $this->ms->get_rak();
        $data['content'] = $this->load->view('/data_stok_min_cabang',$data,TRUE);
        $this->load->view('template',$data);
    }    

    public function produk(){
        $param = $this->input->post('rak');
        // print_r($param);exit;
        $opt = '<option value="">Semua</option>';
        $produk = $this->ms->produk($param);
        foreach ($produk as $key => $value) {
            // $opt = '<option value="">Semua</option>';
            $opt .= "<option value=".$value->product_code.">".$value->product_name."</option>";
        }
        echo $opt;
    }

    public function table_stock(){
        $param = $this->input->post();
        $data = $this->ms->data_stock($param);
        $table = ''; $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px" style="text-align:center;">'.complete_zero($i,3).'</td>
                <td width="100px">'.$value->product_code.'</td>
                <td width="100px">'.$value->product_name.'</td>
                <td width="100px">'.$value->rak_name.'</td>
                <td width="100px" style="text-align:right;">'.$value->saldo.'</td>
                <td width="100px" style="text-align:right;">'.$value->dept.'</td>
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
                <td width="75px">'.$value->rak_name.'</td>
                <td width="75px" style="text-align:right;">'.$value->saldo.'</td>
                <td width="75px" style="text-align:right;">'.$value->minimal.'</td>
                <td width="75px" style="text-align:right;">'.$value->dept.'</td>
            </tr>';
            $i++;
        }
        echo $table;
    }

    public function sync()
    {
        $empty = strrpos($this->input->post('query'), "Undefined");
        if (empty($empty)) {
            $query = json_decode($this->input->post('query'));
            // print_r($query);exit();
            echo $this->ms->sync($query);
        } else {
            echo 0;
        }
    }
}