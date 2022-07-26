<?php 
session_start();

if (!isset ($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
include 'functions.php';

mysqli_query($conn,"TRUNCATE TABLE pelanggan");
echo "<script>window.alert('data berhasil di hapus!')</script>";
echo "<script>window.location='".$_SERVER['HTTP_REFERER']."'</script>";




?>
