<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formTambahST" class="easyui-form" method="post" data-options="">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<div class="easyui-tabs" style="width:100%;">
				<div title="AUDITOR" style="padding:10px;" id="petaTab">
					<table border="0" width="60%">
						<tr>
							<td>Pengawas</td>
							<td>:</td>
							<td>
								<select id="cbPengawas" class="easyui-combogrid" style="width:100%" data-options="
				                    idField: 'No_PKPT',
				                    textField: 'Nama',
				                    url: '<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',
				                    columns: [[
				                    	{field:'No_PKPT',title:'No PKPT'},
				                        {field:'NIP',title:'NIP'},
				                        {field:'Nama',title:'Nama Lengkap'},
				                        {field:'Index_Karyawan',title:'Index'}
				                    ]],
				                    fitColumns: true
				                	">
				            	</select>
							</td>
							<td><input style="width: 60px" class="easyui-textbox" id="txtPengawas" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipPengawas"></span></td>
						</tr>
						<tr>
							<td>Ketua</td>
							<td>:</td>
							<td>
								<select id="cbKetua" class="easyui-combogrid" style="width:100%" data-options="
				                    idField: 'No_PKPT',
				                    textField: 'Nama',
				                    url: '<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',
				                    columns: [[
				                    	{field:'No_PKPT',title:'No PKPT'},
				                        {field:'NIP',title:'NIP'},
				                        {field:'Nama',title:'Nama Lengkap'},
				                        {field:'Index_Karyawan',title:'Index'}
				                    ]],
				                    fitColumns: true
				                	">
				            	</select>
							</td>
							<td><input style="width: 60px" class="easyui-textbox" id="txtKetua" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipKetua"></span></td>
						</tr>
						<tr>
							<td>Anggota 1</td>
							<td>:</td>
							<td>
								<select id="cbAnggota1" class="easyui-combogrid" style="width:100%" data-options="
				                    idField: 'No_PKPT',
				                    textField: 'Nama',
				                    url: '<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',
				                    columns: [[
				                    	{field:'No_PKPT',title:'No PKPT'},
				                        {field:'NIP',title:'NIP'},
				                        {field:'Nama',title:'Nama Lengkap'},
				                        {field:'Index_Karyawan',title:'Index'}
				                    ]],
				                    fitColumns: true
				                	">
				            	</select>
							</td>
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota1" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota1"></span></td>
						</tr>
						<tr>
							<td>Anggota 2</td>
							<td>:</td>
							<td>
								<select id="cbAnggota2" class="easyui-combogrid" style="width:100%" data-options="
				                    idField: 'No_PKPT',
				                    textField: 'Nama',
				                    url: '<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',
				                    columns: [[
				                    	{field:'No_PKPT',title:'No PKPT'},
				                        {field:'NIP',title:'NIP'},
				                        {field:'Nama',title:'Nama Lengkap'},
				                        {field:'Index_Karyawan',title:'Index'}
				                    ]],
				                    fitColumns: true
				                	">
				            	</select>
							</td>
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota2" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota2"></span></td>
						</tr>
						<tr>
							<td>Anggota 3</td>
							<td>:</td>
							<td>
								<select id="cbAnggota3" class="easyui-combogrid" style="width:100%" data-options="
				                    idField: 'No_PKPT',
				                    textField: 'Nama',
				                    url: '<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',
				                    columns: [[
				                    	{field:'No_PKPT',title:'No PKPT'},
				                        {field:'NIP',title:'NIP'},
				                        {field:'Nama',title:'Nama Lengkap'},
				                        {field:'Index_Karyawan',title:'Index'}
				                    ]],
				                    fitColumns: true
				                	">
				            	</select>
							</td>
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota3" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota3"></span></td>
						</tr>
						<?php $anggota=1; ?>
					</table>
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="10%">Tanggal Mulai</td>
							<td><input class="easyui-datebox" style="width:30%; height:28px;" id="tgl_mulai" required=""></td>
						</tr>
						<tr>
							<td width="10%">Tanggal Selesai</td>
							<td><input class="easyui-datebox" style="width:30%; height:28px;" id="tgl_selesai" required=""></td>
						</tr>
						<tr>
							<td width="10%">Nomor Tugas</td>
							<td><input style="width: 230px" class="easyui-textbox" id="txtNoTugas" required=""></td>
						</tr>
					</table>
				</div>
			</div>
			<div style="text-align:center;margin-top:20px;">
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="validation()">SIMPAN</a>
				<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaBuatSuratTugas').window('close')">BATAL</a>
			</div>
		</div>
	</form>
</div>
<div id="piihBPB"></div>