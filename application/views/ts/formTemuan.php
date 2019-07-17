<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formTemuan" class="easyui-form" method="post" data-options="" enctype="multipart/form-data">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<table width="100%" border="0" style="margin:10px">
				<tr>
					<td width="10%">No Surat Tugas : </td>
					<td width="5%"><input style="width: 230px" id="cbTugas" class="easyui-combobox" name="cbTugas" data-options="valueField:'Nomor',textField:'No_Tugas',url:'<?php echo base_url("index.php/ts/temuan_ts/daftarNomorTugas");?>'"></input></td>
					<td width="7%">Tgl Mulai : </td>
					<td width="5%"><input class="easyui-textbox" id="txtTglMulai" readonly=""></td>
					<td width="6%">Tgl Selesai : </td>
					<td width="5%"><input class="easyui-textbox" id="txtTglSelesai" readonly=""></td>
					<td width="7%">Waktu : </td>
					<td><input class="easyui-textbox" id="txtWaktu" readonly=""></td>
				</tr>
			</table>
			<div class="easyui-tabs" style="width:100%;">
				<div title="Laporan Hasil Audit - LHA" style="padding:10px">
					<table width="100%" border="0" cellpadding="2">
						<tr>
							<td style="width: 10%">Obyek : </td>
							<td style="width: 40%"><input class="easyui-textbox" id="nomor" name="nomor" style="width: 100%" readonly=""></td>
							<td style="width: 10%;"></td>
							<td></td>
						</tr>
						<tr>
							<td rowspan="2"></td>
							<td rowspan="2"><input class="easyui-textbox"multiline="true" id="obyek" style="width:100%;height:60px" readonly=""></td>
							<td style="text-align: right;">Tgl Audit Meeting : </td>
							<td><input class="easyui-datebox" style="width:40%; height:28px;" name="tgl_meeting" id="tgl_meeting"></td>
						</tr>
						<tr>
							<td style="text-align: right;">Tgl LHA : </td>
							<td><input class="easyui-datebox" style="width:40%; height:28px;" name="tgl_lha" id="tgl_lha"></td>
						</tr>
						<tr>
							<td></td>
							<td>Lokasi File (softcopy) LHA : </td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td><input id="fileLHA" class="easyui-filebox" name="fileLHA" data-options="prompt:'Choose a file...'" style="width:100%" accept=".pdf"></td>
            				<td></td>
            				<td></td>
						</tr>
					</table>
				</div>
				<div title="Temuan" style="padding:10px;" id="bagianTab">
					<table id="dgDaftarTemuan" style="width:100%;height:300px;" title="Daftar Temuan :" rownumbers="true" pagination="false">
						<thead>
							<tr>
								<th data-options="field:'Urut'" width="5%">No</th>
								<th data-options="field:'Kd_Bag'" width="5%" hidden="true"	>Kode</th>
								<th data-options="field:'Nama_Bag'" width="15%">Bagian</th>
								<th data-options="field:'Isi'" width="70%" editor="{type:'textbox'}">Isi Temuan</th>
								<th data-options="field:'SET'" formatter="formatTemuan" width="10%">Set</th>
							</tr>
						</thead>
					</table>
					<div id="ftTemuan" style="padding:5px;">
						<div class="easyui-layout" style="width:100%; height:36px;">
							<div data-options="region:'east'" style="width:100%; text-align:right; padding:4px;">
								<form id="formFilterTemuan">
								File (softcopy) Temuan&nbsp; : &nbsp;&nbsp;	
								<input id="fileTemuan" class="easyui-filebox" name="fileTemuan" data-options="prompt:'Choose a file...'" style="width:30%" accept=".pdf">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								Bagian&nbsp; : &nbsp;&nbsp;	
								<input class="easyui-combobox" id="filterBagianTemuan"
									name="language"
									data-options="
											url:'<?php echo base_url("index.php/ts/temuan_ts/daftarSemuaBagian");?>',
											method:'post',
											valueField:'Kd_Bag',
											textField:'Nama_Bag',
											width:200,
											panelHeight:300,
									">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="#" class="easyui-linkbutton" iconCls="icon-add" onclick="tambahBaris()">Tambah Temuan</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="text-align:center;margin-top:20px;">
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="validasi()">SIMPAN</a>
			</div>
			<div id="jendelaTambahTemuan" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:600px; min-height:200px; padding:5px;">
		</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	function formatTemuan(value,row,index){
		if (row.editing){
			var c = '<a href="#" onclick="cancelrow(this);">Batal</a>';
			var s = ' | <a href="#" onclick="saverow(this);">Simpan</a> ';
			return s+c;
		} else {
			var e = '<a href="#" onclick="editrow(this);">Set</a>';
			var d = ' | <a href="#" onclick="deleterow(this);">Hapus</a> ';
			return e+d;
		}
	}
</script>
<script type="text/javascript">
	var pList=[];
	for(var i=0;i<100;i++){
		pList[i]=i+1;
	}
var totalSasaran = 1;
$(function(){
	var brSasaran = 1;
	var brTujuan = 1;
	$("#cbTugas").combobox({
    	onChange:function(){
    		var nomor = $("#cbTugas").combobox('getValue');
    		$.ajax({
				url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/ambilProgramBy", 
				type		: "POST", 
				dataType	: "json",
				data		: {nomor:nomor},
				success: function(response){
					$("#txtTglMulai").textbox('setValue',formatTanggal(response[0].Tgl_Mulai));
					$("#txtTglSelesai").textbox('setValue',formatTanggal(response[0].Tgl_Selesai));
					$("#txtWaktu").textbox('setValue',response[0].Waktu);
					$("#nomor").textbox('setValue',nomor);
					$("#obyek").textbox('setValue',response[0].Obyek);
					pencarian(response[0].No_Tugas);
					$('#filterBagianTemuan').combobox({
					    url:'<?php echo base_url("index.php/ts/temuan_ts/daftarBagian");?>',
					    queryParams:{
						    tugas:response[0].No_Tugas,
						},
					    valueField:'Kd_Bag',
					    textField:'Nama_Bag',
					});
					// $('#filterBagianTemuan').combobox('reload');
				},
			});
    	}
	});
	$(function(){
		$("#dgDaftarTemuan").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			// toolbar:'#tbTemuan',
			footer:'#ftTemuan',
			url:'<?php echo base_url("index.php/ts/temuan_ts/daftarTemuan");?>',
			method:'post',
			onDblClickCell: function(index,field,value){
				$(this).datagrid('beginEdit', index);
				var ed = $(this).datagrid('getEditor', {index:index,field:field});
				$(ed.target).focus();
			},
			onRowContextMenu : function(e,field){
				//e.preventDefault();
				$('#mmUser').menu('show', {
					left: e.pageX,
					top: e.pageY
				});
			},
			onBeforeEdit:function(index,row){
				row.editing = true;
				updateActions(index);
			},
			
			onBeginEdit:function(index,row){
				var editors = $('#dgJenis').datagrid('getEditors', index);
				var n1 = $(editors[0].target);
			},
			onAfterEdit:function(index,row){
				row.editing = false;
				updateActions(index);
			},
			onCancelEdit:function(index,row){
				row.editing = false;
				updateActions(index);
			},
			onEndEdit:function(index,row){
				
			},
			showFooter:true

			
		});
		$.extend($.fn.datagrid.defaults.editors, { 
			numberspinner: {
				init: function(container, options){
					var input = $('<input type="text">').appendTo(container);
					return input.numberspinner(options);
				},
				destroy: function(target){
					$(target).numberspinner('destroy');
				},
				getValue: function(target){
					return $(target).numberspinner('getValue');
				},
				setValue: function(target, value){
					$(target).numberspinner('setValue',value);
				},
				resize: function(target, width){
					$(target).numberspinner('resize',width);
				}
			}
		});
		$('#formTemuan').form({
			url:'<?php echo base_url();?>index.php/ts/temuan_ts/uploadLHA',
            success:function(response){
                $.messager.alert('Info', response, 'info');
            }
        });
	});
});
	function updateActions(index){
		$('#dgDaftarTemuan').datagrid('updateRow',{
			index:index,
			row:{}
		});
	}
	function getRowIndex(target){
		var tr = $(target).closest('tr.datagrid-row');
		return parseInt(tr.attr('datagrid-row-index'));
	}
	function editrow(target){ 
		$('#dgDaftarTemuan').datagrid('beginEdit', getRowIndex(target));
	}
	function deleterow(target){
		$.messager.confirm('Confirm','Are you sure?',function(r){
			if (r){
				$('#dgDaftarTemuan').datagrid('deleteRow', getRowIndex(target));
			}
		});
	}
	function saverow(target){
		$('#dgDaftarTemuan').datagrid('endEdit', getRowIndex(target));
	}
	function cancelrow(target){
		$('#dgDaftarTemuan').datagrid('cancelEdit', getRowIndex(target));
	}
	function formatTanggal(tanggal){
		var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		var ss = tanggal.split('-');
		var y = parseInt(ss[0],10);
		var m = parseInt(ss[1],10);
		var d = parseInt(ss[2],10);
		m -= 1;
		var bulan = bulan[m];
		return d+' '+bulan+' '+y;
	}
	function uploadLHA(){
		$('#formTemuan').form('submit');
		var nomor = $('#nomor').textbox('getValue');
		var tugas = $('#cbTugas').combobox('getText');
		var data = $('#dgDaftarTemuan').datagrid('getData');
		$.map(data, function(row) {
			for (var i = 0; i < row.length; i++) {
				// console.log(row[i].Isi);
				$.ajax({
					url			: "<?php echo base_url(); ?>"+"index.php/ts/temuan_ts/simpanTemuan", 
					type		: "POST", 
					dataType	: "html",
					data 		: {nomor:nomor,tugas:tugas,bag:row[i].Kd_Bag,isi:row[i].Isi,urut:row[i].Urut},
					success: function(response){
						
					},
				});
			}
		});
	}
	function validasi(){
		var nomor = $('#nomor').textbox('getValue');
		var tgl_meeting = $('#tgl_meeting').datebox('getValue');
		var tgl_lha = $('#tgl_lha').datebox('getValue');
		var file_lha = $('#fileLHA').filebox('getValue');
		var file_temuan = $('#fileTemuan').filebox('getValue');
		if ($.trim(nomor) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(tgl_meeting) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(tgl_lha) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(file_lha) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(file_temuan) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else{
			uploadLHA();
		}
	}
	function pencarian(tugas){
		$('#dgDaftarTemuan').datagrid('load',{
			tugas: tugas,
		});
	}
	function tambahBaris(){
		var tugas = $('#cbTugas').combobox('getText');
		var urut = $('#dgDaftarTemuan').datagrid('getData').total;
		urut ++;
		var target = "#jendelaTambahTemuan";
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/temuan_ts/formTambahTemuan", 
			type		: "POST", 
			dataType	: "html",
			data 		: {urut:urut,tugas:tugas},
			beforeSend	: function(){
				$(target).html('Loading . . . ');
			},
			success: function(response){
				$(target).html(response);
				$.parser.parse(target);
				$(target).window('open');
			},
			error: function(){
				alert('error');
			},
		});
		                  
		// $('#dgDaftarTemuan').datagrid('saveRow');  // 
	}
</script>