<?php
session_start();
    require "../actions/db_connect.php";

    if (!isset($_SESSION['admin_submit'])) {
        header('Location: login.php');  
        exit;
    }
    $film_id = $_GET['film_id'];

    $get_gambar = mysqli_query($conn, "SELECT gambar FROM film WHERE film_id = $film_id");
    $data_old = mysqli_fetch_array($get_gambar);
    unlink("../img/".$data_old['gambar']);
    
    $get = mysqli_query($conn, "DELETE FROM film WHERE film_id = $film_id");
    $film = [];



    if ($result) {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'dashboard.php';
        </script>";
    }
?>
