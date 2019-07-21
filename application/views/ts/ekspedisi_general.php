<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'north'">
		<div class="pageTitle">Ekspedisi</div>
	</div>
	
	<div data-options="region:'center'" style="padding:5px;">
		<table id="dgEkspedisi" style="width:100%;height:100%;" title="Ekspedisi" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'Nomor'" width="15%">Nomor</th>
					<th data-options="field:'No_Tugas'" width="10%" align="center">Nomor Tugas</th>
					<th data-options="field:'Ke'" formatter="formatTanggalKe" width="12%">Tgl Ke Direksi</th>
					<th data-options="field:'Dari'" formatter="formatTanggalDari" width="12%">Tgl Dari Direksi</th>
					<th data-options="field:'Disposisi_Direksi'" width="50%">Disposisi Direksi</th>
				</tr>
			</thead>
		</table>
		<div id="tbEkspedisi" style="padding:5px;">
			    <div class="easyui-layout" style="width:100%; height:36px;">
					<div data-options="region:'east'" style="width:430px; text-align:left; padding:4px;">
						<form id="formFilterEkspedisi">
						
						Tahun&nbsp; : &nbsp;&nbsp;	
						<input class="easyui-combobox" id="filterTahunEkspedisi"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarTahun");?>',
									method:'post',
									valueField:'Kd_Tahun',
									textField:'Tahun',
									width:70,
									panelHeight:300,
							">
						<a href="#" class="easyui-linkbutton" iconCls="icon-clear" onclick="$('#formFilterEkspedisi').form('clear');">CLEAR FILTER</a>
						<a href="#" class="easyui-linkbutton c1" iconCls="icon-search" onclick="pencarian()">CARI</a>
						</form>
					</div>
					<div data-options="region:'center'" style="padding:4px;">
						<a href="#" class="easyui-linkbutton" iconCls="icon-add" onclick="tambahEkspedisi()">Tambah Ekspedisi</a>
					</div>
				</div>
		</div>
		<input type="hidden" id="row" value=""/>
		<input type="hidden" id="tgs" value=""/>
		<input type="hidden" id="fieldPB" value=""/> 
	    <div id="jendelaEkspedisi" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:800px; min-height:230px; padding:5px;">
		</div>
	</div>
</div>
<script type="text/javascript">
	function formatTanggalKe(value,row,index){
		var s = row.Tgl_Ke_Direksi;
		if (s == null) {
			return '';
		}
		else{
			s = moment(s, "YYYY-MM-DD","id").format('LL');
			return s;
		}
	}
</script>
<script type="text/javascript">
	function formatTanggalDari(value,row,index){
		var s = row.Tgl_Dari_Direksi;
		if (s == null) {
			return '';
		}
		else{
			s = moment(s, "YYYY-MM-DD","id").format('LL');
			return s;
		}
	}
</script>
<script>
	var pList=[];
	for(var i=0;i<100;i++){
		pList[i]=i+1;
	}

	$(function(){
		$("#dgEkspedisi").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbEkspedisi',
			footer:'#ftEkspedisi',
			url:'<?php echo base_url("index.php/ts/ekspedisi_ts/daftarEkspedisiTS");?>',
			method:'post',
			onRowContextMenu : function(e,field){
				//e.preventDefault();
				$('#mmUser').menu('show', {
					left: e.pageX,
					top: e.pageY
				});
			},
			onDblClickCell: function(index,field,value){
				
			},
			onClickCell:function(index,field,val){
				$('#col').val(field);
				//alert(index+field+val);
			},
			onClickRow:function(index,row){
				$('#row').val(row.Nomor);
				//alert(row.KODE);
			},
			showFooter:false
			
		});
		
	});
	
	function pencarian(){
		$('#dgEkspedisi').datagrid('load',{
			tahun: $('#filterTahunEkspedisi').combobox('getValue')
		});
	}
	
	function tambahEkspedisi(){
		var target = "#jendelaEkspedisi";
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/ekspedisi_ts/formEkspedisi", 
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
	
</script>