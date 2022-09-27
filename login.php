<?php
    session_start();
    $ingataku = "";
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

    if (isset($_COOKIE['cookie_username'])){
        $cookie_username = $_COOKIE['cookie_username'];
        $cookie_password = $_COOKIE['cookie_password'];
    
        $query = "SELECT * FROM admin WHERE nama_admin = '$cookie_username'";
        $result = mysqli_query($koneksi,$query);
        $check = mysqli_fetch_array($result);
        if ($check['kata_sandi'] == $cookie_password){
            $_SESSION['session_username'] = $cookie_username;
            $_SESSION['session_password'] = $cookie_password;
        }                 
    }

    if(isset($_SESSION['session_username'])){
        header("location: menuAdmin.php");
        exit();
    }

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $ingataku = $_POST['ingataku'];

        if($username == '' or $password == ''){
            echo "<script> 
                alert('Silahkan masukkan username dan password Anda'); 
                window.location = 'login.php'; 
                </script>";
        } else {
            $query = "SELECT * FROM admin WHERE nama_admin = '$username'";
            $result = mysqli_query($koneksi, $query);
            $check = mysqli_fetch_array($result);

            if($check['nama_admin'] == '' || $check['kata_sandi'] != md5($password)){ 
                $err = 1;
            } 

            if($err != 1){
                $_SESSION['session_username'] = $username; //tersimpan dalam server
                $_SESSION['session_password'] = md5($password);

                if($ingataku == 1){
                    $cookie_name = "cookie_username";
                    $cookie_value = $username;
                    $cookie_time = time() + (60 * 60 * 6); //detik, menit, jam. time() digunakan untuk mengambil waktu sekarang
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                    $cookie_name = "cookie_password";
                    $cookie_value = md5($password);
                    $cookie_time = time() + (60 * 60 * 6); 
                    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
                }

                header("location: menuAdmin.php");
            } else {
                echo "<script>
                    alert('Username atau password salah');
                    window.location = 'login.php';
                    </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>
    <form action="" method="post">
      <label>Username</label>
      <input type="text" name="username" placeholder="Username"> <br>
      <label>Password</label>
      <input type="password" name="password" placeholder="Password"> <br>
      <label>Ingat Saya</label>
        <input type="checkbox" name="ingataku" value="1" <?php if($ingataku == '1') echo "checked"?>> <br>
      <button type="submit" name="login" value="Login">Login</button>
    </form>
</body>
</html>