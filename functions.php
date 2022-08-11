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
