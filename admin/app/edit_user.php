<?php
	$tampil 	= mysql_query("SELECT * FROM user order by id_user");
	$r			= mysql_fetch_assoc($tampil);
	$id			= $r[id_user];
	$username	= $r[username];
	$password	= $r[password];
	$nama		= $r[nama_lengkap];
	$jk			= $r[jenis_kelamin];
	$email		= $r[email];
	$telepon	= $r[no_telpon];
	$alamat		= $r[alamat];
?>
 <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">User Profile</h4>
                  <p class="card-category">Selamat Datang <?=$nama?></p>
                </div>
                <div class="card-body">
                  <form method="POST" action="" >
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" value="<?=$username?>" name="user" class="form-control" >
						  <input type="hidden" value="<?=$id?>" name="id" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" value="<?=$password?>" name="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" value="<?=$nama?>" name="a" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin</label>
                          <input type="text" value="<?=$jk?>" name="b" class="form-control">
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" value="<?=$email?>" name="c" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">No. Telepon</label>
                          <input type="text" value="<?=$telepon?>" name="d" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" value="<?=$alamat?>" name="e" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">    
              </div>
            </div>
          </div>
        </div>

<?php
if (isset($_POST[update])){
		mysql_query("UPDATE user SET username = '$_POST[user]',password = md5('$_POST[password]'), nama_lengkap = '$_POST[a]',jenis_kelamin = '$_POST[b]',
							email = '$_POST[c]',no_telpon = '$_POST[d]', alamat = '$_POST[e]' where id_user='$_POST[id]'");
		echo "<script>document.location='index.php?view=user';</script>";
	  }
?>