<?php
if($_GET[act]==''){
?>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
				  <h4 class="card-title">Data hairdresser</h4>
				</div>
				<div class="card-body">
					<a href="index.php?view=hairdresser&act=tambah" type="submit" class="btn btn-primary pull-right" >Tambahkan Data hairdresser</a>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="">
								<th>No </th>
								<th>Nama Hairdresser</th>
								<th>Keterangan</th>
								<th>Action</th>
							</thead>
							<tbody>
							<?php 
								$no=1;
								$tampil = mysql_query("SELECT * FROM hairdresser order by id_hairdresser");
								while($r=mysql_fetch_array($tampil)){
									echo "<tr><td>$no</td>
											  <td>$r[nama_hairdresser]</td>
											  <td>$r[keterangan]</td>
											  <td>
												<a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=hairdresser&act=edit&id=$r[id_hairdresser]'><span class='glyphicon glyphicon-edit'> Edit</span></a>
												<a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=hairdresser&hapus=$r[id_hairdresser]'><span class='glyphicon glyphicon-remove'> Hapus</span></a>
											  </td>
											</tr>";
								$no++;
								}
								if (isset($_GET[hapus])){
								  mysql_query("DELETE FROM hairdresser where id_hairdresser='$_GET[hapus]'");
								  echo "<script>document.location='index.php?view=hairdresser';</script>";
							  }
							?>
							</tbody>
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
                          <label class="bmd-label-floating">Nama hairdresser</label>
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
		mysql_query("INSERT INTO hairdresser (id_hairdresser,nama_hairdresser,keterangan) VALUE ('','$_POST[nama]','$_POST[keterangan]')");
		  echo "<script>document.location='index.php?view=hairdresser';</script>";
	  }
}else if($_GET[act]=='edit'){
	$edit = mysql_query("SELECT * FROM hairdresser where id_hairdresser='$_GET[id]'");
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
                          <label class="bmd-label-floating">Nama hairdresser</label>
                          <input type="text" name="nama" value="<?=$e[nama_hairdresser]?>" class="form-control">
                          <input type="hidden" name="id" value="<?=$e[id_hairdresser]?>" class="form-control">
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
		mysql_query("UPDATE hairdresser SET nama_hairdresser = '$_POST[nama]',keterangan = '$_POST[keterangan]' where id_hairdresser='$_POST[id]'");
		echo "<script>document.location='index.php?view=hairdresser';</script>";
	  }
}
?>
