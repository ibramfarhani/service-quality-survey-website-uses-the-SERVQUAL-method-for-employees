<?php
date_default_timezone_set('Asia/Jakarta');
$server = "localhost";
$username = "root";
$password = "";
$database1 = "pme";
$database2 = "pme_pendaftaran";

$dbh1= mysql_connect($server,$username,$password);
$dbh2= mysql_connect($server,$username,$password, true);

mysql_select_db($database1,$dbh1);
mysql_select_db($database2,$dbh2);

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

function average($arr){
   if (!is_array($arr)) return false;
   return array_sum($arr)/count($arr);
}

function cek_session_admin(){
	$level = $_SESSION[level];
	if ($level != 'superuser' AND $level != 'kepala'){
		echo "<script>document.location='index.php';</script>";
	}
}

function cek_session_guru(){
	$level = $_SESSION[level];
	if ($level != 'guru' AND $level != 'superuser' AND $level != 'kepala'){
		echo "<script>document.location='index.php';</script>";
	}
}

function cek_session_siswa(){
	$level = $_SESSION[level];
	if ($level == ''){
		echo "<script>document.location='index.php';</script>";
	}
}

?>