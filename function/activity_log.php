<?php 


function get_user($id, $data) {
    include 'config.php';
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
    $users = mysqli_fetch_assoc($query);
    
    return $users[$data];
}

function history($activity, $detail_activity) {
    include 'config.php';
    date_default_timezone_set("Asia/Bangkok");
    $id_user = $_SESSION['id_login'];
    $ip = getHostByName(getHostName());
    $time = date('H:i:s');
    $date_created = date('Y-m-d H:i:s');
    $log = mysqli_query($koneksi, "INSERT INTO activity_log(activity, detail_activity, user, ip, time, date_created) VALUES('$activity', '$detail_activity', '$id_user', '$ip', '$time', '$date_created')");
    
    return $log;
}

?>