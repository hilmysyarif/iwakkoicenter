<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_posisi extends MY_Model 
{
	
	function detail($key){
		$sql = "SELECT * FROM atombizz_employee_position WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}

	function get_module_list(){
		$sql = "SELECT * FROM atombizz_module ORDER BY module DESC";
		$data = $this->db->query($sql);
		
		return $data;
	}

	function get_module(){
		$sql = "SELECT DISTINCT module FROM atombizz_module";
		$data = $this->db->query($sql);
		
		return $data;
	}

	function get_access($key){
		$sql = "SELECT * FROM atombizz_employee_access WHERE position_id=$key";
		$data = $this->db->query($sql);
		
		return $data->result();
	}

	function count_data(){
		$sql = "SELECT * FROM atombizz_employee_position WHERE `group` != 'superuser'";
		$query = $this->db->query($sql);
		$total = $query->num_rows();

		return $total;
	}
}