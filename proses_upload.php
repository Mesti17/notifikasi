<?php 

// menghubungkan dengan koneksi
require 'functions.php';

// menghubungkan dengan library excel reader
include "excel_reader.php";


// upload file xls
$target = basename($_FILES['filepelanggan']['name']) ;
move_uploaded_file($_FILES['filepelanggan']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepelanggan']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepelanggan']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import

for ($i=2; $i<=$jumlah_baris; $i++){

    // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
    $idpel     	    = $data->val($i, 1);
    $nama           = $data->val($i, 2);
    $tagihan  		= $data->val($i, 3);
    $telepon		= $data->val($i, 4);

    if($idpel != "" && $nama != "" && $tagihan != "" && $telepon != "")
    {
        // input data ke database (table barang)
        mysqli_query($conn,"INSERT into pelanggan values('', '$idpel' ,'$nama','$tagihan', '$telepon')");
        
    }
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepelanggan']['name']);

// alihkan halaman ke index.php
header("location:index.php");
?>