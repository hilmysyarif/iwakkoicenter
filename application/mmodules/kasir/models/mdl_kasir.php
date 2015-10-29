<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_kasir extends MY_Model {

	public function get_order_payed($id = '')
	{
		$sql = "SELECT * FROM `view_payed_order` WHERE `id-penjualan` = '".$id."'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function get_member($where)
	{
		$sql = $this->db->get_where('customer', $where);
		if ($sql->num_rows() > 0) {
			$sql = $sql->result();
			$id = $sql[0]->id;
			$sql1 = "SELECT COUNT(id) AS qty FROM penjualan WHERE `id-cust` = $id GROUP BY penjualan.`id-cust`";
			$sql1 = $this->db->query($sql1);
			if ($sql1->num_rows() > 0) {
				$sql1 = $sql1->result();
				$sql[0]->visit = $sql1[0]->qty;
			} else {
				$sql[0]->visit = "0";
			}
			return json_encode($sql[0]);
		} else {
			return 0;
		}
	}

	public function get_order_list($id = '', $printed)
	{
		if ($printed) {
			$sql = "SELECT * FROM `view_pesanan` WHERE `id-penjualan` = '".$id."'";
		} else {
			$sql = "SELECT * FROM `view_pesanan` WHERE `printed` = '0' AND `id-penjualan` = '".$id."'";
		}
		
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function get_total_harga($id = '')
	{
		$sql = "SELECT SUM(`total`) as total FROM `view_bayar_personal` WHERE `id-penjualan` = '".$id."'";
		$result = $this->db->query($sql);
		$hasil = $result->result();
		$total = $hasil[0]->total;
		if($total > 0){
			return $total.'|0';
		}else{
			$sql = "SELECT SUM(`total`) as total FROM `view_pesanan` WHERE `id-penjualan` = '".$id."'";
			$result = $this->db->query($sql);
			$hasil = $result->result();
			$total = $hasil[0]->total;
			if($total > 0){
				return $total.'|1';
			}else{
				return '0|1';
			}
		}
	}

	public function get_meja($value='')
	{
		if($value && $value!='all'){
			$where = "WHERE code = ".$this->protect($value);
		} else $where = '';
		$sql = "SELECT * FROM meja ".$where;
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function code_meja($value='')
	{
		$sql = "SELECT * FROM meja";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_meja_isi()
	{
		$terisi1 = array('');
		$sql = "SELECT meja FROM view_meja_isi";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$terisi = $result->result();
			foreach ($terisi as $key => $value) {
				array_push($terisi1, $value->meja);
			}
			return $terisi1;
		}else{
			return FALSE;
		}
	}

	public function get_struk($id = '')
	{
		$sql = "SELECT (SELECT SUM(total) FROM view_payed_order WHERE `id-penjualan` = $id) AS tagihan, `date`, cash, note, `invoice-code` as invoice FROM `penjualan` WHERE `id` = $id";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$hasil = $result->result();
			return $hasil[0];
		}else{
			return FALSE;
		}
	}

	public function get_statistik()
	{
		@$stat->omset = $this->get_stat_omset();	
		$stat->tunai = $this->get_stat_tunai();
		$stat->nontunai = $this->get_stat_nontunai();
		$stat->transaksi = $this->get_stat_transaksi();

		return $stat;
	}

	public function get_stat_omset()
	{
		$user = $this->session->userdata('astrosession');
		$sql = "SELECT sum(penjualan.bayar) as omset FROM penjualan WHERE (`no-invoice`!='' OR NOT ISNULL(`no-invoice`)) AND date = ? AND operator = ? GROUP BY date";
		$query = $this->db->query($sql,array(date('Y-m-d'),$user[0]->id));
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data->omset;
		} else {
			return 0;
		}
	}
	public function get_stat_tunai()
	{
		$user = $this->session->userdata('astrosession');
		$sql = "SELECT sum(penjualan.bayar) as tunai FROM penjualan WHERE (`no-invoice`!='' OR NOT ISNULL(`no-invoice`)) AND date = ? AND cash = '1' AND operator = ? GROUP BY date";
		$query = $this->db->query($sql,array(date('Y-m-d'),$user[0]->id));
		// echo $this->db->last_query(); exit;
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data->tunai;
		} else {
			return 0;
		}
	}
	public function get_stat_nontunai()
	{
		$user = $this->session->userdata('astrosession');
		$sql = "SELECT sum(penjualan.bayar) as nontunai FROM penjualan WHERE (`no-invoice`!='' OR NOT ISNULL(`no-invoice`)) AND date = ? AND cash = '0' AND operator = ? GROUP BY date";
		$query = $this->db->query($sql,array(date('Y-m-d'),$user[0]->id));
		// echo $this->db->last_query(); exit;
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data->nontunai;
		} else {
			return 0;
		}
	}
	public function get_stat_transaksi()
	{
		$user = $this->session->userdata('astrosession');
		$sql = "SELECT COUNT(penjualan.bayar) as transaksi FROM penjualan WHERE (`no-invoice`!='' OR NOT ISNULL(`no-invoice`)) AND date = ? AND operator = ? GROUP BY date";
		$query = $this->db->query($sql,array(date('Y-m-d'),$user[0]->id));
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data->transaksi;
		} else {
			return 0;
		}
	}

	public function get_pesanan($meja = '')
	{
		$sql = "SELECT * FROM penjualan WHERE lunas = '0' AND meja = '".$meja."'";
		$result = $this->db->query($sql);
		// echo $this->db->last_query();exit();
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function get_opt_menu()
	{
		$sql = "SELECT * FROM view_menu";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function update_meja($param)
	{
		$sql = "DELETE FROM penjualan WHERE meja = '".$param['baru']."' AND lunas = '0'";
		$result = $this->db->query($sql);
		$sql = "UPDATE penjualan SET meja = '".$param['baru']."' WHERE meja = '".$param['lama']."' AND lunas = '0'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function gabung_meja($param)
	{
		$sql = "UPDATE penjualan SET `meja-lain` ='".$param['baru']."' WHERE meja = '".$param['lama']."' AND lunas = '0'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function set_member($id, $id_member)
	{
		$sql = "UPDATE penjualan SET `id-cust` = $id_member WHERE id = $id";
		$result = $this->db->query($sql);
	}

	public function set_pesanan($param = '')
	{
		$sql = "INSERT INTO `penjualan` (`invoice-code`, `date`, `meja`) VALUES ('".$param['invoice']."',NOW(),'".$param['meja']."')";
		$result = $this->db->query($sql);
		$sql = "SELECT id FROM penjualan ORDER BY id DESC";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$hasil = $result->result();
			return $hasil[0]->id;
		}else{
			return FALSE;
		}
	}

	public function get_id_cashdraw($id)
	{
		$sql = "SELECT max(id) as id FROM atombizz_cashdraw WHERE employee_id = $id";
		$result = $this->db->query($sql);
		$total = $result->result();
		return $total[0]->id;
	}

	public function set_bayar($param = '')
	{
		$current = $this->db->get_where('penjualan', array('id' => $param['id']));
		$current = $current->result();
		$param['m-total'] = $current[0]->tagihan + $param['m-total'];
		$param['m-tagih'] = $current[0]->bayar + $param['m-tagih'];

		$data = array('invoice-code' => $param['invoice'],
					  'date' => date('Y-m-d'),
					  'cash' => $param['m-cash'],
					  'lunas' => $param['m-lunas'],
					  'tagihan' => $param['m-total'],
					  'discount' => $param['m-disc'],
					  'bayar' => $param['m-tagih'],
					  'no-invoice' => $param['no'],
					  'operator' => $param['id_operator'],
					  'note' => $param['m-bank'],
					  'id-cashdraw' => $this->get_id_cashdraw($param['id_operator']) );

		$this->db->where('id', $param['id']);
		$this->db->update('penjualan',$data);
		$total = $this->db->affected_rows();
		if($total >= 1){
			$where = array('id-penjualan'=>$param['id']);
			$data = $this->find('detil-penjualan',$where);
			$total_hpp = 0;
			foreach ($data->result() as $key => $value) {
				$total_hpp += $value->qty*$value->hpp;
			}

			$data_acc = array(
				'kode'=>'TR',
				'no_referensi'=>$param['invoice'],
				'tanggal'=>date('Y-m-d'),
				'keterangan'=>'Penjualan dengan no faktur '.$param['invoice'],
				'valid'=>'yes',
				'person'=>$param['id_operator']
			);

			//kas
			if($param['m-cash']==2){
				$debit = 0;
			} else $debit = $param['m-total'];
	        $kredit = 0;
	        if($param['m-cash']==0){
	        	$akun = '120000';
	        } else $akun = '110000';
	        $data_acc['no_akun'] = '110000';
	        $kas = $this->insert_acc($data_acc,$debit,$kredit,'');

	        //pajak
	  //       $pajak = ($param['m-total'] - ($param['m-total']*100/115))/15*10;
	  //       if($param['m-cash']==2){
			// 	$debit = 0;
			// } else $debit = $pajak;
	  //       $kredit = 0;
	  //       $data_acc['no_akun'] = '320000';
	  //       $penjualan = $this->insert_acc($data_acc,$debit,$kredit,'');

	        //service
	  //       $service = ($param['m-total'] - ($param['m-total']*100/115))/15*5;
	  //       if($param['m-cash']==2){
			// 	$debit = 0;
			// } else $debit = $service;
	  //       $debit = $service;
	  //       $kredit = 0;
	  //       $data_acc['no_akun'] = '330000';
	  //       $penjualan = $this->insert_acc($data_acc,$debit,$kredit,'');

	        //penjualan
	        if($param['m-cash']==2){
				$kredit = 0;
			} else $kredit = $param['m-total'];
	        $debit = 0;
	        $data_acc['no_akun'] = '210000';
	        $penjualan = $this->insert_acc($data_acc,$debit,$kredit,'');

			//hpp
	        $debit = $total_hpp;
	        $kredit = 0;
	        $data_acc['no_akun'] = '310000';
	        $hpp = $this->insert_acc($data_acc,$debit,$kredit,'');

	        if($kas && $penjualan && $hpp){
	        	return TRUE;
	        } else {
	        	return FALSE;
	        }
		}else{
			return FALSE;
		}
	}

	public function insert_acc($data_acc,$debit,$kredit,$faktur)
    {
        $sql = "INSERT INTO atombizz_accounting_buku_besar (kode,no_referensi,tanggal,keterangan,no_akun,debit,kredit,faktur,person,valid) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $insert = $this->db->query($sql,array($data_acc['kode'],$data_acc['no_referensi'],$data_acc['tanggal'],$data_acc['keterangan'],$data_acc['no_akun'],$debit,$kredit,$faktur,$data_acc['person'],$data_acc['valid']));
        return $insert;
    }

	public function add_pesanan($param = '')
	{
		$sql = "INSERT INTO `detil-penjualan` (`id-penjualan`, `id-menu`, `harga`, `qty`, total, hpp) 
				VALUES (".$param['id_penjualan'].",".$param['id_menu'].",".$param['harga'].",".$param['qty'].",".$param['qty']."*".$param['harga'].",".$param['hpp'].")";
		$result = $this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function set_revs_yes($param = '')
	{
		$sql = "UPDATE `reservasi` SET `status` = '1' WHERE `meja` = '$param'";
		$result = $this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function set_printed($param = '')
	{
		$sql = "UPDATE `detil-penjualan` SET `printed` = '1' WHERE `id-penjualan` = '$param'";
		$result = $this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function add_tamu($param = '')
	{
		$data = array('nama' => $param['m-nama'],
					  'tanggal' => date('Y-m-d'),
					  'alamat' => $param['m-alamat'],
					  'phone' => $param['m-telp'],
					  'meja' => $param['m-meja'],
					  'jam' => $param['m-jam'] );
		$this->db->insert('reservasi',$data);
		return $this->db->affected_rows();
	}

	public function add_member($param = '')
	{
		$this->db->insert('customer',$param);
		$sql = "SELECT MAX(`id`) as id FROM customer";
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result[0]->id;
	}

	public function no_invoice($param = '')
	{
		$sql = "SELECT MAX(`no-invoice`) as nomer FROM penjualan";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$hasil = $result->result();
			return $hasil[0]->nomer+1;
		}else{
			return 1;
		}
	}

	public function get_reserved()
	{
		$terisi1 = array('');
		$sql = "SELECT * FROM reservasi 
				WHERE TIME(NOW()) BETWEEN jam-10000 AND jam+1500 AND tanggal = DATE(NOW()) AND meja != 'Take away' AND status = '0'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$terisi = $result->result();
			foreach ($terisi as $key => $value) {
				array_push($terisi1, $value->meja);
			}
			$hasil['cek'] = $terisi1;
			$hasil['data'] = $terisi;
			return $terisi;
		}else{
			return FALSE;
		}
	}

	public function get_validator()
	{
		$sql = "SELECT uname, nama FROM `atombizz_employee` WHERE `compliment` = '1'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function valid_compliment($param = '')
	{
		$password = paramEncrypt($param['upass']);
		$where = array('uname' => $param['uname'],'upass' => $password);
		$query = $this->find('view_employee', $where , $field = NULL, $limit = NULL, $orderby = NULL, $join = FALSE, $like = FALSE);
		if($query==NULL){
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function get_resv_list()
	{
		$sql = "SELECT
					nama,
					phone,
					jam,
					meja
				FROM
					reservasi
				WHERE
					tanggal = date(NOW())
				AND (jam - 10000) >= TIME(NOW())
				AND meja != 'Take away'";
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function add_bayar_personal($id, $qty)
	{
		$sql = "SELECT * FROM `tmp-personal` WHERE id = $id";
		$result = $this->db->query($sql);
		$sql = "UPDATE `detil-penjualan` SET payoff = payoff + $qty WHERE id = $id";
		$this->db->query($sql);
		if ($result->num_rows() < 1) {
			$sql = "INSERT INTO `tmp-personal`				
					SELECT
						id,
						`id-penjualan`,
						`id-menu`,
						hpp,
						harga,
						$qty,
						harga * $qty
					FROM `detil-penjualan`
					WHERE `id` = $id
					";
			$result = $this->db->query($sql);
		} else {
			$sql = "UPDATE `tmp-personal` SET qty = qty + $qty WHERE id = $id";
			$result = $this->db->query($sql);
		}
	}

	public function remove_bayar_personal($id)
	{
		$sql = "SELECT qty FROM `tmp-personal` WHERE id = $id";
		$result = $this->db->query($sql);
		$result = $result->result();
		$qty = $result[0]->qty;
		$sql = "UPDATE `detil-penjualan` SET payoff = payoff - $qty WHERE id = $id";
		$result = $this->db->query($sql);
		$sql = "DELETE FROM `tmp-personal` WHERE id = $id";
		$result = $this->db->query($sql);
	}

	public function delete_tmp_personal($id)
	{
		$this->db->delete('tmp-personal', array('id-penjualan' => $id));
	}

	public function get_meja_tergabung($meja = '')
	{
		$tergabung = array('');
		if (empty($meja)) {
			$where = "WHERE lunas = '0'";
		} else {
			$where = "WHERE meja = '$meja' AND lunas = '0'";
		}
		$sql = "SELECT `meja-lain` AS meja FROM penjualan ".$where;
		$result = $this->db->query($sql);
		$total = $result->num_rows();
		if($total >= 1){
			$terisi = $result->result();
			foreach ($terisi as $key => $value) {
				if ($value->meja != 'false') {
					if ($value->meja != 'lone') {
						foreach (json_decode($value->meja) as $key => $values)
							array_push($tergabung, $values);
					}
				} 
			}
			return $tergabung;
		}else{
			return FALSE;
		}
	}

	public function take_stock($id='', $reference='', $operator='', $dept='')
	{
		$counter = 0;
		$data = array();
		$sql = $this->db->get_where('detil-penjualan', array('id-penjualan' => $id));
		$sql = $sql->result_array();
		foreach ($sql as $menu) {
			$idm = $menu['id-menu'];
			$qty = $menu['qty'];
			$qry = "SELECT
						menu_id,
						menu_code,
						menu_name,
						product_code,
						product_name,
						rak_code,
						SUM(qty) AS qty
					FROM
						view_komposisi
					WHERE
						menu_id = $idm
					GROUP BY
						product_code
					ORDER BY
						menu_code";
			$result = $this->db->query($qry);
			$result = $result->result();
			foreach ($result as $key => $value) {
				$data[$counter] = array(
					'date' => date('Y-m-d'),
					'status' => 'penjualan',
					'reference' => $reference,
					'in' => 0,
					'out' => $value->qty * $qty,
					'description' => 'Penjualan menu '.$value->menu_name.' dengan no referensi '.$reference,
					'userlog' => date('Y-m-d H:i:s'),
					'operator' => $operator,
					'rak_code' => $value->rak_code,
					'product_code' => $value->product_code,
					'dept' => $dept );
				$counter++;
			}
		}
		$counter = 0;
		// print_r($data);exit();
		$this->db->insert_batch('atombizz_warehouses_stok', $data);
	}

	public function update_to_member($param)
	{
		$this->db->where('id', $param['id']);
		unset($param['id']);
		$this->db->update('customer', $param);
	}
}