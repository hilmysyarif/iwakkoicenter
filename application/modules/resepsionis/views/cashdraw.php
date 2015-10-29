<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php echo base_url('public'); ?>/invoice/invoice.css" type="text/css" charset="utf-8" />
		<script type="text/javascript" src="<?php echo base_url('public'); ?>/invoice/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url('public'); ?>/invoice/js/jquery.tablesorter.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#table").tablesorter({});
			});
		</script>
		
		<title>Invoice</title>
	</head>
	<body onload="window.print();">
		<!-- onload="window.print();" -->
		<div id="page">
		<!-- <p class="company-address">
		<?php echo $outlet['bas_apps_name'] ?> <br/>
		<?php echo $outlet['bas_branch_address'] ?><br/>
		<?php echo $outlet['bas_branch_domain'] ?>
		<?php echo $outlet['bas_branch_phone'] ?>
		</p> -->
		
		<p class="recipient-address">
		<strong>Kode Cashdraw : <?php echo $cashdraw->cashdraw_no; ?></strong><br />
		Operator : <?php echo $cashdraw->operator; ?><br />
		Tanggal : <?php echo TanggalIndo($cashdraw->date); ?><br/>
		Jam Operasional : <?php echo $cashdraw->check_in.' - '.$cashdraw->check_out; ?>
		</p>

		<!-- <p class="recipient-address">
		<span>Kas Awal:</span><span class="pull-right"><?php echo format_rupiah($cashdraw->start_cash); ?></span><br/>
		<span>Omset:</span><span class="pull-right"><?php echo format_rupiah($cashdraw->start_cash); ?></span><br/>
		<span>Total Kas:</span><span class="pull-right"><?php echo format_rupiah($cashdraw->start_cash); ?></span><br/>
		<br/>
		<span>Kas Akhir:</span><span class="pull-right"><?php echo format_rupiah($cashdraw->start_cash); ?></span><br/>
		<span>Kas Akhir:</span><span class="pull-right"><?php echo format_rupiah($cashdraw->start_cash); ?></span><br/>
		</p> -->
		<div class="total-due">
			<div class="total-heading"><p>Detail Kas</p></div>
			<table id="table" class="tablesorter" cellspacing="0">
				<tbody>
					<tr>
						<td align="right">Kas Awal : </td><td align="right"><?php echo format_rupiah($cashdraw->start_cash); ?></td>
					</tr>
					<tr>
						<td align="right">Omset : </td><td align="right"><?php echo format_rupiah($cashdraw->omset); ?></td>
					</tr>
					<tr>
						<td align="right">Total Kas : </td><td align="right"><?php echo format_rupiah($cashdraw->total_cash); ?></td>
					</tr>
					<tr>
						<td align="right">Kas Akhir : </td><td align="right"><?php echo format_rupiah($cashdraw->end_cash); ?></td>
					</tr>
					<?php
						$selisih = $cashdraw->total_cash - $cashdraw->end_cash;
						$status = ($selisih < 0)? 'Lebih' : 'Kurang';
					?>
					<tr>
						<td align="right"><?php echo $status ?> : </td><td align="right"><?php echo format_rupiah(abs($selisih)); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>
