<?php 
include 'config.php';
include 'activity_log.php';

session_start();

// Catat Log
date_default_timezone_set("Asia/Bangkok");
$nama_user = get_user($_SESSION['id_login'], 'nama');
$time = date('H:i');
$detail_activity = "User <b>$nama_user</b> melakukan logout akun pada jam $time";
history("Logout", $detail_activity, $id_user);
unset($_SESSION['username']);
unset($_SESSION['id_login']);
header("location:../admin/auth-login.php");


?>