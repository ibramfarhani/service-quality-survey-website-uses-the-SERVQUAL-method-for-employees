<?php
	$tampil 	= mysql_query("SELECT * FROM user order by id_user");
	$r			= mysql_fetch_assoc($tampil);
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
                  <form method="POST" action="index.php?view=edit_user" >
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" value="<?=$username?>" disabled class="form-control" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" value="<?=$password?>" disabled class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" value="<?=$nama?>" disabled class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Kelamin</label>
                          <input type="text" value="<?=$jk?>" disabled class="form-control">
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" value="<?=$email?>" disabled class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">No. Telepon</label>
                          <input type="text" value="<?=$telepon?>" disabled class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" value="<?=$alamat?>" disabled class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Edit Akun</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>

<?php

?>