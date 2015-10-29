<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_retur extends MY_Model 
{

	function faktur_retur_in($param=''){
	 	$tgl = $param['date'];
	 	$kode_tgl = date('ymd',strtotime($tgl));
	 	$kode = 'FRI';

	 	$urut = $this->max('atombizz_retur_in', 'urut',array('date'=>$param['date']));
	 	$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$param['user'].'.'.$kode_tgl.'.'.complete_zero($num,2);
		$result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>TanggalIndo($tgl));
		// print_r($result);exit;
		return $result;
	}

	function get_list_produk($reference){
		$sql = "SELECT * FROM atombizz_retur_in_tmp WHERE reference='$reference' order by id asc";
		$data = $this->db->query($sql);
		$list = '';
		$i = 1;
		foreach ($data->result() as $das) {
			$list .= '
				<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$das->product_code.'</td>
					<td>'.$das->product_name.'</td>
					<td>'.$das->quantity.'</td>
					<td class="text-center">
						<a onclick="actEdit('.$das->id.')" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
						<a onclick="actDel('.$das->id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default"><i class="icon-remove"></i></a>
					</td>
				</tr>
			';
			$i++;
		}
		$list_null = '
			<tr>
				<td colspan="6">No data to view...</td>
			</tr>
		';
		return ($list!='') ? $list:$list_null;
	}

	function mencari($param='')
	{
		$sql = "SELECT * FROM atombizz_selling_items WHERE invoice = '".$param['nota']."' AND (product_code LIKE '%".$param['keyword']."%' OR product_name LIKE '%".$param['keyword']."%')";
		$data = $this->db->query($sql);
		return $data;
	}

    function detail_retur_in($key){
		$sql = "SELECT * FROM atombizz_retur_in_tmp WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}

	function cek_temp($param)
	{
		$sql = "SELECT DISTINCT reference,nota,`date`,urut FROM atombizz_retur_in_tmp WHERE operator = ?";
		$data = $this->db->query($sql,array($param['operator']));
		foreach ($data->result_array() as $data) {
			// $result = $data['reference_no'];
		}
		return (isset($data))? $data : FALSE ;
	}

	function get_qty($param='')
	{
		$sql = "SELECT qty FROM atombizz_selling_items WHERE invoice = ? AND product_code = ?";
		$qty = $this->db->query($sql,array($param['nota'],$param['product_code']));
		$result = $qty->result();
		return $result[0]->qty;
	}

	function get_gudang_code($code='')
	{
		$sql = "SELECT * FROM view_products WHERE code = ?";
		$data = $this->db->query($sql,$code);
		$result = $data->result();
		return $result[0]->gudang_code;
	}
}