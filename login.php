<?php
session_start();

if (isset ($_SESSION["login"])){
  header("Location: index.php");
  exit;
}

require 'functions.php';

if (isset ($_POST["login"])){
    $username = $_POST ["username"];
    $password = $_POST ["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE
     username = '$username'");

     //cek username
     if (mysqli_num_rows($result) === 1){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            //set session
            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;

        }
 
     }
     $error = true;
}?>

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
        <?php 
        if (isset($error))  {
            ?>
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fa-solid fa-circle-exclamation flex-shrink-0 me-2"></i>
                    <div>
                        Username atau Password yang anda masukkan salah!
                    </div>
                </div>
            <?php
            }
            ?>
            <h1 class="mb-5 text-center">Login</h1>  
            <div class="row justify-content-center mt-5 mb-5">
            <img src="img/pln.png" style="width: 100px;" alt="">
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

                                <div class="form-group ">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-lg" name="login" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            Sign In
                                        </button>
                                        <button type="submit" class="btn btn-link btn-lg"  style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                        <a href ="registrasi.php" class="btn-link">Registrasi</a>
                                        </button>
                                        <br>
    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-3 px-4 px-xl-5 bg-info fixed-bottom">
        <!-- Copyright -->
        
    </div>
       
</body>

</html>

