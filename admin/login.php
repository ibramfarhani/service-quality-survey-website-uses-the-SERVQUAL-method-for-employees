<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin- Survey Kepuasan Pelanggan Wish Hair Studio
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Login Admin</h4>
                  <p class="card-category">Survey Kepuasan Pelanggan Wish Hair Studio</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="a" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="b" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary pull-right">Login</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            Tugas Akhir <i class="material-icons">favorite</i> by
            <a href="" target="_blank">Wish Team</a> @copyright2023.
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>

</html>
<?php 

if (isset($_POST[login])){
 $passlain= md5($_POST[b]);
 $pegawai = mysql_query("SELECT * FROM user WHERE username='".anti_injection($_POST[a])."' AND password='$passlain'");
 
 $hitungadmin = mysql_num_rows($pegawai);
 
 if ($hitungadmin >= 1){
    $r = mysql_fetch_array($pegawai);
	session_start();
    $_SESSION[id]     = $r[username];
    $_SESSION[level]    = $r[nama_lengkap];
    include "config/user_agent.php";
    mysql_query("INSERT INTO users_aktivitas VALUES('','$r[username]','$ip','$user_browser $version','$user_os','$r[nama_lengkap]','".date('H:i:s')."','".date('Y-m-d')."')");
    echo "<script>document.location='index.php';</script>";
 }else{
    echo "<script>window.alert('Maaf, Anda Tidak Memiliki akses');
                                  window.location=('index.php?view=login')</script>";
 }
}
?>

          
