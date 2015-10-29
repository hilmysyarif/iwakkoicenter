<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_rak_gudang extends MY_Model 
{
	function mencari($key){
		$sql = "SELECT * FROM atombizz_rack WHERE (kode LIKE '%$key%' OR nama LIKE '%$key%')";
		$data = $this->db->query($sql);
		return $data;
	}

	function detail($key){
		$sql = "SELECT * FROM atombizz_rack WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}
}