<?php
require 'functions.php';

$koneksi = mysqli_connect("localhost","root","","pelanggan_pln");

if(isset($_POST['kirim'])){

    $pesan  = $_POST['pesan'];
    $no_wa  = $_POST['no_key'];

    // echo "No Wa".$no_wa;
    // kirimPesan($pesan,$no_wa);

    $pelanggan = query("SELECT * FROM pelanggan");
    foreach ($pelanggan as $data){
        $nama = $data['nama'];

        $no_wa = '62'.substr($data['telepon'], 1);
        // echo "No Wa ".$str;

        // echo "no hp ".$no_wa."</br>";
        // $no = '';
        kirimPesan($nama,$no_wa);
    }    
}   


    




// if(isset($_POST['kirim'])){
// if (kirimPesan($_POST)){
//   echo $response;
// }else
//     echo "cURL Error #:" . $err;
// }


// for(loop data pelanggan){
//   get no_hp
//   get nama

//   kirimdata(nohp, pesan, nama)
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kirim Pesan</title>
    <!-- import bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <br>
    <!-- membuat container dengan lebar colomn col-lg-10  -->
    <div class="container col-lg-8">
        <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
        <h3 class="alert alert-info text-center" role="alert">
            Kirim Pesan Notifikasi
        </h3>
        <br>



        <!-- membuat card untuk membungkus tabel bootstrap  -->
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">No Key</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="no_key"
                                        placeholder="masukkan no admin" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Pesan</label>
                                <div class="col-md-8">
                                    <textarea name="pesan" rows="7" cols="52" id="kirim" value=""></textarea>
                                </div>
                            </div>
                            <button type="submit" name="kirim" class="btn btn-info pull-right">Kirim </button>
                        </form>
                        
                </div>
              

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>