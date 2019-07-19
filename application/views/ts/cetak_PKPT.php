<html> 
<head>
	<script type="text/javascript" src="<?php echo base_url("dist/ui/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("dist/ui/jquery.easyui.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("dist/js/jquery.jQueryRotate.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("dist/js/moment-with-locales.js"); ?>"></script>
</head>
<body>
	<table border="0" cellpadding="1" style="width: 100%;"><tbody>
		<tr>    
		<td rowspan="2">
		<img style="width:200px; height: 110px; " src="<?php echo base_url("dist/ui/img/logo_header.png");?> ">		
		</td>> 
			<td style="font-family: CTime; font-size: 17; text-align: center;"><b>PERUSAHAAN DAERAH AIR MINUM KOTA MALANG
SATUAN PENGAWASAN INTERNAL</b>
			</td>
		</tr>
		<tr>
			<td style="font-family: CTime; font-size: 15; text-align: center;">
				Jl. Ters. Danau Sentani No 100 Telp (0341) 715103 (hunting)
			</td>
		</tr>
</tbody>
</table>
<hr />
<b style="font-style: CTime; font-size: 16;">
	SURAT TUGAS
</b>
<br>
<br>
	<table border="0" cellpadding="1" style=" width: 300px; font-style: CTime; font-size: 14;"><tbody>
	<tr>
		<td style="width: 90px;">
				Nomor
		</td>
	<td style="width: 10px; text-align: center;">
				:
		</td>
		<td style="width: 200px;">
			<?php echo $prog[0]->No_Tugas; ?>
		</td>
	</tr>
	<tr>
		<td style="width: 90px;">
				Nomor Obyek
		</td>
	<td style="width: 10px; text-align: center;">
				:
		</td>
		<td style="width: 200px;">
			<?php echo $prog[0]->Nomor; ?>
		</td>
	</tr>		
	</tbody>
	</table>
	<hr />
	<table border="0" cellpadding="1" style=" width: 100%; font-style: CTime; font-size: 14;"><tbody>
	<tr>
		<td>Kepala Satuan Pengawasan Internal PDAM Kota Malang memberi tugas kepada auditor Internal berikut ini :
		</td>
	</tr>
	<tr>
		<td>
			<table style="font-style: CTime; font-size: 14;">
			<td><?php foreach( $auditor as $audit){ ?>
				<tr>
					<td>
						<?php echo $audit->Nama; ?>
					</td>
					<td>
						<?php echo $audit->N_Jab; ?>
					</td>
				</tr>
			<?php } ?>
			</td>
			</table>
		</td>
	</tr>
		<tr>
		<td style="font-family: CTime; font-size: 14;">
		<b>
			Audit : 
		</b>
		</td>
	</tr>
	<tr>
		<td style="font-family: CTime; font-size: 14;">Untuk melakukan <?php echo $prog[0]->Nama_Jenis; ?> di bagian : <?php foreach( $bagian as $bag){ echo $bag->Nama_Bag.', '; }?>
		</td>
	</tr>
	<tr>
		<td>
		<b>
			Obyek Audit / Monev :	
		</b>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $prog[0]->Obyek; ?>
		</td>
	</tr>
	<tr>
		<td>
		<b>
			Ruang lingkup Audit / Monev :	
		</b>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $prog[0]->Ruang_Lingkup; ?>
		</td>
	</tr>
	<tr>
		<td>
		<b>
			Sasaran Audit / Monev :	
		</b>
		</td>
	</tr>
	<tr>
		<td>
			"ISI Sasaran Audit / Monev"	
		</td>
	</tr>
	<tr>
		<td>
		<b>
			Tujuan Audit / Monev :
		</b>
		</td>
	</tr>
	<tr>
		<td>
			"ISI Tujuan Audit / Monev"	
		</td>
	</tr>
	<tr>
		<td>
		<b>
			Periode yang di Audit / Monev :
		</b>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $prog[0]->Periode_Audit; ?>
		</td>
	</tr>
	<br>
	<br>
	<tr>
		<td>
		<b>
			Waktu Audit / Monev :
		</b>
		</td>
	</tr>
	<tr>
		<td>
			Mulai tanggal : <span id="lblmulai"></span> sampai dengan tanggal : <span id="lblselesai"></span> , selama : <?php echo $prog[0]->Waktu; ?> hari kerja	
		</td>
	</tr>
	<br>
	<br>
	<tr>
		<td>
			Demikian Surat Tugas ini dibuat untuk dapat dipergunakan sebagaimana mestinya
		</td>
	</tr>
	</tbody>
	</table>
	<br>
	<br>
	<br>
	<table align="right" border="0" cellpadding="1" style=" width: 200px; font-style: CTime; font-size: 14;">
		<tbody>
			<tr>
				<td style="text-align: center;">
					Malang, "Tanggal Dibuat" &nbsp; Kepala Satuan Pengawas Internal
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					<b><u>Drs. DODY VARUNA </u></b>&nbsp;<b>05890179</b>
				</td>
			</tr>
		</tbody>
	</table>
	<input type="hidden" id="mulai" value="<?php echo $prog[0]->Tgl_Mulai; ?>">
	<input type="hidden" id="selesai" value="<?php echo $prog[0]->Tgl_Selesai; ?>">
	<script type="text/javascript">
		$(function(){
			var mulai = $("#mulai").val();
			var selesai = $("#selesai").val();
			var mulai = moment(mulai, "YYYY-MM-DD","id");
			var selesai = moment(selesai, "YYYY-MM-DD","id");
			$('#lblmulai').text(mulai.format('LL'));
			$('#lblselesai').text(selesai.format('LL'));
		});
	</script>
</body>
</html>