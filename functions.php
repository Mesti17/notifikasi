<?php 
//konek ke db  
$conn = mysqli_connect("localhost", "root", "", "pelanggan_pln" );

  
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows [] = $row;
        }
        return $rows;
    }

    function hapus (){
    
        $koneksi = mysqli_connect("localhost","root","","pelanggan_pln");

        mysqli_query($koneksi,"TRUNCATE TABLE pelanggan");
        echo "<script>window.alert('data berhasil di hapus!')</script>";
        echo "<script>window.location='".$_SERVER['HTTP_REFERER']."'</script>";
    
        }

function kirimPesan ($pesan, $no_wa){
    global $pesan, $no_wa;
    // $no_wa = '6281372151728';
    
    // echo "</br> function pesan ".$pesan."</br>";
    // echo "function no_wa ".$no_wa."</br>";

    // return
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=RQQDZNGZPUNGTAQE2D98&number=".$no_wa."&text=".$pesan,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",

    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    echo $response;
    }
}


    function cari($keyword){
        $query = "SELECT * FROM pelanggan WHERE
               idpel LIKE '%$keyword%' OR  
               nama LIKE '%$keyword%' OR 
               telepon LIKE '%$keyword%' 
            ";
        return query($query);
        }

    
    function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        //cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script> 
                    alert('username sudah terdaftar!')
             </script>";
             return false;
        }

        //cek konfirmasi passwword
        if( $password !== $password2){
            echo"<script>  
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