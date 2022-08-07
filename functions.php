<?php
//konek ke db  
$conn = mysqli_connect("localhost", "root", "", "notifkasi_pln");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus()
{

    global $conn;

    mysqli_query($conn, "TRUNCATE TABLE pelanggan");
    echo "<script>window.alert('data berhasil di hapus!')</script>";
    echo "<script>window.location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
}



function kirimPesan($pesan, $no_wa)
{
    global $pesan, $no_wa;

    $dataSending = array();
    $dataSending["api_key"] = "IVYNRG0UUIEHPGOW";
    $dataSending["number_key"] = "nPFiXSWhdgIOswV1";
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
    echo $response;
}


function cari($keyword)
{
    $query = "SELECT * FROM pelanggan WHERE
               tanggal LIKE '%$keyword%' OR 
               idpel LIKE '%$keyword%' OR  
               nama LIKE '%$keyword%' OR
            --    tarif LIKE '%$keyword%' OR  
            --    daya LIKE '%$keyword%' OR 
            --    tagihan LIKE '%$keyword%' OR 
               telepon LIKE '%$keyword%' 
            ";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
                    alert('username sudah terdaftar!')
             </script>";
        return false;
    }

    //cek konfirmasi passwword
    if ($password !== $password2) {
        echo "<script>  
                    alert('konfirmasi password tidak sesuai');
                </script>";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password' )");

    return mysqli_affected_rows($conn);
}
