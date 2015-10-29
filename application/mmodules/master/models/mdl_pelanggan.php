<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_pelanggan extends MY_Model 
{
	public function get_paramedik($id=''){
		$sql = $this->db->get_where('atombizz_customers',array('id'=>$id));
		return $sql->result();
	}

	function gen_kode(){
        $this->db->select_max('no_urut');
        $result = $this->db->get('atombizz_customers');
        $hasil = @$result->result();
        if($result->num_rows()) $no = ($hasil[0]->no_urut)+1;
        else $no = 1;
        
        return $no;
    }

    public function count_data()
	{
		$total = $this->total('atombizz_customers');
		return $total;
	}
}