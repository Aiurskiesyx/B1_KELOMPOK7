<?php 
session_start();
require "../actions/db_connect.php";


if (isset($_POST["submit"])){
    $username =strtolower( $_POST["username"] );
    $pass = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($pass === $cpassword){
        $pass = password_hash ($pass, PASSWORD_DEFAULT); 

        $result = mysqli_query($conn, "SELECT username FROM signup WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)){
            echo "
            <script>
                alert ('Username telah digunakan');
                document.location.href = 'signUp.php';
            </script>";
        }  else {
            $sql = "INSERT INTO signup (username, password) VALUES ('$username', '$pass')";

            $result = mysqli_query($conn,$sql);

            if ($result) {
                echo "
                <script>
                    alert ('Registrasi Berhasil');
                    document.location.href = 'login.php';
                </script>";
            } else {
                echo "
                <script>
                    alert ('Registrasi Gagal');
                    document.location.href = 'signUp.php';
                </script>";
            }
        }
    } else {
        echo "
        <script>
            alert ('Password tidak sama');
            document.location.href ='signUp.php';
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logoweb.png">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../styles/mobilep2.css">
</head>

<body>
<nav>
    <div class="top-nav">
      <div class="logo">
        <img src="../assets/logoBioskop.png" alt="#">
      </div>
          <div class="sm-btn" id="sm-btn">
            <img src="../assets/sun.png" id="icon">
        </div>
      </div>
  </nav>

    <section class ="sign-up" id="sign-up">
        <div class="form">
            <div class="box form-box">
                <header>Sign Up</header>
                <form action="" method="POST">
                    <div class="field input">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" required>
                    </div>
                    <div class="field input">
                        <label for="umur">Umur</label>
                        <input type="number" name="umur" id="umur" required min="17">  
                    </div>
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class= "field input">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <input type="checkbox" name="setuju" id="setuju" value="setuju" required >
                        Saya Setuju dengan Syarat dan Ketentuan
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Submit">
                    </div>
                    <div class="links">
                        Already have an account? <a href="login.php">Sign In Now</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="../scripts/script.js"></script>
</body>
</html>
