<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_mutasi extends MY_Model {

    //tambah_pembelian
    public function count_total()
    {
        $month = date('n');
        $sql = "SELECT SUM(total) AS total FROM atombizz_distribution WHERE MONTH(`date`) = ? GROUP BY MONTH(`date`)";
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
        $kode = 'FD';

        $urut = $this->max('atombizz_distribution', 'urut',array('date'=>$param['date']));
        $num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

        $faktur = $kode.'.'.$kode_tgl.'.'.complete_zero($num,2);
        $result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>TanggalIndo($tgl));
        return $result;
    }

    function get_list_produk($reference){
        $this->db->select('atombizz_distribution_tmp.*,atombizz_converter.nama as nama_satuan');
        $this->db->where('reference', $reference);
        $this->db->order_by('id', 'asc');
        $this->db->join('atombizz_converter', 'atombizz_converter.id = atombizz_distribution_tmp.unit', 'left');
        $data = $this->db->get('atombizz_distribution_tmp');
        $list = '';
        $i = 1;
        foreach ($data->result() as $das) {
            $list .= '
                <tr>
                    <td class="text-center">'.$i.'</td>
                    <td align="center">'.$das->product_code.'</td>
                    <td align="center">'.$das->product_name.'</td>
                    <td align="center">'.$das->qty_dikirim.'</td>
                    <td align="center">'.$das->nama_satuan.'</td>
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

    // function get_supplier($reference){
    //     $sql = "SELECT * FROM atombizz_distribution_tmp WHERE reference='$reference'";
    //     $data = $this->db->query($sql);
    //     $supplier = array();
    //     foreach ($data->result() as $das) {
    //         $supplier['code'] = $das->supplier_code;
    //         $supplier['name'] = $das->supplier_name;
    //     }
    //     return ($supplier!='') ? $supplier:null;
    // }

    function get_total_retur_out($reference){
        $sql = "SELECT SUM(sub_total) AS total FROM atombizz_distribution_tmp WHERE reference='$reference'";
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
        $sql = "SELECT * FROM atombizz_distribution_tmp WHERE id=$key";
        $data = $this->db->query($sql);
        foreach ($data->result_array() as $data) {
            $result = $data;
        }
        return $result;
    }

    function cek_temp($param)
    {
        $sql = "SELECT DISTINCT reference,`date`,penerima,urut FROM atombizz_distribution_tmp WHERE operator = ?";
        $data = $this->db->query($sql,array($param['operator']));
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
        $sql = "SELECT * FROM atombizz_distribution_detail WHERE reference='$reference' order by id asc";
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
        $sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? AND rak_status = 'gudang'";
        $data = $this->db->query($sql,array($param['product_code']));
        // echo $this->db->last_query();exit;
        foreach ($data->result_array() as $das) {
            $qty = $das['saldo'];
        }

        return (isset($qty)) ? $qty : 0 ;
    }

    function get_rak_gudang($key)
    {
        $sql = "SELECT * FROM atombizz_product WHERE code = ?";
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

    public function get_distribusi($value='')
    {
        $this->db->where('id', $value);
        $query = $this->db->get('atombizz_distribution');
        return $query->row();
    }

    public function get_distribusi_detail($value='')
    {
        $this->db->select('atombizz_distribution_items.*,atombizz_converter.nama as nama_satuan');
        $this->db->where('reference_no', $value);
        $this->db->join('atombizz_converter', 'atombizz_converter.id = atombizz_distribution_items.unit', 'left');
        $query = $this->db->get('atombizz_distribution_items');
        return $query->result();
    }

}

/* End of file mdl_retur.php */
/* Location: ./application/modules/gudang/models/mdl_retur.php */