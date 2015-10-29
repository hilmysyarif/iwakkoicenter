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
		<!--  -->
		<div id="page">
		<p class="company-address">
		<?php echo $outlet['bas_apps_name'] ?> <br/>
		<?php echo $outlet['bas_branch_address'] ?><br/>
		<?php echo $outlet['bas_branch_phone'] ?>
		</p>
		
		<p class="recipient-address">
		<strong>Invoice ID : <?php echo $selling->code; ?></strong><br />
		Operator : <?php echo $selling->operator_name; ?><br />
		Tanggal : <?php echo TanggalIndo($selling->date); ?><br/>
		Terapis : <?php echo $selling->therapist_name; ?>
		</p>
		<table id="table" class="tablesorter" cellspacing="0">
			<thead>
				<tr>
					<th>Menu</th>
					<th>Jml</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php echo $selling_items; ?>
			</tbody>
			<tfoot>
			<tr>
				<td colspan="2">Sub Total</td>
				<td align="right"><?php echo format_rupiah($selling->total); ?></td>
			</tr>
			</tfoot>
		</table>
		<div class="total-due">
			<div class="total-heading"><p>Detail Pembayaran</p></div>
			<table id="table" class="tablesorter" cellspacing="0">
				<tbody>
					<tr>
						<td align="right">SubTotal : </td><td align="right"><?php echo format_rupiah($selling->total); ?></td>
					</tr>
					<tr>
						<td align="right">Diskon : </td><td align="right"><?php echo $selling->discount.'%'; ?></td>
					</tr>
					<tr>
						<td align="right">Grand Total : </td><td align="right"><?php echo format_rupiah($selling->grand_total); ?></td>
					</tr>
					<tr>
						<td align="right">Bayar : </td><td align="right"><?php echo format_rupiah($selling->pay); ?></td>
					</tr>
					<tr>
						<td align="right">Kembali : </td><td align="right"><?php echo format_rupiah($selling->payback); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<hr />
		<div class="terms">
			Terima kasih atas kunjungan Anda.
		</div>
	</body>
</html>
