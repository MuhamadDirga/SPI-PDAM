<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'north'">
		<div class="pageTitle">Temuan</div>
	</div>
	
	<div data-options="region:'center'" style="padding:5px;">
		<table id="dgTemu" style="width:100%;height:100%;" title="Temuan" rownumbers="true" pagination="true">
			<thead>
				<tr>
					<th data-options="field:'Nomor'" width="15%">Nomor</th>
					<th data-options="field:'No_Tugas'" width="10%" align="center">Nomor Tugas</th>
					<th data-options="field:'Meeting'" formatter="formatTanggalMeeting" width="12%">Tgl Audit Meeting</th>
					<th data-options="field:'LHA'" formatter="formatTanggalLHA" width="12%">Tgl LHA</th>
				</tr>
			</thead>
		</table>
		<div id="tbTemu" style="padding:5px;">
			    <div class="easyui-layout" style="width:100%; height:36px;">
					<div data-options="region:'east'" style="width:430px; text-align:left; padding:4px;">
						<form id="formFilterTemua">
						
						No Tugas&nbsp; : &nbsp;&nbsp;	
						<input class="easyui-combobox" id="filterTugasTemuan"
							name="language"
							data-options="
									url:'<?php echo base_url("index.php/ts/temuan_ts/daftarNomorTugas");?>',
									method:'post',
									valueField:'Nomor',
									textField:'No_Tugas',
									width:150,
									panelHeight:300,
							">
						<a href="#" class="easyui-linkbutton" iconCls="icon-clear" onclick="$('#formFilterTemua').form('clear');">CLEAR FILTER</a>
						<a href="#" class="easyui-linkbutton c1" iconCls="icon-search" onclick="pencarian()">CARI</a>
						</form>
					</div>
					<div data-options="region:'center'" style="padding:4px;">
						<a href="#" class="easyui-linkbutton" iconCls="icon-add" onclick="tambahTemuan()">Tambah Temuan</a>
					</div>
				</div>
		</div>
		<input type="hidden" id="row" value=""/>
		<input type="hidden" id="tgs" value=""/>
		<input type="hidden" id="fieldPB" value=""/> 
	    <div id="jendelaTemuan" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-print'" style="width:1200px; min-height:530px; padding:5px;">
		</div>
	</div>
</div>
<script type="text/javascript">
	function formatTanggalMeeting(value,row,index){
		var s = row.Tgl_Audit_Meeting;
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
	function formatTanggalLHA(value,row,index){
		var s = row.Tgl_LHA;
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
		$("#dgTemu").datagrid({
			singleSelect:true,
			checkOnSelect:false,
			collapsible:true,
			pageSize:20,
			pageList:pList,
			view: detailview,
			toolbar:'#tbTemu',
			footer:'#ftTemu',
			url:'<?php echo base_url("index.php/ts/temuan_ts/daftarTemuTS");?>',
			method:'post',
			detailFormatter:function(index,row){
		        return '<div style="padding:2px"><table class="ddv"></table></div>';
		    },
		    onExpandRow: function(index,row){
		        var ddv = $(this).datagrid('getRowDetail',index).find('table.ddv');
		        ddv.datagrid({
		            url:'<?php echo base_url("index.php/ts/temuan_ts/daftarTemuan");?>',
		            fitColumns:true,
		            singleSelect:true,
		            rownumbers:true,
		            queryParams:{
					    tugas:row.No_Tugas,
					},
		            loadMsg:'',
		            height:'auto',
		            columns:[[
		                {field:'Urut',title:'Urut',width:100},
		                {field:'Nama_Bag',title:'Bagian',width:100},
		                {field:'Isi',title:'Isi',width:100}
		            ]],
		            onResize:function(){
		                $('#temua').datagrid('fixDetailRowHeight',index);
		            },
		            onLoadSuccess:function(){
		                setTimeout(function(){
		                    $('#temua').datagrid('fixDetailRowHeight',index);
		                },0);
		            }
		        });
		        $('#temua').datagrid('fixDetailRowHeight',index);
		    },
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

	function getRowIndex(target){
		var tr = $(target).closest('tr.datagrid-row');
		return parseInt(tr.attr('datagrid-row-index'));
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
	
	function pencarian(){
		$('#dgTemu').datagrid('load',{
			nomor: $('#filterTugasTemuan').combobox('getText')
		});
	}
	
	function tambahTemuan(){
		var target = "#jendelaTemuan";
		$.ajax({
			url			: "<?php echo base_url(); ?>"+"index.php/ts/temuan_ts/formTemuan", 
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