<div class="form-group">
    <label for="name">Karyawan</label>
    <div class="controls">
        <select required name="cbKaryawan">
        	<option value="" disabled diselected>-- DAFTAR NIP --</option>
        <?php                                
        foreach ($karyawan as $row) {  
		 echo "<option value = ".$row['NIP'].">".$row['Nama_Karyawan']." ".$row['Index_Karyawan']."".$row['Kode_Jabatan']."".$row['Keterangan']."</option>";
		  }
		  echo"
		</select>"
		?>
    </div>
