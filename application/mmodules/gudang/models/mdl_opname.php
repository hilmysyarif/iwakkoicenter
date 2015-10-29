<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_opname extends MY_Model {

	function faktur($param='')
	{
		$date = date('dmy',strtotime($param['date']));
		$kode = "PRINT";
		$faktur = $kode.'.'.$param['operator'].'.'.$date;
		return $faktur;
	}

	function faktur_opname($param=''){
		// $param = $this->input->post();
	 	$tgl = $param['date'];
	 	$kode_tgl = date('ymd',strtotime($tgl));
	 	$kode = 'STO';

	 	$basmalah = $this->config->item('astro');

	 	$urut = $this->max('atombizz_stock_opname', 'urut',array('date'=>$param['date']));
	 	$num = (!empty($urut[0]->urut)? $urut[0]->urut+1 : 1);

		$faktur = $kode.'.'.$basmalah['bas_code_dept'].'.'.$kode_tgl.'.'.complete_zero($num,2);
		$result = array('kode'=>$kode, 'faktur'=>$faktur, 'urut_faktur'=>$num, 'tanggal'=>$tgl);
		return $result;
	}

	function cek_temp($param='')
	{
		$sql = "SELECT DISTINCT reference,`date`,urut FROM atombizz_fast_stock_opname WHERE operator = ?";
		$data = $this->db->query($sql,array($param['operator']));
        $das = $data->row();
        // echo $this->db->last_query();exit;
		// foreach ($data->result_array() as $das) {
		// 	# code...
		// }
		$result = array('kode'=>'STO', 'faktur'=>$das->reference, 'urut_faktur'=>$das->urut, 'tanggal'=>$das->date);
		return $result;
	}

	function mencari($key){
        $sql = "SELECT * FROM view_warehouse_stok WHERE (product_code LIKE '%".$key."%' OR product_name LIKE '%".$key."%') LIMIT 1";
        $data = $this->db->query($sql);
        return $data;
    }
    function rak($key=''){
        $sql = "SELECT * FROM view_warehouse_stok WHERE rak_code = '".$key."' LIMIT 1";
        $data = $this->db->query($sql);
        // echo $this->db->last_query();exit;
        return $data;
    }

    function mencari_rak($key){
        $sql = "SELECT * FROM view_products WHERE code = ".$key." LIMIT 1";
        $query = $this->db->query($sql);
        // echo $this->db->last_query();exit;
        $opt = '<option value="">Pilih Produk</option>';
        foreach ($query->result() as $key => $value) {
            $opt .= '<option value="'.$value->gudang_code.'">'.$value->gudang_code.' '.$value->gudang_name.'</option>';
        }
            $opt .= '<option value="D-001">D-001 Rak Display</option>';
            $opt .= '<option value="R-001">R-001 Rak Racik</option>';
        return $opt;
    }

    function detail($key){
        $sql = "SELECT * FROM view_warehouse_stok WHERE product_code LIKE '%".$key."%' OR product_name LIKE '%".$key."%' LIMIT 0,1";
        $data = $this->db->query($sql);
        foreach ($data->result_array() as $data) {
            $result = $data;
        }

        return $result;
    }

    function get_stok($param=''){
        $sql = "SELECT * FROM view_warehouse_stok WHERE product_code = ? AND rak_code = ?";
        $data = $this->db->query($sql,array($param['produk'],$param['rak']));
        foreach ($data->result_array() as $data) {
            $result = $data;
        }
        // print_r($result);exit;
        return $result;
    }

    function detail_opname($key){
        $sql = "SELECT * FROM atombizz_fast_stock_opname WHERE id=$key";
        $data = $this->db->query($sql);
        foreach ($data->result_array() as $data) {
            $result = $data;
        }
        return $result;
    }

    function get_list_produk($key)
    {
    	$sql = "SELECT * FROM atombizz_tmp_print WHERE reference = ?";
    	$data = $this->db->query($sql,array($key));
    	$list = "";
    	$i = 1;
    	foreach ($data->result() as $key => $value) {
    		$list .= '
    			<tr>
					<td class="text-center" width="75px">'.$i.'</td>
					<td class="text-center" width="">'.$value->product_code.'</td>
					<td class="text-center" width="">'.$value->product_name.'</td>
                    <td class="text-center" width="">'.$value->rak_name.'</td>
					<td class="text-center" width="150px">
					<a onclick="delObj('.$value->id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="icon-remove"></i> delete</a>
					</td>
				</tr>
    		';
    		$i++;
    	}
    	if(empty($value)){
    		$list = '<tr><td colspan="5"><strong>Tidak ada data.</strong></td></tr>';
    	}
    	return $list;
    }

    function get_list_produk_opname($key)
    {
    	$sql = "SELECT * FROM atombizz_fast_stock_opname WHERE reference = ?";
    	$data = $this->db->query($sql,array($key));
    	$list = "";
    	$i = 1;
    	foreach ($data->result() as $key => $value) {
    		$list .= '
    			<tr>
					<td width="75px" class="text-center">'.$i.'</td>
					<td width="">'.$value->product_code.'</td>
					<td width="">'.$value->product_name.'</td>
					<td width="100px" class="text-center">'.$value->checking_qty.'</td>
					<td class="text-center" width="150px">
						<a onclick="actEdit('.$value->id.')" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning"><i class="icon-pencil"></i> Edit</a>
						<a onclick="actDel('.$value->id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="icon-remove"></i> Delete</a>
					</td>
				</tr>
    		';
    		$i++;
    	}
    	if(empty($value)){
    		$list = '<tr><td colspan="5"><strong>Tidak ada data.</strong></td></tr>';
    	}
    	return $list;
    }

    function get_all_products()
    {
    	$sql = "SELECT * FROM view_warehouse_stok";
    	$data = $this->db->query($sql);
    	return $data;
    }

    function opt_keyword()
    {
    	$sql = "SELECT * FROM view_warehouse_stok GROUP BY product_code";
    	$query = $this->db->query($sql);
    	$opt = '<option value="">Pilih Produk</option>';
    	foreach ($query->result() as $key => $value) {
    		$opt .= '<option value="'.$value->product_code.'">'.$value->product_code.' '.$value->product_name.'</option>';
    	}
    	return $opt;
    }

    function opt_rak($kode)
    {
    	$sql = "SELECT * FROM view_warehouse_stok WHERE product_code = '$kode' GROUP BY rak_code";
    	$query = $this->db->query($sql);
        
    	return $query;
    }

  //   function excel($key)
  //   {
		// // simple query
		// $query = "SELECT * FROM atombizz_tmp_print";
		// $result = $this->db->query($query);

		// $this->excel->getActiveSheet(0)->setTitle('List of Temporary Print');
		// $this->excel->setActiveSheetIndex(0);
		// // initialization title (don't know how auto generate title, sorry newbie :D)
		// $titles = $result->list_fields();
		// $col = 'A';
		// foreach ($titles as $cell) {
		// 	# write title
		// 	$this->excel->getActiveSheet(0)->setCellValue($col.'1',$cell);
		// 	$col++;
		// }
		// //start row
		// $rowNumber = 2;
		// foreach ($result->result_array() as $row) {
		// 	$col = 'A'; //start from column
		// 	//initialization value
		// 	$rows = array($row['id'],$row['reference'],$row['product_code'],$row['product_name'],$row['rak_code'],$row['rak_name'],$row['date'],$row['operator']); //this I create custom array
		// 	foreach ($rows as $cell) {
		// 		# write value
		// 		$this->excel->getActiveSheet(0)->setCellValue($col.$rowNumber,$cell);
		// 		$col++;
		// 	}
		// 	$rowNumber++;
		// }

		// // Save as an Excel BIFF (xls) file
		// $filename='atombizz_tmp_print.xlsx'; //save our workbook as this file name
		// header('Content-Type: application/vnd.ms-excel'); //mime type
		// header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		// header('Cache-Control: max-age=0'); //no cache     
		// //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		// //if you want to save it as .XLSX Excel 2007 format
		// $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		// //force user to download the Excel file without writing it to server's HD
		// $objWriter->save('php://output');
		// exit();
  //   }
    function get_valid_opname_data()
    {
        // $basmalah = $this->config->item('astro');
        $sql = "SELECT * FROM view_stock_opname WHERE ISNULL(approved_by) AND rule = 'confirm' ORDER by id ASC";
        $hasil = $this->db->query($sql);
        $data = $hasil->result();
        $list = "";
        if ($data != null) {
            $i = 1;
            foreach ($data as $das => $value) {
                $list .= '
                    <tr>
                        <td class="text-center">'.$i.'</td>
                        <td class="text-center">'.TanggalIndo($value->date).'</td>
                        <td class="text-center">'.$value->operator.'</td>
                        <td class="text-center">'.$value->reference.'</td>
                        <td class="text-center">
                            <a onclick="actDetail(this.id)" id="'.$value->reference.'" data-toggle="tooltip" title="Detail" class="btn btn-xs btn-primary"><i class="icon-search"></i> Detail Opname</a>
                        </td>
                    </tr>
                ';
                $i++;
            }
        }else{
            $list .= '
                <tr>
                    <td colspan="6">No data to view...</td>
                </tr>
            ';    
        }
        
        return $list;
    }
}	

/* End of file mdl_opname.php */
/* Location: ./application/modules/gudang/models/mdl_opname.php */