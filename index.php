<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPerhalaman = 10;
$jumlahData = count(query("SELECT * FROM pelanggan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$pelanggan = query("SELECT * FROM pelanggan LIMIT $awalData,$jumlahDataPerhalaman");

// tombol search di tekan
if (isset($_POST["search"])) {
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
                        Halaman Import Data Pelanggan PLN
                    </h3>

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="send_message.php">Kirim Pesan</a></li>
                                <li><a href="registrasi.php">Tambah user</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>


                    <!-- <div class="card-body">
                        <div class="text-right">
                            <a href="send_message.php" class="btn-link">Kirim pesan</a>
                            <br>
                            <a href="logout.php" class="btn-link">logout</a>
                            <br>
                            <a href="registrasi.php" class="btn-link">Tambah User Baru</a>
                        </div>
                    </div> -->
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="">
                            <input class="form-control" type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
                            <button class="btn-info" type="submit" name="search">search</button>
                        </form>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="proses_upload.php">
                            Pilih File:
                            <input class="form-control" name="filepelanggan" type="file" required="required">
                            <br>
                            <button class=" btn-secondary" type="submit" name="upload">Import</button>
                            <button class="btn-danger"> <a href="hapus.php">Hapus</a></button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="box-typical-body">
                            <div class="table-responsive">
                                <table id="table-sm" class="table table-bordered table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">ID Pelanggan</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tarif</th>
                                            <th scope="col">Halaman</th>
                                            <th scope="col">Tagihan</th>
                                            <th scope="col">Telepon</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php $i = 1; ?>
                                        <?php foreach ($pelanggan as $data) : ?>
                                            <tr>
                                                <td><?php echo $i; ?> </td>
                                                <td><?php echo $data['tanggal']; ?></td>
                                                <td><?php echo $data['idpel']; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['tarif']; ?></td>
                                                <td><?php echo $data['lembar']; ?></td>
                                                <td><?php echo $data['tagihan']; ?></td>
                                                <td><?php echo $data['telepon']; ?></td>
                                                <?php if (isset($data['status'])) : ?>
                                                    <td><?php echo ($data['status'] == "200") ? "<p class='text-success'>terkirim </p>" :  "<p class='text-danger'>gagal</p>"; ?></td>
                                                <?php endif; ?>



                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h7>Halaman</h7>
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
                            <?php else : ?>
                                <a href="?halaman=<?= $i; ?>"><?= $i; ?> </a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>