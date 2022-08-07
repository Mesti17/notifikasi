<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
                <script>
                    alert('user baru berhasil ditambahkan!');
                </script>
            ";
    } else {
        echo mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a341d667ca.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">

                            <h1 class="mb-5 text-center">Tambah User Baru</h1>
                            <div class="row justify-content-center mt-5 mb-5">
                                <img src="pln.png" style="width: 100px;" alt="">
                            </div>
                            <form method="POST" action="">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                                    <label for="floatingInput">Email / Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password2" class="form-control" id="floatingPassword" placeholder="Password2">
                                    <label for="floatingPassword">Konfirmasi Password</label>
                                </div>

                                <div class="form-group ">
                                    <div class=" text-center">
                                        <button type="submit" class="btn btn-info btn-lg" name="register" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            Add User
                                        </button>
                                        <br>
                                        <button type="submit" class="btn btn-link btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            <a href="index.php" class="btn-link">Home</a>
                                        </button>


                                    </div>
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