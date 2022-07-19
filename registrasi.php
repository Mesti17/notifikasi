<?php   
require 'functions.php';

if (isset( $_POST ["register"])){

    if( registrasi($_POST) > 0 ){
            echo "
                <script>
                    alert('user baru berhasil ditambahkan!');
                </script>
            ";
    }else{
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <body>
            <h1>Halaman Registrasi</h1>
            <style>
                label{
                    display: block;
                }
            </style>

            <form action="" method="post">
                <fieldset>
                    <p>
                        <label for="username">username : </label>
                        <input type="text" name="username" id="username">
                    </p>

                    <p>
                        <label for="password">password : </label>
                        <input type="password" name="password" id="password">
                    </p>
                    <p>
                        <label for="password2">konfirmasi password : </label>
                        <input type="password" name="password2" id="password2">
                    </p>

                    <p>
                        <button type="submit" name="register">Register</button>
                    </p>

                </fieldset>
            </form>
            
        </body>
    </head>
</html>