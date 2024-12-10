<?php
if($_GET[act]==''){
?>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
				  <h4 class="card-title">Data Pilihan Kritikan</h4>
				</div>
				<div class="card-body">
					<a href="index.php?view=kritik&act=tambah" type="submit" class="btn btn-primary pull-right" >Tambahkan Data</a>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="">
								<th>No </th>
                <th>ID Kritikan </th>
								<th>id grup</th>
								<th>nama kritikan</th>
                
								<th>Action</th>
							</thead>
							<tbody>
							<?php 
								$no=1;
								$tampil = mysql_query("SELECT * FROM kritikan order by id_kritikan");
								while($r=mysql_fetch_array($tampil)){
									echo "<tr><td>$no</td>
                        <td>$r[id_kritikan]</td>
											  <td>$r[groupid]</td>
											  <td>$r[nama_kritikan]</td>

											  <td>
												<a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=kritik&act=edit&id=$r[id_kritikan]'><span class='glyphicon glyphicon-edit'> Edit</span></a>
												<a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=kritik&hapus=$r[id_kritikan]'><span class='glyphicon glyphicon-remove'> Hapus</span></a>
											  </td>
											</tr>";
								$no++;
								}
								if (isset($_GET[hapus])){
								  mysql_query("DELETE FROM kritikan where id_kritikan='$_GET[hapus]'");
								  echo "<script>document.location='index.php?view=kritik';</script>";
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
                          <label class="bmd-label-floating">Nama group</label>
                          <select name='nama' style='padding:4px'>
                                    <?php 
                                        echo "<option value=''>- Semua -</option>";
                                        $tahun = mysql_query("SELECT * FROM tgroup");
                                        while ($k = mysql_fetch_array($tahun)){
                                          if ($_GET[tahun]==$k[groupid]){
                                            echo "<option value='$k[groupid]' selected>$k[groupname]</option>";
                                          }else{
                                            echo "<option value='$k[groupid]'>$k[groupname]</option>";
                                          }
                                        }
                                    ?>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Kritikan</label>
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
		mysql_query("INSERT INTO kritikan (id_kritikan,groupid,nama_kritikan) VALUE ('','$_POST[nama]','$_POST[keterangan]')");
		  echo "<script>document.location='index.php?view=kritik';</script>";
	  }
}else if($_GET[act]=='edit'){
	$edit = mysql_query("SELECT * FROM kritikan WHERE id_kritikan='$_GET[id]'");
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
                    <input type="hidden" name="id" value="<?php echo $e[id_kritikan] ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Kritikan</label>
                          <select name="groupid"  class="form-control">
                <?php 
                $sql = mysql_query("SELECT * FROM tgroup");
                  while($data = mysql_fetch_array($sql)){
                  if($r[groupid] == $data[groupid]){
                    echo "<option value='$data[groupid]' SELECTED>$data[groupname]</option>";
                  }
                  else{
                    echo "<option value='$data[groupid]'>$data[groupname]</option>";
                  }
                  }
    
                ?>
              </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Kritikan</label>
                          <input type="text" name="nama_kritikan" value="<?=$e[nama_kritikan]?>" class="form-control">
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
    mysql_query("UPDATE kritikan SET groupid = '$_POST[groupid]',nama_kritikan = '$_POST[nama_kritikan]' where id_kritikan='$_POST[id]'");
    echo "<script>document.location='index.php?view=kritik';</script>";
    }
}
?>
