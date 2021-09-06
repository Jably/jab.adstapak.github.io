<?php 

    $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "u6144784_tapak_ads";
	//updateads23!	

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if(!$koneksi) {
		die("Koneksi gagal : ".mysqli_connect_error());
	}

?>