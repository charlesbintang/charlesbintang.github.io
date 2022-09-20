<?php
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == '' or $password == ''){
            echo "<script> alert('Silahkan masukkan username dan password Anda'); </script>";
            $err = 1;
        } else {
            $query = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $check = mysqli_fetch_array($result);

            if($check['username'] == '' || $check['password'] != md5($password)){ 
                $err = 1;
            } 

            if($err != 1){
                $_SESSION['session_username'] = $username;
                $_SESSION['session_password'] = md5($password);
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
      <label for="">Username</label>
      <input type="text" name="username" placeholder="Username"> <br>
      <label for="">Password</label>
      <input type="password" name="password" placeholder="Password"> <br>
      <button type="submit" name="login" value="Login">Login</button>
    </form>
</body>
</html>