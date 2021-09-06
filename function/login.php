<?php 
include 'config.php';
include 'activity_log.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
 
$login = mysqli_query($koneksi, "select * from users where username='$username'");
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_assoc($login);

if ($cek > 0) {

    if (password_verify($password, $data['password'])) {
        // Buat session baru.
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id_login'] = $data['id'];
        header("location:../admin/index.php");
        // Catat Log
        date_default_timezone_set("Asia/Bangkok");
        $nama_user = get_user($_SESSION['id_login'], 'nama');
        $time = date('H:i');
        $detail_activity = "User <b>$nama_user</b> melakukan login akun pada jam $time";
        history("Login", $detail_activity, $id_user);

    } else {
        $_SESSION['error'] = "Username atau Password Salah";
        header("location:../admin/index.php");
    }
} else {
        $_SESSION['error'] = "Username atau Password Salah";
        header("location:../admin/index.php");

}

 
?>