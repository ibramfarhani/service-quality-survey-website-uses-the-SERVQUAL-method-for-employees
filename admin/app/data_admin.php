<?php
if($_GET[act]==''){
?>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
				  <h4 class="card-title">Data Administrator</h4>
				</div>
				<div class="card-body">
					<a href="index.php?view=data_admin&act=tambah" type="submit" class="btn btn-primary pull-right" >Tambahkan Data</a>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="">
								<th>No </th>
								<th>Nama admin</th>
								<th>Jenis Kelamin</th>
								<th>Email</th>
								<th>No. Telepon</th>
								<th>Alamat</th>
								<th>Username</th>
								<th>Password</th>
								<th>Action</th>
							</thead>
							<tbody>
							<?php 
								$no=1;
								$tampil = mysql_query("SELECT * FROM user order by id_user");
								while($r=mysql_fetch_array($tampil)){
									echo "<tr><td>$no</td>
											  <td>$r[nama_lengkap]</td>
											  <td>$r[jenis_kelamin]</td>
											  <td>$r[email]</td>
											  <td>$r[no_telpon]</td>
											  <td>$r[alamat]</td>
											  <td>$r[username]</td>
											  <td>$r[password]</td>
											  <td>
												<!--a class='btn btn-success btn-xs' title='Edit Data' href='index.php?view=data_admin&act=edit&id=$r[id_user]'><span class='glyphicon glyphicon-edit'> Edit</span></a-->
												<a class='btn btn-danger btn-xs' title='Delete Data' href='index.php?view=data_admin&hapus=$r[id_user]'><span class='glyphicon glyphicon-remove'> Hapus</span></a>
											  </td>
											</tr>";
								$no++;
								}
								if (isset($_GET[hapus])){
								  mysql_query("DELETE FROM user where id_user='$_GET[hapus]'");
								  echo "<script>document.location='index.php?view=data_admin';</script>";
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
                          <label class="bmd-label-floating">Nama Admin</label>
                          <input type="text" name="a" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin</label>
                          <input type="text" name="b" class="form-control">
                        </div>
                      </div>
                    </div>
					 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="c" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">No. Telepon</label>
                          <input type="text" name="d" class="form-control">
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" name="e" class="form-control">
                        </div>
                      </div>
                    </div>
					 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="user" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" name="pass" class="form-control">
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
		mysql_query("INSERT INTO user (id_user, username, password, nama_lengkap, jenis_kelamin, email, no_telpon, alamat) 
					VALUE ('', '$_POST[user]' ,md5('$_POST[pass]') ,'$_POST[a]' ,'$_POST[b]' ,'$_POST[c]' ,'$_POST[d]' ,'$_POST[e]' )");
		  echo "<script>document.location='index.php?view=data_admin';</script>";
	  }
}else if($_GET[act]=='edit'){
	$edit = mysql_query("SELECT * FROM user where id_user='$_GET[id]'");
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
                          <label class="bmd-label-floating">Nama user</label>
                          <input type="text" name="nama" value="<?=$e[nama_user]?>" class="form-control">
                          <input type="hidden" name="id" value="<?=$e[id_user]?>" class="form-control">
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
		mysql_query("UPDATE user SET nama_user = '$_POST[nama]',keterangan = '$_POST[keterangan]' where id_user='$_POST[id]'");
		echo "<script>document.location='index.php?view=data_admin';</script>";
	  }
}
?>
