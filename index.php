<?php
session_start();

if (!isset ($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPerhalaman = 100;
$jumlahData = count(query("SELECT * FROM pelanggan"));
$jumlahHalaman =ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset ($_GET["halaman"])) ? $_GET ["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$pelanggan = query("SELECT * FROM pelanggan LIMIT $awalData,$jumlahDataPerhalaman");

// tombol search di tekan
if(isset($_POST["search"])){
    $pelanggan = cari(($_POST["keyword"]));
  }

?>

<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Halaman Index</title>
            <!-- import bootstrap  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        </head>
        
        <body>
            <br>
            <!-- membuat container dengan lebar colomn col-lg-10  -->
            <div class="container col-lg-10">
                <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
                <h3 class="alert alert-info text-center" role="alert" >
                    Sistem Notifikasi Data Pelanggan Pln Menunggak
                </h3>
          
        <div class="text-right">
         <a href ="send_message.php" class="btn-link">Kirim pesan</a>
        <br>
        <a href ="logout.php" class="btn-link">logout</a>
        </div>
            <form action="" method="post">
                <input type="text" name="keyword" size="40" 
                    autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
                <button class="btn-info" type="submit" name="search">search</button> 
            </form>

            <!-- membuat form upload -->
            <br>
            <form method="post" enctype="multipart/form-data" action="proses_upload.php">
                        Pilih File:
                        <input class="form-control" name="filepelanggan" type="file" required="required">
                        <br>
                        <button class=" btn-secondary" type="submit" name="upload">Import</button>
                        <button class="btn-danger"> <a href ="hapus.php">Hapus</a></button>
                    </form>
                <br>
                    <table class="table">
                        <thead class="table-secondary">
                                <!-- set table header  -->
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Pelanggan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tagihan</th>
                                <th scope="col">Telepon</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php $i = 1; ?>
                    <?php foreach ($pelanggan as $data) : ?>
                <tr>
                    <td><?php echo $i; ?> </td>
                    <td><?php echo $data['idpel']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tagihan']; ?></td>
                    <td><?php echo $data['telepon']; ?></td>
                    <td>
                </td>
            </tr>
            <?php $i++; ?>
             <?php endforeach; ?>
        </tbody>
    </table>
         <!-- navigasi -->
            <br>
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <a href="?halaman=<?=$i; ?>" style="font-weight: bold; color: red;
                    "><?= $i; ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i; ?>"><?= $i; ?> </a>
                <?php endif; ?>
            <?php endfor;?>
            <br>
        
                </div>
            </div>
        </div>
    </body>   
</html>
        