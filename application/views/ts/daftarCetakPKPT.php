		<table id="dgCetakPKPT" style="width:100%;height:100%;" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'CBORDER',checkbox:true"></th>
					<th data-options="field:'Nomor'" width="15%">Nomor</th>
					<th data-options="field:'Obyek'" width="15%">Obyek</th>
					<th data-options="field:'Ruang_Lingkup'" width="20%">Ruang Lingkup</th>
					<th data-options="field:'Dasar'" width="12%">Dasar Audit/Monev</th>
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
			pageSize:20,
			pageList:pList,
			toolbar:'#tbCetakPKPT',
			url:'<?php echo base_url("index.php/ts/kelola_spi_ts/daftarSPITS");?>',
			method:'post'
		});
	});
	function pencarian(){ 
		$('#dgCetakPKPT').datagrid('load',{
			tahun: $('#filterTahunTahunan').combobox('getValue'),
			program: $('#filterProgramTahunan').combobox('getValue'),
			jenis: $('#filterJenisTahunan').combobox('getValue')
		});
	}
	function cetak(){
		var rows = $('#dgCetakPKPT').datagrid('getChecked');
		//alert(rows);
		// var tgl = moment("2011/11/11", "YYYY-MM-DD","id");
		// console.log(tgl.format('LL'));
		// console.log(rows[0].Nomor);
		if (rows.length == 0) {
			// alert('Tidak Ada Data Yang Akan Dicetak');
			$.messager.alert('Warning','Tidak Ada Data Yang Akan Dicetak');
		}else{
			$("#nomor_cetak").val(rows[0].Nomor);
			// $( "#vars" ).val(JSON.stringify(rows));
			$( "#cetakForm" ).submit();
			// console.log(rows[0].Nomor);
		}
	}
</script>
