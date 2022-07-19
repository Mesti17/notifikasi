<?php 
session_start();

if (!isset ($_SESSION["login"])){
  header("Location: login.php");
  exit;
}


$koneksi = mysqli_connect("localhost","root","","pelanggan_pln");

mysqli_query($koneksi,"TRUNCATE TABLE pelanggan");
echo "<script>window.alert('data berhasil di hapus!')</script>";
echo "<script>window.location='".$_SERVER['HTTP_REFERER']."'</script>";




?>
