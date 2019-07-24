<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formTambahSPI" class="easyui-form" method="post" data-options="">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<table width="100%" border="0" style="margin:10px">
				<tr>
					<td width="7%">Tahun : </td>
					<td width="5%"><input style="width: 80px" id="cbTahun" class="easyui-combobox" name="cbTahun" data-options="valueField:'Kd_Tahun',textField:'Tahun',url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarTahun");?>'"></input></td>
					<td width="7%">Program : </td>
					<td width="5%"><input id="cbProgram" class="easyui-combobox" name="cbProgram" data-options="valueField:'Kd_Program',textField:'Nama_Program',url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarProgram");?>'"></input></td>
					<td width="6%">Jenis : </td>
					<td width="5%"><input id="cbJenis" class="easyui-combobox" name="cbJenis" data-options="valueField:'Kd_Jenis',textField:'Nama_Jenis',url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarJenis");?>'"></input></td>
					<td width="7%">Nomor : </td>
					<td><input style="width: 230px" class="easyui-textbox" id="txtNomor" required=""></td>
				</tr>
			</table>
			<div class="easyui-tabs" style="width:100%;">
				<div title="RUANG LINGKUP" style="padding:10px">
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td width="20%">Obyek</td>
							<td><input class="easyui-textbox"multiline="true" id="oby" style="width:100%;height:60px" required=""></td>
						</tr>
						<tr>
							<td>Ruang Lingkup</td>
							<td><input class="easyui-textbox"multiline="true" id="ruang_lingkup" style="width:100%;height:60px" required=""></td>
						</tr>
						<tr>
							<td>Dasar Audit / Monev</td>
							<td><input class="easyui-textbox"multiline="true" id="dasar" style="width:100%;height:60px" required=""></td>
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
      						<td><textarea class="easyui-textbox" multiline="true" style="width:100%;height:45px" id="txtSasaran1" required=""></textarea></td>
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
      						<td><textarea class="easyui-textbox" multiline="true" style="width:100%;height:45px" id="txtTujuan1" required=""></textarea></td>
      						<td></td>
      					</tr>
					</table>
					<div align="right">
     					<button type="button" id="addTujuan" style="margin-right: 10px">Tambah tujuan</button>
    				</div>
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
								<td><input type="checkbox" id="chkBag" name="bagian[]" value="<?php echo $value->Kd_Bag; ?>"><?php echo $value->Nama_Bag;?></td>
							<?php if($i == 2) {
								echo '</tr><tr>';
								$i = 0;
    						} ?>
						<?php } ?>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div style="text-align:center;margin-top:20px;">
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="validation()">SIMPAN</a>
				<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaBuatProgramTahunan').window('close')">BATAL</a>
			</div>
		</div>
	</form>
</div>
<div id="piihBPB"></div>
<script type="text/javascript">
var totalSasaran = 1;
var totalTujuan = 1;
$(function(){
	var brSasaran = 1;
	var brTujuan = 1;
	$('#txtNomor').textbox({
	    editable:false,
	    icons:[{
	    	iconCls:'icon-ok',
	        handler:function(){
	        	var nomor = "";
	        	nomor += $("#cbTahun").combobox('getText');
	        	if ($("#cbJenis").combobox('getText') == 'A-MDR'){
    				nomor += '/01/';
    			}else{
    				nomor += '/00/';
    			}
    			if ($("#cbProgram").combobox('getText') == 'PKPT') {
    				nomor += '_'
    			}
    			nomor += $("#cbProgram").combobox('getText');
    			nomor += '/';
    			nomor += $("#cbJenis").combobox('getText');
    			nomor += '/';
    			$.ajax({
					url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/genNo", 
					type		: "POST", 
					dataType	: "json",
					data		: {nomor:nomor},
					success: function(response){
						if (!$.trim(response)){
							nomor += '01';
							$("#txtNomor").textbox('setValue',nomor);
						}else{
							var last = response[0].Nomor.substr(response[0].Nomor.length - 2);
							last++;
							var number = ("0" + last).slice(-2);
							nomor += number;
							$("#txtNomor").textbox('setValue',nomor);
						}
					},
				});
	        }
	    }]
	});
	$("input:radio[name='select']").change(function(){
        var flag = $(this).val();
        if(flag == 'select'){
        	$("input:checkbox[name='bagian[]']").prop('checked',true);
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

	$('#addSasaran').click(function(){
	  	brSasaran++;
	  	var html_code = "<tr id='row"+brSasaran+"'>";
	   	html_code += "<td align='center'>"+brSasaran+"</td>";
	   	html_code += "<td><textarea class='easyui-textbox' multiline='true' style='width:100%;height:45px' id='txtSasaran"+brSasaran+"'></textarea></td>";
	   	html_code += "<td align='center'><button type='button' data-row='row"+brSasaran+"' class='removeSasaran'>-</button></td>";
	   	html_code += "</tr>";
	   	$('#tabelSasaran').append(html_code);  
	   	totalSasaran = brSasaran;
	});

	$('#addTujuan').click(function(){
	  	brTujuan++;
	  	var html_code = "<tr id='row"+brTujuan+"'>";
	   	html_code += "<td align='center'>"+brTujuan+"</td>";
	   	html_code += "<td><textarea class='easyui-textbox' multiline='true' style='width:100%;height:45px' id='txtTujuan"+brTujuan+"'></textarea></td>";
	   	html_code += "<td align='center'><button type='button' data-row='row"+brTujuan+"' class='removeTujuan'>-</button></td>";
	   	html_code += "</tr>";
	   	$('#tabelTujuan').append(html_code);  
	   	totalTujuan = brTujuan;
	});

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

	function validation(){
		var statusForm = false;
		$('#formTambahSPI').form('submit',{
			onSubmit:function(){
				statusForm = $(this).form('enableValidation').form('validate');
				return false;
			}
		});
		if(statusForm){
			simpanProgramTahunan();
		}else{
			alert("Pastikan semua field isian di isi terlebih dahulu.");
		}
	}
	function simpanProgramTahunan(){
			var nomor 				= $("#txtNomor").textbox('getValue');
			var program 			= $("#cbProgram").combobox('getValue');
			var jenis 				= $("#cbJenis").combobox('getValue');
			var tahun 				= $("#cbTahun").combobox('getValue');
			var obyek 				= $("#oby").textbox('getValue');
			var ruang 				= $("#ruang_lingkup").textbox('getValue');
			var dasar 				= $("#dasar").textbox('getValue');
			var credit 				= $("#credit").val();
			var all_bagian_id = document.querySelectorAll('input[name="bagian[]"]:checked');
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
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahProgramTahunan", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,program:program,jenis:jenis,tahun:tahun,obyek:obyek,ruang:ruang,dasar:dasar,credit:credit},
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
						for (var i = 0; i < aIds.length; i++) {
							simpanBagianProgramTahunan(nomor,aIds[i]);
						}
						for (var i = 0; i < sasaran.length; i++) {
							simpanSasaranProgramTahunan(nomor,i+1,sasaran[i]);
						}
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

	function simpanBagianProgramTahunan(nomor,bag){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahBagianProgram", 
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,bag:bag},
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

	function simpanSasaranProgramTahunan(nomor,urut,isi){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahSasaranProgram",
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,urut:urut,isi:isi},
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

	function simpanTujuanProgramTahunan(nomor,urut,isi){
			
			$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/tambahTujuanProgram",
				type		: "POST", 
				dataType	: "html",
				data		: {nomor:nomor,urut:urut,isi:isi},
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

	function ubahTanggal(tanggal){
		var ss = tanggal.split('/');
		var temp = ss[0];
		ss[0] = ss[1];
		ss[1] = temp;
		return ss.join('/');
	}

	function isEmptyOrSpaces(str){
	    return str === null || str.match(/^ *$/) !== null;
	}
</script>