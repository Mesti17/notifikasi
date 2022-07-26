<?php
session_start();

include 'functions.php';

if (!isset ($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }

  $data = mysqli_query($conn, "SELECT * FROM pelanggan");

$i = 0;

$list_pesan[]='';

  foreach($data as $row ){
    $no_wa = $row['telepon'];
    $tanggal = $row['tanggal'];
    $idpel = $row['idpel'];
    $nama = $row['nama'];
    $tagihan = $row['tagihan'];
    $tarif = $row['tarif'];
    $daya = $row['daya'];
    $lembar = $row['lembar'];

    $pesan = "
    PLN Pascabayar
    Tgl kirim : $tanggal
    
    Informasi Tagihan
    -----------------
    Id Pelanggan : $idpel
    Nama : $nama
    Tarif/Daya : $tarif/$daya
    Lembar : $lembar 
    
    Jml Tagihan   : Rp. $tagihan
    
    -----------------
    Abaikan jika sudah bayar
    Terimakasih
    
    PLN ULP Lhokseumawe Kota";

    array_push($list_pesan, $pesan);
    kirimPesan($pesan, $no_wa);




  }
    var_dump ($list_pesan);



?>
