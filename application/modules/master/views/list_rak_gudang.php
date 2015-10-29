<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            Menu Karyawan
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo base_url();?>dashboard">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="<?php echo base_url($this->module); ?>">Master Data</a><i class="icon-angle-right"></i></li>
            <li><a href="">Rak</a></li>
            <li class="pull-right">
                <div style="display:block; background-color:#271000 ; color:#fff; margin-right:-30px; padding:10px; top:-10px; position:relative">
                    <i class="icon-calendar"></i>
                    <span><?php echo tanggalIndo(date('Y-m-d'));?></span>
                </div>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <div class="tiles" style="padding:10px; margin-right:0px; background-color:none;height:155px">
            <div class="tile bg-green" onclick="window.location='<?php echo base_url($this->cname); ?>/tambah'">
                <div class="tile-body">
                    <i class="icon-plus-sign"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Tambah
                    </div>
                    <div class="number">
                        <!-- (T) -->
                    </div>
                </div>
            </div>
            <div class="tile bg-blue" onclick="window.location='<?php echo base_url($this->cname); ?>/data'">
                <div class="tile-body">
                    <i class="icon-list"></i>
                </div>
                <div class="tile-object">
                    <div class="name">
                        Daftar Rak
                    </div>
                    <div class="number">
                        <!-- (D) -->
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>&nbsp;Daftar Rak</div>
            </div>
            <div class="portlet-body">
                <span id="flash_message"></span>
                <table id="example-datatable" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="50px" class="text-center">No</th>
									<th width="150px">Kode</th>
									<th width="200px">Nama</th>
									<th width="">Keterangan</th>
									<th width="180px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
          </div>
      </div>
      <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
<div id="modal-confirm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:grey">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="color:#fff;">Konfirmasi Hapus Data</h4>
            </div>
            <div class="modal-body">
                <span style="font-weight:bold; font-size:14pt">Apakah anda yakin akan menghapus data Karyawan tersebut ?</span>
                <input id="id-delete" type="hidden">
            </div>
            <div class="modal-footer" style="background-color:#eee">
                <button class="btn green" data-dismiss="modal" aria-hidden="true">Tidak</button>
                <button onclick="delData()" class="btn red">Ya</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
	
	$("#example-datatable").dataTable({
		fnDrawCallback: function ( oSettings ) {
			/* Need to redo the counters if filtered or sorted */
			if ( oSettings.bSorted || oSettings.bFiltered )
			{
				for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
				{
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
				}
			}
		},
		aoColumnDefs: [
			{ "bSortable": false, "aTargets": [ 0,4 ] }
		],
		// aoColumnDefs:[{
		// 	bSortable:!1,
		// 	aTargets:[4]
		// }],
		bProcessing:true,
		bServerSide:true,
		sAjaxSource: "<?php echo base_url($this->module); ?>/_datatable/rak_gudang/",
		iDisplayLength:15,
		aLengthMenu:[[15,30,50,-1],[15,30,50,"All"]],
		"fnServerData": function(sSource, aoData, fnCallback){
			console.log(aoData);
		    $.ajax(
		       	{
		       	  'dataType': 'json',
		       	  'type'  : 'POST',
		       	  'url'    : sSource,
		       	  'data'  : aoData,
		       	  'success' : fnCallback
		       	}
		    );
		} 
	}),
	$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")
});
function actDelete(Object){
	// alert(Object);
	alertify.confirm("Apakah anda yakin untuk menghapus item ini?", function (e) {
		if (e) {
			var url = "<?php echo base_url($this->cname); ?>/delete_rak";
			var form_data = {
				id: Object
			};
			$.ajax({
				type: "POST",
				url: url,
				data: form_data,
				success: function(msg)
				{
					// alert(msg);
					data = msg.split("|");
					if(data[0]==1){
						$("#example-datatable").dataTable().fnDraw();
					}
					$("#flash_message").show();
					$("#flash_message").html(data[1]);
					setTimeout(function() {location.reload();}, 5000);
				}
			});
			return false;
		} else {
			
		}
	});
	return false;
}
</script>