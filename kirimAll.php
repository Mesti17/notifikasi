<?php
session_start();

include 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM pelanggan");

$i = 0;

foreach ($data as $row) {

    $no_wa = $row['telepon'];
    $tanggal = $row['tanggal'];
    $idpel = $row['idpel'];
    $nama = $row['nama'];
    $tagihan = $row['tagihan'];
    $tarif = $row['tarif'];
    $lembar = $row['lembar'];

    $pesan = "
    *PLN Pascabayar*
    Tgl kirim : $tanggal
    
    *Informasi Tagihan*
    -----------------
    Id Pelanggan : $idpel
    Nama : $nama
    Tarif/Daya : $tarif
    Lembar : $lembar 
    
    Jml Tagihan   : Rp. $tagihan
    
    -----------------
    Abaikan jika sudah bayar
    Terimakasih
    
    PLN ULP Lhokseumawe Kota";
    $id = $row['id'];
    $status = kirimPesan($pesan, $no_wa);
    $status = mysqli_query($conn, "UPDATE pelanggan SET status='$status' WHERE id='$id'");
}

header("location:index.php");
