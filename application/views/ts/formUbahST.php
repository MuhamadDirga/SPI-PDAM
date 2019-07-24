<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formUbahST" class="easyui-form" method="post" data-options="">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<table width="100%" border="0" style="margin:10px">
				<tr>
					<td width="7%">Nomor : </td>
					<td><input style="width: 230px" class="easyui-textbox" id="txtNomor" value="<?php echo $nomor; ?>" readonly></td>
				</tr>
			</table>
			<div class="easyui-tabs" style="width:100%;">
				<div title="SURAT TUGAS" style="padding:10px">
    				<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">Periode Audit</td>
							<td><input class="easyui-textbox" id="periodeU" style="width:80%;" required=""></td>
						</tr>
					</table>
				</div>
				
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
							<td></td>
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
							<td></td>
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
							<td></td>
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
						<tr>
							<td>Anggota 4</td>
							<td>:</td>
							<td>
								<select id="cbAnggota4" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota4" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota4"></span></td>
						</tr>
						<tr>
							<td>Anggota 5</td>
							<td>:</td>
							<td>
								<select id="cbAnggota5" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota5" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota5"></span></td>
						</tr>
						<tr>
							<td>Anggota 6</td>
							<td>:</td>
							<td>
								<select id="cbAnggota6" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota6" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota6"></span></td>
						</tr>
						<tr>
							<td>Anggota 7</td>
							<td>:</td>
							<td>
								<select id="cbAnggota7" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota7" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota7"></span></td>
						</tr>
						<tr>
							<td>Anggota 8</td>
							<td>:</td>
							<td>
								<select id="cbAnggota8" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota8" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota8"></span></td>
						</tr>
						<tr>
							<td>Anggota 9</td>
							<td>:</td>
							<td>
								<select id="cbAnggota9" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota9" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota9"></span></td>
						</tr>
						<tr>
							<td>Anggota 10</td>
							<td>:</td>
							<td>
								<select id="cbAnggota10" class="easyui-combogrid" style="width:100%" data-options="
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
							<td><input style="width: 60px" class="easyui-textbox" id="txtAnggota10" readonly="true"></td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td><span id="nipAnggota10"></span></td>
						</tr>
					</table>
				</div>
			</div>
			<div style="text-align:center;margin-top:20px;">
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="ubahSuratTugas()">UBAH</a>
				<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaUbahSuratTugas').window('close')">BATAL</a>
			</div>
		</div>
	</form>
</div>
<div id="piihBPB"></div>
<script type="text/javascript">
$("#formUbahST").trigger('reset');
$(function(){
	var no = $("#txtNomor").val();
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilProgramBy", 
		type		: "POST", 
		dataType	: "json",
		data		: {nomor:no},
		success: function(response){
			$("#periodeU").textbox('setValue',response[0].Periode_Audit);
		},
		error: function(){
			
		},
	});
    $("#cbPengawas").combogrid({
    	onSelect: function(index,row){
			$("#txtPengawas").textbox('setValue',row.Index_Karyawan);
			$('#nipPengawas').html(row.NIP);
		}
	});
	$("#cbKetua").combogrid({
    	onSelect: function(index,row){
			$("#txtKetua").textbox('setValue',row.Index_Karyawan);
			$('#nipKetua').html(row.NIP);
		}
	});
	$("#cbAnggota1").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota1").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota1').html(row.NIP);
		}
	});
	$("#cbAnggota2").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota2").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota2').html(row.NIP);
		}
	});
	$("#cbAnggota3").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota3").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota3').html(row.NIP);
		}
	});
	$("#cbAnggota4").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota4").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota4').html(row.NIP);
		}
	});
	$("#cbAnggota5").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota5").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota5').html(row.NIP);
		}
	});
	$("#cbAnggota6").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota6").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota6').html(row.NIP);
		}
	});
	$("#cbAnggota7").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota7").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota7').html(row.NIP);
		}
	});
	$("#cbAnggota8").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota8").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota8').html(row.NIP);
		}
	});
	$("#cbAnggota9").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota9").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota9').html(row.NIP);
		}
	});
	$("#cbAnggota10").combogrid({
    	onSelect: function(index,row){
			$("#txtAnggota10").textbox('setValue',row.Index_Karyawan);
			$('#nipAnggota10').html(row.NIP);
		}
	});
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/ambilAuditorByNomor", 
		type		: "POST", 
		dataType	: "json",
		data		: {nomor:no},
		success: function(response){
			var a = 1;
			for (var i = 0; i < response.length; i++) {
				if (response[i].Kd_Jab == 1) {
					$('#cbPengawas').combogrid('setValue', response[i].No_PKPT);
				}else if (response[i].Kd_Jab == 2) {
					$('#cbKetua').combogrid('setValue', response[i].No_PKPT);
				}else {
					$('#cbAnggota'+a).combogrid('setValue', response[i].No_PKPT);
					a++;
				}
			}
		},
		error: function(){
			
		},
	});
});

$(function(){
	
	$('.easyui-datebox').datebox({
		formatter : function(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
		},
		parser : function(s){

			if (!s) return new Date();
			var ss = s.split('/');
			var y = parseInt(ss[2],10);
			var m = parseInt(ss[1],10);
			var d = parseInt(ss[0],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d)
			} else {
				return new Date();
			}
		}
	});
	
});
	function ubahSuratTugas(){
			var nomor 				= $("#txtNomor").textbox('getValue');
			var periode 			= $("#periode").textbox('getValue');
			var pengawas			= $("#cbPengawas").combogrid('getValue'); 
			var ketua				= $("#cbKetua").combogrid('getValue');
			var anggota 			= [$("#cbAnggota1").combogrid('getValue')];
			for (var i = 2; i <= 10; i++) {
				anggota.push($("#cbAnggota"+i).combogrid('getValue'));
			}
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/ubahSuratTugas", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,periode:periode},
				beforeSend	: function(){
					var win = $.messager.progress({
						title:'Mohon tunggu',
						msg:'Loading...'
					});
				},
				success: function(response){
					if(response=='Data Berhasil Diubah'){
						$('#dgSuratTugas').datagrid('reload');
						$.messager.progress('close'); 
						$('#jendelaUbahSuratTugas').window('close');
						hapusSemuaAuditor(nomor);
						if (!isEmptyOrSpaces(pengawas)) {
							simpanAuditorProgramTahunan(pengawas,nomor,1);
						}
						if (!isEmptyOrSpaces(ketua)) {
							simpanAuditorProgramTahunan(ketua,nomor,2);
						}
						for (var i = 0; i < anggota.length; i++) {
							if (!isEmptyOrSpaces(anggota[i])) {
								simpanAuditorProgramTahunan(anggota[i],nomor,3);
							}
						}
					}else{
						alert("error ketika menyimpan program tahunan");
					}
				},
				error: function(){
					alert('error');
				},
			});
	}

	function simpanAuditorProgramTahunan(pkpt,nomor,jab){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/tambahAuditorProgram", 
				type		: "POST", 
				dataType	: "html",
				data		: {pkpt:pkpt,nomor:nomor,jab:jab},
				async		: false,
				success: function(response){
					if(response==1){
						$('#dgAuditorProgram').datagrid('reload');
					}else{
						alert("error ketika menyimpan auditor");
					}
				},
				error: function(){
					alert('gagal menyimpan auditor');
				},
			});
	}

	function hapusSemuaAuditor(nomor){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/simpan_tugas_ts/hapusAuditorProgram", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor},
				async		: false,
				success: function(response){
					
				},
				error: function(){
					alert('gagal update auditor');
				},
			});
	}
</script>