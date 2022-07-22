<?php
require 'functions.php';

if(isset($_POST['kirim'])){

    $pesan  = $_POST['send'];
    $no_wa  = $_POST;
    

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Kirim Pesan</title>
    <!-- import bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a341d667ca.js" crossorigin="anonymous"></script>
</head>

<body>
    <br>
    <!-- membuat container dengan lebar colomn col-lg-10  -->
    <div class="container col-lg-8">
        <!-- membuat card untuk membungkus tabel bootstrap  -->
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
        <h3 class="alert alert-info text-center" role="alert">
            Kirim Pesan Notifikasi
        </h3>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="">

                        <div class="form-group">
                        <label>Pilih isi pesan</label>
                        <div class="radio">
                          <label>
                            <input type="radio" name="pesan" value = "Assalamualaikum wr.wb Bapak/Ibu pelanggan PLN yang terhormat. Mohon segera selesaikan tagihan listrik anda karna telah melewati batas pembayaran. Berikut adalah total tagihan anda Terima Kasih Wassalam" checked>
                            Assalamualaikum wr.wb Bapak/Ibu pelanggan PLN yang terhormat
                            Mohon segera selesaikan tagihan listrik anda karna telah melewati batas pembayaran.
                            Terima Kasih.
                            Wassalam
                          </label>
                        </div>
                        <div class="radio ">
                          <label>
                          <input type="radio" name="pesan" value = "Assalamualaikum wr.wb Bapak/Ibu pelanggan PLN yang terhormat. Mohon segera selesaikan tagihan listrik anda karna telah melewati batas pembayaran. Berikut adalah total tagihan anda Terima Kasih Wassalam" >
                            Assalamualaikum wr.wb Bapak/Ibu pelanggan PLN yang terhormat
                            Mohon segera selesaikan tagihan listrik anda karna telah melewati batas pembayaran.
                            Terima Kasih.
                            Wassalam
                          </label>
                        </div>
                        </div>
                      </div>

                <!-- textarea -->
                    <script>
                      function displayRadioValue() {
                          var ele = document.getElementsByName('pesan');
                            
                          for(i = 0; i < ele.length; i++) {
                              if(ele[i].checked)
                              document.getElementById("textarea").innerHTML= ele[i].value;
                          }
                      }
                  </script>
                    <div class="form-group">
                        <label>Isi Pesan</label>
                        <textarea class="form-control" onclick="displayRadioValue()" name="send" id="textarea" rows="6" placeholder="Klik di sini untuk melihat isi pesan"></textarea>
                    </div>    
                            <div>
                                <div class="text-center">
                                <button type="submit" name="kirim" class="btn btn-primary ">Kirim </button>
                            </div>
                            </div>
                            <div class="text-right">
                            <a href ="index.php" class="btn-link">Kembali</a>
                            </div>
                           
                        </form>  
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>