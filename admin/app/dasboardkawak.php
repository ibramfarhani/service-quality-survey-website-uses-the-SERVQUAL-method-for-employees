<?php
if($_GET[act]==''){
?>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
				  <h4 class="card-title">Rekap Data </h4>
				</div>
				<div class="card-body">
					<form method="post" action="">
						<select name='poli' style='padding:4px'>
                        <?php 
                            echo "<option value=''>- Semua -</option>";
                            $tahun = mysql_query("SELECT * FROM poli");
                            while ($k = mysql_fetch_array($tahun)){
                              if ($_GET[tahun]==$k[id_poli]){
                                echo "<option value='$k[id_poli]' selected>$k[nama_poli]</option>";
                              }else{
                                echo "<option value='$k[id_poli]'>$k[nama_poli]</option>";
                              }
                            }
                        ?>
						</select>
						<button type="submit" name="update" class="btn btn-primary pull-center">Cari Data</button>
             <a class='btn btn-warning btn-xs'  href='index.php?view=unduh_semua&act=unduh'><span class='glyphicon glyphicon-remove'> Unduh</span></a>                       

 					</form>
					
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="">
								<th>No </th>
								<th>Pelayanan Bagian</th>
								<th>Tingkat Kepuasan</th>
								<th>Detail Kepuasan</th>
								
								<th>Action</th>
							</thead>
							<tbody>
							<?php 
								$no=1;
								$tampil = mysql_query("SELECT * FROM survey order by id_survey");
								while($r=mysql_fetch_array($tampil)){
									echo "<tr><td>$no</td>
											  <td>$r[poli]</td>
                        <td>$r[tgroup]</td>
                        <td>$r[kritikan]</td>
											  <td>
                        <a class='btn btn-warning btn-xs'  href='index.php?view=unduh&act=unduh'><span class='glyphicon glyphicon-remove'> Unduh</span></a>                       
											  </td>
											</tr>";
								$no++;
								}
								if (isset($_GET[hapus])){
								  mysql_query("DELETE FROM poli where id_poli='$_GET[hapus]'");
								  echo "<script>document.location='index.php?view=poli';</script>";
							  }
							?>
							</tbody>l
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?php
}else if($_GET[act]=='tambah'){
	?>
	<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Data</h4>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama poli</label>
                          <input type="text" name="nama" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Keterangan</label>
                          <input type="text" name="keterangan" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary pull-center">Simpan</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
	<?php
	  if (isset($_POST[simpan])){
		mysql_query("INSERT INTO poli (id_poli,nama_poli,keterangan) VALUE ('','$_POST[nama]','$_POST[keterangan]')");
		  echo "<script>document.location='index.php?view=poli';</script>";
	  }
}else if($_GET[act]=='edit'){
	$edit = mysql_query("SELECT * FROM poli where id_poli='$_GET[id]'");
    $e = mysql_fetch_array($edit);
	?>
	<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Tambah Data</h4>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama poli</label>
                          <input type="text" name="nama" value="<?=$e[nama_poli]?>" class="form-control">
                          <input type="hidden" name="id" value="<?=$e[id_poli]?>" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Keterangan</label>
                          <input type="text" name="keterangan" value="<?=$e[keterangan]?>" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary pull-center">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>
	<?php
	if (isset($_POST[update])){
		mysql_query("UPDATE poli SET nama_poli = '$_POST[nama]',keterangan = '$_POST[keterangan]' where id_poli='$_POST[id]'");
		echo "<script>document.location='index.php?view=poli';</script>";
	  }
}
?>
