<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_incoming_stock extends MY_Model {

	public function get_incoming()
	{
		$sql = "SELECT
					awsd.reference,
					awsd.arrival,
					awsd.date,
					COUNT(DISTINCT(awsd.product_code)) as qty_product
				FROM
					atombizz_warehouses_stok_datang awsd
				GROUP BY
					awsd.reference";
		$sql = $this->db->query($sql);
		return $sql->result();
	}

	public function get_incoming_detail($reference='')
	{
		$sql = "SELECT
					awsd.id,
					awsd.reference,
					ap.`code`,
					ap.`name`,
					ap.gudang_code AS rak,
					awsd.`out` AS qty,
					ap.cost,
					awsd.`out` * ap.cost AS harga
				FROM
					atombizz_warehouses_stok_datang awsd,
					atombizz_product ap
				WHERE
					awsd.product_code = ap.`code` AND reference = '$reference'";
		$sql = $this->db->query($sql);
		return $sql->result();
	}

	public function sync($query='', $cabang='')
	{
		$counter = 0;
		foreach ($query as $row) {
			if (strrpos($row->query, $cabang)) {
				$sql = $this->db->query(str_replace("atombizz_warehouses_stok","atombizz_warehouses_stok_datang",$row->query));
				$return[$counter]['id'] = $row->id;
				$return[$counter]['result'] = $this->db->affected_rows();
			} else {
				$return[$counter]['id'] = $row->id;
				$return[$counter]['result'] = 0;
			}
			$counter++;
		}
		return json_encode($return);
	}

	public function distribusi($reference='', $operator='', $dept='')
	{
		$result = $this->db->get_where('atombizz_warehouses_stok_datang', array('reference'=>$reference));
		$results = $result->result();
		$counter = 0;
		foreach ($results as $key => $result) {
			$data[$counter] = array(
				'date' => date('Y-m-d'),
				'status' => 'distribusi',
				'reference' => $result->reference,
				'in' => $result->out,
				'out' => 0,
				'description' => 'Distribusi dari gudang pusat dengan no referensi '.$result->reference,
				'userlog' => date('Y-m-d H:i:s'),
				'operator' => $operator,
				'rak_code' => $result->rak_code,
				'product_code' => $result->product_code,
				'dept' => $dept );
			$counter++;
		}
		$this->db->insert_batch('atombizz_warehouses_stok', $data);
		if ($this->db->affected_rows() > 0) {				
			//keuangan
			$arr_kas = array(
                'kode'=> 'PB',
                'no_referensi'=>$reference,
                'tanggal'=>date('Y-m-d'),
                'keterangan'=>'Distribusi dari gudang pusat dengan no referensi '.$reference,                              
                'person'=>$operator,
                'dept'=>$dept,
                'valid'=>'yes');

			$harga = $this->get_harga($reference);

            //kas
            $arr_kas['debit'] = 0;
            $arr_kas['kredit'] = $harga;
            $arr_kas['no_akun'] = '110000';
            $kas_acc = $this->db->insert('atombizz_accounting_buku_besar',$arr_kas);

            //pembelian
            $arr_kas['debit'] = $harga;
            $arr_kas['kredit'] = 0;
            $arr_kas['no_akun'] = '130000';
            $save_acc = $this->db->insert('atombizz_accounting_buku_besar',$arr_kas);

            $this->db->query("UPDATE atombizz_warehouses_stok_datang set arrival = 'diterima' WHERE reference = '$reference'");

		}
		return $this->db->affected_rows();
	}

	public function get_harga($value='')
	{
		$sql = "SELECT
					awsd.reference,
					SUM(awsd.`out` * ap.cost) AS harga
				FROM
					atombizz_warehouses_stok_datang awsd,
					atombizz_product ap
				WHERE
					awsd.product_code = ap.`code` AND reference = '$value'
				GROUP BY
					awsd.reference";
		$sql = $this->db->query($sql);
		$data = $sql->result();
		return $data[0]->harga;
	}
}

/* End of file mdl_retur.php */
/* Location: ./application/modules/gudang/models/mdl_retur.php */