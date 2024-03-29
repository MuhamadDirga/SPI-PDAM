		<table id="dgCetakPKPT" style="width:100%;height:100%;" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'CBORDER',checkbox:true"></th>
					<th data-options="field:'Nomor'" width="15%">Nomor</th>
					<th data-options="field:'Program'" width="7%">Program</th>
					<th data-options="field:'Jenis'" width="7%">Jenis</th>
					<th data-options="field:'No_Tugas'" width="10%">Nomor Tugas</th>
					<th data-options="field:'Tahun'" width="10%">Tahun</th>
					<th data-options="field:'Tgl_Pembuaan'" width="12%">Tgl Pembuatan</th>
					<th data-options="field:'Credit'" width="10%">Credit</th>
				</tr>
			</thead>
		</table>
<div id="tbCetakPKPT" style="padding:5px;">
	<div class="easyui-layout" style="width:100%; height:36px;">
					<div data-options="region:'west'" style="width:100%; text-align:left; padding:4px;">
						<form id="formFilterCetakPKPT">
						
						Tahun&nbsp; : &nbsp;&nbsp;	
						<input class="easyui-combobox" id="filterTahunCetak"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarTahun");?>',
									method:'post',
									valueField:'Kd_Tahun',
									textField:'Tahun',
									width:70,
									panelHeight:300,
							">
						Program&nbsp; : &nbsp;&nbsp;
						<input class="easyui-combobox" id="filterProgramCetak"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarProgram");?>',
									method:'post',
									valueField:'Kd_Program',
									textField:'Nama_Program',
									width:85,
									panelHeight:300
							">
						Jenis&nbsp; : &nbsp;&nbsp;
						<input class="easyui-combobox" id="filterJenisCetak"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarJenis");?>',
									method:'post',
									valueField:'Kd_Jenis',
									textField:'Nama_Jenis',
									width:90,
									panelHeight:300
							">

						<a href="#" class="easyui-linkbutton" iconCls="icon-clear" onclick="$('#formFilterCetakPKPT').form('clear');">CLEAR FILTER</a>
						<a href="#" class="easyui-linkbutton c1" iconCls="icon-search" onclick="pencarian()">CARI</a>
						&nbsp;&nbsp;&nbsp;
						<a href="#" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak()">CETAK</a>
					</form>
				<form id="cetakForm" action="<?php echo base_url("index.php/ts/kelola_spi_ts/CetakPKPT"); ?>" target="_blank" method="post">
				<input type="hidden" id="nomor_cetak" name="nomor_cetak" value="" />
				</form>
		</div>
		</div>
	</div>
</div>
<script>
	var pList=[];
	for(var i=0;i<100;i++){
		var aa = i+1;
		pList[i]=aa+"0";
	}
	
	$(function(){
		$("#dgCetakPKPT").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			toolbar:'#tbCetakPKPT',
			footer:'#ftCetakPKPT',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSPITSDesc");?>',
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
				// showBagian();
				// showAuditor();
				// showSasaran();
				// showTujuan();
			},
			showFooter:false
			
		});
		
	});

	function pencarian(){ 
		$('#dgCetakPKPT').datagrid('load',{
			tahun: $('#filterTahunCetak').combobox('getValue'),
			program: $('#filterProgramCetak').combobox('getValue'),
			jenis: $('#filterJenisCetak').combobox('getValue')
		});
	}
	function cetak(){
		var rows = $('#dgCetakPKPT').datagrid('getChecked');
		//alert(rows);
		if (rows.length == 0) {
			$.messager.alert('Warning','Tidak Ada Data Yang Akan Dicetak');
		}else{
			$("#nomor_cetak").val(rows[0].Nomor);
			// $( "#vars" ).val(JSON.stringify(rows));
			$( "#cetakForm" ).submit();
		}
	}
</script>
