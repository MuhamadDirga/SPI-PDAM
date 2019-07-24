<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formTambahST" class="easyui-form" method="post" data-options="">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<div class="easyui-tabs" style="width:100%;">
				<div title="SURAT TUGAS" style="padding:10px">
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">PKPT</td>
							<td><input style="width: 240px" id="nomor" class="easyui-combobox" name="nomor" data-options="valueField:'Nomor',textField:'Nomor',url:'<?php echo base_url("index.php/ts/temuan_ts/daftarNomorTugas");?>'" required=""></input></td>
						</tr>
						<tr>
							<td width="20%">Tanggal Mulai</td>
							<td><input class="easyui-datebox" style="width:30%; height:28px;" id="tgl_mulai" required=""></td>
						</tr>
						<tr>
							<td width="20%">Tanggal Selesai</td>
							<td><input class="easyui-datebox" style="width:30%; height:28px;" id="tgl_selesai" required=""></td>
						</tr>
						<tr>
							<td width="20%">Nomor Tugas</td>
							<td><input style="width: 130px" class="easyui-textbox" id="txtNoTugas" required=""></td>
						</tr>
					</table>
    				<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">Periode Audit</td>
							<td><input class="easyui-textbox" id="periode" style="width:80%;" required=""></td>
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
<script type="text/javascript">
$(function(){
	$('#txtNoTugas').textbox({
	    editable:false,
	    icons:[{
	    	iconCls:'icon-ok',
	        handler:function(){
	        	var nomor = "";
	        	var mulai = $("#tgl_mulai").datebox('getValue');
	        	var ss = mulai.split('/');
				var y = parseInt(ss[2],10);
				var m = parseInt(ss[1],10);
				m = ("0" + m).slice(-2);
	        	nomor += 'ST/'+y+'/'+m+'/';
    			$.ajax({
					url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/genNoTugas", 
					type		: "POST", 
					dataType	: "json",
					data		: {tugas:nomor},
					success: function(response){
						if (!$.trim(response)){
							nomor += '001';
							$("#txtNoTugas").textbox('setValue',nomor);
						}else{
							var last = response[0].No_Tugas.substr(response[0].No_Tugas.length - 3);
							last++;
							var number = ("00" + last).slice(-3);
							nomor += number;
							$("#txtNoTugas").textbox('setValue',nomor);
						}
					},
				});
	        }
	    }]
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

	function validation(){
		var statusForm = false;
		$('#formTambahST').form('submit',{
			onSubmit:function(){
				statusForm = $(this).form('enableValidation').form('validate');
				return false;
			}
		});
		if(statusForm){
			simpanSuratTugas();
		}else{
			alert("Pastikan semua field isian di isi terlebih dahulu.");
		}
	}
	function simpanSuratTugas(){
			var nomor 				= $("#nomor").combobox('getValue');
			var periode 			= $("#periode").textbox('getValue');
			var mulai 				= $("#tgl_mulai").datebox('getValue');
			var selesai 			= $("#tgl_selesai").datebox('getValue');
			var tugas 				= $("#txtNoTugas").textbox('getValue');
			var pengawas			= $("#cbPengawas").combogrid('getValue'); 
			var ketua				= $("#cbKetua").combogrid('getValue');
			var anggota 			= [$("#cbAnggota1").combogrid('getValue'),$("#cbAnggota2").combogrid('getValue'),$("#cbAnggota3").combogrid('getValue')];
			var tgl = moment(mulai, "DD-MM-YYYY","id");
			var tgl2 = moment(selesai, "DD-MM-YYYY","id");
			var weekdayCounter = 0;
			while (tgl <= tgl2) {
				if (tgl.format('ddd') !== 'Sab' && tgl.format('ddd') !== 'Min'){
					weekdayCounter++; //add 1 to your counter if its not a weekend day
				}
				tgl = moment(tgl, 'YYYY-MM-DD').add(1, 'days'); //increment by one day
			}
			mulai = moment(mulai, "DD-MM-YYYY","id").format('YYYY-MM-DD');
			selesai = moment(selesai, "DD-MM-YYYY","id").format('YYYY-MM-DD');
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/tambahSuratTugas", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,periode:periode,tugas:tugas,tgl_mulai:mulai,tgl_selesai:selesai,waktu:weekdayCounter},
				beforeSend	: function(){
					var win = $.messager.progress({
						title:'Mohon tunggu',
						msg:'Loading...'
					});
				},
				success: function(response){
					if(response==1){
						$('#dgSuratTugas').datagrid('reload');
						$.messager.progress('close'); 
						$('#jendelaBuatSuratTugas').window('close');
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

	function isEmptyOrSpaces(str){
	    return str === null || str.match(/^ *$/) !== null;
	}
</script>