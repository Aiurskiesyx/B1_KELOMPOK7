<?php
session_start();

    require "../actions/db_connect.php";

    if (!isset($_SESSION['admin_submit'])) {
        header('Location: login.php');
        exit;
    }

    
    
    
    if (isset($_POST['tambah'])) {
        $judul_film = $_POST['judul_film'];
        $genre = $_POST['genre'];
        $tgl_rilis = $_POST['tgl_rilis'];
        $studio_produksi = $_POST['studio_produksi'];
        $sinopsis = $_POST['sinopsis'];
        $trailer = $_POST['trailer'];
        $status_film = $_POST['status_film'];

        $img = $_FILES['gambar']['name'];
        $explode = explode('.', $img);
        $ekstensi = strtolower(end($explode));
        $gambar_baru = date("Y-m-d") . " $judul_film.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        
        if(move_uploaded_file($tmp, '../img/'.$gambar_baru)){
        $result = mysqli_query($conn, "INSERT INTO film (judul_film, genre, tgl_rilis, studio_produksi, sinopsis, trailer, status_film, gambar) 
        VALUES ('$judul_film', '$genre', '$tgl_rilis', '$studio_produksi', '$sinopsis', '$trailer', '$status_film', '$gambar_baru')");
        echo "Gambar berhasil diunggah.";
        if ($result) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'add.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logoweb.png">
    <title>Tambah Data</title>
    <link rel="stylesheet" media="screen and (min-width: 320px)" href="../styles/mobilep2.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
        <div class="sm-btn" id="sm-btn">
            <img src="../assets/sun.png" id="icon">
        </div>
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="judul_film">Judul Film</label>
                <input type="text" name="judul_film" class="textfield">
                <label for="genre">Genre Film</label>
                <input type="text" name="genre" class="textfield">
                <label for="tgl_rilis">Tanggal Rilis</label>
                <input type="date" name="tgl_rilis" class="textfield">
                <label for="studio_produksi">Studio Produksi</label>
                <input type="text" name="studio_produksi" class="textfield">
                <label for="sinopsis">Sinopsis Film</label>
                <textarea name="sinopsis" class="textarea"></textarea>
                <label for="trailer">Trailer Film</label>
                <input type="text" name="trailer" class="textfield" placeholder="Masukkan Kode Trailer Film">
                <label for="status_film">Status Penayangan Film</label>
                <input type="text" name="status_film" class="textfield">
                <label for="">Upload Gambar</label>
                <input type="file" name= "gambar" accept="image/*" id =""><br>
                <input type="submit" name="tambah" value="Tambah Data" class="Login">
            </form>
        </div>
    </section>
</body>
<script src="../scripts/script.js"></script>
</html>