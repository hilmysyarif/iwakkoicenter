<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_karyawan extends MY_Model 
{
	public function get_paramedik($id=''){
		$sql = $this->db->get_where('atombizz_karyawan',array('id'=>$id));
		return $sql->result();
	}

	public function get_karyawan($id=''){
		$sql = $this->db->get('atombizz_karyawan');
		return $sql->result();
	}

	public function gen_kode(){
        $this->db->select_max('no_urut');
        $result = $this->db->get('atombizz_karyawan');
        $hasil = @$result->result();
        if($result->num_rows()) $no = ($hasil[0]->no_urut)+1;
        else $no = 1;
        
        return $no;
    }

    public function count_data()
	{
		$total = $this->total('atombizz_karyawan');
		return $total;
	}

	public function get_code($id)
	{
		$sql="SELECT code FROM atombizz_karyawan WHERE id='$id'";
		$hasil = $this->db->query($sql);
		$data = $hasil->result();
		$data = $data[0]->code;
		return $data;
	}

	public function insert_acc($data_acc,$debit,$kredit,$faktur)
    {
        $sql = "INSERT INTO atombizz_accounting_buku_besar (kode,no_referensi,tanggal,keterangan,no_akun,debit,kredit,faktur,person,valid) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $insert = $this->db->query($sql,array($data_acc['kode'],$data_acc['no_referensi'],$data_acc['tanggal'],$data_acc['keterangan'],$data_acc['no_akun'],$debit,$kredit,$faktur,$data_acc['person'],$data_acc['valid']));
        return $insert;
    }
}