<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pembelian extends MY_Model {

	//tambah_pembelian
	public function count_total()
	{
		$month = date('n');
		$sql = "SELECT SUM(total) AS total FROM atombizz_purchases WHERE MONTH(`date`) = ? GROUP BY MONTH(`date`)";
		$query = $this->db->query($sql,$month);
		$data = $query->row();
		return (!empty($data->total)) ? $data->total : 0;
	}

	function cek_temp($param)
	{
		$sql = "SELECT DISTINCT reference_no,`date`,supplier_code,supplier_name,note,urut FROM atombizz_tmp_detail_purchases WHERE operator = ?";
		$data = $this->db->query($sql,array($param['operator']));
		foreach ($data->result_array() as $data) {
			// $result = $data['reference_no'];
		}
		return (isset($data))? $data : FALSE ;
	}

	function faktur_pembelian($param=''){
		$param = $this->input->post();
		$tgl = $param['date'];
		$kode_tgl = date('ymd',strtotime($tgl));
		$kode = 'FB';

		$urut = $this->max('atombizz_purchases', 'urut',array('supplier_code'=>$param['code'],'date'=>$param['date']));
	 	// print_r($urut);exit;
		$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$param['code'].'.'.$kode_tgl.'.'.complete_zero($num,2);
		$result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>TanggalIndo($tgl));
		return $result;
	}

	public function _opt_produk($value='')
	{
		$sql = "SELECT * FROM atombizz_product WHERE type = 'reguler'";
		$query = $this->db->query($sql);
		$list = '<option value=""></option>';
		foreach ($query->result() as $key => $value) {
			$list .= '<option value="'.$value->code.'">'.$value->code.' - '.$value->name.'</option>';
		}

		return $list;
	}

	function opt_supplier()
	{
		$sql = "SELECT * FROM atombizz_suppliers";
		$res = $this->db->query($sql);

		if($res->num_rows() > 0) {
			$hasil[''] = "Pilih Supplier";
			foreach($res->result_array() as $val) {
				$hasil[trim($val['code'])] = trim($val['name']);
			}
		} else {
			$hasil[''] = "No Category Found";
		}

		return $hasil;
	}

	public function get_hpp($code)
	{
		$sql = "SELECT price FROM atombizz_product where code = '$code'";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		$hasil = $data[0]['price'];
		return $hasil;
	}

	public function get_gudang($code)
	{
		$sql = "SELECT gudang_code FROM atombizz_product where code = '$code'";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		$hasil = $data[0]['gudang_code'];
		return $hasil;
	}

	function mencari($key){
		$sql = "SELECT * FROM atombizz_product WHERE code = ".$this->protect($key['keyword'])." OR name = ".$this->protect($key['keyword']);
		$data = $this->db->query($sql);
		return $data;
	} 

	function get_list_produk($reference){
		$sql = "SELECT * FROM atombizz_tmp_detail_purchases WHERE reference_no='$reference' order by id asc";
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
				<td align="center">'.format_rupiah($das->unit_price).'</td>
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

	function get_total_pembelian($reference){
		$sql = "SELECT SUM(sub_total) AS total FROM atombizz_tmp_detail_purchases WHERE reference_no='$reference'";
		$data = $this->db->query($sql);
		foreach ($data->result() as $das) {
			$total = $das->total;
		}
		return ($total!='') ? $total:0;
	}

	function get_supplier($reference){
		$sql = "SELECT * FROM atombizz_tmp_detail_purchases WHERE reference_no='$reference'";
		$data = $this->db->query($sql);
		$supplier['id']='';
		$supplier['name']='';
		foreach ($data->result() as $das) {
			$supplier['id'] = $das->supplier_code;
			$supplier['name'] = $das->supplier_name;
		}
		return ($supplier!='') ? $supplier:null;
	}

	function detail_pembelian($key){
		$sql = "SELECT * FROM atombizz_tmp_detail_purchases WHERE id=$key";
		$data = $this->db->query($sql);
		$result = $data->row();
		return $result;
	}

	function get_pcs($kode,$id){
		$sql = "SELECT qty FROM atombizz_product_specification WHERE code = '$kode'";
		$data = $this->db->query($sql);
		$result = $data->result_array();
		$pcs = $result[0]['qty'];
		$pcs = json_decode($pcs);
		return $pcs[$id];
	}

	function get_last_num($keyword){
		$sql = "SELECT * FROM atombizz_suppliers WHERE code = ?";
		$data = $this->db->query($sql,array($keyword));
		foreach ($data->result_array() as $val) {
			$num = $val['last_num'];
		}
		return (!empty($num)? $num+1 : 1);
	}

	function get_purchase($id=''){
		$sql = $this->db->get_where('atombizz_purchases',array('id'=>$id));
		$data = $sql->result();
		return $data[0];
	}

	public function daftar_produk($param='')
	{						
		$sql = "SELECT * FROM view_item_purchase WHERE reference_no = ?";
		$query = $this->db->query($sql,$param['purchase_code']);
		$list = ''; $i = 1;
		foreach ($query->result() as $key => $value) {
			$list .= '
			<tr>
				<td>'.$i.'</td>
				<td>'.$value->product_code.'</td>
				<td>'.$value->product_name.'</td>
				<td>'.$value->quantity.'</td>
				<td align="right">'.format_rupiah($value->unit_price).'</td>
				<td align="right">'.format_rupiah($value->total_price).'</td>';
				if (empty($param['edit'])) {
					$list .= '
					<td>
						<a onclick="actEdit('.$value->id.')" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
						<a onclick="actDelete('.$value->id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a
						</td>';
					}
					$list .= '
				</tr>
				';

				$i++;
			}

			$list_null = '
			<tr>
				<td colspan="5">Tidak ada data.</td>
			</tr>
			';

			return (isset($value)) ? $list : $list_null;
		}

		public function get_subtotal($code='')
		{
			$sql = "SELECT SUM(quantity*unit_price) AS subtotal FROM atombizz_purchase_items WHERE reference_no = ?";
			$query = $this->db->query($sql, $code);
			return $query->row()->subtotal;
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

	/* End of file mdl_pembelian.php */
/* Location: ./application/modules/gudang/models/mdl_pembelian.php */