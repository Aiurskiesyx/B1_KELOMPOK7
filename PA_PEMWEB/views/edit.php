<?php
session_start();
    require "../actions/db_connect.php";
    if (!isset($_SESSION['admin_submit'])) {
        header('Location: login.php');
        exit;
    }

    $film_id= $_GET['film_id'];

    $get = mysqli_query($conn, "SELECT * FROM film WHERE film_id = $film_id");
    $get_gambar = mysqli_query($conn, "SELECT gambar FROM film WHERE film_id = $film_id");

    $film = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $film[] = $row;
    }
    $film = $film[0];

    if (isset($_POST['ubah'])) {
        $judul_film = $_POST['judul_film'];
        $genre = $_POST['genre'];
        $tgl_rilis = $_POST['tgl_rilis'];
        $studio_produksi = $_POST['studio_produksi'];
        $sinopsis = $_POST['sinopsis'];
        $trailer = $_POST['trailer'];
        $status_film = $_POST['status_film'];

        $gambar = $_FILES['gambar']['name'];
        $explode = explode('.', $gambar);
        $ekstensi = strtolower(end($explode));
        
        $judul_film = str_replace(":", " ", $judul_film);
        $gambar_baru = date("Y-m-d") . " $judul_film.$ekstensi";
      

        $data_old = mysqli_fetch_array($get_gambar);
        unlink("../img/".$data_old['gambar']);

        if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {

            $uploadPath = '../img/' . $gambar_baru;
            
            if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadPath)) {
                echo "Gagal mengupload gambar. Destination: $uploadPath";
            exit;
        }

        $result = mysqli_query($conn, "UPDATE film SET judul_film='$judul_film', genre='$genre', tgl_rilis='$tgl_rilis', studio_produksi='$studio_produksi', sinopsis='$sinopsis', trailer='$trailer', status_film='$status_film', gambar='$uploadPath' WHERE film_id = $film_id");
    }
        if ($result) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'edit.php';
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
    <title>Edit Data</title>
    <link rel="stylesheet" media="screen and (min-width: 320px)" href="../styles/mobilep2.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
        <div class="sm-btn" id="sm-btn">
            <img src="../assets/sun.png" id="icon">
        </div>
            <h1>Edit Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="judul_film">Judul Film</label>
                <input type="text" name="judul_film" value="<?php echo $film['judul_film'] ?>" class="textfield">
                <label for="genre">Genre</label>
                <input type="text" name="genre" value="<?php echo $film['genre'] ?>" class="textfield">
                <label for="tgl_rilis">Tanggal Rilis</label>
                <input type="date" name="tgl_rilis" value="<?php echo $film['tgl_rilis'] ?>" class="textfield">
                <label for="studio_produksi">Studio Produksi</label>
                <input type="text" name="studio_produksi" value="<?php echo $film['studio_produksi'] ?>" class="textfield">
                <label for="sinopsis">Sinopsis Film</label>
                <textarea name="sinopsis" class="textarea"><?php echo $film['sinopsis'] ?></textarea>
                <label for="trailer">Trailer Film</label>
                <input type="text" name="trailer" value="<?php echo $film['trailer'] ?>" class="textfield" placeholder="Masukkan Kode Trailer Film">
                <label for="status_film">Status Penayangan Film</label>
                <input type="text" name="status_film" value="<?php echo $film['status_film'] ?>" class="textfield">
               
                <?php echo $film['gambar']; ?></p> 
                
                <label for="gambar">Upload Gambar Baru</label>
                <input type="file" name= "gambar" accept="image/*" id =""><br>
                <input type="submit" name="ubah" value="Edit Data" class="Login">
            </form>
        </div>
    </section>
</body>
<script src="../scripts/script.js"></script>
</html>
