<?php
    session_start();

    if(isset($_SESSION['login'])) {
        header('location: index.php');
        exit;
    }

    require 'fungsi.php';

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $result = mysqli_query($koneksi, "SELECT * FROM bobaho WHERE username = '$username'");

        $cek = mysqli_num_rows($result);
        if($cek > 0) {
            $_SESSION['login'] = true;

            header('location: index.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <h4>Login</h4>
        <label for="">Username</label>
        <input type="text" name="username" placeholder="Username">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>