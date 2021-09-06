<?php 

include 'config.php';
include 'activity_log.php';

session_start();

$nama = $_POST['nama'];
$telp = $_POST['no_telp'];
$bio = $_POST['bio'];
$id = $_SESSION['id_login'];
$image_name = $_FILES['gambar']['name'];
$image_size = $_FILES['gambar']['size'];
$image_tmp = $_FILES['gambar']['tmp_name'];
$path = "../admin/assets/img/".$image_name;

if($_FILES['gambar']['name'] == '') {
    $query = mysqli_query($koneksi, 
            "UPDATE users 
             SET nama = '$nama', no_telp = '$telp', bio = '$bio' 
             WHERE id = '$id'");    
    $_SESSION['success'] = "Profile berhasil di update";
    header("location:../admin/profile.php");
    // Catat Log
    date_default_timezone_set("Asia/Bangkok");
    $nama_user = get_user($_SESSION['id_login'], 'nama');
    $time = date('H:i');
    $detail_activity = "User <b>$nama_user</b> melakukan Update Profile pada jam $time";
    history("Update", $detail_activity, $id_user);
} else {
    if($image_size[0] <= 5000000) {
        if(move_uploaded_file($image_tmp, $path)) {
            $query = mysqli_query($koneksi, 
            "UPDATE users 
             SET nama = '$nama', no_telp = '$telp', bio = '$bio', image = '$image_name' 
             WHERE id = '$id'");            
            if($query){
                $_SESSION['success'] = "Profile berhasil di update";
                header("location:../admin/profile.php");
            } else {
                $_SESSION['error'] = "Profile gagal di update";
                header("location:../admin/profile.php");
            }
        } else {
            $_SESSION['error'] = "Terjadi Kesalahan dengan Upload";
            header("location:../admin/profile.php");
        }
        
    } else {
        $_SESSION['error'] = "Ukuran Gambar terlalu besar";
        header("location:../admin/profile.php");
    }
}

?>