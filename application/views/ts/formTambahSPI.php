<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formTambahSPI" class="easyui-form" method="post" data-options="">
		
		<div data-options="region:'north'" style="padding:4px;height:560px">
			<table width="100%" border="0" style="margin:10px">
				<tr>
					<td width="7%">Tahun : </td>
					<td width="5%"><input style="width: 80px" id="cbTahun" class="easyui-combobox" name="cbTahun" data-options="valueField:'Kd_Tahun',textField:'Tahun',url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarTahun");?>'"></input></td>
					<td width="7%">Program : </td>
					<td width="5%"><input id="cbProgram" class="easyui-combobox" name="cbProgram" data-options="valueField:'Kd_Program',textField:'Nama_Program',url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarProgram");?>'"></input></td>
					<td width="6%">Jenis : </td>
					<td width="5%"><input id="cbJenis" class="easyui-combobox" name="cbJenis" data-options="valueField:'Kd_Jenis',textField:'Nama_Jenis',url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarJenis");?>'"></input></td>
					<td width="7%">Nomor : </td>
					<td><input style="width: 230px" class="easyui-textbox" id="txtNomor" readonly="true"></td>
				</tr>
			</table>
			<div class="easyui-tabs" style="width:100%;">
				<div title="RUANG LINGKUP" style="padding:10px">
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">Obyek</td>
							<td><input class="easyui-textbox"multiline="true" id="obyek" style="width:100%;height:80px"></td>
						</tr>
						<tr>
							<td>Ruang Lingkup</td>
							<td><input class="easyui-textbox"multiline="true" id="ruang_lingkup" style="width:100%;height:80px"></td>
						</tr>
						<tr>
							<td>Dasar Audit / Monev</td>
							<td><input class="easyui-textbox"multiline="true" id="dasar" style="width:100%;height:80px"></td>
						</tr>
							</table>
					
						<tr>
							<table width = "100%" id="target_table">
     						<tr>
      						<th width="5%">Urut Sasaran</th>
      						<th width="100%">Isi Sasaran:</th>
     						</tr>
     						<tr>
      						<td contenteditable="true" id="target_sequence" name="target_sequence"></td>
      						<td><input class="easyui-textbox" multiline="true" style="width:100%;height:45px" id="target_fill" name="target_fill"></td>
      						</tr>
						</tr>
					</table>
						<div align="right">
     					<button type="button" name="addtarget" id="addtarget" class="btn btn-success btn-xs">Tambah sasaran</button>
    				</div>
    					<div id="inserted_item_data"></div>
    					<tr>
							<table width = "100%"  id="aim_table">
     						<tr>
      						<th width="5%">Urut Tujuan</th>
      						<th width="100%">Isi Tujuan:</th>
     						</tr>
     						<tr>
      						<td contenteditable="true" id="aim_sequence" name="aim_sequence"></td>
      						<td><input class="easyui-textbox" multiline="true" style="width:100%;height:45px" id="aim_fill" name="aim_fill"></td>
      						</tr>
						</tr>
					</table>
					<div align="right">
     					<button type="button" name="addaim" id="addaim" class="btn btn-success btn-xs">Tambah tujuan</button>
    				</div>
    				<div id="inserted_item_data"></div>
					<!-- <hr style="width:100%;margin-top:40px;margin-bottom:40px;background-color:#79afe6;color:#79afe6" />
					
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="15%">Stand Cabut</td>
							<td width="35%"><input class="easyui-textbox" type="text" id="stand" name="stand" value="<?php echo $dataTabel[0]['STAND']; ?>" style="height:28px; width:100px;"></td>
							<td width="15%">Jenis Meter</td>
							<td width="35%"><input id="jenisMeter" name="jenisMeter" style="width:100px; height:28px;"></td>
						</tr>
						<tr>
							<td>No. Slag</td>
							<td><input class="easyui-textbox" type="text" id="slag" name="slag" value="<?php echo $dataTabel[0]['NO_SLAG']; ?>" style="height:28px; width:100px;"></td>
							<td>Diameter</td>
							<td><input id="diameter_RSPK" name="diameter_RSPK" style="width:100px; height:28px;"></td>
						</tr>
					</table>
					
					<input type="hidden" id="no_segel_lama" value="<?php echo $dataTabel[0]['NO_SEGEL']; ?>">
					<input type="hidden" id="validation" value="notOK"> -->
					
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
								<td><input class="easyui-checkbox" type="checkbox" name="chkBag" value="<?php echo $value->Kd_Bag; ?>"><?php echo $value->Nama_Bag;?></td>
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
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="simpanProgramTahunan()">SIMPAN</a>
				<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaBuatProgramTahunan').window('close')">BATAL</a>
			</div>
		</div>
	</form>
</div>
<div id="piihBPB"></div>
<script type="text/javascript">
var nomor = "";
var count = 1;
$(function(){
	$("#cbTahun").combobox({
    	onChange:function(){
    		nomor += $("#cbTahun").combobox('getText');
    		nomor += '/00/';
        	$("#txtNomor").textbox('setValue',nomor);
    	}
	});
	$("#cbProgram").combobox({
    	onChange:function(){
        	nomor += $("#cbProgram").combobox('getText');
    		nomor += '/';
        	$("#txtNomor").textbox('setValue',nomor);
    	}
	});
	$("#cbJenis").combobox({
    	onChange:function(){
    		nomor += $("#cbJenis").combobox('getText');
    		nomor += '/00';
        	$("#txtNomor").textbox('setValue',nomor);
    	}
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

	$('#addtarget').click(function(){
	  	count = count + 1;
	  	var html_code = "<tr id='row"+count+"'>";
	   	html_code += "<td contenteditable='true' class='target_sequence'></td>";
	   	html_code += "<td><input class='easyui-textbox' multiline='true' style='width:100%;height:45px' id='target_fill' name='target_fill'></td>";
	   	html_code += "</tr>";
	   	$('#target_table').append(html_code);  
	});

	$('#addaim').click(function(){
	  	count = count + 1;
	  	var html_code = "<tr id='row"+count+"'>";
	   	html_code += "<td contenteditable='true' class='aim_sequence'></td>";
	   	html_code += "<td><input class='easyui-textbox' multiline='true' style='width:100%;height:45px' id='aim_fill' name='aim_fill'></td>";
	   	html_code += "</tr>";
	   	$('#aim_table').append(html_code);  
	});

	$(document).on('click', '.remove', function(){
	  	var delete_row = $(this).data("row");
	  	$('#' + delete_row).remove();
 	});

	$('#save').click(function(){
	  	var target_sequence = [];
	  	var target_fill = [];
	  	var aim_sequence = [];
	  	var aim_fill = [];

	  	$('#target_sequence').each(function(){
	   		item_name.push($(this).text());
	  	});

	  	$('#target_fill').each(function(){
	   		item_code.push($(this).text());
	  	});

	  	$('#aim_sequence').each(function(){
	   		item_name.push($(this).text());
	  	});

	  	$('#aim_fill').each(function(){
	   		item_code.push($(this).text());
	  	});

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
	function simpanProgramTahunan(){
			var nomor 				= $("#txtNomor").textbox('getValue');
			var program 			= $("#cbProgram").combobox('getValue');
			var jenis 				= $("#cbJenis").combobox('getValue');
			var tahun 				= $("#cbTahun").combobox('getValue');
			var obyek 				= $("#obyek").textbox('getValue');
			var ruang 				= $("#ruang_lingkup").textbox('getValue');
			var dasar 				= $("#dasar").textbox('getValue');
			var pengawas			= $("#cbPengawas").combogrid('getValue'); 
			var ketua				= $("#cbKetua").combogrid('getValue');
			// var anggota1 			= $("#cbAnggota1").combogrid('getValue');
			// var anggota2			= $("#cbAnggota2").combogrid('getValue');
			// var anggota3			= $("#cbAnggota3").combogrid('getValue');
			var anggota 			= [$("#cbAnggota1").combogrid('getValue'),$("#cbAnggota2").combogrid('getValue'),$("#cbAnggota3").combogrid('getValue')];
			// var tglTempo			= $("#formRealisasiSPK #tglTempo").textbox('getValue');
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahProgramTahunan", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,program:program,jenis:jenis,tahun:tahun,obyek:obyek,ruang:ruang,dasar:dasar},
				beforeSend	: function(){
					var win = $.messager.progress({
						title:'Mohon tunggu',
						msg:'Loading...'
					});
				},
				success: function(response){
					if(response==1){
						$('#dgProgramTahunan').datagrid('reload');
						$.messager.progress('close'); 
						$('#jendelaBuatProgramTahunan').window('close');
						simpanAuditorProgramTahunan(pengawas,nomor,1);
						simpanAuditorProgramTahunan(ketua,nomor,2);
						for (var i = 0; i < anggota.length; i++) {
							simpanAuditorProgramTahunan(anggota[i],nomor,3);
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
	
	// function changeOpt(val) {
	// 	$("#jenisRealisasi").empty();
	// 	if (val=="1") { 
	// 		var option = $("<option></option>").attr("value", "1. Melepas Meter").text("1. Melepas Meter");
	// 		$("#jenisRealisasi").append(option);
	// 		var option = $("<option></option>").attr("value", "2. Kopling").text("2. Kopling");
	// 		$("#jenisRealisasi").append(option);
	// 		var option = $("<option></option>").attr("value", "3. DOP").text("3. DOP");
	// 		$("#jenisRealisasi").append(option);
	// 	} else if (val=="0") {
	// 		var option = $("<option></option>").attr("value", "1. Alamat Tidak Ketemu").text("1. Alamat Tidak Ketemu");
	// 		$("#jenisRealisasi").append(option);
	// 		var option = $("<option></option>").attr("value", "2. Rumah Kosong").text("2. Rumah Kosong");
	// 		$("#jenisRealisasi").append(option);
	// 		var option = $("<option></option>").attr("value", "3. Tempo").text("3. Tempo");
	// 		$("#jenisRealisasi").append(option);
	// 		var option = $("<option></option>").attr("value", "4. Titip Bayar").text("4. Titip Bayar");
	// 		$("#jenisRealisasi").append(option);
	// 		var option = $("<option></option>").attr("value", "5. Lain-lain").text("5. Lain-lain");
	// 		$("#jenisRealisasi").append(option);
	// 	}
	// }
	
	// <?php
	// if (trim($dataTabel[0]['TGL_TEMPO']) != '') { 
	// 	echo  '$("#addingT").show();';
	// }
	// if (trim($dataTabel[0]['TGL_BAYAR']) != '') { 
	// 	echo  '
	// 		$("#addingB").show();
	// 		$("#simpanBtn").hide();
	// 	';
	// }
	// ?>
		
	// function show(val) {
	// 	$("#addingT").hide();
	// 	$("#addingB").hide();
	// 	if (val == "3. Tempo"){
	// 		$("#addingT").show();
	// 	} else if (val == "4. Titip Bayar") {
	// 		$("#addingB").show();
	// 	}
	// }
</script>