<?php 

include 'config.php';
include 'activity_log.php';

session_start();

$id = $_POST['id'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$user = mysqli_fetch_assoc($query);
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];

if(!password_verify($current_password, $user['password'])) {
    $_SESSION['error'] = 'Current Password Salah';
    header("location:../admin/changepassword.php");
} else {
    if($current_password == $new_password) {
        $_SESSION['error'] = 'Current Password tidak boleh sama dengan New Password';
        header("location:../admin/changepassword.php");
    } else {
        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        $query = mysqli_query($koneksi, "UPDATE users SET password = '$password_hash' WHERE id = '$id'");
        // Catat Log
        date_default_timezone_set("Asia/Bangkok");
        $nama_user = get_user($_SESSION['id_login'], 'nama');
        $time = date('H:i');
        $detail_activity = "User <b>$nama_user</b> melakukan Update Password pada jam $time";
        history("Update", $detail_activity, $id_user);
        if($query) {
            $_SESSION['success'] = 'Password Berhasil di ganti';
            header("location:../admin/profile.php");
        } else {
            $_SESSION['error'] = 'Password gagal di ganti';
            header("location:../admin/changepassword.php");
        }
    }
}

?>