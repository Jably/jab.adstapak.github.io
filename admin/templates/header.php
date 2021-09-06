<?php 
session_start();
if(!isset($_SESSION['username'])) {
  header("location:auth-login.php");
}

include('../function/config.php');
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = ".$_SESSION['id_login']."");
$user = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Tapak &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/vendor/dropify-master/dist/css/dropify.min.css">
  <link rel="stylesheet" href="../assets/vendor/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="../assets/vendor/lightbox2/dist/css/lightbox.min.css">
  <link rel="stylesheet" href="../assets/vendor/datatable/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/vendor/datatable/responsive/css/responsive.dataTables.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
