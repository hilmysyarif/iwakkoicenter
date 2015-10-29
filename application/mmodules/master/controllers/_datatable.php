<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _datatable extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	} 

	public function index()
	{
		redirect('master');
	}

    public function karyawan()
    {   
        $this->datatables->select('id,uname,nama,jabatan,telp,status')
        ->add_column('Actions', get_detail_edit_delete('$1'),'id')
        ->edit_column('status', '$1', 'cek_status(status)')
        ->from('view_employee')
        ->where('jabatan !=','superuser');
        
        echo $this->datatables->generate();
    }

    public function paramedik()
    {   
        $this->datatables->select('id,phone,name')
        ->where('status','member')
        ->from('customer');
        
        echo $this->datatables->generate();
    }

    public function penggajian()
    {   
        $this->datatables->select('id,no_slip,name,gaji,bonus,casbon,total,tanggal')
        ->edit_currency('gaji','$1','gaji')
        ->edit_currency('bonus','$1','bonus')
        ->edit_currency('casbon','$1','casbon')
        ->edit_currency('total','$1','total')
        ->edit_date('tanggal','$1','tanggal')
        ->from('view_penggajian');
        
        echo $this->datatables->generate();
    }

    public function list_karyawan()
    {   
        $this->datatables->select('id,code,name,jabatan,address,phone')
        ->add_column('Actions', get_gaji_detail_edit_delete('$1'),'id')
        ->from('atombizz_karyawan');
        
        echo $this->datatables->generate();
    }

    public function daftar_posisi()
    {   
        $this->datatables->select('id,group,information')
        ->add_column('Actions', get_edit_delete('$1'),'id')
        ->from('atombizz_employee_position')
        ->where('group !=','Super Admin');
        
        echo $this->datatables->generate();
    }

	public function daftar_produk()
    {   
        $this->datatables->select('id,code,name,unit,min')
        ->add_column('Actions', get_edit_delete('$1'),'id')
        ->where('type','reguler')
        ->from('atombizz_product');
        
        echo $this->datatables->generate();
    }

    public function daftar_meja()
    {   
        $this->datatables->select('id,code,nama,qty')
        ->add_column('Actions', get_edit_delete('$1'),'id')
        ->from('meja');
        
        echo $this->datatables->generate();
    }

    // public function daftar_menu()
    // {   
    //     $this->datatables->select('id,nama2,code,nama,hpp,harga')
    //     ->add_column('Actions', get_edit_delete('$1'),'id')
    //     ->from('menu')
    //     ->join('kategori-menu','menu.kategori = kategori-menu.id','left');
        
    //     echo $this->datatables->generate();
    // }

    public function daftar_harga_produk()
    {
        $this->datatables->select('id,code,name,price1,price,discount,tax')
        ->add_column('Actions', get_edit_harga('$1'),'id')
        ->edit_currency('price1', '$1', 'price1')
        ->edit_currency('price', '$1', 'price')
        ->from('view_products');
        
        echo $this->datatables->generate();
    }
    
    public function rak()
    {   
        //show category with edit and delete button use ajax
        $this->datatables->select('id,kode,nama,keterangan')
        ->add_column('Actions', get_edit_delete_ajax('$1'),'id')
        ->from('atombizz_rack');
        
        echo $this->datatables->generate();
    }

    public function suplier()
    {   
        $this->datatables->select('id,code,name,payment,registered,status')
        ->add_column('Actions', get_detail_edit_delete('$1'),'id')
        ->edit_column('status', '$1', 'cek_status(status)')
        ->edit_date('registered', '$1', 'registered')
        ->from('atombizz_suppliers');
        
        echo $this->datatables->generate();
    }

    public function master_akun()
    {   
        $this->datatables->select('id,code,name,position,keterangan')
        // ->edit_column('name', space_data('$1,$2'),'name,space')
        // ->unset_column('space')
        ->add_column('Actions', get_edit_delete('$1'),'id')
        ->from('atombizz_accounting_master_akun');

        echo $this->datatables->generate();
    }

    public function daftar_menu()
    {   
        $this->datatables->select('id,code,nama,hpp,harga,kategori')
        ->add_column('Actions', get_edit_delete('$1'),'id')
        ->edit_currency('hpp', '$1', 'hpp')
        ->edit_currency('harga', '$1', 'harga')
        ->from('view_menu');
        
        echo $this->datatables->generate();
    }

    public function list_konversi()
    {   
        $this->datatables->select('abc.id,ap.name as product_name,abc.name,ac1.nama as satuan_nama,abc.qty_convertion,ac2.nama')
        ->unset_column('ac2.nama')
        ->edit_column('abc.qty_convertion','$1 $2','abc.qty_convertion,ac2.nama')
        ->add_column('Actions', get_edit_ajax_delete_ajax('$1'),'abc.id')
        ->join('atombizz_product ap','ap.code=abc.product_code','left')
        ->join('atombizz_converter ac1', 'ac1.id=abc.satuan','left')
        ->join('atombizz_converter ac2', 'ac2.id=abc.satuan_convertion','left')
        ->from('atombizz_brand_converter abc');
        
        echo $this->datatables->generate();
    }

    public function list_inventaris()
    {
        $this->datatables->select('id,category,code,name,keterangan')
        ->edit_column('category','$1','get_status_inventaris(category)')
        ->add_column('Actions', get_edit_ajax_delete_ajax('$1'),'id')
        ->from('atombizz_inventaris');
        
        echo $this->datatables->generate();
    }
    
}
