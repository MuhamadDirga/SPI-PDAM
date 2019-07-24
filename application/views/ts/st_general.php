<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'north'">
		<div class="pageTitle">Surat Tugas</div>
	</div>
	
	<div data-options="region:'center'" style="padding:5px;">
		<table id="dgSuratTugas" style="width:100%;height:50%;" title="Surat Tugas" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'Nomor'" width="15%">Nomor</th>
					<th data-options="field:'No_Tugas'" width="10%">Nomor Tugas</th>
					<th data-options="field:'Periode_Audit'" width="15%">Periode Audit</th>
					<th data-options="field:'Mulai'" formatter="formatTanggalMulai" width="9%">Tanggal Mulai</th>
					<th data-options="field:'Selesai'" formatter="formatTanggalSelesai" width="9%">Tgl Selesai</th>
					<th data-options="field:'Waktu'" width="5%">Waktu</th>
					<th data-options="field:'SET'" formatter="formatSuratTugas" width="7%">Set</th>
				</tr>
			</thead>
		</table>
		<table id="dgAuditorProgram" style="width:100%;height:35%;" title="Auditor" rownumbers="true" pagination="false" idField="No_PKPT">
			<thead>
				<tr>
					<th field="No_PKPT" width="7%">No Auditor</th>
					<th data-options="field:'Nama'" editor="{type:'combobox',id:'petugasSPK',options:{url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSemuaAuditor");?>',valueField:'NIP',textField:'Nama'}}" width="20%">Nama Lengkap</th>
					<th data-options="field:'Jabatan'" width="7%">Jabatan</th>
					<th data-options="field:'Index_Karyawan'" align="right"  width="10%">Index</th>
				</tr>
			</thead>
		</table>		
		<div id="tbTahunan" style="padding:5px;">
					<div data-options="region:'center'" style="padding:4px;">
						<a href="#" class="easyui-linkbutton" iconCls="icon-add" onclick="tambahSuratTugas()">Tambah Surat Tugas</a>
						<a href="#" class="easyui-linkbutton" onclick="daftarCetakPKPT()"><i class="fa fa-print"></i> Cetak Surat Tugas</a>
					</div>
				</div>
		</div>
		<input type="hidden" id="row" value=""/>
		<input type="hidden" id="des" value=""/>
		<input type="hidden" id="buk" value=""/> 
		<input type="hidden" id="ptg" value=""/> 
		<input type="hidden" id="fieldPB" value=""/> 
	    <div id="jendelaBuatSuratTugas" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:800px; min-height:530px; padding:5px;">
	    <div id="jendelaDaftarCetakPKPT" class="easyui-window" title="Cetak Surat Tugas" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:80%; min-height:500px; padding:5px;">
	    <div id="jendelaUbahSuratTugas" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:800px; min-height:330px; padding:5px;">
		</div>
	</div>
</div>
<script type="text/javascript">
	function formatSuratTugas(value,row,index){
		var e = '<a href="#" onclick="ubahSuratTugas()">Set</a>';
		return e;
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
		$("#dgSuratTugas").datagrid({
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
				ubahSuratTugas();
			},
			onClickCell:function(index,field,val){
				$('#col').val(field);
				//alert(index+field+val);
			},
			onClickRow:function(index,row){
				$('#row').val(row.Nomor);
				//alert(row.KODE);
				showAuditor();
			},
			showFooter:true
			
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
	function showAuditor(){
		var row = $('#row').val();
		$('#dgAuditorProgram').datagrid('load',{
			Nomor: row
		});
	}
		
	function pencarian(){
		$('#dgSuratTugas').datagrid('load',{
			tahun: $('#filterTahunTahunan').combobox('getValue'),
			program: $('#filterProgramTahunan').combobox('getValue'),
			jenis: $('#filterJenisTahunan').combobox('getValue')
		});
	}
	
	function tambahSuratTugas(){
		var target = "#jendelaBuatSuratTugas";
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/formTambahST", 
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
	function daftarCetakPKPT(){
		var target = "#jendelaDaftarCetakPKPT";
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/viewDaftarCetakPKPT", 
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
			}
		});
	}
	
	function ubahSuratTugas(){
		var target = "#jendelaUbahProgramTahunan";
		var nompk = $('#row').val();
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/surat_tugas_ts/formUbahST", 
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