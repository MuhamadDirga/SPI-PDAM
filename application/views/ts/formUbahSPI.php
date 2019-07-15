<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formUbahSPI" class="easyui-form" method="post" data-options="">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<table width="100%" border="0" style="margin:10px">
				<tr>
					<td width="7%">Nomor : </td>
					<td><input style="width: 230px" class="easyui-textbox" id="txtNomor" value="<?php echo $nomor; ?>" readonly></td>
				</tr>
			</table>
			<div class="easyui-tabs" style="width:100%;">
				<div title="RUANG LINGKUP" style="padding:10px">
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">Obyek</td>
							<td><input class="easyui-textbox"multiline="true" id="obyek" style="width:100%;height:60px"></td>
						</tr>
						<tr>
							<td>Ruang Lingkup</td>
							<td><input class="easyui-textbox"multiline="true" id="ruang_lingkup" style="width:100%;height:60px"></td>
						</tr>
						<tr>
							<td>Dasar Audit / Monev</td>
							<td><input class="easyui-textbox"multiline="true" id="dasar" style="width:100%;height:60px"></td>
						</tr>
					</table>
					
					<table width = "100%" id="tabelSasaran">
     					<tr>
      						<th width="5%" style="text-align: center;">Urut Sasaran</th>
      						<th width="90%">Isi Sasaran:</th>
      						<th width="5%"></th>
     					</tr>
     					<tr>
      						<td align="center">1</td>
      						<td><textarea class="easyui-textbox" multiline="true" style="width:100%;height:45px" id="txtSasaran1"></textarea></td>
      						<td></td>
      					</tr>
					</table>
					<div align="right">
     					<button type="button" id="addSasaran" style="margin-right: 10px">Tambah sasaran</button>
    				</div>
    				<table width = "100%" id="tabelTujuan">
     					<tr>
      						<th width="5%" style="text-align: center;">Urut Tujuan</th>
      						<th width="90%">Isi Tujuan:</th>
      						<th width="5%"></th>
     					</tr>
     					<tr>
      						<td align="center">1</td>
      						<td><textarea class="easyui-textbox" multiline="true" style="width:100%;height:45px" id="txtTujuan1"></textarea></td>
      						<td></td>
      					</tr>
					</table>
					<div align="right">
     					<button type="button" id="addTujuan" style="margin-right: 10px">Tambah tujuan</button>
    				</div>
    				<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">Periode Audit</td>
							<td><input class="easyui-textbox" id="periode" style="width:40%;"></td>
						</tr>
					</table>
				</div>
				
				<div title="BAGIAN" style="padding:10px;" id="bagianTab">
					Bagian :
					<table>
						<tr>
							<td><input class="easyui-radiobutton" type="radio" name="select" value="select"> Select All</td>
							<td><input class="easyui-radiobutton" type="radio" name="select" value="diselect">Disellect All</td>
						</tr>
					</table>
					<?php $dataChk=$this->md_bagian->ambilBagian(); 
					$i=0;?>
					<table border="0">
						<tbody>
							<tr>
						<?php foreach ($dataChk->result() as $value){ ?>
							<?php $i++; ?>
								<td><input type="checkbox" id="chkBag<?php echo $value->Kd_Bag; ?>" name="bagianEdit[]" value="<?php echo $value->Kd_Bag; ?>"><?php echo $value->Nama_Bag;?></td>
							<?php if($i == 2) {
								echo '</tr><tr>';
								$i = 0;
    						} ?>
						<?php } ?>
						</tr>
						</tbody>
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
				</div>
			</div>
			<div style="text-align:center;margin-top:20px;">
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="ubahProgramTahunan()">UBAH</a>
				<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaUbahProgramTahunan').window('close')">BATAL</a>
			</div>
		</div>
	</form>
</div>
<div id="piihBPB"></div>
<script type="text/javascript">
$("#formUbahSPI").trigger('reset');
var totalSasaran = 1;
var totalTujuan = 1;
$(function(){
	var no = $("#txtNomor").val();
	var brSasaran = 1;
	var brTujuan = 1;
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilProgramBy", 
		type		: "POST", 
		dataType	: "json",
		data		: {nomor:no},
		success: function(response){
			$("#obyek").textbox('setValue',response[0].Obyek);
			$("#ruang_lingkup").textbox('setValue',response[0].Ruang_Lingkup);
			$("#dasar").textbox('setValue',response[0].Dasar);
			$("#periode").textbox('setValue',response[0].Periode_Audit);
		},
		error: function(){
			
		},
	});
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilBagianBy", 
		type		: "POST", 
		dataType	: "json",
		data		: {nomor:no},
		success: function(response){
			if (!$.trim(response)){
				
			}else{
				for (var i = 0; i < response.length; i++) {
					$('#chkBag'+response[i].Kd_Bag).prop('checked', true);
				}
			}
		},
		error: function(){
			
		},
	});
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilSasaranBy", 
		type		: "POST", 
		dataType	: "json",
		data		: {nomor:no},
		success: function(response){
			for (var i = 0; i < response.length-1; i++) {
				tambahSasaran();
			}
			for (var i = 0; i < response.length; i++) {
				if (i == 0) {
					$("#txtSasaran"+response[i].Urut_Sasaran).textbox('setValue',response[i].Isi_Sasaran);
				}else{
					$("#txtSasaran"+response[i].Urut_Sasaran).val(response[i].Isi_Sasaran);
				}
			}
		},
		error: function(){
			
		},
	});
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilTujuanBy", 
		type		: "POST", 
		dataType	: "json",
		data		: {nomor:no},
		success: function(response){
			for (var i = 0; i < response.length-1; i++) {
				tambahTujuan();
			}
			for (var i = 0; i < response.length; i++) {
				if (i == 0) {
					$("#txtTujuan"+response[i].Urut_Tujuan).textbox('setValue',response[i].Isi_Tujuan);
				}else{
					$("#txtTujuan"+response[i].Urut_Tujuan).val(response[i].Isi_Tujuan);
				}
			}
		},
		error: function(){
			
		},
	});
	$("input:radio[name='select']").change(function(){
        var flag = $(this).val();
        if(flag == 'select'){
        	$('input:checkbox').prop('checked',true);
        }
        else{
        	$('input:checkbox').removeAttr('checked');
        }
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
	$.ajax({
		url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilAuditorByNomor", 
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

	$('#addSasaran').click(function(){
	  	tambahSasaran();
	});

	function tambahSasaran(){
		brSasaran++;
	  	var html_code = "<tr id='row"+brSasaran+"'>";
	   	html_code += "<td align='center'>"+brSasaran+"</td>";
	   	html_code += "<td><textarea class='easyui-textbox' multiline='true' style='width:100%;height:45px' id='txtSasaran"+brSasaran+"'></textarea></td>";
	   	html_code += "<td align='center'><button type='button' data-row='row"+brSasaran+"' class='removeSasaran'>-</button></td>";
	   	html_code += "</tr>";
	   	$('#tabelSasaran').append(html_code);  
	   	totalSasaran = brSasaran;
	}

	$('#addTujuan').click(function(){
	  	tambahTujuan();
	});

	function tambahTujuan(){
		brTujuan++;
	  	var html_code = "<tr id='row"+brTujuan+"'>";
	   	html_code += "<td align='center'>"+brTujuan+"</td>";
	   	html_code += "<td><textarea class='easyui-textbox' multiline='true' style='width:100%;height:45px' id='txtTujuan"+brTujuan+"'></textarea></td>";
	   	html_code += "<td align='center'><button type='button' data-row='row"+brTujuan+"' class='removeTujuan'>-</button></td>";
	   	html_code += "</tr>";
	   	$('#tabelTujuan').append(html_code);  
	   	totalTujuan = brTujuan;
	}

	$(document).on('click', '.removeSasaran', function(){
	  	var delete_row = $(this).data("row");
	  	$('#' + delete_row).remove();
	  	brSasaran = brSasaran - 1;
	  	totalSasaran = brSasaran;
 	});

 	$(document).on('click', '.removeTujuan', function(){
	  	var delete_row = $(this).data("row");
	  	$('#' + delete_row).remove();
	  	brTujuan = brTujuan - 1;
	  	totalTujuan = brTujuan;
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
	function ubahProgramTahunan(){
			var nomor 				= $("#txtNomor").textbox('getValue');
			var obyek 				= $("#obyek").textbox('getValue');
			var ruang 				= $("#ruang_lingkup").textbox('getValue');
			var dasar 				= $("#dasar").textbox('getValue');
			var periode 			= $("#periode").textbox('getValue');
			var pengawas			= $("#cbPengawas").combogrid('getValue'); 
			var ketua				= $("#cbKetua").combogrid('getValue');
			var anggota 			= [$("#cbAnggota1").combogrid('getValue'),$("#cbAnggota2").combogrid('getValue'),$("#cbAnggota3").combogrid('getValue')];
			var all_bagian_id = document.querySelectorAll('input[name="bagianEdit[]"]:checked');
			var aIds = [];
			for(var x = 0, l = all_bagian_id.length; x < l;  x++)
			{
			    aIds.push(all_bagian_id[x].value);
			}
			var sasaran = [];
			for (var i = 1; i < (totalSasaran+1); i++) {
				sasaran.push($("#txtSasaran"+i).val());
			}
			var tujuan = [];
			for (var i = 1; i < (totalTujuan+1); i++) {
				tujuan.push($("#txtTujuan"+i).val());
			}
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ubahProgram", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,obyek:obyek,ruang:ruang,dasar:dasar,periode:periode},
				beforeSend	: function(){
					var win = $.messager.progress({
						title:'Mohon tunggu',
						msg:'Loading...'
					});
				},
				success: function(response){
					if(response=='Data Berhasil Diubah'){
						$('#dgProgramTahunan').datagrid('reload');
						$.messager.progress('close'); 
						$('#jendelaUbahProgramTahunan').window('close');
						hapusSemuaAuditor(nomor);
						simpanAuditorProgramTahunan(pengawas,nomor,1);
						simpanAuditorProgramTahunan(ketua,nomor,2);
						for (var i = 0; i < anggota.length; i++) {
							simpanAuditorProgramTahunan(anggota[i],nomor,3);
						}
						hapusSemuaBagian(nomor);
						for (var i = 0; i < aIds.length; i++) {
							simpanBagianProgramTahunan(nomor,aIds[i]);
						}
						hapusSemuaSasaran(nomor);
						for (var i = 0; i < sasaran.length; i++) {
							simpanSasaranProgramTahunan(nomor,i+1,sasaran[i]);
						}
						hapusSemuaTujuan(nomor);
						for (var i = 0; i < tujuan.length; i++) {
							simpanTujuanProgramTahunan(nomor,i+1,tujuan[i]);
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
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahAuditorProgram", 
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
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/hapusAuditorProgram", 
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

	function simpanBagianProgramTahunan(nomor,bag){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahBagianProgram", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,bag:bag},
				async		: false,
				success: function(response){
					if(response==1){
						$('#dgDetailBagian').datagrid('reload');
					}else{
						alert("error ketika menyimpan bagian");
					}
				},
				error: function(){
					alert('gagal menyimpan bagian');
				},
			});
	}

	function hapusSemuaBagian(nomor){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/hapusDetailBagian", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor},
				async		: false,
				success: function(response){
					
				},
				error: function(){
					alert('gagal update bagian');
				},
			});
	}

	function simpanSasaranProgramTahunan(nomor,urut,isi){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahSasaranProgram",
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,urut:urut,isi:isi},
				async		: false,
				success: function(response){
					if(response==1){
						$('#dgSasaran').datagrid('reload');
					}else{
						alert("error ketika menyimpan sasaran");
					}
				},
				error: function(){
					alert('gagal menyimpan sasaran');
				},
			});
	}

	function hapusSemuaSasaran(nomor){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/hapusSasaran", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor},
				async		: false,
				success: function(response){
					
				},
				error: function(){
					alert('gagal update sasaran');
				},
			});
	}

	function simpanTujuanProgramTahunan(nomor,urut,isi){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahTujuanProgram",
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,urut:urut,isi:isi},
				async		: false,
				success: function(response){
					if(response==1){
						$('#dgTujuan').datagrid('reload');
					}else{
						alert("error ketika menyimpan tujuan");
					}
				},
				error: function(){
					alert('gagal menyimpan tujuan');
				},
			});
	}

	function hapusSemuaTujuan(nomor){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/hapusTujuan", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor},
				async		: false,
				success: function(response){
					
				},
				error: function(){
					alert('gagal update tujuan');
				},
			});
	}
</script>