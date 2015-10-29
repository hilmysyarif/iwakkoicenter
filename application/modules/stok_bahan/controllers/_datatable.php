<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {

    public function daftar_purchase()
    {
        $this->datatables->select('id,date,reference_no,supplier_name,total')
        ->edit_date('date','$1','date')
        ->edit_currency('total','$1','total')
        ->add_column('Actions', get_detail('$1'),'id')
        ->from('atombizz_purchases');
        
        echo $this->datatables->generate();
    }
    
    public function daftar_stok()
    {
        $this->datatables->select('product_code,product_name,saldo,rak_name')
        ->add_column('Actions', tambah_stok('$1'),'product_code')
        ->from('view_warehouse_stok');
        
        echo $this->datatables->generate();
    }

    public function daftar_spoil()
    {
        $this->datatables->select('id,tgl,reference,kode,nama,qty,keterangan')
        ->edit_date('tgl','$1','tgl')
        ->from('atombizz_spoil_detail');
        $this->db->where("status", "bahan");
        $this->db->order_by("id", "desc");
        
        echo $this->datatables->generate();
    }

    public function daftar_retur()
    {
        $this->datatables->select('id,date,reference,supplier_name,total')
        ->edit_date('date','$1','date')
        ->edit_currency('total','$1','total')
        ->add_column('Actions', get_detail_ajax('$1'),'id')
        ->from('atombizz_retur_out');
        $this->db->order_by("id", "desc");
        
        echo $this->datatables->generate();
    }

    public function daftar_retur_detail()
    {
        $param = $this->input->post('id');
        $this->datatables->select('id,product_code,product_name,description,quantity,hpp,subtotal')
        ->edit_currency('hpp','$1','hpp')
        ->edit_currency('subtotal','$1','subtotal')
        ->where('id',$param)
        ->from('view_retur_out');
        $this->db->order_by("id", "desc");
        
        echo $this->datatables->generate();
    }

    public function daftar_distribusi()
    {
        $this->datatables->select('id,date,reference_no,operator,status,dept')
        ->edit_date('date','$1','date')
        ->add_column('Actions', '$1','get_distribusi(id,status)')
        ->where('status','pengajuan')
        ->from('atombizz_distribution');
        $this->db->order_by("id", "desc");
        
        echo $this->datatables->generate();
    }

    public function daftar_retur_internal()
    {
        $this->datatables->select('id,date,reference,total')
        ->edit_date('date','$1','date')
        ->edit_currency('total','$1','total')
        ->add_column('Actions', get_detail_ajax('$1'),'id')
        ->from('atombizz_retur_internal');
        $this->db->order_by("id", "desc");
        
        echo $this->datatables->generate();
    }

    public function daftar_distribusi_detail($value='')
    {
        $param = $this->input->post();
        $this->datatables->select('id,product_code,product_name,quantity,unit')
        ->from('view_distribution')
        ->where('id',$param['id']);
        
        echo $this->datatables->generate();
    }

    public function daftar_retur_internal_detail($value='')
    {
        $param = $this->input->post();
        $this->datatables->select('id,product_name,quantity,hpp')
        ->add_column('tes', '$1' ,'total(quantity,hpp)')
        ->edit_currency('tes','$1','tes')
        ->edit_currency('hpp','$1','hpp')
        ->from('view_retur_internal')
        ->where('id',$param['id']);
        
        echo $this->datatables->generate();
    }

    public function daftar_mutasi()
    {
    	$this->datatables->select('id,date,reference,product_name,quantity')
    	->edit_date('date','$1','date')
        // ->add_column('Actions', get_detail('$1'),'id')
        ->from('view_mutasi');
        $this->db->order_by("id", "desc");
        
        echo $this->datatables->generate();
    }

    public function stok_opname()
    {   
        $param = $this->input->post();
        $this->datatables->select('id,product_code,product_name,checking_qty,stock_qty,difference,status')
        ->from('atombizz_fast_stock_opname')
        ->where('reference', $param['reference']);
        
        echo $this->datatables->generate();
    }

    public function stok_opname_detail_l()
    {   
        $param = $this->input->post();
        $this->datatables->select('id,product_code,product_name,rak_name,checking_qty,stock_qty,difference,status')
        // ->add_column('Actions', get_detail_only('$1'),'code')
        ->from('atombizz_stock_opname_detail')
        // ->where('status', 'rak')
        ->where('reference', $param['reference']);
        
        echo $this->datatables->generate();
    }
}