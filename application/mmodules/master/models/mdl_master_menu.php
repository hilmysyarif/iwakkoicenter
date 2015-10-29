<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_master_menu extends CI_Model {

	function cek_kode($kode='')
	{
		$this->db->where('code',$kode);
		$this->db->select('*, id as id_menu');
		$result = $this->db->get('menu');
		return $result->row();
	}

	function count_menu($limit='',$offset='')
	{
		if(!empty($limit))
		{
			$this->db->limit($limit,$offset);
		}
		$result = $this->db->get('menu');
		return $result->num_rows();
	}

	function get_menu($limit='',$offset='')
	{
		if(!empty($limit))
		{
			$this->db->limit($limit,$offset);
		}
		$this->db->select('*, id as id_menu');
		$result = $this->db->get('menu');
		return $result->result();
	}

	function get_kategori()
	{
		$result = $this->db->get('kategori-menu');
		return $result->result();
	}

	function insert_menu($data='')
	{
		$this->db->insert('menu',$data);
		if($this->db->affected_rows() > 0)return TRUE;
		else return FALSE;
	}

	function update_menu($kode='',$data='')
	{
		$this->db->where('code',$kode);
		$this->db->update('menu',$data);
		if($this->db->affected_rows() > 0)return TRUE;
		else return FALSE;
	}


}

/* End of file mdl_master_menu.php */
/* Location: ./application/modules/master_karyawan/models/mdl_master_menu.php */