<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_spoil extends MY_Model {

	//tambah_pembelian
	public function count_total()
	{
		$month = date('n');
		$sql = "SELECT SUM(total) AS total FROM atombizz_retur_out WHERE MONTH(`date`) = ? GROUP BY MONTH(`date`)";
		$query = $this->db->query($sql,$month);
		$data = $query->row();
		return (!empty($data->total)) ? $data->total : 0;
	}

	function get_akun($keyword){
		$sql = "SELECT * FROM atombizz_accounting_master_akun WHERE name = ?";
		$data = $this->db->query($sql,array($keyword));
		foreach ($data->result_array() as $val) {
			$akun = $val['code'];
		}
		return $akun;
	}

	public function _opt_produk($value='')
    {
    	$sql = "SELECT * FROM atombizz_product";
    	$query = $this->db->query($sql);
    	$list = '<option value=""></option>';
    	foreach ($query->result() as $key => $value) {
    		$list .= '<option value="'.$value->code.'">'.$value->code.' - '.$value->name.'</option>';
    	}

    	return $list;
    }

    public function _opt_satuan($kategori='')
    {
    	$sql = "SELECT * FROM atombizz_converter WHERE kategori = '$kategori'";
    	$query = $this->db->query($sql);
    	$list = '<option value=""></option>';
    	foreach ($query->result() as $key => $value) {
    		$list .= '<option value="'.$value->acuan.'">'.$value->nama.'</option>';
    	}

    	return $list;
    }

	function get_supplier_akun($keyword){
		$sql = "SELECT * FROM atombizz_suppliers WHERE code = ?";
		$data = $this->db->query($sql,array($keyword));
		foreach ($data->result_array() as $val) {
			$akun = $val['account_code'];
		}
		return $akun;
	}

	function opt_supplier()
    {
    	$sql = "SELECT * FROM atombizz_suppliers WHERE status = 1";
    	$res = $this->db->query($sql);

    	if($res->num_rows() > 0) {
    		$hasil[''] = "Pilih Suplier Tujuan";
    		foreach($res->result_array() as $val) {
    			$hasil[trim($val['code'])] = trim($val['name']);
    		}
    	} else {
    		$hasil[''] = "No Category Found";
    	}

    	return $hasil;
    }

	function faktur_retur_out($param=''){
		// $param = $this->input->post();
	 	$tgl = date('Y-m-d');
	 	$kode_tgl = date('ymd',strtotime($tgl));
	 	$kode = 'FSP';

	 	$urut = $this->max('atombizz_spoil', 'urut',array('tgl'=>$tgl));
	 	$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$kode_tgl.'.'.complete_zero($num,2);
		$result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>TanggalIndo($tgl));
		return $result;
	}

	function get_list_produk($reference){
		$sql = "SELECT * FROM atombizz_spoil_tmp WHERE reference='$reference' AND status = 'bahan' order by id asc";
		$data = $this->db->query($sql);
		$list = '';
		$i = 1;
		foreach ($data->result() as $das) {
			$list .= '
				<tr>
					<td class="text-center">'.$i.'</td>
					<td class="text-center">'.$das->kode.'</td>
					<td class="text-center">'.$das->nama.'</td>
					<td class="text-center">'.$das->qty.'</td>
					<td class="text-center">
						<a onclick="actEdit('.$das->id.')" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i> Edit</a>
						<a onclick="actDel('.$das->id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default"><i class="icon-remove"></i> Delete</a>
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

	function get_supplier($reference){
		$sql = "SELECT * FROM atombizz_retur_out_tmp WHERE reference='$reference'";
		$data = $this->db->query($sql);
		$supplier = array();
		foreach ($data->result() as $das) {
			$supplier['code'] = $das->supplier_code;
			$supplier['name'] = $das->supplier_name;
		}
		return ($supplier!='') ? $supplier:null;
	}

	function get_total_retur_out($reference){
		$sql = "SELECT SUM(total) AS total FROM atombizz_spoil_tmp WHERE reference='$reference'";
		$data = $this->db->query($sql);
		foreach ($data->result() as $das) {
			$total = $das->total;
		}
		return ($total!='') ? $total:0;
	}


	function mencari($key){
        $sql = "SELECT * FROM atombizz_product WHERE code ='".$key['keyword']."'";
        $data = $this->db->query($sql);
        return $data;
    } 

    function detail_retur_out($key){
		$sql = "SELECT * FROM atombizz_spoil_tmp WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}

	function cek_temp()
	{
		$sql = "SELECT DISTINCT reference,`tgl`,urut FROM atombizz_spoil_tmp";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			// $result = $data['reference_no'];
		}
		return (isset($data))? $data : FALSE ;
	}

	function get_hpp($code)
	{
		$sql = "SELECT * FROM atombizz_product_price WHERE `code`= ? ORDER BY id desc LIMIT 1";
		$data = $this->db->query($sql,array($code));
		foreach ($data->result_array() as $das) {
		}
		return (isset($das)) ? $das['price'] : 0 ;
	}

	function get_list_produk_retur_out($reference){
		$sql = "SELECT * FROM atombizz_retur_out_detail WHERE reference='$reference' order by id asc";
		$data = $this->db->query($sql);
		$list = '';
		$i = 1;
		foreach ($data->result() as $das) {
			// $hpp = ($das->unit_price - ($das->unit_price*$das->disc_reg/100) + ($das->unit_price*$das->tax_amount/100));
			$subtotal = $das->hpp*$das->quantity;
			$list .= '
				<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$das->product_name.'</td>
					<td class="money">'.$das->quantity.'</td>
					<td>'.format_rupiah($das->hpp).'</td>
					<td>'.format_rupiah($subtotal).'</td>
					<td class="text-center">
						<a onclick="actEdit('.$das->id.')" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
						
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

	function get_stok($reference,$id){
		$sql = "SELECT 
			id,`date`,`status`,reference,SUM(`in`) as `in`,SUM(`out`) as `out`,SUM(`out`)-SUM(`in`) as saldo,
			description,userlog,operator,rak_code,product_code,dept
			FROM atombizz_warehouses_stok 
			WHERE reference='$reference' AND product_code='$id' AND rak_code = 'retur'
			GROUP BY product_code, rak_code, reference
		";
		$data = $this->db->query($sql);
		// echo $this->db->last_query();exit;
		foreach ($data->result_array() as $das) {
			$qty = $das['saldo'];
		}

		return (isset($qty)) ? $qty : 0 ;
	}

	function get_real_stok($param=''){
		$sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? AND rak_status = 'bahan'";
		$data = $this->db->query($sql,array($param['kode']));
		// echo $this->db->last_query();exit;
		foreach ($data->result_array() as $das) {
			$qty = $das['saldo'];
		}

		return (isset($qty)) ? $qty : 0 ;
	}

	function get_rak_gudang($key)
	{
		$sql = "SELECT * FROM view_products WHERE code = ?";
		$data = $this->db->query($sql,array($key));
		foreach ($data->result_array() as $das) {
			$rak = $das['gudang_code'];
		}
		return $rak;
	}

}

/* End of file mdl_retur.php */
/* Location: ./application/modules/stok_bahan/models/mdl_retur.php */