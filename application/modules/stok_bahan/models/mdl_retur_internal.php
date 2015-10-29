<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_retur_internal extends MY_Model {

	//tambah_pembelian
	public function count_total()
	{
		$month = date('n');
		$sql = "SELECT SUM(total) AS total FROM atombizz_retur_out WHERE MONTH(`date`) = ? GROUP BY MONTH(`date`)";
		$query = $this->db->query($sql,$month);
		$data = $query->row();
		return (!empty($data->total)) ? $data->total : 0;
	}

	function faktur_distribusi($param=''){
		// $param = $this->input->post();
	 	$tgl = $param['date'];
	 	$kode_tgl = date('ymd',strtotime($tgl));
	 	$kode = 'FRINT';

	 	$urut = $this->max('atombizz_retur_internal', 'urut',array('date'=>$param['date']));
	 	$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$kode_tgl.'.'.complete_zero($num,2);
		$result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>TanggalIndo($tgl));
		return $result;
	}

	function cek_temp($param)
	{
		$sql = "SELECT DISTINCT reference,nota,`date`,branch_code,branch_name,urut FROM atombizz_retur_internal_tmp WHERE operator = ?";
		$data = $this->db->query($sql,array($param['operator']));
		foreach ($data->result_array() as $data) {
			// $result = $data['reference_no'];
		}
		return (isset($data))? $data : FALSE ;
	}

	function mencari($key){
        $sql = "SELECT * FROM view_products WHERE code LIKE '%".$key['keyword']."%' OR name LIKE '%".$key['keyword']."%'";
        $data = $this->db->query($sql);
        return $data;
    } 

    function get_real_stok($param=''){
		$sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? AND rak_status = 'stok_bahan'";
		$data = $this->db->query($sql,array($param['product_code']));
		// echo $this->db->last_query();exit;
		foreach ($data->result_array() as $das) {
			$qty = $das['saldo'];
		}

		return (isset($qty)) ? $qty : 0 ;
	}

	function get_hpp($code)
	{
		$sql = "SELECT * FROM atombizz_product_price WHERE `code`= ? ORDER BY id desc LIMIT 1";
		$data = $this->db->query($sql,array($code));
		foreach ($data->result_array() as $das) {
		}
		return (isset($das)) ? $das['price'] : 0 ;
	}

	function get_list_produk($reference){
		$sql = "SELECT * FROM atombizz_retur_internal_tmp WHERE reference='$reference' order by id asc";
		$data = $this->db->query($sql);
		$list = '';
		$i = 1;
		foreach ($data->result() as $das) {
			$list .= '
				<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$das->product_name.'</td>
					<td>'.$das->quantity.'</td>
					<td>'.format_rupiah($das->hpp).'</td>
					<td class="text-right">'.format_rupiah($das->sub_total).'</td>
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

	function get_total_retur_in($reference){
		$sql = "SELECT SUM(sub_total) AS total FROM atombizz_retur_internal_tmp WHERE reference='$reference'";
		$data = $this->db->query($sql);
		foreach ($data->result() as $das) {
			$total = $das->total;
		}
		return ($total!='') ? $total:0;
	}

	function detail_retur_in($key){
		$sql = "SELECT * FROM atombizz_retur_internal_tmp WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}

}

/* End of file mdl_retur.php */
/* Location: ./application/modules/stok_bahan/models/mdl_retur.php */