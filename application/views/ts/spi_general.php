<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'north'">
		<div class="pageTitle">Program Tahunan</div>
	</div>
	
	<div data-options="region:'center'" style="padding:5px;">
		<table id="dgProgramTahunan" style="width:100%;height:50%;" title="Program Tahunan" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'Nomor'" width="15%">Nomor</th>
					<th data-options="field:'No_Tugas'" width="10%">Nomor Tugas</th>
					<th data-options="field:'Obyek'" width="15%">Obyek</th>
					<th data-options="field:'Ruang_Lingkup'" width="20%">Ruang Lingkup</th>
					<th data-options="field:'Dasar'" width="12%">Dasar Audit/Monev</th>
					<th data-options="field:'Program'" width="7%">Program</th>
					<th data-options="field:'Jenis'" width="7%">Jenis</th>
					<th data-options="field:'Tahun'" width="10%">Tahun</th>
					<th data-options="field:'Mulai'" formatter="formatTanggalMulai" width="9%">Tanggal Mulai</th>
					<th data-options="field:'Selesai'" formatter="formatTanggalSelesai" width="9%">Tgl Selesai</th>
					<th data-options="field:'Periode_Audit'" width="15%">Periode Audit</th>
					<th data-options="field:'Waktu'" width="5%">Waktu</th>
					<th data-options="field:'Tgl_Pembuaan'" width="12%">Tgl Pembuatan</th>
					<th data-options="field:'Credit'" width="10%">Credit</th>
					<th data-options="field:'SET'" formatter="formatProgramTahunan" width="7%">Set</th>
				</tr>
			</thead>
		</table>
		<table id="dgDetailBagian" style="width:100%;height:35%;" title="Detail Bagian" rownumbers="true" pagination="false" idField="Kd_Bag">
			<thead>
				<tr>
					<th field="Nama_Bag" width="15%">Bagian</th>
					<th data-options="field:'Detail'" width="7%">Detail</th>
				</tr>
			</thead>
		</table>
		<table id="dgAuditorProgram" style="width:100%;height:35%;" title="Auditor" rownumbers="true" pagination="false" idField="No_PKPT">
			<thead>
				<tr>
					<th field="No_PKPT" width="7%">No_PKPT</th>
					<th data-options="field:'Nama'" editor="{type:'combobox',id:'petugasSPK',options:{url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',valueField:'NIP',textField:'Nama'}}" width="20%">Nama Lengkap</th>
					<th data-options="field:'Jabatan'" width="7%">Jabatan</th>
					<th data-options="field:'Index_Karyawan'" align="right"  width="10%">Index</th>
				</tr>
			</thead>
		</table>
		<table id="dgSasaran" style="width:100%;height:50%;" title="Sasaran Program Tahunan" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'Urut_Sasaran'" width="5%">No Urut</th>
					<th data-options="field:'Isi_Sasaran'" width="85%">Isi</th>
				</tr>
			</thead>
		</table>
		<table id="dgTujuan" style="width:100%;height:50%;" title="Tujuan Program Tahunan" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'Urut_Tujuan'" width="5%">No Urut</th>
					<th data-options="field:'Isi_Tujuan'" width="85%">Isi</th>
				</tr>
			</thead>
		</table>
		
		<div id="tbTahunan" style="padding:5px;">
			    <div class="easyui-layout" style="width:100%; height:36px;">
					<div data-options="region:'east'" style="width:620px; text-align:left; padding:4px;">
						<form id="formFilterTahunan">
						
						Tahun&nbsp; : &nbsp;&nbsp;	
						<input class="easyui-combobox" id="filterTahunTahunan"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarTahun");?>',
									method:'post',
									valueField:'Kd_Tahun',
									textField:'Tahun',
									width:70,
									panelHeight:300,
							">
						
						&nbsp;&nbsp;&nbsp;&nbsp;	
						Program&nbsp; : &nbsp;&nbsp;
						<input class="easyui-combobox" id="filterProgramTahunan"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarProgram");?>',
									method:'post',
									valueField:'Kd_Program',
									textField:'Nama_Program',
									width:85,
									panelHeight:300
							">
						&nbsp;&nbsp;&nbsp;&nbsp;	
						Jenis&nbsp; : &nbsp;&nbsp;
						<input class="easyui-combobox" id="filterJenisTahunan"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarJenis");?>',
									method:'post',
									valueField:'Kd_Jenis',
									textField:'Nama_Jenis',
									width:90,
									panelHeight:300
							">
						<a href="#" class="easyui-linkbutton" iconCls="icon-clear" onclick="$('#formFilterTahunan').form('clear');">CLEAR FILTER</a>
						<a href="#" class="easyui-linkbutton c1" iconCls="icon-search" onclick="pencarian()">CARI</a>
						</form>
					</div>
					<div data-options="region:'center'" style="padding:4px;">
						<a href="#" class="easyui-linkbutton" iconCls="icon-add" onclick="tambahProgThn()">Tambah Program Tahunan</a>
					</div>
				</div>
		</div>
		<input type="hidden" id="row" value=""/>
		<input type="hidden" id="des" value=""/>
		<input type="hidden" id="buk" value=""/> 
		<input type="hidden" id="ptg" value=""/> 
		<input type="hidden" id="fieldPB" value=""/> 
	    <div id="jendelaBuatProgramTahunan" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:1000px; min-height:630px; padding:5px;">
	    <div id="jendelaUbahProgramTahunan" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:1000px; min-height:630px; padding:5px;">
		</div>
	</div>
</div>
<script type="text/javascript">
	function formatProgramTahunan(value,row,index){
		var e = '<a href="#" onclick="ubahProgThn()">Set</a>';
		var d = ' | <a href="#" onclick="if(confirm(&quot;Yakin akan dihapus?&quot;)){hapusProgram(&quot;'+row.Nomor+'&quot;)}">Hapus</a> ';
		return e+d;
	}
</script>
<script type="text/javascript">
	function formatTanggalMulai(value,row,index){
		var s = row.Tgl_Mulai;
		s = formatTanggal(String(s));
		return s;
	}
</script>
<script type="text/javascript">
	function formatTanggalSelesai(value,row,index){
		var s = row.Tgl_Selesai;
		s = formatTanggal(String(s));
		return s;
	}
</script>
<script>
	var pList=[];
	for(var i=0;i<100;i++){
		pList[i]=i+1;
	}
	
	$(function(){
		$("#dgProgramTahunan").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbTahunan',
			footer:'#ftTahunan',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSPITS");?>',
			method:'post',
			onRowContextMenu : function(e,field){
				//e.preventDefault();
				$('#mmUser').menu('show', {
					left: e.pageX,
					top: e.pageY
				});
			},
			onDblClickCell: function(index,field,value){
				ubahProgThn();
			},
			onClickCell:function(index,field,val){
				$('#col').val(field);
				//alert(index+field+val);
			},
			onClickRow:function(index,row){
				$('#row').val(row.Nomor);
				//alert(row.KODE);
				showBagian();
				showAuditor();
				showSasaran();
				showTujuan();
			},
			showFooter:true
			
		});
		
	});

	$(function(){
		$("#dgDetailBagian").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbDetailBagian',
			footer:'#ftDetailBagian',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarDetailBagian");?>',
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
			onClickCell:function(index,field,val){
				$('#fieldPB').val(field);
				// alert(index+field+val);
			},
			onClickRow:function(index,row){
				
			},
			
			onBeforeEdit:function(index,row){
				row.editing = true;
				updateAudit(index);
			},
			
			onBeginEdit:function(index,row){
				var editors = $('#dgAuditorProgram').datagrid('getEditors', index);
				var n1 = $(editors[0].target);
				// var n2 = $(editors[1].target);
			},
			onAfterEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onCancelEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onEndEdit:function(index,row){
				
			},
			showFooter:false

			
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
		
	});

	$(function(){
		$("#dgAuditorProgram").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbAuditor',
			footer:'#ftAuditor',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarAuditor");?>',
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
			onClickCell:function(index,field,val){
				$('#fieldPB').val(field);
				// alert(index+field+val);
			},
			onClickRow:function(index,row){
				
			},
			
			onBeforeEdit:function(index,row){
				row.editing = true;
				updateAudit(index);
			},
			
			onBeginEdit:function(index,row){
				var editors = $('#dgAuditorProgram').datagrid('getEditors', index);
				var n1 = $(editors[0].target);
				// var n2 = $(editors[1].target);
			},
			onAfterEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onCancelEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onEndEdit:function(index,row){
				
			},
			showFooter:false

			
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
		
	});

	$(function(){
		$("#dgSasaran").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbSasaran',
			footer:'#ftSasaran',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSasaran");?>',
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
			onClickCell:function(index,field,val){
				$('#fieldPB').val(field);
				// alert(index+field+val);
			},
			onClickRow:function(index,row){
				
			},
			
			onBeforeEdit:function(index,row){
				row.editing = true;
				updateAudit(index);
			},
			
			onBeginEdit:function(index,row){
				var editors = $('#dgAuditorProgram').datagrid('getEditors', index);
				var n1 = $(editors[0].target);
				// var n2 = $(editors[1].target);
			},
			onAfterEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onCancelEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onEndEdit:function(index,row){
				
			},
			showFooter:false

			
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
		
	});

	$(function(){
		$("#dgTujuan").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbTujuan',
			footer:'#ftTujuan',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarTujuan");?>',
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
			onClickCell:function(index,field,val){
				$('#fieldPB').val(field);
				// alert(index+field+val);
			},
			onClickRow:function(index,row){
				
			},
			
			onBeforeEdit:function(index,row){
				row.editing = true;
				updateAudit(index);
			},
			
			onBeginEdit:function(index,row){
				var editors = $('#dgAuditorProgram').datagrid('getEditors', index);
				var n1 = $(editors[0].target);
				// var n2 = $(editors[1].target);
			},
			onAfterEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onCancelEdit:function(index,row){
				row.editing = false;
				updateAudit(index);
			},
			onEndEdit:function(index,row){
				
			},
			showFooter:false

			
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
		
	});
	
	function updateAudit(index){
		$('#dgAuditorProgram').datagrid('updateRow',{
			index:index,
			row:{}
		});
	}
	function getRowIndex(target){
		var tr = $(target).closest('tr.datagrid-row');
		return parseInt(tr.attr('datagrid-row-index'));
	}
	function editaudit(target){ 
		$('#dgAuditorProgram').datagrid('beginEdit', getRowIndex(target));
	}
	function hapusProgram(nomor){ 
		
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/hapusProgramTahunan", 
			type		: "POST", 
			dataType	: "html",
			data		: {nomor:nomor},
			beforeSend	: function(){
					var win = $.messager.progress({
							title:'Mohon tunggu',
							msg:'Dalam proses...'
						});
			},
			success: function(response){
				$.messager.progress('close'); 
				alert(response);
				$('#dgProgramTahunan').datagrid('reload');
				$('#dgDetailBagian').datagrid('reload');
				$('#dgAuditorProgram').datagrid('reload');
				$('#dgSasaran').datagrid('reload');
				$('#dgTujuan').datagrid('reload');
			},
			error: function(){
				alert('error');
			}
		});
	}
	function deleterow(target){
		$.messager.confirm('Confirm','Are you sure?',function(r){
			if (r){
				$('#dgRekapPerBuku').datagrid('deleteRow', getRowIndex(target));
			}
		});
	}
	function saveaudit(target){
		$('#dgAuditorProgram').datagrid('endEdit', getRowIndex(target));
	}
	function cancelaudit(target){
		$('#dgAuditorProgram').datagrid('cancelEdit', getRowIndex(target));
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

	function showBagian(){
		var row = $('#row').val();
		$('#dgDetailBagian').datagrid('load',{
			Nomor: row
		});
	}
	
	function showAuditor(){
		var row = $('#row').val();
		$('#dgAuditorProgram').datagrid('load',{
			Nomor: row
		});
	}

	function showSasaran(){
		var row = $('#row').val();
		$('#dgSasaran').datagrid('load',{
			Nomor: row
		});
	}
	
	function showTujuan(){
		var row = $('#row').val();
		$('#dgTujuan').datagrid('load',{
			Nomor: row
		});
	}
	
	function pencarian(){
		$('#dgProgramTahunan').datagrid('load',{
			tahun: $('#filterTahunTahunan').combobox('getValue'),
			program: $('#filterProgramTahunan').combobox('getValue'),
			jenis: $('#filterJenisTahunan').combobox('getValue')
		});
	}
	
	function tambahProgThn(){
		var target = "#jendelaBuatProgramTahunan";
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/formTambahProgram", 
			type		: "POST", 
			dataType	: "html",
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
	}

	function ubahProgThn(){
		var target = "#jendelaUbahProgramTahunan";
		var nompk = $('#row').val();
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/kelola_spi_ts/formUbahProgram", 
			type		: "POST", 
			dataType	: "html",
			data 		: {nomor:nompk},
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
	}
	
</script>