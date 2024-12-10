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
					<form method="POST" action="">
						
						<select name='poli' style='padding:4px'>
                        <?php 
                            echo "<option value=''>- Semua -</option>";
                            $tahun = mysql_query("SELECT * FROM hairdresser");
                            while ($k = mysql_fetch_array($tahun)){
                              if ($_GET[tahun]==$k[nama_hairdresser]){
                                echo "<option value='$k[nama_hairdresser]' selected>$k[nama_hairdresser]</option>";
                              }else{
                                echo "<option value='$k[nama_hairdresser]'>$k[nama_hairdresser]</option>";
                              }
                            }
                        ?>
						</select>
						<button type="submit" name="update" class="btn btn-primary pull-center">Cari Data</button>
						</form>
            <?php
              $no=1;
              $src_poli ="";
              if($_POST[poli] !='') $src_poli=$_POST[poli];
              $tampil=mysql_query("SELECT * FROM tanswer WHERE hairdresser like '%$src_poli%' order by id asc");
            ?>
            <div>
              <form method="POST" action="laporan_perpoli.php">
                <input type='hidden' name='pilihan_poli' value='<?php echo $src_poli ?>' >
                <input type='submit' style='margin-top:-4px' class='btn btn-success btn-sm' value='Export Data PerHairdresser' name='exportdata'>
              </form>
              <form method="POST" action="laporan_semua.php">
                <input type='submit' style='margin-top:-4px' class='btn btn-success btn-sm' value='Export Data Semua' name='exportdata'>
              </form>
            </div>
            
 					</form>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="">
                <th>No </th>
                <th>Pelayanan Bagian</th>
                <th>Grup</th>
                <th>detail kepuasan</th>
                <th>respon kepuasan</th>
							</thead>
							<tbody>
	                 <?php 
                $no=1;
                $src_poli ="";
                if ($_POST[poli]     !='') $src_poli=$_POST[poli];
                $tampil = mysql_query("SELECT * FROM tanswer WHERE hairdresser like '%$src_poli%' order by id_tanswer asc");
                while($r=mysql_fetch_array($tampil)){
                  $pilihan_poli=$r[poli];
                  echo "<tr><td>$no</td>
                        <td>$r[hairdresser]</td>
                      <td>$r[groupid]</td>
                      <td>$r[kritikan]</td>
                      <td>$r[jawaban]</td>
                      </tr>";
                $no++;
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
                          <label class="bmd-label-floating">Nama Hairdresser</label>
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
                          <label class="bmd-label-floating">Nama poli</label>
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
