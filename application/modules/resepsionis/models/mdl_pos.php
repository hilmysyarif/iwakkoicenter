<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pos extends MY_Model {

	public function temp_transaction($param=''){
	  	$invoice = $param['inv'];
	  	$cashdraw = $param['kas'];
        $urut1='';
	  	$sql = "SELECT * FROM atombizz_tmp_detail_jual WHERE cashdraw = ? AND invoice = ? AND status = ?";
        $hasil = $this->db->query($sql,array($cashdraw,$invoice,'temporary'));

        $tableData='';
        $totalPembelian=0;
        $totalDiskon=0;
        $totalPajak=0;
        $i=0;
        foreach ($hasil->result_array() as $row) {
            $i++;
            $id = $row['id'];
            $invoice = $row['invoice'];
            $code = $row['code'];
            $brg = $row['item'];
            $jml = $row['qty'];
            $harga = $row['price'];
            $subtotal = $row['subtotal'];
            $diskon = $row['discount'];
            $subdiskon = $row['subdiscount'];
            $nom_diskon = $row['discount_nominal'];
            $nom_pajak = $row['tax_nominal'];
            $operator = $row['operator'];
            $urut = $row['urut'];
            $totalPembelian += $subdiskon;
            $totalDiskon += $nom_diskon;
            $totalPajak += $nom_pajak;
            $tableData=$tableData.'<tr style="border:1px solid #afafaf;padding:10px 0;">
                <!--<td><label class="checkbox"><input type="checkbox" name="option'.$id.'" id="'.$id.'">'.$i.'</label></td>-->
                <td align="center">'.$i.'</td>
                <td>'.$brg.'</td>
                <td align="center">'.$jml.'</td>
                <td align="right">'.format_rupiah($harga).'</td>
                <td align="center">'.$diskon.'</td>
                <td align="right">'.format_rupiah($subtotal).'</td>
                <td width="175px" id="r'.$i.'c1" data-id="'.$id.'" data-aksi="edit" data-nama="'.$brg.'" align="center">
                    <div class="btn-group btn-group-xs">
                        <a class="btn btn-default" title="" data-toggle="tooltip" onclick="editqty('.$id.');" href="javascript:void(0)" data-original-title="Edit">
                            <i class="icon-edit"></i>
                            Ubah Qty
                        </a>
                    </div>
                    <div class="btn-group btn-group-xs">
                        <a class="btn btn-default" title="" data-toggle="tooltip" onclick="del('.$id.');" href="javascript:void(0)" data-original-title="Delete">
                            <i class="icon-remove"></i>
                            Hapus
                        </a>
                    </div>
                </td>
            </tr>';
            
        }

        echo $tableData.'|'.$totalPembelian.'|'.$totalDiskon.'|'.$i.'|'.format_rupiah($totalPembelian).'|'.format_rupiah($totalDiskon).'|'.$urut.'|'.format_rupiah($totalPajak);
	}

    public function temp_suspended($param=''){
        $kas = $param['kas'];
        $tableData = '';
        $sql = "SELECT * FROM atombizz_tmp_detail_jual WHERE cashdraw = ? AND status = 'suspended' GROUP BY invoice";
        $data = $this->db->query($sql, $kas);
        $a = 1;
        foreach ($data->result() as $das) {
            $data_produk = $this->find('atombizz_tmp_detail_jual',array('cashdraw'=>$kas,'status'=>'suspended','invoice'=>$das->invoice));
            $i = 1;
            $num = $data_produk->num_rows();
            $produknya = '';
            foreach ($data_produk->result() as $value) {
                if($i<$num){
                    $produknya .= $value->item.',';
                } else {
                    $produknya .= $value->item;
                }
                $i++;
            }
            $tableData .= '<tr style="border:1px solid #afafaf;padding:10px 0;">
                <td align="center">'.$a.'</td>
                <td >'.$das->invoice.'</td>
                <td>'.$produknya.'</td>
                <td align="center">
                    <div class="btn-group btn-group-xs">
                        <a onClick="proses_suspend_back(this.id)" id = "proses_suspend_back'.$a.'" invoice = "'.$das->invoice.'" class="btn btn-default" title="" data-toggle="tooltip" data-original-title="Process to payment">
                            <i class="icon-edit"></i>
                            Process to payment
                        </a>
                    </div>
                </td>
            </tr>';
            $a++;
        }
        $tableNull = '<tr style="border:1px solid #afafaf;padding:10px 0;">
                <td align="center" colspan="4">Tidak ada data pesanan.</td>
            </tr>';
        return ($tableData!='') ? $tableData:$tableNull;
    }

    public function suspen_back($invoice='')
    {
        //get information suspended data
        $sql = "SELECT * FROM atombizz_tmp_detail_jual WHERE status = 'suspended' AND invoice = ?";
        $result = $this->db->query($sql,$invoice);
        $data = $result->result();
        // print_r($data);exit;
        //initialize membersession
        $this->session->unset_userdata('membersession');
        if($data[0]->namacustomer=='reguler'){
            $this->session->set_userdata('membersession','reguler');
            // $this->session->userdata('membersession','reguler');
        } else {
            $sql = "SELECT * FROM atombizz_customers WHERE code = ?";
            $result = $this->db->query($sql,$data[0]->idcustomer);
            // echo $this->db->last_query();exit;
            $get_member = $result->result();
            $this->session->set_userdata('membersession',$get_member);
        }
        $sql = "UPDATE atombizz_tmp_detail_jual SET status = 'temporary' WHERE status = 'suspended' AND invoice = ?";
        $hasil = $this->db->query($sql,$invoice);
        $exec =  $this->db->affected_rows();
        if ($exec >= 0) {
            //cek data customer
            return "Data pembelian untuk invoice ".$invoice." BERHASIL dikembalikan ke proses pembelian";
        }else{
            return "Data pembelian untuk invoice ".$invoice." GAGAL dikembalikan ke proses pembelian";
        }
    }

	public function request_invoice($param=''){
		$user = $this->session->userdata('astrosession');
		$nota=$param['kas'];
		$astro = $this->config->item('astro');

		$urut_selling = $this->max('atombizz_selling','urut',array('cashdraw_no'=>$nota));
		// echo $this->db->last_query();exit;
		$urut_tmp = $this->max('atombizz_tmp_detail_jual','urut',array('cashdraw'=>$nota));
		$num_selling = (!empty($urut_selling[0]->urut)? $urut_selling[0]->urut+1 : 1);
		$num_tmp = (!empty($urut_tmp[0]->urut)? $urut_tmp[0]->urut+1 : 1);

		if($num_selling>$num_tmp){
			$urut = $num_selling;
		} else {
			$urut = $num_tmp;
		}

		$kode = 'INV';
		// $cabang = $astro['bas_code_dept'];
		$username = $user[0]->uname;
		$tgl = date('ymd');
		$reference = $kode.'.'.$username.'.'.$tgl.'.'.complete_zero($urut,4);

		return $reference.'|'.$urut;
	}

    public function total_transaksi($param){
        $sql = "SELECT COUNT(id) as total FROM atombizz_selling WHERE cashdraw_no = ?";
        $hasil = $this->db->query($sql,$param['kas']);
        foreach ($hasil->result_array() as $row) {
            $total = $row['total'];
        }
        if($total == null || $total <= 0){
            echo "0";
        }else{
            echo $total;
        }
    }

	function get_produk_display(){
        $sql = "SELECT * FROM view_warehouse_stok WHERE rak_status = 'gudang' AND saldo > 0 AND price1 IS NOT NULL";
        $data = $this->db->query($sql);
        
        return $data;
    }

    function get_code_member(){
        $sql = "SELECT * FROM atombizz_customers";
        $data = $this->db->query($sql);
        
        return $data;
    }

    function get_satuan($id){
        $sql = "SELECT satuan FROM atombizz_product_specification WHERE code='$id'";
        $data = $this->db->query($sql);
        
        return $data;
    }

    function get_pelanggan(){
        $sql = "SELECT * FROM atombizz_customers";
        $data = $this->db->query($sql);
        
        return $data;
    }

    public function cek_stok_display($barcode)
    {
        $sql = "SELECT * FROM view_warehouse_stok WHERE `product_code`='$barcode' AND rak_status='gudang'";
        $result = $this->db->query($sql);
        foreach ($result->result() as $das) {
            # code...
        }
        return $das;
    }

    function get_produk_racik(){
        $sql = "SELECT * FROM view_warehouse_stok WHERE rak_code='R-001' AND saldo > 0 AND price1 IS NOT NULL";
        $data = $this->db->query($sql);
        
        return $data;
    }

    public function cek_stok_racik($barcode)
    {
        $sql = "SELECT * FROM view_warehouse_stok WHERE `product_code`='$barcode' AND rak_code='R-001'";
        $result = $this->db->query($sql);
        foreach ($result->result() as $das) {
            # code...
        }
        return $das;
    }

    public function temp_count_check($param=''){
        $ident = $param['invoice'];

        $sql = "SELECT COUNT(id) as total from atombizz_tmp_detail_jual where invoice='$ident'";
        $result = $this->db->query($sql);
        $fetch = $result->result();
        $total = $fetch[0]->total;
        
        if(@$total == null || @$total <= 0){
            echo "0";
        }else{
            echo $total;
        }
    }

    public function suspend_transaction($param=''){
        $invoice=$param['invoice'];

        $sql = "UPDATE atombizz_tmp_detail_jual set status = 'suspended' WHERE invoice = ?";
        $hasil = $this->db->query($sql,array($invoice));

        if($hasil){
            $this->session->unset_userdata('membersession');
            echo "1";
        }else{
            echo "0";
        }
    }

    public function cancel_transaction($param=''){
        $invoice=$param['invoice'];
        $hasil = $this->delete('atombizz_tmp_detail_jual',array('invoice'=>$invoice));

        // print_r($hasil);exit;
        if($hasil>0){
            $this->session->unset_userdata('membersession');
            echo "1";
        }else{
            echo "0";
        }
    }

    public function add_transaction($param=''){
        $user = $this->session->userdata('astrosession');
        $nota=$param['inv'];
        $cash=$param['cash'];
        $barcode=$param['barcode'];
        $qty=$param['qty'];
        $urut=$param['urut'];

        $userid=$user[0]->id;
        $operator=$user[0]->nama;

        $sqlCek = "SELECT COUNT(cashdraw) as total from atombizz_tmp_detail_jual where code='$barcode' AND invoice='$nota' AND cashdraw='$cash'";
        $hasilCek = $this->db->query($sqlCek);
        foreach ($hasilCek->result_array() as $row1) {
            $total = $row1['total'];
        }

        if($total >= 1){
            echo "2";
        }else if($total == 0){
            $sql = "SELECT * from view_products where code='$barcode'";
            $hasil = $this->db->query($sql);

            foreach ($hasil->result_array() as $row) {
                $id = $row['id'];
                $name = $row['name'];
                $price = $row['price1'];
                $disc = $row['discount'];
                $tax = $row['tax'];

                $H_param['date'] = date('Y-m-d');
                $H_param['product_code'] = $row['code'];
                $cost = $this->get_hpp($H_param);
            }
            
            $member =  $this->session->userdata('membersession');
            
            
                
            $idcustomer = '1';
            $namacustomer = $member;

            $subtotal = $qty * $price;

            if($disc > 0){
                $diskon = ($disc * $subtotal) / 100;
            }else if($disc <= 0){
                $diskon = 0;
            }

            if($tax > 0){
                $pajak = ($tax * $subtotal) / 100;
            }else if($tax <= 0){
                $pajak = 0;
            }

            $subdiscount = $subtotal-$diskon+$pajak;
            $insert = array('cashdraw'=>$cash,
                            'invoice'=>$nota,
                            'orderdate'=> date('Y-m-d H:i:s'),
                            'status'=>'temporary',
                            'code'=>$barcode,
                            'item'=>$name,
                            'qty'=>$qty,
                            'cost'=>$cost,
                            'price'=>$price,
                            'subtotal'=>$subtotal,
                            'userid'=>$userid,
                            'operator'=>$operator,
                            'discount'=>$disc,
                            'discount_nominal'=>$diskon,
                            'tax'=>$tax,
                            'tax_nominal'=>$pajak,
                            'subdiscount'=>$subdiscount,
                            'urut'=>$urut,
                            'idcustomer'=>$idcustomer,
                            'namacustomer'=>$namacustomer);

            // $tax = ($subdiscount * 10) / 100;
            $hasil = $this->write('atombizz_tmp_detail_jual',$insert);
            // echo $this->db->last_query();exit;
            if($hasil){
                echo "1";
            }else{
                echo "0";
            }
        }else{
            echo "3";
        }
    }


    public function add_racik($param=''){
        $user = $this->session->userdata('astrosession');
        $nota=$param['inv'];
        $cash=$param['cash'];
        $barcode=$param['barcode'];
        $qty=$param['qty'];
        $satuan_id=$param['satuan_id'];
        $satuan=$param['satuan'];
        $urut=$param['urut'];

        $userid=$user[0]->id;
        $operator=$user[0]->nama;

        $sqlCek = "SELECT COUNT(cashdraw) as total from atombizz_tmp_jual_racik where code='$barcode' AND invoice='$nota' AND cashdraw='$cash'";
        $hasilCek = $this->db->query($sqlCek);
        foreach ($hasilCek->result_array() as $row1) {
            $total = $row1['total'];
        }

        if($total >= 1){
            echo "2";
        }else if($total == 0){
            $sql = "SELECT * from view_products where code='$barcode'";
            $hasil = $this->db->query($sql);

            foreach ($hasil->result_array() as $row) {
                $id = $row['id'];
                $name = $row['name'];
                $price1 = $row['price1'];
                $price2 = $row['price2'];
                $price3 = $row['price3'];
                if (@$row['harga1'] == NULL) {
                    $harga1 = $row['price1'];
                } else {
                    $harga1 = $row['harga1'];    
                }
                if (@$row['harga2'] == NULL) {
                    $harga2 = $row['price2'];
                } else {
                    $harga2 = $row['harga2'];    
                }
                if (@$row['harga3'] == NULL) {
                    $harga3 = $row['price3'];
                } else {
                    $harga3 = $row['harga3'];    
                }
                $disc = $row['discount'];
                $data_qty = json_decode($row['qty']);

                $H_param['date'] = date('Y-m-d');
                $H_param['product_code'] = $row['code'];
                $cost = $this->get_hpp($H_param);
            }
            
            $member =  $this->session->userdata('membersession');
            // print_r($member);exit;
            if ($member == 'reguler') {
                // if ($disc > 0 ) {
                //  $price = $price1;
                // }
                if ($satuan_id==0) {
                    $price = $price1;
                } else if ($satuan_id==1) {
                    $price = $price2;
                } else if ($satuan_id==2) {
                    $price = $price3;
                } else {
                    echo "3";
                }
             //     else{
             //         if($qty >= 1 && $qty <= $data_qty[0]){
                //          $price = $price1;
                //      }else if($qty >= $data_qty[0] + 1 && $qty <= $data_qty[1]){
                //          $price = $price2;
                //      }else if($qty >= $data_qty[2]){
                //          $price = $price3;
                //      }   
                // }
                $idcustomer = '1';
                $namacustomer = $member;
            } else if (is_array($member)) {
                // if ($disc > 0 ) {
                //  $price = $price1;
                // }
                if ($satuan_id==0) {
                    $price = $harga1;
                } else if ($satuan_id==1) {
                    $price = $harga2;
                } else if ($satuan_id==2) {
                    $price = $harga3;
                } else {
                    echo "3";
                }
             //     else{
             //         if($qty >= 1 && $qty <= $data_qty[0]){
                //          $price = $price1;
                //      }else if($qty >= $data_qty[0] + 1 && $qty <= $data_qty[1]){
                //          $price = $price2;
                //      }else if($qty >= $data_qty[2]){
                //          $price = $price3;
                //      }   
                // }
                $idcustomer = $member[0]->code;
                $namacustomer = $member[0]->name;
            }
          //    else{
          //        if ($disc > 0 ) {
             //         $price = $price2;
             //     }else{
             //         if($qty >= 1 && $qty <= $data_qty[0]){
                //          $price = $price2;
                //      }else if($qty >= $data_qty[0] + 1 && $qty <= $data_qty[1]){
                //          $price = $price2;
                //      }else if($qty >= $data_qty[2]){
                //          $price = $price3;
                //      }   
                // }
                // $idcustomer = $member[0]->code;
                // $namacustomer = $member[0]->name;
          //    }
            
            $subtotal = $qty * $price;

            if($disc > 0){
                $diskon = ($disc * $subtotal) / 100;
                $subdiscount = $subtotal - $diskon;
            }else if($disc <= 0){
                $subdiscount = $subtotal;
                $diskon = 0;
            }

            // $tax = ($subdiscount * 10) / 100;

            $sql1 = "INSERT INTO atombizz_tmp_jual_racik (cashdraw,invoice,orderdate,status,code,item,qty,cost,price,subtotal,userid,operator,discount,discount_nominal,subdiscount,urut,idcustomer,namacustomer,satuan_id,satuan) VALUES (?,?,now(),'temporary',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $hasil1 = $this->db->query($sql1,array($cash,$nota,$barcode,$name,$qty,$cost,$price,$subtotal,$userid,$operator,$disc,$diskon,$subdiscount,$urut,$idcustomer,$namacustomer,$satuan_id,$satuan));
            // echo $this->db->last_query();exit;
            if($hasil1){
                echo "1";
            }else{
                echo "0";
            }
        }else{
            echo "3";
        }
    }

    public function get_hpp($param='')
    {
        $sql = "SELECT * FROM view_product_price WHERE `date` <= ? AND `code` = ? ORDER BY `date` DESC LIMIT 0,1";
        // echo $this->db->last_query();exit;
        $hasil = $this->db->query($sql,array($param['date'],$param['product_code']));
        foreach ($hasil->result() as $key => $value) {
            $hpp = $value->harga;
        }
        return $hpp;
    }

    public function insert_racik($kode){
        @$this->delete('atombizz_tmp_detail_jual',array('invoice'=>$kode,'code'=>'racik'));

        $sql = "SELECT
                    Sum(
                        atombizz_tmp_jual_racik.cost
                    ) AS cost,
                    Sum(
                        atombizz_tmp_jual_racik.price
                    ) AS price,
                    Sum(
                        atombizz_tmp_jual_racik.subtotal
                    ) AS subtotal,
                    Sum(
                        atombizz_tmp_jual_racik.subdiscount
                    ) AS subdiscount,
                    atombizz_tmp_jual_racik.cashdraw,
                    atombizz_tmp_jual_racik.invoice,
                    atombizz_tmp_jual_racik.orderdate,
                    atombizz_tmp_jual_racik.userid,
                    atombizz_tmp_jual_racik.operator,
                    atombizz_tmp_jual_racik.discount,
                    atombizz_tmp_jual_racik.discount_nominal,
                    atombizz_tmp_jual_racik.urut,
                    atombizz_tmp_jual_racik.idcustomer,
                    atombizz_tmp_jual_racik.namacustomer
                FROM
                    atombizz_tmp_jual_racik
                WHERE
                    invoice='$kode'";
        $hasil = $this->db->query($sql);
        $data=$hasil->result_array();

        $arr = array(
            'cashdraw' => $data[0]['cashdraw'],
            'invoice' => $data[0]['invoice'],
            'orderdate' => $data[0]['orderdate'],
            'status' => 'temporary',
            'code' => 'racik',
            'item' => 'racik',
            'qty' => 1,
            'cost' => $data[0]['cost'],
            'price' => $data[0]['subtotal'],
            'subtotal' => $data[0]['subtotal'],
            'userid' => $data[0]['userid'],
            'operator' => $data[0]['operator'],
            'discount' => $data[0]['discount'],
            'discount_nominal' => $data[0]['discount_nominal'],
            'subdiscount' => $data[0]['subtotal'],
            'urut' => $data[0]['urut'],
            'idcustomer' => $data[0]['idcustomer'],
            'namacustomer' => $data[0]['namacustomer'],
            'satuan' => 'racik');
        $ins = $this->write('atombizz_tmp_detail_jual',$arr);
        if ($ins) {
            $rep = $this->replace('atombizz_tmp_jual_racik',array('status' => 'racik'),array('invoice' => $data[0]['invoice']));
            if ($rep) {
                echo '1';
            } else {
                echo '999';
            }
        } else {
            echo '999';
        }
    }

    public function cek_qty_satuan($kode,$id){
        $sql = "SELECT qty FROM atombizz_product_specification WHERE code ='$kode'";
        $query = $this->db->query($sql);
        $data = $query->result();
        $data = $data[0]->qty;
        $qty = json_decode($data);
        $qty = $qty[$id];
        return $qty;
    }

    public function payment_transaction($param=''){
        $user = $this->session->userdata('astrosession');
        // print_r($param);exit;
        $basmalah = $this->config->item('astro');

        $kas = $param['kas'];
        $inv = $param['invoice'];
        $tgl = date('Y-m-d');
        if ($param['pelanggan'] == ''){
            $customer ='reguler';
            $idcustomer = '1';
            $namacustomer = 'reguler';
        } else {
            $idcustomer = $param['pelanggan'];
            $namacustomer = $param['nama_pelanggan'];
        }
        
        
        $bayar = $param['cara'];
        $total = $param['total'];
        $diskon = $param['diskon'];
        $pajak = $param['pajak'];
        $dibayar = $param['bayar'];
        $kembali = $param['kembali'];
        $urut = $param['urut'];
        $userlog=date('Y-m-d h:i:s');
        $userid=$user[0]->id;
        $operator=$user[0]->uname;

        $numinv = $this->total('atombizz_selling',array('cashdraw_no'=>$kas,'invoice_no'=>$inv));
        // echo $this->db->last_query();exit;
        if($numinv >= 1){
            echo '3';
        }else{
            $arr_selling = array(
                'cashdraw_no'=>$kas,
                'invoice_no'=>$inv,
                'customer_id'=>$idcustomer,
                'customer_name'=>$namacustomer,
                'date'=>$tgl,
                'status'=>$bayar,
                'total'=>$total,
                'pay'=>$dibayar,
                'pay_back'=>$kembali,
                'tax'=>$pajak,
                'inv_discount'=>$diskon,
                'user_id'=>$userid,
                'user_name'=>$operator,
                'urut'=>$urut,
                'pengiriman'=>$param['pengiriman']
            );
            $hasilSelling = $this->write('atombizz_selling',$arr_selling);
            if($hasilSelling){
                $total_hpp = $total_tax = $total_disc = $total_penjualan = 0;
                $where = array('invoice'=>$inv,'cashdraw'=>$kas);
                $data = $this->find('atombizz_tmp_detail_jual',$where);
                if($data){
                    $num = $data->num_rows();
                    $keterangan = "Pengurangan stok atas penjualan dengan faktur ".$inv;
                    foreach ($data->result_array() as $das) {
                        $arr_items[] = array(
                            'cashdraw'=>$das['cashdraw'],
                            'invoice'=>$das['invoice'],
                            'product_code'=>$das['code'],
                            'product_name'=>$das['item'],
                            'qty'=>$das['qty'],
                            'price'=>$das['price'],
                            'subtotal'=>$das['subtotal'],
                            'discount_val'=>$das['discount_nominal'],
                            'discount'=>$das['discount'],
                            'discount_sub'=>$das['subdiscount'],
                            'tax'=>$das['tax'],
                            'tax_val'=>$das['tax_nominal'],
                            'hpp'=>$das['cost']
                        );

                        $rak_code = $this->get_rak($das['code']);
                        $qty = $das['qty'];
                        $arr_out[] = array(
                            'date'=>$tgl,
                            'status'=>'penjualan',
                            'reference'=>$inv,
                            'in'=>0,
                            'out'=>$qty,
                            'description'=>$keterangan,
                            'userlog'=>$userlog,
                            'operator'=>$operator,
                            'rak_code'=>$rak_code,
                            'product_code'=>$das['code'],
                            'dept'=>$basmalah['bas_code_dept']
                        );
                        $arr_product[] = $das['code'];
                        $total_hpp += $das['cost'];
                        $total_tax += $das['tax_nominal'];
                        $total_disc += $das['discount_nominal'];
                        $total_penjualan += $das['subdiscount'];    
                    }
                }

                $save_items = $this->write_batch('atombizz_selling_items',$arr_items);
                if($save_items){
                    $save_stok = $this->write_batch('atombizz_warehouses_stok',$arr_out);
                    if($save_stok){
                        $update_spec = $this->update_spec($arr_product,$tgl);
                        if($update_spec){
                            $data_acc['kode'] = 'PJN';
                            $data_acc['no_referensi'] = $inv;
                            $data_acc['tanggal'] = $tgl;
                            $data_acc['keterangan'] = 'Penjualan dengan referensi faktur '.$inv;
                            $data_acc['dept'] = $basmalah['bas_code_dept'];
                            $data_acc['person'] = $idcustomer;
                            $data_acc['valid'] = 'yes';

                            $nominal['hpp'] = $total_hpp;
                            $nominal['discount'] = $total_disc;
                            $nominal['tax'] = $total_tax;
                            $nominal['total_penjualan'] = $total_penjualan;
                            $nominal['invoice'] = $inv;
                            if($bayar=='cash'){
                                $acc_jurnal = $this->acc_transaction_cash($data_acc,$nominal);
                            } else if($bayar=='credit'){
                                $nominal['hutang']= $param['hutang'];
                                $nominal['bayar'] = $dibayar;
                                $nominal['jatuh_tempo'] = $param['jatuh_tempo'];
                                $acc_jurnal = $this->acc_transaction_credit($data_acc,$nominal);
                            }
                            if($acc_jurnal){
                                echo "1";
                            } else {
                                echo "0";
                            }
                        } else {
                            echo "0";
                        }
                    } else {
                        echo "0";
                    }
                } else {
                    echo "0";
                }
            }else{
                echo "2";
            }
        }
    }

    function get_pcs($kode,$id){
        $sql = "SELECT qty FROM atombizz_product_specification WHERE code = '$kode'";
        $data = $this->db->query($sql);
        $result = $data->result_array();
        $pcs = $result[0]['qty'];
        $pcs = json_decode($pcs);
        return $pcs[$id];
    }

    public function acc_transaction_cash($data_acc='',$nominal)
    {
        //kas
        $debit = $nominal['total_penjualan'];
        $kredit = 0;
        $data_acc['no_akun'] = '110000';
        $kas = $this->insert_acc($data_acc,$debit,$kredit,'');

        //penjualan
        $kredit = $nominal['total_penjualan'];
        $debit = 0;
        $data_acc['no_akun'] = '210000';
        $penjualan = $this->insert_acc($data_acc,$debit,$kredit,'');

        if($kas && $penjualan){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function acc_transaction_credit($data_acc='',$nominal)
    {
        $arr_ptg = array('code' => $data_acc['no_referensi'],
                        'jatuh_tempo' => $nominal['jatuh_tempo'],
                        'status' => '0' );
        $numinv = $this->total('atombizz_piutang',array('code'=>$data_acc['person']));
        if($numinv >= 1) {
            $ins_ptg = $this->replace('atombizz_piutang',$arr_ptg,array('code'=>$data_acc['person']));
        } else {
            $ins_ptg = $this->write('atombizz_piutang',$arr_ptg);            
        }
        if ($ins_ptg) {
            //kas
            $debit = $nominal['bayar'];
            $kredit = 0;
            $data_acc['no_akun'] = '110000';
            $kas = $this->insert_acc($data_acc,$debit,$kredit,'');

            //penjualan
            $kredit = $nominal['total_penjualan'];
            $debit = 0;
            $data_acc['no_akun'] = '220000';
            $penjualan = $this->insert_acc($data_acc,$debit,$kredit,'');

            //piutang
            $data_acc['kode'] = 'PTG';
            $debit = $nominal['hutang'];
            $kredit = 0;
            $data_acc['no_akun'] = '140000';
            $piutang = $this->insert_acc($data_acc,$debit,$kredit,$nominal['invoice']);

            if($kas && $penjualan && $piutang){
                return TRUE;
            } else {
                return FALSE;
            }
        }        
    }

    public function insert_acc($data_acc,$debit,$kredit,$faktur)
    {
        $sql = "INSERT INTO atombizz_accounting_buku_besar (kode,no_referensi,tanggal,keterangan,no_akun,debit,kredit,faktur,dept,person,valid) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $insert = $this->db->query($sql,array($data_acc['kode'],$data_acc['no_referensi'],$data_acc['tanggal'],$data_acc['keterangan'],$data_acc['no_akun'],$debit,$kredit,$faktur,$data_acc['dept'],$data_acc['person'],$data_acc['valid']));
        return $insert;
    }

    public function move_transaction($param=''){
        $invoice = $param['invoice'];
        
        $sql = "delete from atombizz_tmp_detail_jual where invoice='$invoice'";
        $hasil = $this->db->query($sql);
            
        if($hasil){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function view_detail_temp($param=''){
        $ident = $param['ident'];
        $sql = "SELECT * from atombizz_tmp_detail_jual where id='$ident'";
        $hasil = $this->db->query($sql);
        foreach ($hasil->result_array() as $row) {
        }
        echo json_encode($row);
    }

    public function view_detail_temp1($param=''){
        $ident = $param['ident'];
        $sql = "SELECT * from atombizz_tmp_jual_racik where id='$ident'";
        $hasil = $this->db->query($sql);
        foreach ($hasil->result_array() as $row) {
        }
        echo json_encode($row);
    }

    public function edit_transaction($param='')
    {
        // print_r($param);exit;

        $qty = $param['qty'];

        $sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? AND rak_status = 'gudang'";
        $result = $this->db->query($sql,$param['code']);
        // echo $this->db->last_query();exit;
        $stok = $result->result();
        if($stok[0]->saldo >= $param['qty']){
            
            $data['qty'] = $param['qty'];
            $data['subtotal'] = $param['subtotal'];
            $data['subdiscount'] = $param['subdiscount'];
            $data['discount_nominal'] = $param['discount_nominal'];
            $data['tax_nominal'] = $param['tax_nominal'];


            $id = $param['id'];
            $this->db->where('id',$id);
            $hasil = $this->db->update('atombizz_tmp_detail_jual',$data);
            if($hasil){
                echo "1";
            }else{
                echo "0";
            }
        } else {
            echo "3";
        }
    }

    public function edit_transaction1($param='')
    {
        // print_r($param);exit;

        $qty = $param['qty'];

        $sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? AND rak_code = 'R-001'";
        $result = $this->db->query($sql,$param['code']);
        // echo $this->db->last_query();exit;
        $stok = $result->result();
        if($stok[0]->saldo >= $param['qty']){
            
            $data['qty'] = $param['qty'];
            $data['subtotal'] = $param['subtotal'];
            $data['subdiscount'] = $param['subdiscount'];


            $id = $param['id'];
            $this->db->where('id',$id);
            $hasil = $this->db->update('atombizz_tmp_jual_racik',$data);
            if($hasil){
                echo "1";
            }else{
                echo "0";
            }
        } else {
            echo "3";
        }
    }

    public function print_invoice($param='')
    {
        $sql = "SELECT s.*, i.* FROM atombizz_selling s, atombizz_selling_items i
                WHERE s.invoice_no = i.invoice AND s.cashdraw_no = i.cashdraw 
                AND i.invoice = ? AND i.cashdraw = ? ";
        $hasil = $this->db->query($sql,array($param['invoice'],$param['kas']));

        return $hasil->result();
    }

    public function delete_temp($param){
        $ident = $param['ident'];
        $nota = $param['nota'];
        $num = $this->total('atombizz_tmp_detail_jual',array('id'=>$ident,'code'=>'racik'));

        // print_r($num);exit;
        if ($num>=1) {
            $this->delete('atombizz_tmp_jual_racik',array('status'=>'racik','invoice'=>$nota));
        }
        
        $ident=$param['ident'];
        $sql = "DELETE FROM atombizz_tmp_detail_jual WHERE id='$ident'";
        $hasil = $this->db->query($sql);
        if($hasil){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function delete_temp1($param=''){
        $ident=$param['ident'];
        $sql = "DELETE FROM atombizz_tmp_jual_racik WHERE id='$ident'";
        $hasil = $this->db->query($sql);
        if($hasil){
            echo "1";
        }else{
            echo "0";
        }
    }

    public function update_spec($arr,$tgl)
    {
        $this->db->where_in('code',$arr);
        $update = $this->db->update('atombizz_product_specification',array('date_active'=>date('Y-m-d H:i:s')));
        return $update;
    }

    public function get_rak($value='')
    {
        $sql = "SELECT * FROM view_products WHERE code = ?";
        $data = $this->db->query($sql,$value);
        foreach ($data->result_array() as $das) {
            
        }
        return $das['gudang_code'];
    }

    public function get_selling($param='')
    {
        $sql = "SELECT * FROM view_penjualan WHERE code = ?";
        $query = $this->db->query($sql,$param);
        $num = $query->num_rows();

        return ($num > 0) ? $query->row() : '';
    }

    public function get_selling_detail($param='')
    {
        $sql = "SELECT * FROM atombizz_selling_items WHERE selling_code = ?";
        $query = $this->db->query($sql,$param);
        $num = $query->num_rows();
        $list = '';
        if($num > 0){
            foreach ($query->result() as $key => $value) {
                $subtotal = ($value->qty * $value->price) - $value->potongan;
                $list .= '
                <tr>
                    <td>'.$value->facility_name.'</td>
                    <td>'.$value->qty.'</td>
                    <td align="right">'.format_rupiah($subtotal).'</td>
                </tr>
                ';
            }
        }
        return $list;
    }

    public function get_price($param='')
    {
        if($param['type'] == 'facility')
            $table = 'atombizz_facility';
        else if($param['type'] == 'packet')
            $table = 'atombizz_packet';

        // print_r($param);exit;

        $where = array('code'=>$param['code']);
        $query = $this->find($table,$where);
        $result = $query->row();
        $price = json_decode($result->price);
        $qty = $param['qty'];

        // print_r($price);exit;

        // if($param['type'] == 'facility'){
        //     if($result->type=='S'){
        //         $harga = $qty*$price[0];
        //     } else if($result->type=='P'){
        //         if($qty >= 12){
        //             $sisQty = 0;
        //             $sisQty = $qty%12;
        //             $qty1 = ($qty-$sisQty)/12;
        //             $harga1 = $qty1*$price[2];
        //             $qty = $sisQty;
        //         }
        //         if($qty >= 6){
        //             $sisQty = 0;
        //             $sisQty = $qty%6;
        //             $qty2 = ($qty-$sisQty)/6;
        //             $harga2 = $qty2*$price[1];
        //             $qty = $sisQty;
        //         }
        //         if($qty < 6 && $qty > 0){
        //             $harga3 = $qty*$price[0];
        //         }
        //         $harga = $harga1 + $harga2 + $harga3;
        //     }
        // } else if($param['type'] == 'packet'){
        //     $harga = $qty*$price[0];
        // }

        if($param['type'] == 'facility'){
            if($result->type=='S'){
                $harga = $price[0];
            } else if($result->type=='P'){
                // if($qty >= 12){
                //     $harga = $price[2];
                // }
                // if($qty >= 6){
                //     $harga = $price[1];
                // }
                // if($qty < 6 && $qty > 0){
                //     $harga = $price[0];
                // }
                $harga = $price[0];
            }
        } else if($param['type'] == 'packet'){
            $harga = $price[0];
        }

        // echo $harga;exit;

        // if($param['member']=='yes'){
        //     $harga = $harga - (($harga*$result->discount)*0.01);
        // }

        $data['price'] = $harga;
        $data['price_show'] = format_rupiah($harga);

        return json_encode($data);
        
    }
}

/* End of file mdl_pos.php */
/* Location: ./application/modules/resepsionis/models/mdl_pos.php */