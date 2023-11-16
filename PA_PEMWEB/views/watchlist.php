<?php
session_start();
require "../actions/db_connect.php";

$film_id = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"]) && isset($_POST["film_id"])) {

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        if (isset($_POST["film_id"])) {
            $film_id = $_POST["film_id"];
        } else {

            echo "Film ID is not provided.";
            exit; 
        }

        if (!empty($film_id)) {

            $check_user_query = "SELECT user_id FROM signup WHERE user_id = ?";
            
            try {
                $stmt = $conn->prepare($check_user_query);
                $stmt->bind_param("s", $user_id);
                $stmt->execute();
                $user_result = $stmt->get_result();
                
                if ($user_result->num_rows == 0) {
                    echo "User ID does not exist.";
                    exit;
                }

                $insert_query = $conn->prepare("INSERT INTO watchlist (user_id, film_id) VALUES (?, ?)");
                $insert_query->bind_param("ii", $user_id, $film_id);

                if ($insert_query->execute()) {
                    $sql = "SELECT * FROM film WHERE film_id = $film_id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $nama_film = $row['judul_film'];
                    echo "<script>
                    alert('Film $nama_film berhasil ditambahkan ke watchlist');
                    window.location.href = 'dashboardUser.php';  // Redirect to the dashboard after the alert
                    </script>";    
                } else {
                    echo "Error: " . $conn->error;
                }

                $insert_query->close();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    } else {
        echo "User ID is not set.";
    }
}


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT film.judul_film, film.tgl_rilis, film.film_id, film.gambar FROM watchlist INNER JOIN film ON watchlist.film_id = film.film_id WHERE watchlist.user_id = $user_id");
    $watchlist = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $watchlist[] = $row;
    }
} else {
    echo "User ID is not set.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logoweb.png">
    <title>Watchlist - Cinema Universe</title>
    <link rel="stylesheet" media="screen and (min-width: 320px)" href="../styles/mobilep2.css">
</head>
<body onload="startTime()">
    <nav>
        <div class="top-nav">
            <div class="logo">
                <img src="../assets/logoweb.png" alt="#">
            </div>
            <div class="nav-items" id="nav-items">
                <h2>Real Time:</h2>
                <div id="Time"></div>
                <a href="../views/dashboardUser.php">Dashboard</a>
                <div>
                    <div class="sm-btn" id="sm-btn">
                        <img src="../assets/sun.png" id="icon">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="hero" id="hero">
        <img src="../assets/bgheroo.png" alt="#">
        <div class="hero-title">
            <h1>Your Favorite Cinema</h1>
            <p>Cinematic Universe</p>
        </div>
    </section>

    <div class="main-wl" id="main-wl">
        <h1>Your Watchlist</h1>
        <?php if (empty($watchlist)) : ?>
            <p>Your watchlist is empty.</p>
        <?php else : ?>
            <div class="film-content">
                <?php foreach ($watchlist as $item) : ?>
                    <div class="content">
                        <div class="content-img">
                            <?php
                            $judul_film = htmlspecialchars($item['judul_film']);
                            $alt_text = empty($judul_film) ? 'Movie Poster' : $judul_film;
                            ?>
                            <img src="../img/<?php echo $item['gambar']; ?>" alt="<?php echo $alt_text; ?>" />
                        </div>
                        <h2 class="film-title"><?php echo $judul_film; ?></h2>
                        <h3><?php echo $item['tgl_rilis']; ?></h3>
                        <form action="../views/deletewatchlist.php" method="get">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                            <input type="hidden" name="film_id" value="<?= $item['film_id'] ?>">
                            <td class="action">
                                <a href="deletewatchlist.php?id=<?php echo $fm['film_id']?>"><button class="delete-btn" onclick="confirm('Yakin ingin menghapus <?php echo $fm['judul_film']?>?')"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button></a>
                            </td>    
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>© Yoeka's Cinema</p>
    </footer>
    <script src="../scripts/watchlist.js"></script>
</body>
</html>
