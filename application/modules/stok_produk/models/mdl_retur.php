<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_retur extends MY_Model {

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

    public function _opt_produk($value='')
    {
    	$sql = "SELECT * FROM view_warehouse_stok";
    	$query = $this->db->query($sql);
    	$list = '<option value=""></option>';
    	foreach ($query->result() as $key => $value) {
    		$list .= '<option value="'.$value->product_code.'">'.$value->product_code.' - '.$value->product_name.'</option>';
    	}

    	return $list;
    }

	function faktur_retur_out($param=''){
		// $param = $this->input->post();
	 	$tgl = $param['date'];
	 	$kode_tgl = date('ymd',strtotime($tgl));
	 	$kode = 'FRO';

	 	$urut = $this->max('atombizz_retur_out', 'urut',array('supplier_code'=>$param['code'],'date'=>$param['date']));
	 	$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$param['code'].'.'.$kode_tgl.'.'.complete_zero($num,2);
		$result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>TanggalIndo($tgl));
		return $result;
	}

	function get_list_produk($reference){
		$sql = "SELECT * FROM atombizz_retur_out_tmp WHERE reference='$reference' order by id asc";
		$data = $this->db->query($sql);
		$list = '';
		$i = 1;
		foreach ($data->result() as $das) {
			$merk = $this->get_merk_list($das->brand_code);
			$brand = ($merk != NULL) ? '('.$merk.')' : '';
			$list .= '
				<tr>
					<td class="text-center">'.$i.'</td>
					<td align="center">'.$das->product_name.' '.$brand.'</td>
					<td align="center">'.$das->quantity.'</td>
					<td align="center">'.format_rupiah($das->hpp).'</td>
					<td class="text-right">'.format_rupiah($das->sub_total).'</td>
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

	public function get_merk_list($value='')
	{
		$this->db->where('code', $value);
		$query = $this->db->get('atombizz_brand_converter');
		if($query->num_rows() > 0){
			$result = $query->row();
			$data = $result->name;
		} else {
			$data = NULL;
		}
		return $data;
	}

	function get_total_retur_out($reference){
		$sql = "SELECT SUM(sub_total) AS total FROM atombizz_retur_out_tmp WHERE reference='$reference'";
		$data = $this->db->query($sql);
		foreach ($data->result() as $das) {
			$total = $das->total;
		}
		return ($total!='') ? $total:0;
	}


	function mencari($key){
        $sql = "SELECT * FROM atombizz_product WHERE code = '".$key['keyword']."' OR name = '".$key['keyword']."'";
        $data = $this->db->query($sql);
        return $data;
    } 

    function detail_retur_out($key){
		$sql = "SELECT * FROM atombizz_retur_out_tmp WHERE id=$key";
		$data = $this->db->query($sql);
		foreach ($data->result_array() as $data) {
			$result = $data;
		}
		return $result;
	}

	function cek_temp($param)
	{
		$sql = "SELECT DISTINCT reference,`date`,supplier_code,supplier_name,urut FROM atombizz_retur_out_tmp WHERE operator = ?";
		$data = $this->db->query($sql,array($param['operator']));
		foreach ($data->result_array() as $data) {
			// $result = $data['reference_no'];
		}
		return (isset($data))? $data : FALSE ;
	}

	function get_hpp($code)
	{
		$sql = "SELECT * FROM atombizz_product WHERE `code`= ?";
		$data = $this->db->query($sql,array($code));
		foreach ($data->result_array() as $das) {
		}
		return (isset($das)) ? $das['cost'] : 0 ;
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
		$sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? ";
		$data = $this->db->query($sql,array($param['product_code']));
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

	public function get_satuan($value='')
	{
		$this->db->where('code',$value);
		$result = $this->db->get('atombizz_product');
		$product = $result->row();

		$this->db->where('kategori',$product->unit);
		$query = $this->db->get('atombizz_converter');
		// echo $this->db->last_query();exit;
		if($query){
			$opt = '<option value=""></option>';
			foreach ($query->result() as $key => $value) {
				$opt .= '<option value="'.$value->id.'">'.$value->nama.'</option>';
			}
		} else {
			$opt = false;
		}
		return $opt;
	}
	public function get_satuan_brand($value='')
	{
		$this->db->where('code',$value);
		$result = $this->db->get('atombizz_brand_converter');
		$product = $result->row();

		$this->db->where('id',$product->satuan);
		$query = $this->db->get('atombizz_converter');
		// echo $this->db->last_query();exit;
		if($query){
			$opt = '';
			foreach ($query->result() as $key => $value) {
				$opt .= '<option value="'.$value->id.'">'.$value->nama.'</option>';
			}
		} else {
			$opt = false;
		}
		return $opt;
	}
	public function get_merk($value='')
	{
		$this->db->where('product_code',$value);
		$query = $this->db->get('atombizz_brand_converter');
		// echo $this->db->last_query();exit;
		if($query){
			$opt = '<option value=""></option>';
			foreach ($query->result() as $key => $value) {
				$opt .= '<option value="'.$value->code.'">'.$value->name.'</option>';
			}
		} else {
			$opt = false;
		}
		return $opt;
	}

}

/* End of file mdl_retur.php */
/* Location: ./application/modules/stok_produk/models/mdl_retur.php */