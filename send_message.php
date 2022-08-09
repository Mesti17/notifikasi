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
                        <form method="POST" enctype="multipart/form-data" action="kirimAll.php">

                            <div class="form-group">
                                <label class="fw-bold text-dark">Format Pesan Tagihan :</label>
                                <br>
                                <pre>
PLN Pascabayar
Tgl kirim : $tanggal

Informasi Tagihan
-----------------
Id Pelanggan : $idpel
Nama : $nama
Tarif/Daya : $tarif/$daya
Lembar : $lembar

Jml Tagihan : Rp. $tagihan

-----------------
Abaikan jika sudah bayar
Terimakasih

PLN ULP Lhokseumawe Kota
</pre>
                            </div>

                            <div class="form-group">
                                <label class="fw-bold text-dark">Pesan </label>
                                <textarea class="form-control" onclick="displayRadioValue()" name="send" id="textarea" rows="6" placeholder="Klik di sini untuk membuat pesan Baru"></textarea>
                            </div><br>
                            <div>
                                <div class="text-center">
                                    <button type="submit" name="kirim" class="btn btn-primary ">Kirim Pesan Baru </button>
                                    <button type="submit" name="kirimAll" class="btn btn-danger ">kirim pesan Tagihan </button>
                                </div>
                            </div>
                            <div class="text-right">
                                <a href="index.php" class="btn-link">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>