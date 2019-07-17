<div class="easyui-layout" style="width:100%; height:100%; margin-bottom:5px;">
	<form id="formTambahTemuan" class="easyui-form" method="post" data-options="novalidate:true">
		<div data-options="region:'north'">
			<table id="dgTemuan" style="width:100%;height:100%;">
				<input name="tugas" id="tugas" type="hidden" value="<?php echo $tugas; ?>">
				<tr>
                	<td>Urut:</td>
                	<td><input name="txtUrut" id="txtUrut" class="f1 easyui-textbox" readonly="" value="<?php echo $urut; ?>"></input></td>
            	</tr>
            	<tr>
                	<td>Bagian:</td>
                	<td><input name="cbBagian" id="cbBagian" class="easyui-combobox" data-options="
											url:'<?php echo base_url("index.php/ts/temuan_ts/daftarBagian");?>',
											method:'post',
											valueField:'Kd_Bag',
											textField:'Nama_Bag',
											width:200,
											panelHeight:300,
											queryParams:{
						                        tugas:$('#tugas').val()
						                    },
									"></input></td>
            	</tr>
            	<tr>
                	<td>Isi:</td>
                	<td><input name="txtIsi" id="txtIsi" multiline="true" class="f1 easyui-textbox" style="width:100%;height:60px"></input></td>
            	</tr>
			</table>
		</div>
		<div data-options="region:'south'" style="padding:4px; height:35px;">
			<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpanTemuan()">SIMPAN</a>
			<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaTambahTemuan').window('close')">BATAL</a>
		</div>
	</form>
</div>
<script>
	function simpanTemuan(){
			var urut = $('#txtUrut').textbox('getValue');
			var kd = $('#cbBagian').combobox('getValue');
			var bagian = $('#cbBagian').combobox('getText');
			var isi = $('#txtIsi').textbox('getValue');
			var target = "#jendelaTambahTemuan";
			$('#dgDaftarTemuan').datagrid('appendRow',{
				Urut		: urut, 
				Kd_Bag		: kd,
				Nama_Bag	: bagian,
				Isi			: isi
			});
			$('#jendelaTambahTemuan').window('close');
		
	}
</script>