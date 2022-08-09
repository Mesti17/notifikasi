<?php
session_start();

include 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");

if (isset($_POST['kirim'])) {
    $pesan  = $_POST['send'];
    // $no_wa  = $_POST;

    // echo "No Wa".$no_wa;
    // kirimPesan($pesan,$no_wa);
    foreach ($pelanggan as $data) {

        $id = $data['id'];
        // echo $status . "<br>";

        $nama = $data['nama'];
        $no_wa = '62' . substr($data['telepon'], 1);
        // echo "No Wa ".$str;

        // echo "no hp ".$no_wa."</br>";
        // $no = '';

        $status = kirimPesan($nama, $no_wa);

        $status = mysqli_query($conn, "UPDATE pelanggan SET status='$status' WHERE id='$id'");
    }
    $_SESSION['pesan'] = "200";
    header("location:index.php");
}



if (isset($_POST['kirimAll'])) {

    foreach ($pelanggan as $row) {
        $no_wa = $row['telepon'];
        $tanggal = $row['tanggal'];
        $idpel = $row['idpel'];
        $nama = $row['nama'];
        $tagihan = $row['tagihan'];
        $tarif = $row['tarif'];
        $lembar = $row['lembar'];

        $pesan = "
    *PLN Pascabayar*\nTgl kirim : $tanggal\n\n*Informasi Tagihan*\n-----------------\nId Pelanggan : $idpel\nNama : $nama\nTarif/Daya : $tarif\nLembar : $lembar \n\nJml Tagihan   : Rp. $tagihan\n\n-----------------\nAbaikan jika sudah bayar\nTerimakasih\n\nPLN ULP Lhokseumawe Kota";
        $id = $row['id'];
        $status = kirimPesan($pesan, $no_wa);
        $status = mysqli_query($conn, "UPDATE pelanggan SET status='$status' WHERE id='$id'");
    }

    $_SESSION['pesan'] = "200";
    header("location:index.php");
}


function kirimPesan($pesan, $no_wa)
{
    $dataSending = array();
    $dataSending["api_key"] = "IVYNRG0UUIEHPGOW";
    $dataSending["number_key"] = "IiQfxBCMuO34hRLS";
    $dataSending["phone_no"] = $no_wa;
    $dataSending["message"] = $pesan;

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($dataSending),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($response, true);
    return $response['status'];
}
