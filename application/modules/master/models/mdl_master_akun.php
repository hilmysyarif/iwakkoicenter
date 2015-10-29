<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_master_akun extends MY_Model 
{
    function opt_klasifikasi(){
    	$sql = "SELECT * FROM atombizz_accounting_klasifikasi";
    	$res = $this->db->query($sql);

    	if($res->num_rows() > 0) {
    		$hasil[''] = "Pilih Klasifikasi";
    		foreach($res->result_array() as $val) {
    			$hasil[trim($val['id'])] = trim($val['nama']);
    		}
    	} else {
    		$hasil[''] = "No Result Found";
    	}

    	return $hasil;
    }

    function opt_akun(){
    	$sql = "SELECT * FROM atombizz_accounting_master_akun";
    	$res = $this->db->query($sql);

    	if($res->num_rows() > 0) {
    		$hasil[''] = "Pilih Akun";
    		foreach($res->result_array() as $val) {
    			$hasil[trim($val['kode'])] = trim($val['kode'].' '.$val['nama']);
    		}
    	} else {
    		$hasil[''] = "No Result Found";
    	}

    	return $hasil;
    }

    function opt_sub_klasifikasi($kode){
		$sql = "SELECT * FROM atombizz_accounting_sub_klasifikasi WHERE id_klasifikasi=$kode";
		$data = $this->db->query($sql);
		
		return $data;
	}

    function get_list_transaksi($kode){
		$sql = "SELECT * FROM atombizz_accounting_buku_besar WHERE no_akun='$kode'";
		$data = $this->db->query($sql);
		
		return $data;
	}

	function kode_akun($kode){
		$sql = "SELECT COUNT(id) AS total FROM atombizz_accounting_master_akun WHERE kode LIKE '%$kode%'";
		$data = $this->db->query($sql);
		
		return $data;
	}

	function set_akun_penting($table,$penting,$akun){
		$cnt = count($penting);
		$status = TRUE;
		$i = 0;
		while($cnt>$i AND $status==TRUE){
			$data = array('penting'=>$penting[$i]);
			$this->db->where('kode', $akun[$i]);
			$update = $this->db->update($table, $data);
			if($update>0){
				$status = TRUE;
			} else {
				$status = FALSE;
			}
			$i++;
		}	
		return $status;
	}

	function detail($key){
		//
		$sql = "SELECT * FROM atombizz_accounting_master_akun WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}

	function _opt_rekening()
	{
		//
		$sql = "SELECT * FROM atombizz_accounting_master_akun ORDER BY code ASC";
		$query = $this->db->query($sql);
		return $query;
	}
}