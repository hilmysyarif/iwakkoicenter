<?php 
/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */
function get_edit_ajax_delete_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actEdit('.$id.')" data-toggle="tooltip" title="Edit" class="btn purple btn-xs btn-default"><i class="icon-pencil"></i> Edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Hapus" class="btn red btn-xs btn-default"><i class="icon-remove"></i> Hapus</a>
    </div>
    ';
    
    return $html;
}
function get_personal_delete_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actPersonal('.$id.')" data-toggle="tooltip" title="Personal" class="btn purple btn-xs btn-default"><i class="icon-user"></i> Personal</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Hapus" class="btn red btn-xs btn-default"><i class="icon-remove"></i> Hapus</a>
    </div>
    ';
    
    return $html;
}

function get_detail_edit_delete($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="detail/'.$id.'" data-toggle="tooltip" title="Detail" class="btn btn-xs green"><i class="icon-search"></i> detail</a>
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a>
    </div>
    ';
    
    return $html;
}

function get_detail($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="detail/'.$id.'" data-toggle="tooltip" title="Detail" class="btn btn-xs green"><i class="icon-search"></i> detail</a>
    </div>
    ';
    
    return $html;
}

function get_detail_retur($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="detail_retur/'.$id.'" data-toggle="tooltip" title="Detail" class="btn btn-xs green"><i class="icon-search"></i> detail</a>
    </div>
    ';
    
    return $html;
}


function get_bayar($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="bayar/'.$id.'" data-toggle="tooltip" title="Bayar" class="btn btn-xs blue"><i class="icon-dollar"></i> bayar</a>
    </div>
    ';
    
    return $html;
}

function get_transaksi($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="pos/?uid='.$id.'" data-toggle="tooltip" title="POS Data" class="btn btn-xs green"><i class="icon-search"></i> POS</a>
    </div>
    ';
    
    return $html;
}

function get_validasi($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actValidasi('.$id.')" data-toggle="tooltip" title="Validasi" class="btn btn-xs yellow"><i class="icon-file-text"></i> Validasi</a>
    </div>
    ';
    
    return $html;
}

function get_berangkat($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actPrint('.$id.')" data-toggle="tooltip" title="Print Surat Jalan" class="btn btn-xs yellow"><i class="icon-file-text"></i> Print Surat Jalan</a>
        <a onclick="actBerangkat('.$id.')" data-toggle="tooltip" title="Sudah Terkirim" class="btn btn-xs green"><i class="icon-truck"></i> Sudah Terkirim</a>
    </div>
    ';
    
    return $html;
}

function get_edit_delete($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a>
    </div>
    ';
    
    return $html;
}

function get_edit_delete_produksi($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="edit/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a>
    </div>
    ';
    
    return $html;
}

function get_edit_delete_hutang($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="bayar/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs blue"><i class="icon-money"></i> bayar</a>
    </div>
    ';
    
    return $html;
}

function get_edit_delete_add($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a>
        <a href="tambah_layanan/'.$id.'" data-toggle="tooltip" title="Tambah Layanan" class="btn btn-xs green"><i class="icon-plus"> tambah layanan</i></a>
    </div>
    ';
    
    return $html;
}

function get_edit_delete_ajax($id)
{
    // master (kategori,department,subkategori)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn green btn-xs btn-default"><i class="icon-pencil"></i>Edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn red btn-xs btn-default"><i class="icon-remove"></i>Delete</a>
    </div>
    ';
    
    return $html;
}

function get_detail_validasi_ajax($id)
{
    // master (kategori,department,subkategori)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actDetail('.$id.')" data-toggle="tooltip" title="Detail" class="btn green btn-xs btn-default"><i class="icon-pencil"></i>Detail</a>
        <a onclick="actValidasi('.$id.')" data-toggle="tooltip" title="Validasi" class="btn red btn-xs btn-default"><i class="icon-check"></i>Validasi</a>
    </div>
    ';
    
    return $html;
}

function get_delete_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Hapus" class="btn red btn-xs btn-default"><i class="icon-remove"></i> Hapus</a>
    </div>
    ';
    
    return $html;
}

function get_remove_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actRemove('.$id.')" data-toggle="tooltip" title="Hapus" class="btn red btn-xs btn-default"><i class="icon-remove"></i> Hapus</a>
    </div>
    ';
    
    return $html;
}

function get_edit_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actEdit('.$id.')" data-toggle="tooltip" title="Edit Setup" class="btn btn-xs btn-default"><i class="icon-pencil"></i> Edit Max</a>
    </div>
    ';
    
    return $html;
}

function get_edit($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
    </div>
    ';
    
    return $html;
}

function get_gaji_detail_edit_delete($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actGaji('.$id.')" data-toggle="tooltip" title="Gaji" class="btn btn-xs purple"><i class="icon-dollar"> gaji</i></a>
        <a href="detail/'.$id.'" data-toggle="tooltip" title="Detail" class="btn btn-xs green"><i class="icon-search"></i> detail</a>
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a>
    </div>
    ';
    
    return $html;
}


function get_edit_harga($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah_harga/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
    </div>
    ';
    
    return $html;
}

function get_edit_print($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a href="print_salary/'.$id.'" data-toggle="tooltip" title="Print" class="btn btn-xs blue"><i class="icon-print"></i> print</a>
    </div>
    ';
    
    return $html;
}

function get_button_blended($id)
{
    $ci =& get_instance();

    $html = '
   <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i> edit</a>
        <a onclick="actUnblend('.$id.')" data-toggle="tooltip" title="unblended" class="btn btn-xs btn-default"><i class="icon-remove"></i> unblended</a>
    </div>
    ';
    
    return $html;
}

function get_detail_edit_print($id)
{
    $ci =& get_instance();
    // $key = paramEncrypt($id);

    $html = '
    <div class="btn-group">
        <a href="edit/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
        <a href="print_faktur/'.$id.'" target="_blank" data-toggle="tooltip" title="Print" class="btn btn-xs btn-default"><i class="icon-print"></i> Print</a>
    </div>  
    ';
    
    return $html;
}

function get_distribusi($id,$status)
{
    // master (kategori,department,subkategori)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
    ';
    $html .= '
        <a onclick="actDetail('.$id.')" data-toggle="tooltip" title="Detail" class="btn green btn-xs btn-default"><i class="icon-search"></i>Detail</a>
    ';
    if($status == 'valid'){
    $html .= '
        <a href="proses/'.$id.'" data-toggle="tooltip" title="Proses" class="btn red btn-xs btn-default"><i class="icon-edit"></i> Proses</a>
    ';  
    }
    $html .= '
    </div>
    ';
    
    return $html;
}

function get_detail_ajax($id)
{
    // master (kategori,department,subkategori)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actDetail('.$id.')" data-toggle="tooltip" title="Detail" class="btn green btn-xs btn-default"><i class="icon-pencil"></i>Detail</a>
    </div>
    ';
    
    return $html;
}

function tambah_stok($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Tambah" class="btn btn-xs btn-info"><i class="icon-plus"></i> Tambah Stok</a>
    </div>
    ';
    
    return $html;
}

function total($quantity,$hpp)
{
    $ci =& get_instance();
    // $key = paramEncrypt($id);

    $total = $quantity * $hpp;
    return format_rupiah($total);
}

function split_json($json)
{
    $array = json_decode($json);
    $result = $array[0];
    $i=1;
    while (@$array[$i]) {
        if( $i%4 == 0)
            $result .= ', </br>'.$array[$i];
        else
            $result .= ', '.$array[$i];
        $i++;
    }
    return $result;
}

function wrap($ket)
{
    $array = explode(" ",$ket);
    $result = $array[0];
    $i=1;
    while (@$array[$i]) {
        if( $i%4 == 0)
            $result .= ' </br>'.$array[$i];
        else
            $result .= ' '.$array[$i];
        $i++;
    }
    return $result;
}

function cek_produk($id)
{
    if($id=='P')
        return '<span class="label label-primary">PRODUK</span>';
    else 
        return '<span class="label label-success">LAYANAN</span>';
}

function cek_status($id)
{
    if($id=='1')
        return '<span class="label label-success">AKTIF</span>';
    else 
        return '<span class="label label-danger">NON AKTIF</span>';
}


function cek_gender($id)
{
    if($id=='M')
        return '<span class="label label-success">Laki-laki</span>';
    else 
        return '<span class="label label-primary">Perempuan</span>';
}

function cek_member($id)
{
    if($id=='yes')
        return '<span class="label label-success">member</span>';
    else 
        return '<span class="label label-danger">non member</span>';
}

function get_status_inventaris($id)
{
    if($id=='BP')
        return '<span class="label label-success">Barang Pokok</span>';
    else 
        return '<span class="label label-primary">Barang Inventaris</span>';
}

function edit_price($id)
{
    $price = json_decode($id);
    return 'harga : '.format_rupiah($price[0]);
    // return 'harga 1: '.format_rupiah($price[0]).' | harga 2: '.format_rupiah($price[1]).' | harga 3: '.format_rupiah($price[2]);
    // if($id=='yes')
    //     return '<span class="label label-success">member</span>';
    // else 
    //     return '<span class="label label-danger">non member</span>';
}

function edit_hp($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="input_harga_produk/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
    </div>
    ';
    
    return $html;
}

function edit_hp2($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="input_harga_paket/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
    </div>
    ';
    
    return $html;
}

function get_edit_delete_print($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs yellow"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs red"><i class="icon-remove"> delete</i></a>
        <a href="cetak/'.$id.'" data-toggle="tooltip" title="Delete" class="btn btn-xs green"><i class="icon-remove"> delete</i></a>
    </div>
    ';
    
    return $html;
}