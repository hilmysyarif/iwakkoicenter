<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_accounting_journal extends MY_Model {
	
	//menampilkan karyawan untuk filter gaji
	public function get_accounting($id){
		$this->db->select('no_referensi,tanggal,keterangan,debit,kredit,nama');
		$this->db->where('id', $id);
		$sql = $this->db->get('view_accounting');
		// echo $this->db->last_query();exit;
		return $sql->result();
	}

	public function validasi_accounting($param=''){
		$data = array('valid' => 'yes',
						'valid_by' => $param['by']  );
		$this->db->where('id', $param['id']);
		$this->db->update('atombizz_accounting_buku_besar', $data);
		return $this->db->affected_rows();
	}

	// public function print_gaji($param=''){
		
	// 	$sql = "SELECT
	// 				s.employee_code AS kode,
	// 				e.`name` AS nama,
	// 				s.gaji_pokok AS gapok,
	// 				(
	// 					s.tunjangan_jabatan + s.tunjangan_khusus + s.tunjangan_pensiun + s.tunjangan_beras + s.tunjangan_lain + s.bonus
	// 				) AS lain,
	// 				(
	// 					s.pph_21 + s.transport + s.hutang + s.potongan_lain
	// 				) AS potongan,
	// 				((s.tunjangan_jabatan + s.tunjangan_khusus + s.tunjangan_pensiun + s.tunjangan_beras + s.tunjangan_lain + s.bonus) + s.gaji_pokok - (s.pph_21 + s.transport + s.hutang + s.potongan_lain)) as total
	// 			FROM
	// 				atombizz_salary s,
	// 				atombizz_employee e
	// 			WHERE s.employee_code = e.uid AND  MONTH(s.date) = ?"; 
	// 	if(@$param['name']){
	// 			$sql .= " AND e.uid='".$param['name']."' ";
	// 	}
	// 	$sql .= " GROUP BY MONTH(s.date)";
	// 	$res = $this->db->query($sql,array($param['tgl']));
 //        return $res->result_array();
	// }
}
/* End of file mdl_karyawan.php */
/* Location: ./application/modules/laporan/models/mdl_karyawan.php */