<?php 

include 'config.php';
include 'activity_log.php';

session_start();

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM activity_log WHERE id = '$id'");

if($query) {
    $_SESSION['error'] = "Activity Log Berhasil di delete";
    header("Location:../admin/activity_log.php");
    // Catat Log
    date_default_timezone_set("Asia/Bangkok");
    $nama_user = get_user($_SESSION['id_login'], 'nama');
    $time = date('H:i');
    $detail_activity = "User <b>$nama_user</b> melakukan Delete Activity Log pada jam $time";
    history("Delete", $detail_activity, $id_user);
} else {
    $_SESSION['error'] = "Activity Log Gagal di delete";
    header("Location:../admin/activity_log.php");
}

?>