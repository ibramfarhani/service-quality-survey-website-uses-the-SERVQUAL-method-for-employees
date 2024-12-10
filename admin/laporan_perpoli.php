 <?php
	
	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 2020 05:00:00 GMT"); 
	header("content-disposition: attachment;filename=laporan_hairdresser".date('dmY').".xls");
	
	mysql_connect("localhost","root","") or die("Gagal melakukan Koneksi!");
	mysql_select_db("survey") or die("Gagal memilih Database!");
	
	
	$pilihan_poli= $_POST['pilihan_poli'];
					
	$tampil= mysql_query("SELECT * FROM tanswer WHERE hairdresser='$pilihan_poli' order by id_tanswer");
	
 ?>
 <div class='box-body'>
	<table id='example' class='table table-bordered table-striped' rules='all' border='1'>
		<thead>
			<tr style='text-align:center; background-color:#c0ed0e;'>
				<th>No </th>
				<th>Pelayanan Bagian</th>
				<th>Group</th>
				<th>Detail Kepuasan</th>
				<th>Tingkat Kepuasan</th>
			</tr>
		</thead>
					
		 <tbody>			
		 <?php
		 
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			
			$no=1;
			//$tampil= mysql_query("SELECT * FROM tanswer WHERE hairdresser='$pilihan_poli' order by id_tanswer");
				while($r=mysql_fetch_array($tampil)){
					echo "<tr>
							<td>$no</td>
							<td>$r[hairdresser]</td>
							<td>$r[groupid]</td>
							<td>$r[kritikan]</td>
							<td>$r[jawaban]</td>
							
						</tr>";
					$no++;
				}
					
				echo '</tbody>';
 
			?>
	</table>
</div>
