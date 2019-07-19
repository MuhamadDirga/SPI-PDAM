<html> 
<head>
	<script type="text/javascript" src="<?php echo base_url("dist/ui/jquery.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("dist/ui/jquery.easyui.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("dist/js/jquery.jQueryRotate.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("dist/js/moment-with-locales.js"); ?>"></script>
</head>
<body>
	<?php
	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	} ?>
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
	 <span style="font-style: CTime; font-size: 14;">Kepala Satuan Pengawasan Internal PDAM Kota Malang memberi tugas kepada auditor Internal berikut ini :</span> 
	 <table  border="1" cellpadding="1" style=" width: 350px; font-style: CTime; font-size: 14;">
	 <tbody>
	 <tr>
	 	<td>
	 		<b>NAMA</b> 
	 	</td>
	 	<td>
	 		<b>BAGIAN</b> 
	 	</td>
	 </tr>
	 <?php foreach( $auditor as $audit){ ?>
	 	<tr>
	 		<td>
	 			<?php echo $audit->Nama; ?>
	 		</td>
	 		<td>
	 			<?php echo $audit->N_Jab; ?>
	 		</td>
	 	</tr>
	 	<?php } ?>
	 </tbody>
	 </table>
	<table border="0" cellpadding="1" style=" width: 100%; font-style: CTime; font-size: 14;"><tbody>
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
			<table style="font-style: CTime; font-size: 14;">
			<td><?php foreach( $sasaran as $sas){ ?>
				<tr>
					<td>
						<?php echo $sas->Urut_Sasaran; ?>
					</td>
					<td>
						<?php echo $sas->Isi_Sasaran; ?>
					</td>
				</tr>
			<?php } ?>
			</td>
			</table>
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
			<table style="font-style: CTime; font-size: 14;">
			<td><?php foreach( $tujuan as $tuj){ ?>
				<tr>
					<td>
						<?php echo $tuj->Urut_Tujuan; ?>
					</td>
					<td>
						<?php echo $tuj->Isi_Tujuan; ?>
					</td>
				</tr>
			<?php } ?>
			</td>
			</table>
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
			Mulai tanggal : <?php echo tgl_indo($prog[0]->Tgl_Mulai); ?> sampai dengan tanggal : <?php echo tgl_indo($prog[0]->Tgl_Selesai); ?> , selama : <?php echo $prog[0]->Waktu; ?> hari kerja	
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
</body>
</html>