<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pengguna extends MY_Model {
	
	public function get_karyawan($id=''){
		$sql = $this->db->get_where('view_employee',array('id'=>$id));
		return $sql->result();
	}

	// public function get_posisi(){
	// 	$sql = $this->find('atombizz_employee_position',array('group !='=>'superuser'));
	// 	// $sql = $this->db->get_where('atombizz_employee_position',array('group !=','superuser'));
	// 	return $sql->result();
	// }

	public function get_opt_karyawan()
	{
		$sql = $this->db->get('atombizz_karyawan');
		return $sql->result();
	}

	public function get_detail_karyawan($id=''){
		$sql = $this->db->get_where('atombizz_karyawan',array('code'=>$id));
		return $sql->result();
	}

	public function get_posisi()
    {
    	$sql = "SELECT * FROM atombizz_employee_position WHERE `group` != 'superuser'";
    	$res = $this->db->query($sql);

    	if($res->num_rows() > 0) {
    		$hasil[''] = "Pilih Hak Akses";
    		foreach($res->result_array() as $val) {
    			$hasil[trim($val['id'])] = trim($val['group']);
    		}
    	} else {
    		$hasil[''] = "Tidak Ada Data";
    	}

    	return $hasil;
    }

	public function count_data()
	{
		$total = $this->total('view_employee',array('jabatan !='=>'superuser'));
		return $total;
	}

}
/* End of file m_kelas.php */

/* Location: ./application/modules/laporan/models/m_kelas.php */