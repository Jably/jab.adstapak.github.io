<?php 

include 'config.php';
include 'activity_log.php';

session_start();

$id = $_POST['id'];
$brand = $_POST['brand'];
$jenis_iklan = $_POST['jenis_iklan'];
$status = $_POST['status'];
$image_name = [$_FILES['gambar']['name'], $_FILES['gambar2']['name']];
$image_size = [$_FILES['gambar']['size'], $_FILES['gambar2']['size']];
$image_tmp = [$_FILES['gambar']['tmp_name'], $_FILES['gambar2']['tmp_name']];
$path = "../assets/img/".$image_name[0];
$path2 = "../assets/img/".$image_name[1];

if($_FILES['gambar']['name'] == '' || $_FILES['gambar2']['name'] == '') {
    $query = mysqli_query($koneksi, "UPDATE iklan SET brand = '$brand', status = '$status', jenis_iklan = '$jenis_iklan' WHERE id = '$id'");
    $_SESSION['success'] = "Iklan Berhasil di edit";
    header("location:../admin/iklan.php");
    // Catat Log
    date_default_timezone_set("Asia/Bangkok");
    $nama_user = get_user($_SESSION['id_login'], 'nama');
    $time = date('H:i');
    $detail_activity = "User <b>$nama_user</b> melakukan Update Iklan pada jam $time";
    history("Update", $detail_activity, $id_user);
} else {
    if($image_size[0] <= 5000000 && $image_size[1] <= 5000000) {
        if(move_uploaded_file($image_tmp[0], $path) && move_uploaded_file($image_tmp[1], $path2)) {
            $query = mysqli_query($koneksi, "UPDATE iklan SET iklan = '$image_name[0]', harga = '$image_name[1]', brand = '$brand', status = '$status', jenis_iklan = '$jenis_iklan' WHERE id = '$id'");
            
            if($query){
                $_SESSION['success'] = "Iklan Berhasil di edit";
                header("location:../admin/iklan.php");
            } else {
                $_SESSION['error'] = "Iklan Gagal di edit";
                header("location:../admin/iklan.php");
            }
        } else {
            $_SESSION['error'] = "Terjadi Kesalahan dengan Upload";
            header("location:../admin/iklan.php");
        }
        
    } else {
        $_SESSION['error'] = "Ukuran Gambar terlalu besar";
        header("location:../admin/iklan.php");
    }
}

?>