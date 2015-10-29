<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incoming_stock extends MY_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->module='gudang';
        $this->cname=$this->module.'/incoming_stock';
        $this->load->model('mdl_incoming_stock','mi');
	}
    public function index()
    {
        $access = strtolower($this->module.'.'.__class__.'.'.__function__);
        $this->permission->check_permission($access);
        
        $data['sidebar_active']='gudang';
        $data['title']='Gudang - Resto';
        $dept = $this->config->item('astro');
        $data['cabang'] = $dept['bas_branch_code'];
        $data['content'] = $this->load->view('/incoming_stok',$data,TRUE);
        $this->load->view('template',$data);
    }

    public function table_stock_datang(){
        $data = $this->mi->get_incoming();
        $table = '<thead>
            <tr>
                <th width="50px" style="text-align:center;">No.</th>
                <th style="text-align:center;">No. Faktur</th>
                <th style="text-align:center;">Tanggal</th>
                <th style="text-align:center;">Jumlah Macam</th>
                <th style="text-align:center;">Action</th>
            </tr>
        </thead>
        <tbody id="daftar_list_stock">';
        $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px" style="text-align:center;">'.complete_zero($i,3).'</td>
                <td width="150px">'.$value->reference.'</td>
                <td width="150px">'.$value->date.'</td>
                <td width="75px" style="text-align:right;">'.$value->qty_product.'</td>
                <td width="125px">
                    <div class="btn-group">';
            if ($value->arrival == 'otw') {
                $table.='<a onclick="actTerima(\''.$value->reference.'\')" data-toggle="tooltip" title="Personal" class="btn green btn-xs btn-default"><i class="icon-check"></i> Terima</a>';
            }
            $table .= '<a onclick="actDetail(\''.$value->reference.'\')" data-toggle="tooltip" title="Personal" class="btn blue btn-xs btn-default"><i class="icon-list"></i> Detail</a>
                    </div>
                </td>
            </tr>';
            $i++;
        }
        echo $table."</tbody>";
    }

    public function table_stock_detail(){
        $cost = 0;
        $unit = 0;
        $qty = 0;
        $data = $this->mi->get_incoming_detail($this->input->post('reference'));
        $table = '<thead>
            <tr>
                <th width="50px" style="text-align:center;">No.</th>
                <th style="text-align:center;">Faktur</th>
                <th style="text-align:center;">Kode Produk</th>
                <th style="text-align:center;">Nama Produk</th>
                <th style="text-align:center;">Nama Rak</th>
                <th style="text-align:center;">Jumlah</th>
                <th style="text-align:center;">Harga Unit</th>
                <th style="text-align:center;">Total Harga</th>
            </tr>
        </thead>
        <tbody id="daftar_list_stock">';
        $i=1;
        foreach ($data as $key => $value) {
            $table .= '<tr>
                <td width="50px" style="text-align:center;">'.complete_zero($i,3).'</td>
                <td width="75px">'.$value->reference.'</td>
                <td width="50px">'.$value->code.'</td>
                <td width="100px">'.$value->name.'</td>
                <td width="50px">'.$value->rak.'</td>
                <td width="50px" style="text-align:right;">'.$value->qty.'</td>
                <td width="75px" style="text-align:right;">'.format_rupiah($value->cost).'</td>
                <td width="100px" style="text-align:right;">'.format_rupiah($value->harga).'</td>
            </tr>';
            $i++;
            $cost += $value->harga;
        }
        $table .= '<tr>
            <td style="text-align:center;" colspan="7"><strong>TOTAL HARGA</strong></td>
            <td style="text-align:right;"><strong>'.format_rupiah($cost).'</strong></td>
        </tr>';
        echo $table."</tbody>";
    }

    public function sync()
    {
        $dept = $this->config->item('astro');
        $cabang = $dept['bas_branch_code'];
        $empty = strrpos($this->input->post('query'), "Undefined");
        if (empty($empty)) {
            $query = json_decode($this->input->post('query'));
            // print_r($query);exit();
            echo $this->mi->sync($query, $cabang);
        } else {
            echo 0;
        }
    }

    public function distribusi()
    {
        $reference = $this->input->post('id');
        $dept = $this->config->item('astro');
        $cabang = $dept['bas_branch_code'];
        $data['operator'] = $this->session->userdata('astrosession');
        $operator = $data['operator'][0]->nama;

        echo $this->mi->distribusi($reference, $operator, $cabang);
    }
	
}