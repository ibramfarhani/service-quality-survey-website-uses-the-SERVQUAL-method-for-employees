<?php
if($_GET[act]==''){
?>
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Data hairdresser
          <br>
            Keterangan :
          </br>
          <br>
          Keterangan dari nilai : 
          </br>
		  <br>
		  A	Sangat Baik	82% - 100%
		  </br>
		  <br>
		  B	Baik 63% - 81%
		  </br>
		  <br>
		  C	Cukup 43% - 62%
		  </br>
		  <br>
		  D	Buruk 25 % - 42%
		  </br>
		  <br>
		  E	Sangat Buruk 0 % - 24%
		  </br>
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
            
              <tbody>
              <?php
    error_reporting(1);
    $result=mysql_query("SELECT id_hairdresser from hairdresser group by id_hairdresser ");
    $kolom = 2;
    $array=array();
    while ($sql=mysql_fetch_array($result)) 
    {
      array_push($array, $sql);
    }
    $chunks=array_chunk($array, $kolom);

      foreach ($chunks as $chunk) {
          foreach ($chunk as $data) {
              echo "<div class='panel-body'>";
              $data2=mysql_fetch_array(mysql_query("SELECT *from hairdresser where id_hairdresser='$data[id_hairdresser]' group by id_hairdresser"));
              ?>
          <div class="panel panel-primary" style='margin-left:10px'>
            <div class="panel-heading">
              <div class="panel-title"><?php echo $data2['nama_hairdresser']; ?></div>
            </div>

            <div class="panel-body">
              <table id="myHTMLTable<?php echo $data2['id_hairdresser']; ?>" border="0" cellpadding="5" class="table table-striped">
                <tr>
                <th><font size=2 face=tahoma>Data</font></th> 
                <th><font size=2 face=tahoma>Jawaban A</font></th>
                <th><font size=2 face=tahoma>Jawaban B</font></th>
                <th><font size=2 face=tahoma>Jawaban C</font></th>
                <th><font size=2 face=tahoma>Jawaban D</font></th>
                <th><font size=2 face=tahoma>Jawaban E</font></th>
                </tr>
              <?php

              $sql = mysql_query("SELECT SUM(jawabanA) As TotalA,
                          SUM(jawabanB) As TotalB,
                          SUM(jawabanC) As TotalC,
                          SUM(jawabanD) As TotalD,
                          SUM(jawabanE) As TotalE
                          FROM tanswer where hairdresser = '$data2[nama_hairdresser]' ");
             // $nom = mysql_num_rows(mysql_query("SELECT * FROM tanswer where id_hairdresser='$data2[id_hairdresser]'"));
              
              $noo=1;
              $oke = mysql_fetch_array($sql);
            //  $hay=$oke['TotalA'];
              //echo "oke ceh".$data2['nama_hairdresser'];
                $a = $oke[TotalA];
                $b = $oke[TotalB];
                $c = $oke[TotalC];
                $d = $oke[TotalD];
                $e = $oke[TotalE];
                $tot = $a+$b+$c+$d+$e;
                
                $pa = ROUND(($a / $tot) * 100);
                $pb = ROUND(($b / $tot) * 100);
                $pc = ROUND(($c / $tot) * 100);
                $pd = ROUND(($d / $tot) * 100);
                $pe = ROUND(($e / $tot) * 100);
                  echo "<tr >
                    <td><font size=3 face=tahoma>Jumlah Jawaban</font></td>
                    <td><font size=2 face=tahoma>$a</font></td>
                    <td><font size=2 face=tahoma>$b</font></td>
                    <td><font size=2 face=tahoma>$c</font></td>
                    <td><font size=2 face=tahoma>$d</font></td>
                    <td><font size=2 face=tahoma>$e</font></td>
                    </tr>
                    <tr >
                    <td><font size=3 face=tahoma>Prosentase</font></td>
                    <td><font size=2 face=tahoma>$pa%</font></td>
                    <td><font size=2 face=tahoma>$pb%</font></td>
                    <td><font size=2 face=tahoma>$pc%</font></td>
                    <td><font size=2 face=tahoma>$pd%</font></td>
                    <td><font size=2 face=tahoma>$pe%</font></td>
                    </tr>
                    ";   
              ?>
            
              </table>
              <script type="text/javascript">
              $('#myHTMLTable<?php echo $data2[id_hairdresser]; ?>').convertToFusionCharts({
                swfPath: "fusion/Charts/",
                type: "MSColumn3D",
                data: "#myHTMLTable",
                dataFormat: "HTMLTable",
                width:500,
                height:300,
              });
              </script>
            </div>
          </div>
              <?php
              echo '</div>';
          }
          
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
                          <label class="bmd-label-floating">Nama hairdresser</label>
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
