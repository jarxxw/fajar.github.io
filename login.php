<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 0px 10px 0px #0000001a;
            border-radius: 10px;
        }
        .login-container .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .login-container .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="login-container">
            <h2 class="text-center">Login</h2>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukkan email" autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                </div>
                <button type="submit" name="kirim" class="btn btn-primary btn-block">Login</button>
                
                
            </form>
            belum punya akun? <a href="singin.php">Sign in</a>
        </div>
    </div>
</div>

</body>
</html>


<?php
include("koneksi.php");
session_start();
if(isset($_POST['kirim'])){
$query=mysqli_query($koneksi,"SELECT * FROM user WHERE email='$_POST[email]' AND password='$_POST[password]'");

if(mysqli_num_rows($query) > 0)
{
    $_SESSION['email']= $_POST['email'];
    $_SESSION['password']= $_POST['password'];
    $_SESSION['masuk'] = TRUE;
    header("location:index.php");
}
else
{
    echo"error";
}
}
?>
