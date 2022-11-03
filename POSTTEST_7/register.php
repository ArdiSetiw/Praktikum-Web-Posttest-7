

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php include "style.css" ?>
    </style>
    <script>
        <?php include "javascript.js" ?>
    </script>
    <script src="JavaScript.js"></script>
    <title>Document</title>
</head>
<body id="bg_abt" >
    <!-- Navigasi Bar -->
    <header id="container">
        <div id="judul">
            <p>MOBIL AUTOMOTIVE</p>
        </div>
        <div id="nav_bar">
            <nav class="navbar-custom">
                <ul><li><a href="index.php" >Home</a></li>
                    <li>
                        <div class="theme-switch-wrapper">                    
                            <label class="theme-switch" for="checkbox">
                              <input type="checkbox" id="checkbox" value="check" onclick="theme_ab()"/>                        
                              <div class="slider round"></div>                    
                            </label>                
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="reg">
        <form action="" method="post">
            <table id="tab_log">
                <tr>
                    <th >Registrasi</th>
                </tr>
                <tr>
                    <td colpan=2><label for="email"><b>E-mail</b></label></td>
                </tr>
                <tr>
                    <td colspan=2><input type="text" placeholder="Enter E-mail" name="email" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td colpan=2><label for="uname"><b>Username</b></label></td>
                </tr>
                <tr>
                    <td colspan=2><input type="text" placeholder="Enter Username" name="uname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td colspan=2><label for="psw"><b>Password</b></label></td>
                </tr>    
                <tr>
                    <td colspan=2><input type="password" placeholder="Enter Password" name="password"  required></td>
                </tr>
                <tr>
                    <td colspan=2><label for="psw"><b>Konfirmasi Password</b></label></td>
                </tr>    
                <tr>
                    <td colspan=2><input type="password" placeholder="Enter Password" name="kpassword"  required></td>
                </tr>
                <tr align=center>
                    <td colspan=2><input type="submit" name="regbutton" value="Register" id="loginbutton"></td>
                </tr>    
                <tr>
            </table>
        </form>
    </div>
</body>

<?php
    require "connect.php";

    if(isset($_POST['regbutton'])){
        $username = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $kpassword = $_POST['kpassword'];

        if($password === $kpassword){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "SELECT username FROM akun WHERE username = '$username'";

            $result = mysqli_query($conn, $query);

            if(mysqli_fetch_assoc($result)){
                echo "<script>
                alert('Username Telah Digunakan');
                document.location.href = 'register.php';
                </script>";
            }else {
                $query = "INSERT INTO akun VALUES ('','$username','$email','$password','user')";

                $result = mysqli_query($conn,$query);

                if(mysqli_affected_rows($conn) > 0){
                    echo "<script>
                    alert('Registrasi Berhasil');
                    document.location.href = 'index.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Registrasi Gagal');
                    document.location.href = 'register.php';
                    </script>";
                }
            }

        }else {
            echo "<script>
            alert('Konfirmasi Password Salah');
            document.location.href = 'register.php';
            </script>";
        }
    }

?>