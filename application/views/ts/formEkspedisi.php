<div class="easyui-layout" style="width:100%; min-height:100%; margin-bottom:5px;">
	<form id="formEkspedisi" class="easyui-form" method="post" data-options="">
		<input type="hidden" id="credit" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
		<div data-options="region:'north'" style="padding:4px;height:590px">
			<table width="100%" border="0" cellpadding="2">
				<tr>
					<td style="width: 20%">Nomor : </td>
					<td style="width: 40%"><input style="width: 230px" id="cbNomor" class="easyui-combobox" name="cbNomor" data-options="valueField:'No_Tugas',textField:'Nomor',url:'<?php echo base_url("index.php/ts/ekspedisi_ts/daftarNomorProgram");?>'"></input></td>
					<td style="width: 10%;">No Tugas : </td>
					<td><input class="easyui-textbox" id="tugas" name="tugas" style="width: 100%" readonly=""></td>
				</tr>
				<tr>
					<td>Tgl Ke Direksi : </td>
					<td><input class="easyui-datebox" style="width:60%; height:28px;" name="tgl_ke" id="tgl_ke"></td>
					<td>Tgl Dari Direksi : </td>
					<td><input class="easyui-datebox" style="width:60%; height:28px;" name="tgl_dari" id="tgl_dari"></td>
				</tr>
				<tr>
					<td>Disposisi Direksi : </td>
					<td colspan="3"><input class="easyui-textbox"multiline="true" id="disposisi" style="width:100%;height:60px"></td>
				</tr>
			</table>
			<div style="text-align:center;margin-top:20px;">
				<a href="#" class="easyui-linkbutton" id="simpanBtn" iconCls="icon-ok" onclick="validasi()">SIMPAN</a>
				<a href="#" class="easyui-linkbutton c5" iconCls="icon-cancel" onclick="$('#jendelaEkspedisi').window('close')">BATAL</a>
			</div>
		</div>
		</div>
	</form>
</div>
<script type="text/javascript">
$(function(){
	$("#cbNomor").combobox({
    	onChange:function(){
    		var tugas = $("#cbNomor").combobox('getValue');
    		$("#tugas").textbox('setValue',tugas);
    	}
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
	function validasi(){
		var tugas = $('#tugas').textbox('getValue');
		var tgl_ke = $('#tgl_ke').datebox('getValue');
		var tgl_dari = $('#tgl_dari').datebox('getValue');
		var disposisi = $('#disposisi').textbox('getValue');
		if ($.trim(tugas) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(tgl_ke) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(tgl_dari) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else if($.trim(disposisi) == '') {
			$.messager.alert('Info', 'data tidak boleh kosong!', 'info');
		}else{
			updateEkspedisi();
		}
	}
	function updateEkspedisi(){
		var nomor = $("#cbNomor").combobox('getText');
		var tgl_ke = $("#tgl_ke").datebox('getValue');
		var ke = moment(tgl_ke, "DD-MM-YYYY","id").format('YYYY-MM-DD');
		var tgl_dari = $("#tgl_dari").datebox('getValue');
		var dari = moment(tgl_dari, "DD-MM-YYYY","id").format('YYYY-MM-DD');
		var disposisi = $("#disposisi").textbox('getValue');
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/ekspedisi_ts/updateEkspedisi", 
			type		: "POST", 
			dataType	: "html",
			data 		: {nomor:nomor,ke:ke,dari:dari,disposisi:disposisi},
			beforeSend	: function(){
				var win = $.messager.progress({
					title:'Mohon tunggu',
					msg:'Loading...'
				});
			},
			success: function(response){
				$('#dgEkspedisi').datagrid('reload');
				$.messager.progress('close'); 
				$('#jendelaEkspedisi').window('close');	
			},
		});
	}
</script>